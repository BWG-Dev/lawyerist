<?php /* Template Name: Frontpage */ ?>

<?php get_header(); ?>

<div id="column_container">

	<div id="content_column">

		<?php

		// Get the Loop.
    	get_template_part( 'template-parts/loop', 'frontpage' );  ?>

	</div><!-- end #content_column -->

</div><!--end #column_container-->

<?php get_footer(); ?>