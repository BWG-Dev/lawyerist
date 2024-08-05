<?php /* Template Name: fof */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );


?>

<style>
.orange-btn {
    padding-top: 1.7rem !important;
    padding-bottom: 1.5rem !important;
}
</style>

<div id="review_container" class="fof">
    <!-- start - #review-breadcrumbs -->
    <div class="wrapper-fof">
        <div id="breadcrumbs-accreditation-container">
            <div class="accreditation">
                <div class="accreditation-txt"><?php the_field( 'header_cta', 'options' ); ?></div>
                <img src="/wp-content/uploads/2022/01/lawyerist-accredidation-badge-icon.svg" alt="Lawyerist Icon"/>
            </div>
        </div>
    </div>
</div>
<!-- end - #review-breadcrumbs -->

<div id="review_container" class="fof">

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
                <div class="c-container">
                    <h1>Oops...</h1>
                    <p>You seem to have gotten off course - this page doesn’t exist.</p>
                    <a href="<?php the_field('one_link', 'options'); ?>">
                        <div class="orange-btn">
                            <span><?php the_field('one_text', 'options'); ?></span>
                        </div>
                    </a>
                    <a href="<?php the_field('two_link', 'options'); ?>">
                        <div class="orange-btn">
                            <span><?php the_field('two_text', 'options'); ?></span>
                        </div>
                    </a>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>