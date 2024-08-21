<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

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

        view()->composer('layouts.sidebar', function ($view) {
            if(Cache::has('popular_categories')){
                $popular_categories = Cache::get('popular_categories');
            } else {
                $popular_categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('popular_categories', $popular_categories, 30);
            }

            $view->with('popular_posts', Post::orderBy('view', 'desc')->limit(3)->get());
            $view->with('popular_categories', $popular_categories);
        });
    }
}
