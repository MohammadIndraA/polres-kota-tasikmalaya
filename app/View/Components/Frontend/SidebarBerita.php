<?php

namespace App\View\Components\Frontend;

use App\Models\Categories;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarBerita extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    public $highlightedPosts;

    public function __construct()
    {
        // Ambil data yang benar-benar dibutuhkan navbar
        $this->categories = cache()->remember('navbar_categories', 3600, function () {
            return Categories::all();
        });
        $this->highlightedPosts = cache()->remember('navbar_highlighted', 1800, function () {
            return Post::where('status', 'published')
                ->select('title', 'slug','created_at')
                ->inRandomOrder()
                ->take(10) // kurangi jadi 5 biar lebih ringan
                ->get();
        });
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.sidebar-berita');
    }
}
