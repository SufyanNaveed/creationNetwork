<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind('\App\Repositories\BaseRepository', function ($app) {
            return new BaseRepository (new User());
        });
    
        $this->app->bind('\App\Repositories\Auth\LoginRepository', function ($app) {
            return new LoginRepository($app->make('\App\Repositories\BaseRepository'));
        });
    
        $this->app->bind('\App\Services\Auth\LoginService', function ($app) {
            return new LoginService($app->make('\App\Repositories\Auth\LoginRepository'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
