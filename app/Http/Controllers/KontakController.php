<?php

namespace App\Http\Controllers;
use RalphJSmit\Laravel\SEO\Support\SEOData;


class KontakController extends Controller
{
    
     public function index()
     {
         return view('frontend.kontak.index',[
             'SEOData' => new SEOData(
                 title: 'Kontak - Polres Tasikmalaya Kota',
                 description: 'Butuh bantuan atau informasi? Hubungi Polres Tasikmalaya Kota melalui alamat, telepon, atau email resmi.',
             )
         ]);
     }
}
