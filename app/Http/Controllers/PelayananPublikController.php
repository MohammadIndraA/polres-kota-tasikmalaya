<?php

namespace App\Http\Controllers;

use App\Models\PelayananPublik;
use App\Models\Post;
use Illuminate\Http\Request;

class PelayananPublikController extends Controller
{
       public function index(Request $request)
     {
        $pelayananpublik = PelayananPublik::where('slug', $request->slug)->first();
         return view('frontend.pelayanan-publik.index', compact('pelayananpublik'));
     }
}
