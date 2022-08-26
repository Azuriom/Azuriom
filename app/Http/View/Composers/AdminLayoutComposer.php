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
     *
     * @param  \Azuriom\Extensions\UpdateManager  $updates
     * @param  \Azuriom\Extensions\Plugin\PluginManager  $plugins
     * @param  \Azuriom\Extensions\Theme\ThemeManager  $themes
     */
    public function __construct(UpdateManager $updates, PluginManager $plugins, ThemeManager $themes)
    {
        $this->updates = $updates;
        $this->plugins = $plugins;
        $this->themes = $themes;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $extensions = Cache::remember('updates_counts', now()->addHour(), fn () => [
            'pluginsUpdates' => $this->plugins->getPluginsToUpdate()->count(),
            'themesUpdates' => $this->themes->getThemesToUpdate()->count(),
        ]);

        $view->with(array_merge($extensions, [
            'lastVersion' => $this->updates->getLastVersion(),
            'hasUpdate' => $this->updates->hasUpdate(),
        ]));
    }
}
