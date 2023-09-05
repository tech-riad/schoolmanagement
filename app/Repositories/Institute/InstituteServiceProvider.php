<?php

namespace App\Repositories\Institute;

use Carbon\Laravel\ServiceProvider;

class InstituteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Institute\InstituteInterface',
            'App\Repositories\Institute\InstituteRepository'
        );
    }

    public function boot()
    {
        //
    }
}
