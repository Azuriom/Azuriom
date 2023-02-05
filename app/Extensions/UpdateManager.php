<?php

namespace Azuriom\Extensions;

use Azuriom\Azuriom;
use Azuriom\Models\User;
use Azuriom\Support\Optimizer;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use ZipArchive;

class UpdateManager
{
    /**
     * The cached updates.
     */
    protected ?array $updates = null;

    /**
     * The filesystem instance.
     */
    protected Filesystem $files;

    /**
     * Create a new UpdateManager instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    public function getApiAlerts(bool $force = false)
    {
        return $this->fetch($force)['alerts'] ?? [];
    }

    public function isLastVersionDownloaded(bool $force = false)
    {
        $updates = $this->getUpdate($force);

        if (empty($updates)) {
            return false;
        }

        return $this->files->exists(storage_path('app/updates/'.$updates['file']));
    }

    public function hasUpdate(bool $force = false)
    {
        $version = $this->getLastVersion($force);

        if ($version === null) {
            return false;
        }

        return version_compare($version, Azuriom::version(), '>');
    }

    public function getLastVersion(bool $force = false)
    {
        return $this->getUpdate($force)['version'] ?? null;
    }

    public function getUpdate(bool $force = false)
    {
        return $this->fetch($force)['update'] ?? null;
    }

    public function getPlugins(bool $force = false)
    {
        return $this->fetch($force)['plugins'] ?? [];
    }

    public function getThemes(bool $force = false)
    {
        return $this->fetch($force)['themes'] ?? [];
    }

    public function getGames(bool $force = false)
    {
        return $this->fetch($force)['games'] ?? [];
    }

    public function fetch(bool $force = false)
    {
        if ($this->updates !== null) {
            return $this->updates;
        }

        if ($force) {
            try {
                return $this->forceFetchUpdates();
            } catch (Exception) {
                return [];
            }
        }

        return Cache::remember('updates', now()->addMinutes(15), function () {
            try {
                return $this->forceFetchUpdates(false);
            } catch (Exception) {
                return [];
            }
        });
    }

    public function forceFetchUpdates(bool $cache = true)
    {
        $updates = $this->prepareHttpRequest()
            ->get('https://market.azuriom.com/api/updates')
            ->throw()
            ->json();

        if ($updates !== null) {
            $this->updates = $updates;
        }

        if ($cache) {
            Cache::put('updates', $updates ?? [], now()->addMinutes(15));
        }

        return $updates;
    }

    public function download(array $info, string $tempDir = '', bool $verifyHash = true)
    {
        $updatesPath = storage_path('app/updates/');

        if (! $this->files->exists($updatesPath)) {
            $this->files->makeDirectory($updatesPath);
        }

        if (! array_key_exists('file', $info)) {
            throw new RuntimeException('No file available. If it\'s a paid extension, make sure you purchased it and verify the site key.');
        }

        $dir = $updatesPath.$tempDir;
        $path = $dir.$info['file'];

        if (! $this->files->exists($dir)) {
            $this->files->makeDirectory($dir);
        }

        if ($this->files->exists($path)) {
            $this->files->delete($path);
        }

        $this->prepareHttpRequest()
            ->withOptions(['sink' => $path])
            ->get($info['url'])
            ->throw();

        if ($verifyHash && ! hash_equals($info['hash'], hash_file('sha256', $path))) {
            $this->files->delete($path);

            throw new RuntimeException('The file hash do not match expected hash!');
        }

        Cache::forget('updates_counts');
    }

    public function installUpdate(array $info)
    {
        if (! is_writable(base_path())) {
            throw new RuntimeException('Missing write permission on '.base_path());
        }

        $this->extract($info, base_path());

        app(Optimizer::class)->clear();

        Cache::flush();

        Artisan::call('migrate', ['--force' => true, '--seed' => true]);
    }

    public function extract(array $info, string $targetDir, string $tempDir = '')
    {
        $file = storage_path('app/updates/'.$tempDir.$info['file']);

        if ($this->files->extension($file) !== 'zip') {
            throw new RuntimeException('Invalid file extension');
        }

        if (! $this->files->exists($file)) {
            throw new FileNotFoundException('File not found');
        }

        $zip = new ZipArchive();

        if (($status = $zip->open($file)) !== true) {
            throw new RuntimeException('Unable to open zip: '.$status);
        }

        if (! $zip->extractTo($targetDir)) {
            throw new RuntimeException('Unable to extract zip');
        }

        $zip->close();

        $this->files->delete($file);
    }

    private function prepareHttpRequest()
    {
        $userAgent = 'Azuriom updater (v'.Azuriom::version().' - '.url('/').')';

        $request = Http::withUserAgent($userAgent)->withHeaders([
            'Azuriom-Version' => Azuriom::version(),
            'Azuriom-PHP-Version' => PHP_VERSION,
            'Azuriom-Locale' => app()->getLocale(),
            'Azuriom-Game' => game()->id(),
            'Azuriom-Users' => is_installed() ? User::count() : 0,
        ]);

        $siteKey = setting('site-key');

        if ($siteKey === null) {
            return $request;
        }

        return $request->withHeaders(['Azuriom-Site-Key' => $siteKey]);
    }
}
