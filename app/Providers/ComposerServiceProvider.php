<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.partials.nav', function ($view) {
            $parentCategories = Category::doesnthave('parentCategories')->get();
            $view->with('parentCategories', $parentCategories);
        });
    }
}
