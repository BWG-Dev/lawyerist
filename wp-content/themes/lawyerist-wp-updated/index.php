<?php 
/* Template Name: Default Page */

get_header(); ?>

<div id="single-post-container" class="page-container">
  <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
  <?php

    get_template_part( 'template-parts/loop', 'default' ); // default template

  ?>
</div>
<!-- end #column_container -->

<?php get_footer(); ?>
