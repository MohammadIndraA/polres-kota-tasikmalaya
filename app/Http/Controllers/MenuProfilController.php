<?php

namespace App\Http\Controllers;

use App\Models\MenuProfile;
use App\Models\Post;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class MenuProfilController extends Controller
{
      public function index(Request $request)
     {
    // Ambil data profil berdasarkan slug
    $menuprofil = MenuProfile::where('slug', $request->slug)
        ->where('status', 'published') // tambahkan jika ada status
        ->firstOrFail(); // lempar 404 jika tidak ditemukan

     // Buat deskripsi SEO dari konten (potong maks 160 karakter)
    $description = \Illuminate\Support\Str::limit(
        strip_tags($menuprofil->content ?? ''),
        160,
        '...'
    );

    $SEOData = new SEOData(
        title : $menuprofil->name ?? 'Profil - Polres Tasikmalaya Kota',
        description: $description,
    );
        
         return view('frontend.menu-profil.index', compact('menuprofil', 'SEOData'));
     }
}
