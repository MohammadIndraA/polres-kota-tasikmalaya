<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class BeritaController extends Controller
{
    
     public function index()
     {
        $posts= Post::with('category')
                ->where('status', 'published')
                ->latest()
                ->paginate(6);
        
        $SEOData = new SEOData(
                title : 'Berita - Polres Tasikmalaya Kota',
                description: 'Berita terkini, pelayanan publik, profil institusi, dan informasi keamanan.',
        );
        
         return view('frontend.berita.index', compact('posts', 'SEOData'));
     }

     public function detail_berita(Request $request)
     {
        $post = Post::with('category')
            ->where('status', 'published')
            ->where('slug', $request->slug)
            ->firstOrFail();

         return view('frontend.berita.berita-detail', compact('post'));
     }

     public function berita_by_categories(Request $request)
     {
        $postByCategory = Post::byCategoryAndSearch($request->slug, $request->search)
                ->paginate(6);
        
            $SEOData = new SEOData(
                title : 'Kategori Berita - Polres Tasikmalaya Kota',
                description: 'Berita terkini, pelayanan publik, profil institusi, dan informasi keamanan.',
        );


         return view('frontend.kategori.index', compact('postByCategory', 'SEOData'));
     }

     public function search(Request $request)
     {
         $postByCategory = Post::byCategoryAndSearch($request->slug, $request->search)
         ->paginate(6);

          $SEOData = new SEOData(
                title : 'Cari Berita - Polres Tasikmalaya Kota',
                description: 'Berita terkini, pelayanan publik, profil institusi, dan informasi keamanan.',
        );
         return view('frontend.kategori.index', compact('postByCategory' , 'SEOData'));
     }

}
