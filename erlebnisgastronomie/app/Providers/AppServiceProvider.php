<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        // share data with all views (alle webpages)
        //View::share('Name', 'Rick');
        // another way (share user data among pages)
        View::composer('*', function($view) {
            $view->with('userdata',Auth::user()) ;
        }) ;
    }
}
