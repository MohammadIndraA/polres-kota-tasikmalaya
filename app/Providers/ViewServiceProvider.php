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
            'frontend.home.index',
            'frontend.berita.index',
            'frontend.profil.index',
            'frontend.kontak.index',
            'frontend.pelayanan-publik.index',
            'frontend.berita.berita-detail',
            'frontend.menu-profil.index',
            'frontend.pelayanan-publik.index',
            'frontend.kategori.index',
            'frontend.layouts.app'
        ], function ($view) {
            $view->with([
                'posts' => Post::with('category')->where('status', 'published')->latest()->paginate(6),
                'categories' => Categories::all(),
                'pelayanan_publik' => PelayananPublik::where('status', 'published')->latest()->get(),
                'menu_profil' => MenuProfile::where('status', 'published')->latest()->get(),
                'highlightedPosts' => Post::where('status', 'published')->inRandomOrder()->take(10)->get(),
                'setting' => Setting::first(),
            ]);
        });

    }
}
