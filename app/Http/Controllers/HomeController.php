<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\HomeService;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class HomeController extends Controller
{

     protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index()
    {
        return view('frontend.home.index',[
            'banners' => $this->homeService->getAllBanners(),
            'pelayanan_publik' => $this->homeService->getAllPelayananPublik(),
            'SEOData' => new SEOData(
                title: 'Website Resmi Polres Tasikmalaya Kota',
                description: 'Portal resmi Polres Tasikmalaya Kota berita terkini, pelayanan publik, profil institusi, dan informasi keamanan.',
            ),
        ]);
    }

    public function sitemap()
{
    $posts = Post::where('status', 'published')->get();
    $xml = view('sitemap', compact('posts'))->render();

    return response($xml, 200)->header('Content-Type', 'application/xml');
}
}
