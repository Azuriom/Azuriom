<?php

namespace Azuriom\Http\View\Composers;

use Azuriom\Extensions\UpdateManager;
use Illuminate\View\View;

class AdminLayoutComposer
{
    /**
     * The update manager instance.
     *
     * @var \Azuriom\Extensions\UpdateManager
     */
    protected $updates;

    /**
     * Create a new composer instance.
     *
     * @param  \Azuriom\Extensions\UpdateManager  $updates
     */
    public function __construct(UpdateManager $updates)
    {
        $this->updates = $updates;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'lastVersion' => $this->updates->getLastVersion(),
            'hasUpdate' => $this->updates->hasUpdate(),
        ]);
    }
}
