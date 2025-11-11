@extends('frontend.layouts.app')
@section('content')
    <!-- Static Page Titlebar -->
    <section id="titlebar"
        class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no"
        data-height="80" data-rs-height="yes">
        <div class="titlebar-wrapper">
            <div class="titlebar-content">
                <div class="container">
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <div class="titlebar-heading">
                                <h1><span>Pelayanan Publik</span></h1>
                                <div class="hr hr-border-primary double-border border-small">
                                    <span></span>
                                </div>
                            </div>
                            <div id="breadcrumbs">
                                <span class="breadcrumb-title">You Are Here:</span><span><a
                                        href="/">Home</a></span><span class="separator">/</span><span
                                    class="current">Pelayanan Publik</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Header -->


    <div class="section-with-sidebar">
        <div class="container">
            <div class="row-fluid">
                <div class="row-fluid">

                    @include('frontend.layouts.sidebar-berita')

                    {{-- content --}}
                    <div id="content" class="content span9 content-left headline-bg-#f6f6f6">
                        <div class="inner-content">
                            <section id="section_1650855263"
                                class="section content-box section-border-no section-bborder-no section-height-content section-bgtype- section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no "
                                style="padding-top:0;padding-bottom:0;background-color:#ffffff;" data-video-ratio=""
                                data-parallax-speed="1">
                                <div class="section-overlay" style="">
                                </div>
                                <div class="container section-content">
                                    <div class="row-fluid">
                                        <div
                                            class="row-fluid equal-cheight-no element-padding-default element-vpadding-default">
                                            <div class="section-column span11" style="">
                                                <div class="inner-content content-box textnone"
                                                    style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                                    <div id="post-138"
                                                        class="post-138 post type-post status-publish format-standard has-post-thumbnail hentry category-creative tag-animation tag-architecture tag-creative tag-designing tag-illustration-2 tag-video post-standard post-entries bg-style- maxwidth-yes hide-border post-alignment-top clearfix">
                                                        <div class="post-upper textcenter">
                                                            <h2><a href="#"
                                                                    title="Permalink to Standard post with preview picture">
                                                                    {{ $pelayananpublik->name }} </a></h2>
                                                        </div>
                                                        <div class="image hoverlay">
                                                            <a href="#">
                                                                <img width="1100" height="734"
                                                                    src="{{ $pelayananpublik->image ? asset('storage/' . $pelayananpublik->image) : asset('frontend/upload/blog1.jpg') }}"
                                                                    class="attachment-fullwidth wp-post-image"
                                                                    alt="{{ $pelayananpublik->name ?? 'blog1' }}" />
                                                            </a>
                                                        </div>
                                                        <!-- post content -->
                                                        <div class="post-content">
                                                            {!! $pelayananpublik->content !!}
                                                        </div>
                                                        <div class="post-share-container">
                                                            <span class="post-share clearfix"><a class="share-label"
                                                                    href="#">Share</a>
                                                                <ul class="post-share-menu">
                                                                    <li><a href="#" class="facebook-share"><i
                                                                                class="fa-facebook"></i></a></li>
                                                                    <li><a href="#" class="twitter-share"><i
                                                                                class="fa-twitter"></i></a></li>
                                                                    <li><a href="#" class="linkedin-share"><i
                                                                                class="fa-linkedin"></i></a></li>
                                                                    <li><a href="#" class="pinterest-share"><i
                                                                                class="fa-pinterest"></i></a></li>
                                                                    <li><a href="#" class="google-share"><i
                                                                                class="fa-google-plus"></i></a></li>
                                                                </ul>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
