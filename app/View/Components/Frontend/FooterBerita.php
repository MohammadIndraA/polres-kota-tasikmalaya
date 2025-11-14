<?php

namespace App\View\Components\Frontend;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterBerita extends Component
{
    /**
     * Create a new component instance.
     */
    public $posts;
    public $setting;

    public function __construct()
    {
        $this->posts = cache()->remember('navbar_highlighted', 1800, function () {
            return Post::where('status', 'published')
                ->select('title', 'slug', 'created_at')
                ->inRandomOrder()
                ->take(3) // kurangi jadi 3 biar lebih ringan
                ->get();
        });

        $this->setting = cache()->remember('setting', 1800, function () {
            return \App\Models\Setting::first();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.footer-berita');
    }
}
