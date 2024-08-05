<?php /* Template Name: Product Recommendation Results */ ?>

<?php get_header(); ?>

<div class="top-bar" id="prw"><span class="cta"><h1>Find a product match</h1></span></div>

<div id="column_container" class="product-recommendation-wizard">

	<div id="content_column">

		<?php

		// Get the Loop.
    get_template_part( 'template-parts/loop', 'product-recommender' );

		?>

	</div><!-- end #content_column -->

</div><!--end #column_container-->

<?php get_footer(); ?>