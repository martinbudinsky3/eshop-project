<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Log;


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
    public function boot() {
        view()->composer('layout.partials.nav', function ($view) {
            $parentCategories = Category::doesnthave('parentCategories')->get();
            $view->with('parentCategories', $parentCategories);
        });
    }

    private function getCart() {
        
    }
}
