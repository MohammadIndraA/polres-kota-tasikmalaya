<!doctype html>
<html lang="en-US">

<head>
    <!-- Meta Tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    {{-- Biarkan package Laravel SEO yang handle SEMUA tag SEO --}}
    @if (isset($post) && $post instanceof \App\Models\Post)
        {!! seo()->for($post) !!}
    @else
        {!! seo($SEOData) !!}
    @endif
    <!--[if lte IE 8]>
  <script src="http:/html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

    <link rel='stylesheet' href='{{ asset('frontend/revslider/rs-plugin/css/settings.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/instag-slider.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/layout.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/main.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/shortcodes.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/mediaelementplayer.min.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/woocommerce.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/prettyPhoto.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/responsive.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/js_composer.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/css/default.css') }}' type='text/css' media='screen' />
    <link rel='stylesheet' href='{{ asset('frontend/css/fontawesome.css') }}' type='text/css' media='screen' />
    <link rel='stylesheet' href='{{ asset('frontend/css/font-awesome.css') }}' type='text/css' media='screen' />

    <link rel="shortcut icon" href="{{ asset('frontend/images/logo-polda-1.png') }}" />

    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png">

    <link href='https:/fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet'
        type='text/css'>
    @yield('styles')

</head>

<body id="home"
    class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

    {{-- navbar / sidebar --}}

    <x-frontend.navbar />

    {{-- end navbar --}}


    @yield('content')

    <x-frontend.footer-berita />
    <!-- end copyright -->


    {{-- script include --}}
    @include('frontend.layouts.script')
