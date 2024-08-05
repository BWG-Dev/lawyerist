<?php
/* Template Name: Category Page */

get_header(); ?>
<!-- This is a Template Part fix for a 500 issue we were getting on the news-articles redirect to /news/ -->
<div id="single-post-container" class="page-container">
  <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
  <?php

    get_template_part( 'template-parts/loop', 'default' ); // default template

  ?>
</div>
<!-- end #column_container -->

<?php get_footer(); ?>
