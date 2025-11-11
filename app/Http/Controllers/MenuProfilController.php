<?php

namespace App\Http\Controllers;

use App\Models\MenuProfile;
use App\Models\Post;
use Illuminate\Http\Request;

class MenuProfilController extends Controller
{
      public function index(Request $request)
     {
        $menuprofil = MenuProfile::where('slug', $request->slug)->first();
         return view('frontend.menu-profil.index', compact('menuprofil'));
     }
}
