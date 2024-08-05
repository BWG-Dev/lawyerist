<?php /* Template Name: Field Guide */ ?>

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
		<?php
			if ( is_user_logged_in() )	{
				?>
				<div class="c-container">
						<div class="col-1">
								<div class="form-wrapper">
										<h1><?php the_title(); ?></h1>
										<div class="page-meta">
												<?php the_content(); ?>
										</div>
										<div class="form-container hs-orange-btn">
												<div class="orange-btn o-trig">
														<?php echo $download_btn; ?>
												</div>
										</div>
								</div>
						</div>
						<div class="col-2">
								<?php the_post_thumbnail(); ?>
						</div>
				</div>
				<?php
			}else {
				?>
				<div class="c-container">
						<div class="col-1">
								<div class="form-wrapper">
										<h1><?php the_title(); ?></h1>
										<div class="page-meta">
												<?php the_content(); ?>
										</div>
								</div>
						</div>
						<div class="col-2">
								<?php echo do_shortcode('[gravityform id="98" title="false"]'); ?>
						</div>
				</div>
				<?php
			}
			?>

    </div>
<?php get_footer(); ?>
