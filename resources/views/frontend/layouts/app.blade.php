<!doctype html>
<html lang="en-US">

<head>
    <!-- Meta Tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Aperio</title>
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

    <link href='https:/fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet'
        type='text/css'>

    <style>
        .logo-tinggi {
            height: auto;
            max-height: 220px;
            width: auto;
        }
    </style>

    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="http:/aperio.bradweb.net/wp-content/plugins/js_composer/assets/css/vc-ie8.css" media="screen"><![endif]-->
    <!--[if IE]>
 <link rel="stylesheet" href="http:/aperio.bradweb.net/wp-content/themes/Aperio/css/ie.css">
<![endif]-->
    <!--[if lte IE 8]>
 <script type="text/javascript" src="http:/aperio.bradweb.net/wp-content/themes/Aperio/js/respond.min.js"></script>
<![endif]-->

</head>

<body id="home"
    class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

    {{-- navbar / sidebar --}}

    @include('frontend.layouts.navbar')

    {{-- end navbar --}}


    @yield('content')

    <footer id="footer" class="cover-padding-no">
        <div class="footer-widgets headline-bg-transparent">
            <div class="container">
                <div class="row-fluid">
                    <div class="footer-widget-container row-fluid">
                        <div id="text-2" class="widget widget_meta widget_text span3">
                            <h4>Get in touch</h4>
                            <div class="textwidget">
                                {{ $setting->address ??
                                    ' Tasikmalaya Kota Jl. Letnan Harun No. 76, Kota Tasikmalaya, Jawa Barat, Indonesia
                                                                                                                                                                                                                                                                /n polrestasikmalayakota@mail.co
                                                                                                                                                                                                                                                                /n (0265) 330032' }}
                                <div class="gap" style="height:10px">
                                </div>
                                <ul id="brad_icons_1" class="brad-icons medium style1 icons-align-">
                                    <li><a href="{{ $setting->twitter_link ?? '#' }}" title="Twitter" target="_self"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $setting->facebook_link ?? '#' }}" title="Facebook"
                                            target="_self"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $setting->googleplus_link ?? '#' }}" title="Google"
                                            target="_self"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="{{ $setting->instagram_link ?? '#' }}" title="Instagram"
                                            target="_self"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{ $setting->youtube_link ?? '#' }}" title="Youtube"
                                            target="_self"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="{{ $setting->linkedin_link ?? '#' }}" title="LinkedIn"
                                            target="_self"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="recent-posts-3" class="widget widget_meta widget_recent_entries span3">
                            <h4>Recent Posts</h4>
                            <ul>
                                @foreach ($posts->take(3) as $item)
                                    <li>
                                        <a href="#">{{ $item->title }}</a>
                                        <span class="post-date">{{ $item->created_at->format('F d, Y') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="twitter-2" class="widget widget_meta widget_twitter span3">
                            <h4>Latest Tweets</h4>
                            <div class="recent-tweets" id="recent_tweets_1515707491">
                                <ul>
                                    <li>-
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="portfolio-widget-3" class="widget widget_meta portfolios span3">
                            <h4>Recent Works</h4>
                            <div class="recent-works-items clearfix">
                                <a href="#" title="Business Photogrpagy" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/upload/portfolio16-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="portfolio16" /></a>
                                <a href="#" title="Brand Development" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/upload/portfolio5-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="portfolio5" /></a>
                                <a href="#" title="Product Design" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/upload/portfolio11-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="portfolio11" /></a>
                                <a href="#" title="Work Gallery Slider" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/upload/shutterstock_191213546-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="shutterstock_191213546" /></a>
                                <a href="#" title="Beautiful Shelfs" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/upload/shutterstock_202793287-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="shutterstock_202793287" /></a>
                                <a href="#" title="High Mountains" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/upload/shutterstock_206876992-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="shutterstock_206876992" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="copyright">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="copyright-text copyright-left">
                            Aperio v1.0 by <a href='http:/themeforest.net/user/max-themes'>max-themes</a>
                        </div>
                        <div class="textright copyright-right">
                            <a class="go-top readmore" href="#"><span>Go to Top</span><span
                                    class="brad-icon"><i class="fa fa-caret-up"></i></span></a>
                            <!-- Top Bar Social Icons END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end copyright -->


    {{-- script include --}}
    @include('frontend.layouts.script')
