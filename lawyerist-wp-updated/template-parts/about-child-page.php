<?php /* Template Name: About Child Page Template */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>

<div id="review_container" class="about-child-page">

    <div class="review-banner-container">
        <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
        <!-- end - #review-breadcrumbs -->
    </div>

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>

</div>

<script src='https://kenwheeler.github.io/slick/slick/slick.js'></script>
<script>
          jQuery.noConflict();

jQuery(document).ready(function() {
    jQuery('.coin-01x').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<div class="prev-arrow-o"><svg fill="#424b54" width="40" height="40" fill xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,996.3c272.85,0,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66,4.66,228.64,4.66,501.48,226.63,996.3,499.49,996.3Zm0-961.09c257.11,0,466.27,209.17,466.27,466.27S756.6,967.75,499.49,967.75,33.21,758.58,33.21,501.48,242.37,35.21,499.49,35.21Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="501.5 637.55 501.5 538.59 656.67 538.59 656.67 428.49 501.5 428.49 501.5 335.39 411.1 410.93 320.36 486.46 410.82 562 501.5 637.55" style="fill-rule:evenodd"/></svg></div>',
        nextArrow: '<div class="next-arrow-o"><svg fill="#424b54" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,6.66c-272.86,0-494.83,222-494.83,494.82s222,494.82,494.83,494.82,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66Zm0,961.09c-257.12,0-466.28-209.17-466.28-466.27S242.37,35.21,499.49,35.21,965.76,244.38,965.76,501.48,756.6,967.75,499.49,967.75Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="488.14 352.09 488.14 451.05 332.98 451.05 332.98 561.15 488.14 561.15 488.14 654.25 578.54 578.72 669.28 503.18 578.83 427.64 488.14 352.09" style="fill-rule:evenodd"/></svg></div>',
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }
        }]
    });

    
    jQuery(".content").slice(0, 4).show();
    jQuery("#loadMore").on("click", function(e){
    e.preventDefault();
    jQuery(".content:hidden").slice(0, 4).toggle();
        if($(".content:hidden").length == 0) {
            jQuery("#loadMore").text("No More Events").addClass("noContent");
    }
  
})
});

</script>

<?php get_footer(); ?>