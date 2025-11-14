<?php

namespace App\Http\Controllers;

use App\Models\PelayananPublik;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class PelayananPublikController extends Controller
{
      public function index(Request $request)
     {
        $pelayananpublik = PelayananPublik::where('slug', $request->slug)->firstOrFail();

        $description = \Illuminate\Support\Str::limit(
        strip_tags($menuprofil->content ?? ''),
        160,
        '...'
    );

    $SEOData = new SEOData(
        title : $pelayananpublik->name ?? 'Pelayanan Publik - Polres Tasikmalaya Kota',
        description: $description,
    );
         return view('frontend.pelayanan-publik.index', compact('pelayananpublik', 'SEOData'));
     }
}
