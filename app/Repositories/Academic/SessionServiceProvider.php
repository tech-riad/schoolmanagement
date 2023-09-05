<?php

namespace App\Repositories\Academic;

use Carbon\Laravel\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Academic\SessionInterface',
            'App\Repositories\Academic\SessionRepository'
        );
    }

    public function boot()
    {
        //
    }
}
