    <!-- mobile menu Starts Here-->
    <div id="mobile_navigation">
        <a id="close-mobile-menu" href="#">X</a>
        <ul id="mobile_menu" class="mobile_menu">
            <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a
                    href="#">Home</a>
            </li>
            <li class="menu-item menu-item-has-children menu-item-6811"><a href="#">Profile</a>
                <ul class="sub-menu">
                    @foreach ($menu_profil as $item)
                        <li class="menu-item"><a href="about-us-1.html">{{ $item->name }} 1</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="menu-item menu-item-has-children menu-item-6814"><a href="#">Pelayanan Publik Terpadu</a>
                <ul class="sub-menu">
                    @foreach ($pelayanan_publik as $item)
                        <li class="menu-item"><a href="blog-grid.html">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="menu-item"><a href="/berita">Berita</a></li>
            <li class="menu-item"><a href="/kontak">Contact Us</a></li>
        </ul>
    </div>
    <!-- End Mobile Navigation -->


    <!-- Header -->
    <div id="header_wrapper" class=" solid-header header-scheme-light type1">
        <div class="header_container">
            <div id="header" class="header-v1 " data-height="110" data-shrinked-height="65" data-auto-offset="1"
                data-offset="0" data-second-nav-offset="0">
                <section id="main_navigation" class="header-nav shrinking-nav">
                    <div class="container">
                        <div id="main_navigation_container" class="row-fluid">
                            <div class="row-fluid">
                                <!-- logo -->
                                <div class="logo-container">
                                    <a id="logo" href="/">
                                        <img src="{{ asset('frontend/images/logo-polda.png') }}" class="default-logo"
                                            alt="Polres-Kota-Tasikmalaya">
                                        <img src="{{ asset('frontend/images/logo-polda.png') }}" class="white-logo"
                                            height="220" alt="Polres-Kota-Tasikmalaya">
                                    </a>
                                </div>
                                <!-- Tooggle Menu will displace on mobile devices -->
                                <div id="mobile-menu-container">
                                    <a class="toggle-menu" href="#"><i class="fa-navicon"></i></a>
                                </div>
                                <nav class="nav-container">
                                    <ul id="main_menu" class="main_menu">
                                        <!-- Main Navigation Menu -->
                                        <li
                                            class="menu-item menu-item-has-children {{ Request::is('/') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                            <a href="/">Home</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-has-children {{ Request::is('profil*') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                            <a href="#">Profil</a>
                                            <ul class="sub-menu ">
                                                @foreach ($menu_profil as $item)
                                                    <li class="menu-item"><a
                                                            href="{{ route('profil-detail', $item->slug) }}">{{ $item->name }}
                                                        </a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item menu-item-has-children {{ Request::is('pelayanan-publik*') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                            <a href="#">Pelayanan Publik
                                                Terpadu</a>
                                            <ul class="sub-menu ">
                                                @foreach ($pelayanan_publik as $item)
                                                    <li class="menu-item"><a
                                                            href="{{ route('pelayanan-publik-detail', $item->slug) }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item {{ Request::is('berita') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                            <a href="/berita">Berita</a>
                                        </li>

                                        <li
                                            class="menu-item menu-item-has-children {{ Request::is('galery') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                            <a href="#">Galery</a>
                                            <ul class="sub-menu ">
                                                <li
                                                    class="menu-item menu-item-has-children {{ Request::is('kontak') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                                    <a href="shop.html">Cooming Soon</a>
                                                </li>
                                        </li>
                                    </ul>
                                    </li>
                                    <li class="menu-item"><a href="/kontak">Contact Us</a></li>
                                    <li id="header-search-button"><a href="#" class="search-button"><i
                                                class="fa-search"></i></a>
                                        <div id="header-search-panel">
                                            <div>
                                                <form action="#" id="header-search-form" method="get">
                                                    <input type="text" id="header-search" name="s"
                                                        value="" placeholder="Hit Enter to Search"
                                                        autocomplete="off" />
                                                    <!-- Create a fake search button -->
                                                    <input type="submit" name="submit" value="submit" />
                                                </form>
                                                <span class="close-icon"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                    </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
