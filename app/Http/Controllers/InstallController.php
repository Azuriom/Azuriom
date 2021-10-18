<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Extensions\Plugin\PluginManager;
use Azuriom\Extensions\UpdateManager;
use Azuriom\Models\Setting;
use Azuriom\Models\User;
use Azuriom\Support\EnvEditor;
use Exception;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Throwable;

class InstallController extends Controller
{
    public const TEMP_KEY = 'base64:hmU1T3OuvHdi5t1wULI8Xp7geI+JIWGog9pBCNxslY8=';
    public const MIN_PHP_VERSION = '7.4';
    public const REQUIRED_EXTENSIONS = [
        'bcmath', 'ctype', 'json', 'mbstring', 'openssl', 'PDO', 'tokenizer',
        'xml', 'xmlwriter', 'curl', 'fileinfo', 'zip',
    ];
    public const SUPPORTED_LANGUAGES_NAMES = [
        'en' => 'English',
        'fr' => 'Français',
    ];
    public const SUPPORTED_LANGUAGES = ['en', 'fr'];

    protected $databaseDrivers = [
        'mysql' => 'MySQL/MariaDB',
        'pgsql' => 'PostgreSQL',
        'sqlite' => 'SQLite',
        'sqlsrv' => 'SQLServer',
    ];

    // TODO dynamic games
    protected $steamGames = [
        'gmod', 'ark', 'rust', 'fivem', 'csgo', 'tf2',
    ];
    protected $games = [
        'minecraft' => [
            'name' => 'Minecraft',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/minecraft.png',
        ],
        'mc-bedrock' => [
            'name' => 'Minecraft: Bedrock Edition',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/minecraft.png',
        ],
        'gmod' => [
            'name' => 'Garry\'s mod',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/gmod.svg',
        ],
        'ark' => [
            'name' => 'ARK: Survival Evolved',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/ark.png',
        ],
        'csgo' => [
            'name' => 'CS:GO',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/csgo.png',
        ],
        'tf2' => [
            'name' => 'Team Fortress 2',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/tf2.svg',
        ],
        'rust' => [
            'name' => 'Rust',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/rust.svg',
        ],
        'fivem' => [
            'name' => 'FiveM',
            'logo' => 'https://azuriom.com/install/assets/v0.2.4/img/fivem.svg',
        ],
    ];

    protected $hasRequirements;

    protected $requirements;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->requirements = static::getRequirements();
        $this->hasRequirements = ! in_array(false, $this->requirements, true);

        $this->middleware(function (Request $request, callable $next) {
            if (config('app.key') !== self::TEMP_KEY || ! $this->hasRequirements) {
                return redirect()->home();
            }

            return $next($request);
        });

        $this->middleware(function (Request $request, callable $next) {
            return file_exists(App::environmentFilePath())
                ? $next($request)
                : redirect()->route('install.database');
        })->only(['showGame', 'showGames', 'setupGame']);

        $this->games = array_merge($this->games, $this->getCommunityGames());
    }

    /**
     * Returns games keyed with `extention_id` and not the ressource id.
     */
    private function getCommunityGames()
    {
        $updateManager = app(UpdateManager::class);
        $games = $updateManager->getGames();

        return collect($games)->keyBy('extension_id')->all();
    }

    public function showDatabase()
    {
        return view('install.database', [
            'databaseDrivers' => $this->databaseDrivers,
        ]);
    }

    public function database(Request $request)
    {
        $this->validate($request, [
            'type' => ['required', Rule::in(array_keys($this->databaseDrivers))],
            'host' => ['required_unless:type,sqlite'],
            'port' => ['nullable', 'integer', 'between:1,65535'],
            'database' => ['required_unless:type,sqlite'],
            'user' => ['required_unless:type,sqlite'],
            'password' => ['nullable'],
        ]);

        $envPath = App::environmentFilePath();
        $databaseType = $request->input('type');

        try {
            if ($databaseType === 'sqlite') {
                $databasePath = database_path('database.sqlite');

                touch($databasePath);

                DB::connection('sqlite')->getPdo(); // Ensure connection

                File::copy(base_path('.env.example'), $envPath);

                EnvEditor::updateEnv(['DB_CONNECTION' => $databaseType]);

                return redirect()->route('install.games');
            }

            $host = $request->input('host');
            $port = $request->input('port');
            $database = $request->input('database');
            $user = $request->input('user');
            $password = $request->input('password');

            $key = 'database.connections.test.';

            config([
                $key.'driver' => $databaseType,
                $key.'host' => $host,
                $key.'port' => $port,
                $key.'database' => $database,
                $key.'username' => $user,
                $key.'password' => $password,
            ]);

            DB::connection('test')->getPdo(); // Ensure connection

            copy(base_path('.env.example'), $envPath);

            EnvEditor::updateEnv([
                'APP_ENV' => 'production',
                'APP_DEBUG' => 'false',
                'DB_CONNECTION' => $databaseType,
                'DB_HOST' => $host,
                'DB_PORT' => $port,
                'DB_DATABASE' => $database,
                'DB_USERNAME' => $user,
                'DB_PASSWORD' => $password,
            ]);

            return redirect()->route('install.games');
        } catch (Throwable $t) {
            return redirect()->back()->withInput()->with('error', trans('messages.status-error', [
                'error' => utf8_encode($t->getMessage()),
            ]));
        }
    }

    public function showGames()
    {
        return view('install.games', ['games' => $this->games]);
    }

    public function showGame(string $game)
    {
        abort_if(! array_key_exists($game, $this->games), 404);

        if ($game === 'minecraft') {
            return view('install.games.minecraft', [
                'game' => $game,
                'gameName' => 'Minecraft',
                'locales' => self::SUPPORTED_LANGUAGES_NAMES,
            ]);
        }

        if ($game === 'mc-bedrock') {
            return view('install.games.minecraft', [
                'game' => $game,
                'gameName' => 'Minecraft: Bedrock Edition',
                'locales' => self::SUPPORTED_LANGUAGES_NAMES,
            ]);
        }

        if (in_array($game, $this->steamGames, true)) {
            return view('install.games.steam', [
                'game' => $game,
                'gameName' => $this->games[$game]['name'],
                'locales' => self::SUPPORTED_LANGUAGES_NAMES,
            ]);
        }

        return view('install.games.other', [
            'game' => $game,
            'gameName' => $this->games[$game]['name'],
            'locales' => self::SUPPORTED_LANGUAGES_NAMES,
        ]);
    }

    public function setupGame(Request $request, string $game)
    {
        abort_if(! array_key_exists($game, $this->games), 404);

        try {
            if (in_array($game, $this->steamGames, true)) {
                $this->validate($request, [
                    'key' => 'required',
                    'url' => 'required',
                    'locale' => [Rule::in(static::SUPPORTED_LANGUAGES)],
                ]);

                $profile = Http::get($request->input('url').'?xml=1')->body();

                if (! Str::contains($profile, '<steamID64>')) {
                    throw ValidationException::withMessages(['url' => 'Invalid Steam profile URL.']);
                }

                preg_match('/<steamID64>(\d{17})<\/steamID64>/', $profile, $matches);

                $gameId = $matches[1];
                $steamKey = $request->input('key');

                try {
                    $name = Http::get("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002?steamids={$gameId}&key={$steamKey}")
                        ->throw()
                        ->json('response.players.0.personaname');

                    if ($name === null) {
                        throw new Exception('Invalid Steam URL.');
                    }
                } catch (HttpClientException $e) {
                    throw ValidationException::withMessages(['key' => 'Invalid Steam API key.']);
                }
            } elseif ($game === 'minecraft' || $game === 'mc-bedrock') {
                $this->validate($request, [
                    'name' => ['required', 'string', 'max:25'],
                    'email' => ['required', 'string', 'email', 'max:50'], // TODO ensure unique
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'locale' => [Rule::in(static::SUPPORTED_LANGUAGES)],
                ]);

                $name = $request->input('name');
                if ($game !== 'mc-bedrock') {
                    $game = $request->filled('minecraftPremium') ? 'mc-online' : 'mc-offline';
                }

                if ($game === 'mc-online') {
                    $gameId = Http::get("https://api.mojang.com/users/profiles/minecraft/{$name}")->json('id');

                    if ($gameId === null) {
                        throw ValidationException::withMessages(['name' => 'No UUID for this username.']);
                    }
                } elseif ($game === 'mc-bedrock') {
                    $gameId = Http::get("https://xbox-api.azuriom.com/search/{$name}")->json('xuid');

                    if ($gameId === null) {
                        throw ValidationException::withMessages(['name' => 'No XUID for this username.']);
                    }
                }
            }

            Artisan::call('cache:clear');

            Artisan::call('migrate', ['--force' => true, '--seed' => true]);

            Artisan::call('storage:link', ! windows_os() ? ['--relative' => true] : []);

            EnvEditor::updateEnv([
                'APP_LOCALE' => $request->input('locale'),
                'APP_URL' => url('/'),
                'MAIL_MAILER' => 'array',
                'AZURIOM_GAME' => $game,
            ] + (isset($steamKey) ? ['STEAM_KEY' => $steamKey] : []));

            $communityGames = $this->getCommunityGames();

            if (array_key_exists($game, $communityGames)) {
                $updateManager = app(UpdateManager::class);
                $pluginManager = app(PluginManager::class);

                $pluginDir = $pluginManager->path($game);

                try {
                    $updateManager->download($communityGames[$game], 'plugins/');
                    $updateManager->extract($communityGames[$game], $pluginDir, 'plugins/');
                    $pluginManager->enable($game);

                    $description = $pluginManager->findDescription($game);

                    if ($description !== null && isset($description->installRedirectPath)) {
                        return redirect($description->installRedirectPath);
                    }

                    return $this->finishInstall();
                } catch (Throwable $t) {
                    return redirect()->route('install.games')->with('error', $t->getMessage());
                }
            }

            $user = User::create([
                'name' => $name,
                'email' => $request->input('email', 'admin@domain.ltd'),
                'password' => Hash::make($request->input('password', Str::random(32))),
                'game_id' => $gameId ?? null,
            ]);

            $user->markEmailAsVerified();
            $user->forceFill(['role_id' => 2])->save();

            if (in_array($game, $this->steamGames, true)) {
                Setting::updateSettings('register', false);
            }
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', trans('messages.status-error', [
                'error' => utf8_encode($e->getMessage()),
            ]));
        }

        return redirect()->route('install.finish');
    }

    public function finishInstall()
    {
        EnvEditor::updateEnv([
            'APP_KEY' => 'base64:'.base64_encode(Encrypter::generateKey(config('app.cipher'))),
        ]);

        return view('install.success');
    }

    public static function getRequirements()
    {
        $requirements = [
            'php' => version_compare(PHP_VERSION, static::MIN_PHP_VERSION, '>='),
            'writable' => is_writable(base_path()),
            'function-symlink' => static::hasFunctionEnabled('symlink'),
            'rewrite' => ! defined('AZURIOM_NO_URL_REWRITE'),
        ];

        foreach (static::REQUIRED_EXTENSIONS as $extension) {
            $requirements['extension-'.$extension] = extension_loaded($extension);
        }

        return $requirements;
    }

    private static function hasFunctionEnabled(string $function)
    {
        if (! function_exists($function)) {
            return false;
        }

        try {
            return strpos(ini_get('disable_functions'), $function) === false;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function parsePhpVersion()
    {
        preg_match('/^(\d+)\.(\d+)/', PHP_VERSION, $matches);

        if (count($matches) > 2) {
            return "{$matches[1]}.{$matches[2]}";
        }

        return PHP_VERSION;
    }
}
