<?php

namespace App\Repositories\Teacher;

use Carbon\Laravel\ServiceProvider;

class TeacherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Teacher\TeacherInterface',
            'App\Repositories\Teacher\TeacherRepository'
        );
    }
}
