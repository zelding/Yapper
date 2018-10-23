<?php

namespace App\Providers;

use App\Entity\BlogPost;
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

        $posts = BlogPost::where('status', 1)->get()->groupBy(function (BlogPost $post){
            return $post->created_at->format('Y-m');
        })->sortKeys(null, true);

        View::share('sidebar', $posts);
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
