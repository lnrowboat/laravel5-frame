<?php

namespace App\Providers;

use Jenssegers\Mongodb\MongodbServiceProvider;
use App\Listeners\UserEventSubscriber;
use App\Providers\RegisterIoc as RegisterIoc;
//use App\Models\Mongohaha as Mongohaha;
//use App\Models\User as User;

class AppMongoServiceProvider extends MongodbServiceProvider {

    public $object;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $ra = new RegisterIoc();
        $arr = $ra->registerModelMongo('model');
        /*$this->app->bind('subscriber', function() {
            return new UserEventSubscriber;
        });*/
    }
}
