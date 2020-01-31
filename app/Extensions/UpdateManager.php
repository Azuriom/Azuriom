<?php

namespace Azuriom\Extensions;

use Azuriom\Azuriom;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Throwable;
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
        $updates = $this->getUpdate($force);

        if (empty($updates)) {
            return;
        }

        return $updates['version'] ?? null;
    }

    public function getUpdate(bool $force = false)
    {
        $updates = $this->fetch($force);

        if (empty($updates)) {
            return;
        }

        return $updates['update'] ?? null;
    }

    public function getPlugins(bool $force = false)
    {
        $updates = $this->fetch($force);

        if (empty($updates)) {
            return;
        }

        return $updates['plugins'] ?? [];
    }

    public function getThemes(bool $force = false)
    {
        $updates = $this->fetch($force);

        if (empty($updates)) {
            return;
        }

        return $updates['themes'] ?? [];
    }

    public function fetch(bool $force = false)
    {
        if ($this->updates !== null) {
            return $this->updates;
        }

        if ($force) {
            $updates = $this->forceFetchUpdates();

            if ($updates !== null) {
                Cache::put('updates', $updates, now()->addMinutes(15));
            }

            return $updates;
        }

        return Cache::remember('updates', now()->addMinutes(15), function () {
            return $this->forceFetchUpdates();
        });
    }

    public function forceFetchUpdates()
    {
        try {
            $response = $this->getHttpClient()->get('https://azuriom.com/api/updates');

            $updates = json_decode($response->getBody()->getContents(), true);

            if ($updates !== null) {
                $this->updates = $updates;
            }

            return $updates;
        } catch (Throwable $t) {
            logger()->warning('Unable to check updates '.$t->getMessage());

            return [];
        }
    }

    public function forceFetchUpdatesOrFail()
    {
        $response = $this->getHttpClient()->get('https://azuriom.com/api/updates');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function installExtension(array $info)
    {
        $dir = storage_path('');
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

        $this->getHttpClient()->get($info['url'], ['sink' => $path]);

        if (! hash_equals($info['hash'], hash_file('sha256', $path))) {
            $this->files->delete($path);

            throw new Exception('File hash don\'t match excepted hash !');
        }
    }

    public function install(array $info, string $targetDir, string $tempDir = '')
    {
        $file = storage_path('app/updates/'.$tempDir.$info['file']);

        if ($this->files->extension($file) !== 'zip') {
            throw new Exception('Invalid file extension');
        }

        if (! $this->files->exists($file)) {
            throw new FileNotFoundException('File not found');
        }

        $zip = new ZipArchive();

        if (($status = $zip->open($file)) !== true) {
            throw new Exception('Unable to open zip: '.$status);
        }

        if (! $zip->extractTo($targetDir)) {
            throw new Exception('Unable to extract zip');
        }

        $zip->close();

        $this->files->delete($file);

        Artisan::call('migrate', ['--force' => true, '--seed' => true]);
    }

    private function getHttpClient()
    {
        $userAgent = 'Azuriom updater (v'.Azuriom::version().' - '.url('/').')';

        return new Client([
            'headers' => [
                'User-Agent' => $userAgent,
            ],
        ]);
    }
}
