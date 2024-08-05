<?php /* Template Name: Redirect */ 
get_header(); 
// Assign post variables.
$page_title = the_title( '', '', FALSE );
?>

<div id="review_container">
    <!-- start - #review-breadcrumbs -->
    <div class="wrapper-fof">
        <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
    </div>
</div>
<!-- end - #review-breadcrumbs -->

<div id="review_container" class="redirect-page">

    <div class="top-map">
        <img src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" alt="Map"/>
    </div>

    <div class="fof-wrapper">
        <div class="col-1">
            <div class="mobile-spacing"></div>
            <div class="content">
                <div class="where-you-are">
                    <div class="path">
                        <img src="/wp-content/uploads/2022/03/404-line-1.svg" alt="Path side to 404"/>
                    </div>
                    <div class="path-two">
                        <img src="/wp-content/uploads/2022/03/404-line-2.svg" alt="Path down to 404"/>
                    </div>
                    <p class="pin-text">You are<br />here</p>
                </div>
            </div>
        </div>
        <div class="page-intro col-2">
            <h1><?php the_field('page_title'); ?></h1>
            <div class="page-meta">
                <?php the_field('page_meta'); ?>
            </div>
        </div>
    </div>
    
</div>

<div id="review_container" class="redirect-page_lower">
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>