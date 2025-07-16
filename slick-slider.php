<?php
function custom_add_scripts_in_footer() {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script>


        //testimonial slider
        jQuery(document).ready(function($) {

            jQuery('.ah-testimonial-main-wrapper').on('init', function(event, slick){
                jQuery('.ah-testimonial-main-wrapper .slick-arrow, .ah-testimonial-main-wrapper .slick-dots').wrapAll('<div class="ah-testimonial-nav-wrapper"></div>');
            });


            jQuery('.ah-testimonial-main-wrapper').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: true,
                fade: true,
                adaptiveHeight: true,
                iahinite: true,
                autoplay: false,
                speed: 1000,
                prevArrow: '<button class="slick-prev"><svg width="27" height="11" viewBox="0 0 27 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.72727 1L1 5.5M1 5.5L5.72727 10M1 5.5H27" stroke="white"/></svg></button>',
                nextArrow: '<button class="slick-next"><svg width="27" height="11" viewBox="0 0 27 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.2727 10L26 5.5M26 5.5L21.2727 1M26 5.5L-3.81458e-07 5.5" stroke="white"/></svg></button>',
            });


        });
    
    </script>

	</script>

    
    <?php
    }
add_action('wp_footer', 'custom_add_scripts_in_footer', 100);