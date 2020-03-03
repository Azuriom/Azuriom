<?php

namespace Azuriom\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();

        // TODO : change default string length only on incompatible
        //  versions of database (MySQL < 5.7.7 & MariaDB < 10.2) ?
        Schema::defaultStringLength(191);
    }
}
