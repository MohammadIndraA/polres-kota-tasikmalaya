@extends('frontend/.layouts.app')
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
                                <h1><span>Berita</span></h1>
                                <div class="hr hr-border-primary double-border border-small">
                                    <span></span>
                                </div>
                            </div>
                            <div id="breadcrumbs">
                                <span class="breadcrumb-title">You Are Here:</span><span><a
                                        href="/">Home</a></span><span class="separator">/</span><span
                                    class="current">Berita</span>
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
                                            <div class="section-column span12" style="">
                                                <div class="inner-content content-box textnone"
                                                    style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                                    <div class="blog-gird ">
                                                        <div class="spinner-block">
                                                            <div class="spinner">
                                                            </div>
                                                            <img src="images/loader.gif" alt="" />
                                                        </div>
                                                        <ul class="posts-grid row-fluid element-padding-medium element-vpadding-default posts-grid-bg-stroke"
                                                            data-masonry="no">
                                                            @foreach ($posts as $item)
                                                                <li id="post-138"
                                                                    class="post-138 post type-post status-publish format-standard has-post-thumbnail hentry category-creative tag-animation tag-architecture tag-creative tag-designing tag-illustration-2 tag-video post-grid-item span6">
                                                                    <div class="inner-content">
                                                                    <a href="{{ route('berita-detail', $item->slug) }}">
                                                                            <div class="image">
                                                                                <img width="1100" height="734"
                                                                                    src="{{ $item->image ? asset('storage/' . $item->image) : asset('frontend/upload/blog1.jpg') }}"
                                                                                    class="attachment-thumb-large wp-post-image"
                                                                                    alt="blog1" />

                                                                            </div>
                                                                        </a>
                                                                        <div class="post-text-container">
                                                                            <div class="post-meta-data style2">
                                                                                <span class="post-meta-cats">
                                                                                    <a href="{{ route('berita-detail', $item->slug) }}"
                                                                                        rel="category tag">{{ $item->category->name }}</a></span>
                                                                                <span
                                                                                    class="post-meta-date">{{ $item->created_at->format('F d, Y') }}
                                                                                </span>
                                                                            </div>
                                                                            <h4><a href="{{ route('berita-detail', $item->slug) }}"
                                                                                    title="Permalink to Standard post with preview picture">
                                                                                    {{ $item->title }} </a></h4>
                                                                            <p class="excerpt">
                                                                                {{ $item->excerpt }} [&hellip;]
                                                                            </p>
                                                                            <div class="post-bottom">
                                                                                <div class="post-meta-data">
                                                                                    <span>
                                                                                        <a href="{{ route('berita-detail', $item->slug) }}"
                                                                                            title="Comment on Standard post with preview picture">
                                                                                            Baca Selanjutnya</a></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class='page-nav clearfix '>
                                                            @if ($posts->onFirstPage())
                                                                <span>← </span>
                                                            @else
                                                                <a href="{{ $posts->previousPageUrl() }}">← </a>
                                                            @endif

                                                            @if ($posts->hasMorePages())
                                                                <a href="{{ $posts->nextPageUrl() }}"> →</a>
                                                            @else
                                                                <span> →</span>
                                                            @endif

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

                    {{-- sidebar --}}
                    <x-frontend.sidebar-berita />


                </div>
            </div>
        </div>
    </div>
@endsection
