<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Azuriom Game
    |--------------------------------------------------------------------------
    |
    | This is the game used by the website. It should NOT be changed after
    | the installation !
    |
    */

    'game' => env('AZURIOM_GAME'),

    /*
    |--------------------------------------------------------------------------
    | CMS management actions allowed from the panel
    |--------------------------------------------------------------------------
    |
    | This define which managements actions the administrator can trigger from the panel.
    | - Downloading, installing, updating, enabling, disabling or removing themes and plugins
    | - Downloading and installing Azuriom updates
    |
    */
    'allowed_panel_actions' => [
        'plugins' => env('ALLOW_PANEL_PLUGINS_ACTIONS'),
        'themes' => env('ALLOW_PANEL_THEMES_ACTIONS'),
        'azuriom' => env('ALLOW_PANEL_AZURIOM_ACTIONS'),
    ],
];
