<?php /* Template Name: Product Portal */ ?>

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

	?>
	<div id="product-portal-hero">
		<div class="h1-banner updated" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
			<div class="h1-banner_overlay">  
				<div class="hero-container">
					<div class="h1-container <?php if ($include_PRW == true) { ?> has-cta <?php } ?>">
						<?php // Breadcrumbs
						if ( function_exists( 'yoast_breadcrumb' ) ) {
							yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
						} ?>
						<span class="circle-logo"><img id="logo-svg" src="<?php echo get_template_directory_uri(); ?>/images/circle-logo-icon.svg" alt="Lawyerist Icon"></span>
						<h1 class="new-h1 headline entry-title"><?php echo $page_title; ?></h1>
					</div>
					<?php if ($include_PRW == true) { ?>
					<div class="prw-cta">
						<div class="prw-cta_inner">
							<a class="prw-link" href="/tools/<?php echo esc_url($PRW_url); ?>" title="<?php echo esc_attr($PRW_title); ?>">
								<span class="arrow-holder">&nbsp</span>
								<div class="text-holder">
									<span class="text-holder_title">Find a Product Match</span>
									<span class="text-holder_spacer">&nbsp</span>
									<span class="text-holder_text"><strong>It’s simple.</strong> Enter your law firm goals - get a product recommendation in seconds.</span>
								</div>
							</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<div id="column_container">

	<div id="content_column">

		<?php

		// Get the Loop.

		get_template_part( 'template-parts/loop', 'product-portal' );

		?>

	</div><!-- end #content_column -->

</div><!--end #column_container-->

<?php get_footer(); ?>
