<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\MenuProfile;
use App\Models\PelayananPublik;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       View::composer([
        ], function ($view) {
            $view->with([
            ]);
        });

    }
}
