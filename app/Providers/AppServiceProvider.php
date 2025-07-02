<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Models\Page;
use App\Observers\PageObserver;
use App\Models\Post;
use App\Observers\PostObserver;

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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        Category::observe(CategoryObserver::class);
        Page::observe(PageObserver::class);
        Post::observe(PostObserver::class);
    }
}
