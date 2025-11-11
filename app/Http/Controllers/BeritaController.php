<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    
     public function index()
     {
         return view('frontend.berita.index');
     }

     public function detail_berita(Request $request)
     {
        $post = Post::with('category')->where('slug', $request->slug)->first();
         return view('frontend.berita.berita-detail', compact('post'));
     }

     public function berita_by_categories(Request $request)
     {
        $postByCategory = Post::with('category')
            ->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->slug);
            })
            ->paginate(6);
         return view('frontend.kategori.index', compact('postByCategory'));
     }
}
