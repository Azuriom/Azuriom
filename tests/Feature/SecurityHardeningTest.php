<?php

namespace Tests\Feature;

use Azuriom\Extensions\UpdateManager;
use Azuriom\Models\ActionLog;
use Azuriom\Models\ActionLogEntry;
use Azuriom\Models\Comment;
use Azuriom\Models\Like;
use Azuriom\Models\Post;
use Azuriom\Models\Role;
use Azuriom\Models\Server;
use Azuriom\Models\Setting;
use Azuriom\Models\User;
use Azuriom\Rules\SafeUrl;
use Azuriom\Rules\SteamProfileUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Google2FA\Google2FA;
use RuntimeException;
use Tests\TestCase;
use ZipArchive;

class SecurityHardeningTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    private function role(string $name, int $power = 1, array $permissions = [], bool $admin = false): Role
    {
        $role = Role::forceCreate([
            'name' => $name,
            'color' => 'abcdef',
            'power' => $power,
            'is_admin' => $admin,
        ]);

        foreach ($permissions as $permission) {
            $role->permissions()->create(['permission' => $permission]);
        }

        return $role->refresh();
    }

    private function user(string $name, Role $role, array $attrs = []): User
    {
        return User::forceCreate([
            'name' => $name,
            'email' => $attrs['email'] ?? strtolower($name).'@example.test',
            'password' => $attrs['password'] ?? Hash::make('AzuriomLabPassword123!'),
            'role_id' => $role->id,
            'game_id' => $attrs['game_id'] ?? strtolower($name).'-gid',
            'email_verified_at' => now(),
            'password_changed_at' => $attrs['password_changed_at'] ?? now(),
            'money' => $attrs['money'] ?? 0,
            'two_factor_secret' => $attrs['two_factor_secret'] ?? null,
            'two_factor_recovery_codes' => $attrs['two_factor_recovery_codes'] ?? null,
            'access_token' => $attrs['access_token'] ?? null,
        ]);
    }

    public function test_update_download_rejects_traversal_file_names_before_writing(): void
    {
        $this->expectException(RuntimeException::class);

        app(UpdateManager::class)->download([
            'file' => '../../escape.zip',
            'url' => 'http://example.test/update.zip',
        ], 'downloads/', false);
    }

    public function test_update_extract_rejects_zip_entries_with_traversal(): void
    {
        Storage::disk('local')->makeDirectory('updates');

        $zipPath = storage_path('app/updates/traversal.zip');
        $targetDir = storage_path('app/update-target');
        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE);
        $zip->addFromString('../escape.php', 'blocked');
        $zip->close();

        try {
            $this->expectException(RuntimeException::class);

            app(UpdateManager::class)->extract(['file' => 'traversal.zip'], $targetDir);
        } finally {
            $this->assertFileDoesNotExist(storage_path('app/escape.php'));
        }
    }

    public function test_update_download_and_extract_valid_zip_archive(): void
    {
        Storage::disk('local')->makeDirectory('updates');

        $sourceZip = storage_path('app/source-update.zip');
        $targetDir = storage_path('app/update-extract-target');

        @unlink($sourceZip);
        @unlink(storage_path('app/updates/package.zip'));

        $zip = new ZipArchive();
        $zip->open($sourceZip, ZipArchive::CREATE);
        $zip->addFromString('plugins/example/plugin.json', '{"id":"example"}');
        $zip->close();

        $body = file_get_contents($sourceZip);

        Http::fake([
            'https://updates.example.test/package.zip' => Http::response($body),
        ]);

        $manager = app(UpdateManager::class);
        $manager->download([
            'file' => 'package.zip',
            'url' => 'https://updates.example.test/package.zip',
            'hash' => hash('sha256', $body),
        ]);

        $this->assertFileExists(storage_path('app/updates/package.zip'));

        $manager->extract(['file' => 'package.zip'], $targetDir);

        $this->assertFileExists($targetDir.'/plugins/example/plugin.json');
        $this->assertFileDoesNotExist(storage_path('app/updates/package.zip'));
    }

    public function test_navbar_link_rejects_unsafe_public_href_scheme(): void
    {
        $role = $this->role('navbar-admin', 5, ['admin.access', 'admin.navbar']);
        $admin = $this->user('navbaradmin', $role);

        $this->actingAs($admin)->post('/admin/navbar-elements', [
            'name' => 'Unsafe link',
            'type' => 'link',
            'link' => 'javascript:alert(1)',
        ])->assertSessionHasErrors('link');

        $this->assertDatabaseMissing('navbar_elements', ['name' => 'Unsafe link']);
    }

    public function test_server_join_url_rejects_unsafe_scheme(): void
    {
        $role = $this->role('server-admin', 5, ['admin.access', 'admin.servers']);
        $admin = $this->user('serveradmin', $role);
        $server = Server::forceCreate([
            'name' => 'Join URL server',
            'address' => '127.0.0.1',
            'port' => 25565,
            'type' => 'mc-azlink',
            'token' => 'join-url-token-value',
            'data' => ['azlink-ping' => false],
        ]);

        $this->actingAs($admin)->put('/admin/servers/'.$server->id, [
            'name' => $server->name,
            'type' => 'mc-azlink',
            'address' => '127.0.0.1',
            'port' => 25565,
            'join_url' => 'javascript://example/%0Aalert(1)',
            'home_display' => '1',
        ])->assertSessionHasErrors('join_url');

        $this->assertNull($server->refresh()->join_url);
    }

    public function test_safe_url_allows_common_non_http_navigation_schemes(): void
    {
        $validator = validator([
            'mailto' => 'mailto:admin@example.com',
            'tel' => 'tel:+33123456789',
            'steam' => 'steam://connect/127.0.0.1:27015',
            'fivem' => 'fivem://connect/example.com',
            'launcher' => 'azuriom-launcher://join/server',
        ], [
            'mailto' => [new SafeUrl()],
            'tel' => [new SafeUrl()],
            'steam' => [new SafeUrl()],
            'fivem' => [new SafeUrl()],
            'launcher' => [new SafeUrl()],
        ]);

        $this->assertFalse($validator->fails());
    }

    public function test_user_manager_without_personal_permission_cannot_change_email(): void
    {
        $managerRole = $this->role('user-manager', 5, ['admin.access', 'admin.users']);
        $memberRole = $this->role('member', 1, []);
        $manager = $this->user('manager', $managerRole);
        $target = $this->user('target', $memberRole, ['email' => 'target@example.test']);

        $this->actingAs($manager)->patch('/admin/users/'.$target->id, [
            'name' => $target->name,
            'email' => 'changed@example.test',
            'money' => 0,
            'role' => $memberRole->id,
        ])->assertSessionHasErrors('email');

        $this->assertSame('target@example.test', $target->refresh()->email);
    }

    public function test_user_manager_without_personal_permission_cannot_clear_email(): void
    {
        $managerRole = $this->role('user-manager-clear-email', 5, ['admin.access', 'admin.users']);
        $memberRole = $this->role('member-clear-email', 1, []);
        $manager = $this->user('managerclearemail', $managerRole);
        $target = $this->user('targetclearemail', $memberRole, ['email' => 'clear-target@example.test']);

        $this->actingAs($manager)->patch('/admin/users/'.$target->id, [
            'name' => $target->name,
            'email' => null,
            'money' => 0,
            'role' => $memberRole->id,
        ])->assertSessionHasErrors('email');

        $this->assertSame('clear-target@example.test', $target->refresh()->email);
    }

    public function test_user_manager_without_personal_permission_can_still_create_users(): void
    {
        $managerRole = $this->role('user-manager-create', 5, ['admin.access', 'admin.users']);
        $memberRole = $this->role('member-create', 1, []);
        $manager = $this->user('managercreate', $managerRole);

        $this->actingAs($manager)->post('/admin/users', [
            'name' => 'createduser',
            'email' => 'created@example.test',
            'password' => 'AzuriomLabPassword123!',
            'role' => $memberRole->id,
        ])->assertRedirect('/admin/users');

        $this->assertDatabaseHas('users', [
            'name' => 'createduser',
            'email' => 'created@example.test',
            'role_id' => $memberRole->id,
        ]);
    }

    public function test_user_side_actions_require_target_hierarchy_authorization(): void
    {
        $managerRole = $this->role('low-user-manager', 1, ['admin.access', 'admin.users']);
        $targetRole = $this->role('higher-admin', 10, ['admin.access'], true);
        $manager = $this->user('lowmanager', $managerRole);
        $target = $this->user('hightarget', $targetRole, [
            'two_factor_secret' => 'two-factor-secret-value',
            'two_factor_recovery_codes' => ['recovery-code-value'],
        ]);

        $this->actingAs($manager)->post('/admin/users/'.$target->id.'/2fa')->assertForbidden();

        $this->assertSame('two-factor-secret-value', $target->refresh()->two_factor_secret);
    }

    public function test_role_duplication_does_not_copy_unassignable_permissions_for_non_admins(): void
    {
        $managerRole = $this->role('role-manager', 5, ['admin.access', 'admin.roles']);
        $sourceRole = $this->role('lower-settings-role', 1, ['admin.settings']);
        $manager = $this->user('rolemanager', $managerRole);

        $this->actingAs($manager)->post('/admin/roles/'.$sourceRole->id.'/duplicate')
            ->assertRedirect();

        $copy = Role::where('name', 'lower-settings-role (1)')->firstOrFail();
        $this->assertFalse($copy->hasRawPermission('admin.settings'));
    }

    public function test_auth_api_refuses_forced_password_change_users(): void
    {
        Setting::updateSettings('auth_api', true);
        $role = $this->role('member', 1, []);
        $user = $this->user('apiuser', $role, [
            'email' => 'apiuser@example.test',
            'password' => Hash::make('AzuriomLabPassword123!'),
        ]);
        $user->forceFill(['password_changed_at' => null])->save();

        $this->postJson('/api/auth/authenticate', [
            'email' => 'apiuser@example.test',
            'password' => 'AzuriomLabPassword123!',
        ])->assertStatus(403);

        $this->assertNull($user->refresh()->access_token);
    }

    public function test_admin_password_update_revokes_existing_auth_api_token(): void
    {
        $managerRole = $this->role('user-manager', 5, ['admin.access', 'admin.users']);
        $memberRole = $this->role('member', 1, []);
        $manager = $this->user('manager', $managerRole);
        $target = $this->user('tokenuser', $memberRole, ['access_token' => str_repeat('a', 128)]);

        $this->actingAs($manager)->patch('/admin/users/'.$target->id, [
            'name' => $target->name,
            'email' => $target->email,
            'password' => 'NewAzuriomLabPassword123!',
            'money' => 0,
            'role' => $memberRole->id,
        ])->assertRedirect('/admin/users/'.$target->id.'/edit');

        $this->assertNull($target->refresh()->access_token);
    }

    public function test_two_factor_completion_rechecks_forced_password_change_state(): void
    {
        $role = $this->role('two-factor-member', 1, []);
        $secret = (new Google2FA())->generateSecretKey();
        $user = $this->user('twofactoruser', $role, [
            'email' => 'twofactoruser@example.test',
            'password' => Hash::make('AzuriomLabPassword123!'),
            'two_factor_secret' => $secret,
            'two_factor_recovery_codes' => ['recovery-code-value'],
        ]);

        $this->post('/user/login', [
            'email' => $user->email,
            'password' => 'AzuriomLabPassword123!',
        ])->assertRedirect(route('login.2fa'));

        auth()->forgetGuards();

        $user->forceFill(['password_changed_at' => null])->save();
        $this->assertTrue($user->refresh()->mustChangePassword());

        $this->post('/user/2fa', [
            'code' => (new Google2FA())->getCurrentOtp($secret),
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_action_logs_redact_sensitive_setting_values(): void
    {
        $role = $this->role('settings-admin', 5, ['admin.access', 'admin.settings']);
        $admin = $this->user('settingsadmin', $role);
        $oldSecret = 'old-smtp-password-value';

        Setting::updateSettings('mail.smtp.password', $oldSecret);

        $this->actingAs($admin)->post('/admin/settings/mail/update', [
            'from-address' => 'mail@example.test',
            'mailer' => 'smtp',
            'smtp-host' => 'smtp.example.test',
            'smtp-port' => 587,
            'smtp-scheme' => 'smtp',
            'smtp-username' => 'mailer',
            'smtp-password' => 'new-smtp-password-value',
        ])->assertRedirect('/admin/settings/mail');

        $entry = ActionLogEntry::where('attribute', 'mail.smtp.password')->firstOrFail();
        $this->assertSame('[redacted]', $entry->old_value);
        $this->assertSame('[redacted]', $entry->new_value);
    }

    public function test_action_log_show_displays_redacted_values(): void
    {
        $role = $this->role('log-redaction-viewer', 5, ['admin.access', 'admin.logs']);
        $viewer = $this->user('logredactionviewer', $role);
        $log = ActionLog::forceCreate([
            'user_id' => $viewer->id,
            'action' => 'settings.updated',
            'data' => [],
        ]);

        $log->createEntries([
            'mail.smtp.password' => 'old-password-value',
        ], [
            'mail.smtp.password' => 'new-password-value',
        ]);

        $this->actingAs($viewer)->get('/admin/logs/'.$log->id)
            ->assertOk()
            ->assertSee('[redacted]')
            ->assertDontSee('old-password-value')
            ->assertDontSee('new-password-value');
    }

    public function test_two_factor_recovery_codes_are_hidden_and_redacted(): void
    {
        $role = $this->role('recovery-code-member', 1);
        $user = $this->user('recoverycodemember', $role, [
            'two_factor_recovery_codes' => ['first-code', 'second-code'],
        ]);
        $log = ActionLog::forceCreate([
            'user_id' => $user->id,
            'action' => 'users.updated',
            'target_id' => $user->id,
            'data' => [],
        ]);

        $this->assertArrayNotHasKey('two_factor_recovery_codes', $user->toArray());

        $log->createEntries([
            'two_factor_recovery_codes' => ['first-code'],
        ], [
            'two_factor_recovery_codes' => ['third-code'],
        ]);

        $entry = ActionLogEntry::where('attribute', 'two_factor_recovery_codes')->firstOrFail();
        $this->assertSame('[redacted]', $entry->old_value);
        $this->assertSame('[redacted]', $entry->new_value);
    }

    public function test_unpublished_posts_reject_likes_and_comments(): void
    {
        $memberRole = $this->role('commenter', 1, ['comments.create']);
        $authorRole = $this->role('author', 1, []);
        $member = $this->user('commenter', $memberRole);
        $author = $this->user('author', $authorRole);
        $post = Post::forceCreate([
            'author_id' => $author->id,
            'title' => 'Future post',
            'description' => 'not public',
            'slug' => 'future-post',
            'content' => 'hidden body',
            'published_at' => Carbon::now()->addDay(),
        ]);

        $this->actingAs($member)->postJson('/news/'.$post->id.'/like')->assertNotFound();
        $this->actingAs($member)->post('/posts/'.$post->id.'/comments', [
            'content' => 'comment before publication',
        ])->assertNotFound();

        $this->assertSame(0, Like::where('post_id', $post->id)->count());
        $this->assertSame(0, Comment::where('post_id', $post->id)->count());
    }

    public function test_direct_log_show_rejects_non_global_logs(): void
    {
        $role = $this->role('log-viewer', 5, ['admin.access', 'admin.logs']);
        $viewer = $this->user('logviewer', $role);
        $log = ActionLog::forceCreate([
            'user_id' => $viewer->id,
            'action' => 'users.auth.api.login',
            'data' => ['ip' => '198.51.100.43'],
        ]);

        $this->actingAs($viewer)->get('/admin/logs/'.$log->id)->assertNotFound();
    }

    public function test_user_edit_does_not_link_to_non_global_logs(): void
    {
        $viewerRole = $this->role('user-log-viewer', 5, ['admin.access', 'admin.users', 'admin.logs']);
        $memberRole = $this->role('logged-member', 1);
        $viewer = $this->user('userlogviewer', $viewerRole);
        $member = $this->user('loggedmember', $memberRole);
        $log = ActionLog::forceCreate([
            'user_id' => $member->id,
            'action' => 'users.auth.api.login',
            'data' => ['ip' => '198.51.100.44'],
        ]);

        $this->actingAs($viewer)->get('/admin/users/'.$member->id.'/edit')
            ->assertOk()
            ->assertDontSee(route('admin.logs.show', $log));
    }

    public function test_webhook_settings_reject_non_discord_loopback_urls(): void
    {
        $role = $this->role('log-admin', 5, ['admin.access', 'admin.logs']);
        $admin = $this->user('logadmin', $role);

        $this->actingAs($admin)->post('/admin/logs/settings', [
            'webhook_url' => 'http://127.0.0.1:8123/hit',
        ])->assertSessionHasErrors('webhook_url');

        $this->assertNull(setting('logs.webhook_url'));
    }

    public function test_webhook_settings_reject_discord_urls_with_userinfo(): void
    {
        $role = $this->role('log-admin-userinfo', 5, ['admin.access', 'admin.logs']);
        $admin = $this->user('logadminuserinfo', $role);

        $this->actingAs($admin)->post('/admin/logs/settings', [
            'webhook_url' => 'https://user@discord.com/api/webhooks/123/token',
        ])->assertSessionHasErrors('webhook_url');
    }

    public function test_svg_uploads_are_rejected_for_public_image_storage(): void
    {
        Storage::fake('public');
        $role = $this->role('image-admin', 5, ['admin.access', 'admin.images']);
        $admin = $this->user('imageadmin', $role);
        $svg = UploadedFile::fake()->createWithContent(
            'active.svg',
            '<svg xmlns="http://www.w3.org/2000/svg"><script>alert(15)</script></svg>',
        );

        $this->actingAs($admin)->post('/admin/images', [
            'name' => 'Active SVG',
            'slug' => 'active-svg',
            'image' => $svg,
        ])->assertSessionHasErrors('image');

        Storage::disk('public')->assertMissing('img/active-svg.svg');
    }

    public function test_steam_install_profile_url_rejects_loopback_hosts(): void
    {
        $validator = validator([
            'url' => 'http://127.0.0.1/profiles/76561198000000000',
        ], [
            'url' => ['required', new SteamProfileUrl()],
        ]);

        $this->assertTrue($validator->fails());
    }

    public function test_admin_maintenance_actions_reject_get_requests(): void
    {
        $role = $this->role('settings-maintenance-admin', 5, ['admin.access', 'admin.settings']);
        $admin = $this->user('settingsmaintenanceadmin', $role);

        $this->actingAs($admin)->get('/admin/settings/storage/link')->assertNotFound();
        $this->actingAs($admin)->get('/admin/settings/migrate')->assertNotFound();
    }
}
