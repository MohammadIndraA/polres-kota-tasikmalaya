<?php

namespace App\Http\Controllers;

use App\Models\PelayananPublik;
use App\Models\SubPelayananPublik;
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
      public function sub_pelayanan(Request $request)
     {
        $sub_pelayananpublik = SubPelayananPublik::where('slug', $request->slug)->firstOrFail();

        $description = \Illuminate\Support\Str::limit(
        strip_tags($menuprofil->content ?? ''),
        160,
        '...'
    );

    $SEOData = new SEOData(
        title : $sub_pelayananpublik->name ?? 'Pelayanan Publik - Polres Tasikmalaya Kota',
        description: $description,
    );
         return view('frontend.sub-pelayanan-publik.index', compact('sub_pelayananpublik', 'SEOData'));
     }


    
}
