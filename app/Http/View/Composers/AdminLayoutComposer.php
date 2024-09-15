<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Extensions\Plugin\PluginManager;
use Azuriom\Extensions\Theme\ThemeManager;
use Azuriom\Extensions\UpdateManager;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AdminLayoutComposer
{
    protected UpdateManager $updates;

    protected PluginManager $plugins;

    protected ThemeManager $themes;

    /**
     * Create a new composer instance.
     */
    public function __construct(UpdateManager $updates, PluginManager $plugins, ThemeManager $themes)
    {
        $this->updates = $updates;
        $this->plugins = $plugins;
        $this->themes = $themes;
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $extensions = Cache::remember('updates_counts', now()->addHour(), fn () => [
            'pluginsUpdates' => $this->plugins->getPluginsToUpdate()->count(),
            'themesUpdates' => $this->themes->getThemesToUpdate()->count(),
        ]);

        $view->with([
            ...$extensions,
            'lastVersion' => $this->updates->getLastVersion(),
            'hasUpdate' => $this->updates->hasUpdate(),
        ]);
    }
}
