<?php get_header(); ?>

<div id="single-post-container" class="page-container">
      <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>


  <?php
    get_template_part('template-parts/loop', 'post');
  ?>
</div>

<?php get_footer(); ?>