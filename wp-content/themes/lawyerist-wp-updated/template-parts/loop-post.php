<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <main class="content-container">
    <div <?php post_class(); ?>>
      <?php lawyerist_get_post_header(get_the_ID()); ?>
      <div id="review_container" class="single-post">
        <div class="entry-content">
          <?php the_content(); ?>
          <?php lawyerist_get_author_bio(); ?>
          <div class="section-heading">
            <div class="wrapper">
              <h2>Share Article</h2>
              <?php echo dpsp_get_share_buttons([
                'shape'       => 'circle',
                'show_mobile' => true,
                'size'        => 'large',
              ]); ?>
            </div>
          </div>
          <p class="last-updated">Last updated <?php echo get_the_modified_date( 'F jS, Y' ); ?></p>
        </div><!--.entry-content-->
      </div>
    </div>
  </main>
  <?php get_template_part('template-parts/related-resources');

endwhile; endif; ?>
