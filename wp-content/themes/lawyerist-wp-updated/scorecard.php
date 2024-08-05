<?php
/**
 * Template Name: Scorecard
 */

get_header(); ?>

<div id="single-post-container" class="page-container">
  <?php 
    get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); 
    get_template_part( 'template-parts/loop', 'scorecard' );
  ?>
  <!-- end #content_column -->
</div>
<!-- end #column_container -->

<?php get_footer(); ?>