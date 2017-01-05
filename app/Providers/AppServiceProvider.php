<?php

namespace App\Providers;

use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use App\Providers\RegisterIoc as RegisterIoc;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::before(function (JobProcessing $event) {
            echo 'start---------------------------';
        });

        Queue::after(function (JobProcessed $event) {
            echo '---------------------------done';
        });
        
        Queue::failing(function ($connection, $job, $data) {
            echo '---------------------------failed already baby';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $ra = new RegisterIoc();
        $arr = $ra->registerModelMysql('model');
        //$this->app->register(Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class);
    }
}
