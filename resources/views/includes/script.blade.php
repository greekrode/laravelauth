<script src="{{ asset('vendor/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/jquery.flexnav.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.hoverIntent.minified.js') }}"></script>
<script src="{{ asset('vendor/jquery.flickrfeed.js') }}"></script>
<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/isotope/jquery.imagesloaded.min.js') }}"></script>
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.fitvids.js') }}"></script>
<script src="{{ asset('vendor/jquery.appear.js') }}"></script>
<script src="{{ asset('vendor/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('vendor/flexslider/jquery.flexslider-min.js') }}"></script>

<!-- Newsletter Form -->
<script src='{{ asset('vendor/jquery.validate.js') }}'></script>
<script src='{{ asset('js/newsletter.js') }}'></script>

<script src='{{ asset('js/custom.js') }}'></script>

<!-- Google Map -->
{{-- <script src="https://maps.google.com/maps/api/js"></script> --}}
{{-- <script src='{{ asset('vendor/jquery.gmap3.min.js') }}'></script> --}}

<script>
    jQuery(function($){
        $('body').addClass('loading');
    });

    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "fade",
            controlNav: true,
            directionNav: false,
            prevText: "",
            nextText: "",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>



