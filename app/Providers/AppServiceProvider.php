<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        // this is where I'll add the sidebar things

        View::share('sidebar', 'value');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
