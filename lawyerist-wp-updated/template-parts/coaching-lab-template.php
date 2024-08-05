<?php /* Template Name: Coaching Lab Template */ ?>

<?php get_header(); 


	// Assign post variables.
	$page_title = the_title( '', '', FALSE );

	// Featured image
	$show_featured_image 		= get_field( 'show_featured_image' );
	$updated_featured_image		= get_field( 'updated_featured_image' );
	$backgroundImg 				= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$include_PRW 				= get_field('include_rec_wizard');
	$PRW_link 					= get_field('rec_wizard_link');
	$PRW_url 					= $PRW_link['url'];
	$PRW_title 					= $PRW_link['title'];

    $banner_description		= get_field( 'banner_description' );
    $one_top		        = get_field( '01_sub_description_top' );
    $one_bottom	 	        = get_field( '01_sub_description_bottom' );
    $two_top		        = get_field( '02_sub_description_top' );
    $two_bottom		        = get_field( '02_sub_description_bottom' );
    $three_top		        = get_field( '03_sub_description_top' );
    $three_bottom		    = get_field( '03_sub_description_bottom' );

?>

<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>
<script src='https://kenwheeler.github.io/slick/slick/slick.js'></script>

<div id="review_container" class="coaching-lab">

    <?php get_template_part( 'template-parts/sub', 'navigation' ); ?>

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>

    <script>
        let distance = jQuery('#review_secondary_nav').offset().top,
            mobile_distance = jQuery('#review_mobile_secondary_nav').offset().top,
            viewportWidth = window.innerWidth || document.documentElement.clientWidth,
            $window = jQuery(window);

        if (viewportWidth > 1024) {
            $window.scroll(function() {
                if ( $window.scrollTop() >= 100 ) {
                    // Your div has reached above top
                    //console.log('Sub nav has reached the top!');
                    jQuery('#review_secondary_nav').addClass('reviews_navbar-fixed-top');

                } else if ( $window.scrollTop() <= mobile_distance ) {
                    // Your div has reached below top
                    // console.log('No longer at the top!');
                    jQuery('#review_secondary_nav').removeClass('reviews_navbar-fixed-top');

                }
            });
        } else if (viewportWidth < 1024) {
            $window.scroll(function() {
                if ( $window.scrollTop() >= 100 ) {
                    // Your div has reached above top
                    //console.log('Sub nav has reached the top!');
                    jQuery('#review_mobile_secondary_nav').addClass('reviews_navbar-fixed-top');

                } else if ( $window.scrollTop() <= mobile_distance ) {
                    // Your div has reached below top
                    // console.log('No longer at the top!');
                    jQuery('#review_mobile_secondary_nav').removeClass('reviews_navbar-fixed-top');

                }
            });
        }

        // Mobile Navigation Toggle
        function tooogleX() {
            var x = document.querySelector(".fixed-mobile-secondary-nav");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
    <!-- End - #review_secondary_nav -->

    <script>
        jQuery.noConflict();
        jQuery(document).ready(function($){ 
            $('.review-inner-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<div class="prev-arrow"><svg fill="#424b54" id="nextAr" width="40" height="40" fill xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,996.3c272.85,0,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66,4.66,228.64,4.66,501.48,226.63,996.3,499.49,996.3Zm0-961.09c257.11,0,466.27,209.17,466.27,466.27S756.6,967.75,499.49,967.75,33.21,758.58,33.21,501.48,242.37,35.21,499.49,35.21Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="501.5 637.55 501.5 538.59 656.67 538.59 656.67 428.49 501.5 428.49 501.5 335.39 411.1 410.93 320.36 486.46 410.82 562 501.5 637.55" style="fill-rule:evenodd"/></svg></div>',
            nextArrow: '<div class="next-arrow"><svg fill="#424b54" id="prevAr" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,6.66c-272.86,0-494.83,222-494.83,494.82s222,494.82,494.83,494.82,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66Zm0,961.09c-257.12,0-466.28-209.17-466.28-466.27S242.37,35.21,499.49,35.21,965.76,244.38,965.76,501.48,756.6,967.75,499.49,967.75Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="488.14 352.09 488.14 451.05 332.98 451.05 332.98 561.15 488.14 561.15 488.14 654.25 578.54 578.72 669.28 503.18 578.83 427.64 488.14 352.09" style="fill-rule:evenodd"/></svg></div>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }]
            });
        });
    </script>

</div><!--end #review_container -->

<?php get_footer(); ?>