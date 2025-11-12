@extends('frontend.layouts.app', ['title' => 'Home'])
@section('styles')
    <style>
        .slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
        }

        .slide {
            flex: 0 0 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 80vh;
            /* hanya untuk desktop */
            object-fit: cover;
            display: block;
        }

        /* Untuk tablet dan HP: tampilkan seluruh gambar, tinggi otomatis */
        @media (max-width: 768px) {
            .slide img {
                height: auto;
                /* agar tidak dipotong */
                max-height: none;
                /* hapus batasan tinggi */
                object-fit: contain;
                /* opsional: jika ingin pastikan seluruh gambar terlihat */
            }

            /* Opsional: beri padding atas/bawah jika perlu jarak */
            .slider-container {
                max-height: none;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Rev Slider Start -->
    <div class="slider-container">
        <div class="slider-track" id="sliderTrack">
            @foreach ($banners as $item)
                <div class="slide">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                    {{-- <div class="slide-caption">
          <h2>{{ $item->name }}</h2>
        </div> --}}
                </div>
            @endforeach
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
                                            <a href="{{ route('pelayanan-publik-detail', $item->slug) }}" class="span">
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
                                            </a>
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
                                            <div class="inner-content " data-animation-delay="0" data-animation-effect="">
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
                                            <div class="inner-content " data-animation-delay="0" data-animation-effect="">
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
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliderTrack = document.getElementById('sliderTrack');
            const slides = document.querySelectorAll('.slide');
            let currentIndex = 0;
            const totalSlides = slides.length;
            const slideInterval = 5000; // 5 detik

            if (totalSlides <= 1) return; // tidak perlu slider jika hanya 1 gambar

            function goToSlide(index) {
                if (index >= totalSlides) currentIndex = 0;
                else if (index < 0) currentIndex = totalSlides - 1;
                else currentIndex = index;

                const offset = -currentIndex * 100;
                sliderTrack.style.transform = `translateX(${offset}%)`;
            }

            function nextSlide() {
                goToSlide(currentIndex + 1);
            }

            // Mulai otomatis
            let autoSlide = setInterval(nextSlide, slideInterval);

            // Opsional: hentikan otomatis saat user hover (di desktop)
            const sliderContainer = document.querySelector('.slider-container');
            sliderContainer.addEventListener('mouseenter', () => {
                clearInterval(autoSlide);
            });
            sliderContainer.addEventListener('mouseleave', () => {
                autoSlide = setInterval(nextSlide, slideInterval);
            });

            // Opsional: hentikan otomatis saat user menyentuh/slider (mobile)
            let isTouching = false;
            sliderContainer.addEventListener('touchstart', () => {
                isTouching = true;
                clearInterval(autoSlide);
            });
            sliderContainer.addEventListener('touchend', () => {
                if (isTouching) {
                    autoSlide = setInterval(nextSlide, slideInterval);
                    isTouching = false;
                }
            });
        });
    </script>
@endsection
