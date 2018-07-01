<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\IPostRepository', 'App\Repositories\PostRepository');      
        $this->app->bind('App\Repositories\Contracts\ITestRepository', 'App\Repositories\TestRepository');        
        
    }
}
