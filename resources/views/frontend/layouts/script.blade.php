<script type='text/javascript' src='{{ asset('frontend/js/jquery/jquery.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery/jquery-migrate.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/revslider/rs-plugin/js/jquery.themepunch.tools.min.js') }}'>
</script>
<script type='text/javascript' src='{{ asset('frontend/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}'>
</script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery.flexslider-min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/frontend/add-to-cart.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery-blockui/jquery.blockUI.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/frontend/woocommerce.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery-cookie/jquery.cookie.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/frontend/cart-fragments.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/brad-love.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/modernizr.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/fitvids.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/prettyPhoto.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/plugins.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/skrollr.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/imagesloaded.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery.scrollTo.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/waypoints.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/isotope.pkgd.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/bxslider.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/caroufred.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/main.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/contact-form.js') }}'></script>


<!-- Custom Scripts -->
<script type="text/javascript">
    (function($) {
        'use strict';

        $(document).ready(function() {
            // Retina logo
            var retina = window.devicePixelRatio > 1;
            if (retina) {
                $('#logo .default-logo').attr('src', '{{ asset('frontend/images/logo-polda.png') }}');
                $('#logo .white-logo').attr('src', '{{ asset('frontend/images/logo-polda.png') }}');
            }

            $('#logo img').css('max-width', '110px');

            /* ------------------------------------------------------------------------ */
            /* Add PrettyPhoto */
            /* ------------------------------------------------------------------------ */
            var lightboxArgs = {
                animation_speed: 'fast',
                overlay_gallery: true,
                autoplay_slideshow: false,
                slideshow: 5000,
                theme: 'pp_default',
                opacity: 0.8,
                show_title: true,
                deeplinking: false,
                allow_resize: true,
                counter_separator_label: '/',
                default_width: 1200,
                default_height: 640
            };

            $("a[data-gal^='prettyPhoto']").prettyPhoto(lightboxArgs);
        });
    })(jQuery);
</script>
@yield('scripts')


<!-- End footer -->
</body>

</html>
