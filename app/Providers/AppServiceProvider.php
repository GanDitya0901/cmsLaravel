<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->role === 'admin';
        });

        Blade::if('guestRole', function () {
            return Auth::check() && Auth::user()->role === 'guest';
        });

        Blade::if('master', function () {
            return Auth::check() && Auth::user()->role === 'master';
        });

        /* ==Everytime the layout is rendered, the Page data will be passed== */
        View::composer('components.guest-layout', function ($view) {
            $view->with('pages', Page::all());
        });
    }
}
