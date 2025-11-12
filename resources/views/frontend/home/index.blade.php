@extends('frontend.layouts.app', ['title' => 'Home'])
@section('content')
    <!-- Rev Slider Start -->
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
        style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:600px;">
        <!-- START REVOLUTION SLIDER 4.6.5 fullwidth mode -->
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:600px;height:600px;">
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                    <!-- MAIN IMAGE -->
                    @foreach ($banners as $item)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="shutterstock_178724276"
                            data-bgposition="right top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption brad-heading sfb tp-resizeme" data-x="25" data-y="center"
                            data-voffset="-70" data-speed="500" data-start="500" data-easing="Power3.easeInOut"
                            data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
                            data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                            {!! $item->name !!}
                        </div>
                    @endforeach

                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;">
            </div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->
    <!-- Rev Slider End -->
    <!--End Header -->

    <div class="fullwidth">

        <section id="section_985239676"
            class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no "
            data-video-ratio="" data-parallax-speed="1">
            <div class="section-overlay" style="">
            </div>
            <div class="container section-content">
                <div class="row-fluid">
                    <div class="row-fluid equal-cheight-no element-padding-default element-vpadding-medium">
                        <div class="section-column span12" style="">
                            <div class="inner-content content-box textnone" id="div_c1fb_3">
                                <div id="feature_boxes_container_1753603451" class="clearfix">
                                    <div id="feature_boxes_1"
                                        class="row-fluid style1 background-shadow-no feature_boxes box-style3 enable-hr-no element-vpadding- hr-type-tiny hr-color-default hr-style-style1 ex-large-size element-inner-vertical-padding-medium element-inner-horizental-padding-medium icon-side-left iconbox-style3 align-content-center-yes align-icon-center-yes columns-4 crease-background-no content-box default element-padding-medium ">

                                        {{-- item higligt --}}
                                        @php
                                            $icons = [
                                                'fa-solid fa-laptop',
                                                'fa-solid fa-user',
                                                'fa-solid fa-shield',
                                                'fa-icon_globe-2',
                                                'fa-icon_briefcase',
                                            ];
                                        @endphp
                                        @foreach ($pelayanan_publik->take(4) as $item)
                                            @php
                                                $randomIcon = $icons[array_rand($icons)];
                                            @endphp
                                            <div class="span">
                                                <div class="inner-content " data-animation-delay="0"
                                                    data-animation-effect="">
                                                    <div class="feature_box ">
                                                        <span class="brad-icon " data-animation-delay="0"
                                                            data-animation-effect=""><i
                                                                class="{{ $randomIcon }}"></i></span>
                                                        <div class="heading">
                                                            <div class="heading-content">
                                                                <h4>{{ $item->name }}</h4>
                                                            </div>
                                                            <div class="hr">
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                        <div class="feature-content">
                                                            {{ strlen(strip_tags($item->content)) > 100 ? substr(strip_tags($item->content), 0, 100) . '...' : strip_tags($item->content) }}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section_home1"
            class="section content-box grid-940 section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-yes triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no "
            data-video-ratio="" data-parallax-speed="1">
            <div class="section-overlay" style="">
            </div>
            <div class="container section-content">
                <div class="row-fluid">
                    <div class="row-fluid equal-cheight-no element-padding-default element-vpadding-medium">
                        <div class="section-column span12" style="">
                            <div class="inner-content content-box textnone" id="div_c1fb_4">
                                <div class="column-text ">
                                </div>
                                <h5 class="title textcenter default bw-2px dh-2px divider-dark bc-dark dw-default color-default"
                                    id="h5_c1fb_0"><span>POLRES KOTA TASIKMALAYA</span>
                                </h5>
                                <h1 class="title textcenter default bw-defaultpx dh-defaultpx divider-dark bc-default dw-default color-default"
                                    id="h1_c1fb_0"><span> Melayani dengan Hati Nurani</span>
                                </h1>
                                <div class="hr border-small dh-2px aligncenter hr-border-primary" id="div_c1fb_5">
                                    <span></span>
                                </div>
                                <div id="feature_boxes_container_1219976850" class="clearfix">
                                    <div id="feature_boxes_2"
                                        class="row-fluid style1 background-shadow-no feature_boxes box-style1 enable-hr-no element-vpadding-medium2 hr-type-tiny hr-color-light hr-style-2px large-size element-inner-vertical-padding-medium element-inner-horizental-padding-medium icon-side-left iconbox-style2 align-content-center-no align-icon-center-no columns-2 crease-background-no content-box default element-padding-medium ">
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0" data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i class="fa-icon_mobile"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Mengayomi, melindungi, dan merangkul seluruh lapisan
                                                                masyarakat
                                                            </h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0" data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i class="fa-icon_cog"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Menegakkan hukum secara adil dan berimbang</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0"
                                                data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i
                                                            class="fa-icon_lightbulb_alt"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Siap melayani dengan hati nurani</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0"
                                                data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i
                                                            class="fa-icon_adjust-vert"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Menjaga keamanan dan ketertiban bersama rakyat</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0"
                                                data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i class="fa-icon_lifesaver"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Bertindak tegas, cepat, dan terukur</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0"
                                                data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i class="fa-icon_cloud_alt"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Profesional, modern, dan terpercaya dalam setiap tugas</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0"
                                                data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i class="fa-icon_like"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Bersinergi dengan semua elemen bangsa</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span">
                                            <div class="inner-content " data-animation-delay="0"
                                                data-animation-effect="">
                                                <div class="feature_box no-content">
                                                    <span class="brad-icon " data-animation-delay="0"
                                                        data-animation-effect=""><i class="fa-icon_mug"></i></span>
                                                    <div class="heading">
                                                        <div class="heading-content">
                                                            <h6>Transparan, akuntabel, dan berorientasi pada pelayanan
                                                                publik</h6>
                                                        </div>
                                                        <div class="hr">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="section_2 section content-box scheme1 section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-yes triangle-location-top parallax-section-no section-overlay-yes section-overlay-dot-no "
            style="padding-top:90px;padding-bottom:0;background-color:#ffffff;background-image:url({{ asset('frontend/upload/manblur.jpg') }});"
            data-video-ratio="" data-parallax-speed="1">
            <div class="section-overlay" style="background-color:rgba(52,73,94,0.25)">
            </div>
            <div class="container section-content">
                <div class="row-fluid">
                    <div class="row-fluid equal-cheight-no element-padding-default element-vpadding-medium">
                        <div class="section-column span6" style="">
                            <div class="inner-content content-box textnone"
                                style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                <div class="single-image-container img-align-center ">
                                    <div class="single-image animate-when-visible" data-animation-delay="100"
                                        data-animation-effect="fadeInLeft">
                                        <img width="600" height="429"
                                            src="{{ asset('frontend/images/logo-polda-2.png') }}" class="attachment-full"
                                            alt="logo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-column span6" style="">
                            <div class="inner-content content-box textnone"
                                style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                <div class="gap" style="height:20px;line-height:20px;">
                                </div>
                                <h2 class="title textleft default bw-defaultpx dh-defaultpx divider-dark bc-default dw-default color-default"
                                    style="margin-bottom:0px"><span>MENGENAL SINGKAT POLRES KOTA TASIKMALAYA</span>
                                </h2>
                                <div class="hr border-small dh-2px alignleft hr-border-primary"
                                    style="margin-top:20px;margin-bottom:30px;">
                                    <span></span>
                                </div>
                                <div class="column-text ">
                                    Polres Kota Tasikmalaya merupakan institusi kepolisian yang bertugas menjaga keamanan,
                                    ketertiban, dan penegakan hukum di wilayah Kota Tasikmalaya, Jawa Barat. Dengan
                                    pendekatan profesional, humanis, dan responsif, Polres ini hadir sebagai mitra
                                    masyarakat dalam menciptakan lingkungan yang aman dan kondusif.

                                    Mengusung semangat Polri Presisi, Polres Kota Tasikmalaya terus berinovasi dalam
                                    pelayanan publik, membangun sinergi lintas elemen, serta menegakkan hukum secara adil
                                    dan berimbang. Komitmen untuk mengayomi, melindungi, dan melayani menjadi landasan utama
                                    dalam setiap langkah dan kebijakan yang diambil.
                                </div>
                                <div class="gap " style="height:35px;line-height:35px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section_416941510"
            class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no "
            style="padding-top:90px;padding-bottom:100px;background-color:#ffffff;" data-video-ratio=""
            data-parallax-speed="1">
            <div class="section-overlay" style="">
            </div>
            <div class="container section-content">
                <div class="row-fluid">
                    <div class="row-fluid equal-cheight-no element-padding-default element-vpadding-default">
                        <div class="section-column span12" style="">
                            <div class="inner-content content-box textnone"
                                style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                <h3 class="title textcenter default bw-2px dh-2px divider-dark bc-dark dw-default color-default"
                                    style="margin-bottom:0px"><span>Bersama untuk Keamanan Kota</span>
                                </h3>
                                <div class="hr border-small dh-2px aligncenter hr-border-primary"
                                    style="margin-top:15px;margin-bottom:45px;">
                                    <span></span>
                                </div>
                                <div class="quotes-slider-container bx-carousel-container navigation-align-side"
                                    data-navigation="no" data-effect="horizontal" data-autoplay="no"
                                    data-interval="5000" data-pagination="yes">
                                    <span class="carousel-next"></span><span class="carousel-prev"></span>
                                    <ul class="quotes-slider bx-fake-slider">
                                        <li class="quote-slider-item">
                                            <div class="quote-logo">
                                            </div>
                                            <blockquote>
                                                <q>

                                                    Terima kasih atas kunjungan Anda.Dengan semangat Presisi, kami terus
                                                    berinovasi demi membangun kepercayaan dan menciptakan lingkungan yang
                                                    tertib dan kondusif Mari bersama wujudkan Tasikmalaya
                                                    sebagai kota yang damai, aman, dan bermartabat untuk generasi hari ini
                                                    dan masa depan.</q>
                                            </blockquote>
                                        </li>
                                    </ul>
                                    <div class="carousel-pagination">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
