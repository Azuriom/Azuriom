<?php

namespace Azuriom\Extensions;

use Azuriom\Azuriom;
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
    protected $updates;

    /**
     * The file instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

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

    public function fetch(bool $force = false)
    {
        if ($this->updates !== null) {
            return $this->updates;
        }

        if ($force) {
            try {
                return $this->forceFetchUpdates();
            } catch (Exception $e) {
                return [];
            }
        }

        return Cache::remember('updates', now()->addMinutes(15), function () {
            try {
                return $this->forceFetchUpdates(false);
            } catch (Exception $e) {
                return [];
            }
        });
    }

    public function forceFetchUpdates(bool $cache = true)
    {
        $response = $this->prepareHttpRequest()->get('https://azuriom.com/api/updates');

        $updates = $response->throw()->json();

        if ($updates !== null) {
            $this->updates = $updates;
        }

        if ($cache) {
            Cache::put('updates', $updates ?? [], now()->addMinutes(15));
        }

        return $updates;
    }

    public function download(array $info, string $tempDir = '')
    {
        $updatesPath = storage_path('app/updates/');

        if (! $this->files->exists($updatesPath)) {
            $this->files->makeDirectory($updatesPath);
        }

        $dir = $updatesPath.$tempDir;
        $path = $dir.$info['file'];

        if (! $this->files->exists($dir)) {
            $this->files->makeDirectory($dir);
        }

        if ($this->files->exists($path)) {
            $this->files->delete($path);
        }

        $this->prepareHttpRequest()->withOptions(['sink' => $path])->get($info['url']);

        if (! hash_equals($info['hash'], hash_file('sha256', $path))) {
            $this->files->delete($path);

            throw new Exception('The file hash do not match expected hash!');
        }
    }

    public function installUpdate(array $info)
    {
        $this->extract($info, base_path());

        app(Optimizer::class)->clear();

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

        $request = Http::withHeaders([
            'User-Agent' => $userAgent,
            'Azuriom-Version' => Azuriom::version(),
            'Azuriom-PHP-Version' => PHP_VERSION,
            'Azuriom-Locale' => app()->getLocale(),
        ]);

        $siteKey = setting('site-key');

        if ($siteKey === null) {
            return $request;
        }

        return $request->withHeaders(['Azuriom-Site-Key' => $siteKey]);
    }
}
