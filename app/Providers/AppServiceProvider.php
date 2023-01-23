<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
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
        Paginator::useBootstrap();


        View::composer('components.navbar', function ($view) {
            $view->with('current_locale', App::currentLocale());
            $view->with('all_locale', App::currentLocale());
        });

    }
}
