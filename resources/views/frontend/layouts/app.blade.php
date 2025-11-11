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

    <link href='https:/fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet'
        type='text/css'>

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
                                PO Box 16122 Collins Street West Victoria 8007 Australia
                                <br /> E: no-replay@envato.com
                                <br /> T:+61 3 8376 6284
                                <div class="gap" style="height:10px">
                                </div>
                                <ul id="brad_icons_1" class="brad-icons medium style1 icons-align-">
                                    <li><a href="#" title="Twitter" target="_self"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="Facebook" target="_self"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="Google" target="_self"><i
                                                class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="Flickr" target="_self"><i
                                                class="fa fa-flickr"></i></a></li>
                                    <li><a href="#" title="Instagram" target="_self"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" title="Youtube" target="_self"><i
                                                class="fa fa-youtube"></i></a></li>
                                    <li><a href="#" title="Skype" target="_self"><i
                                                class="fa fa-skype"></i></a></li>
                                    <li><a href="#" title="Vimeo" target="_self"><i
                                                class="fa fa-vimeo-square"></i></a></li>
                                    <li><a href="#" title="LinkedIn" target="_self"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" title="" target="_self"><i
                                                class="fa fa-behance"></i></a></li>
                                    <li><a href="#" title="Tumblr" target="_self"><i
                                                class="fa fa-tumblr"></i></a></li>
                                    <li><a href="#" title="Dropbox" target="_self"><i
                                                class="fa fa-dropbox"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="recent-posts-3" class="widget widget_meta widget_recent_entries span3">
                            <h4>Recent Posts</h4>
                            <ul>
                                <li>
                                    <a href="#">Standard post with preview picture</a>
                                    <span class="post-date">November 11, 2013</span>
                                </li>
                                <li>
                                    <a href="#">Another Post with Preview picture</a>
                                    <span class="post-date">November 8, 2013</span>
                                </li>
                                <li>
                                    <a href="#">Quis lectus elemvolu euismod atras</a>
                                    <span class="post-date">November 7, 2013</span>
                                </li>
                            </ul>
                        </div>
                        <div id="twitter-2" class="widget widget_meta widget_twitter span3">
                            <h4>Latest Tweets</h4>
                            <div class="recent-tweets" id="recent_tweets_1515707491">
                                <ul>
                                    <li><span>Our Latest Creative Wordpress Theme "Retigo" has been realsed on
                                            themeforest today. Check it Out on Themeforest <a
                                                href="http:/t.co/hVtABj5tZo"
                                                target="_blank">http:/t.co/hVtABj5tZo</a></span>
                                        <br /><a class="timestamp"
                                            href="https:/twitter.com/brad_web/status/474411858321887232"
                                            target="_blank">1 year ago</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="portfolio-widget-3" class="widget widget_meta portfolios span3">
                            <h4>Recent Works</h4>
                            <div class="recent-works-items clearfix">
                                <a href="#" title="Business Photogrpagy" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/portfolio16-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="portfolio16" /></a>
                                <a href="#" title="Brand Development" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/portfolio5-80x80.jpg') }}"
                                        class="attachment-mini wp-post-image" alt="portfolio5" /></a>
                                <a href="#" title="Product Design" class="hoverborder">
                                    <img width="80" height="80"
                                        src="{{ asset('frontend/portfolio11-80x80.jpg') }}"
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
