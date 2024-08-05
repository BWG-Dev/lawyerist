<?php /* Template Name: Field Guide Success */ ?>

<?php get_header();

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
    $download_btn = get_field('guide_cta_link');
?>

    <div id="review_container" class="field-guide-page">

        <div class="review-banner-container">
            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->
        </div>

        <div class="c-container">
            <div class="col-1">
                <div class="form-wrapper">
                    <h1><?php the_title(); ?></h1>
                    <div class="page-meta"> <!-- Todo: make this hidden if didn't come from /field-guide/ page -->
                        <?php the_content(); ?>
                    </div>

                </div>
            </div>
            <div class="col-2">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <div class="spacer-90"></div>
        <div class="spacer-90"></div>
				<div class="spacer-90"></div>
    </div>

<style>
    #footer {
        position: relative;
        z-index:3;
    }
</style>

<?php get_footer(); ?>
