<?php

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post();

  // Assign post variables.
  $post_title = the_title( '', '', FALSE );

  // Breadcrumbs
  /*if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
  }*/

  ?>

  <main>

    <div <?php post_class(); ?>>

      <?php

      // Featured image
      $updated_featured_image = get_field( 'updated_featured_image' );
      $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

      if ( is_page(298210) ) { // Home page/product list ?>
        <h1 class="headline entry-title"><?php echo $post_title; ?></h1>
      <?php } else if ( ( $updated_featured_image == true ) && has_post_thumbnail() ) {

        ?>
        <div class="h1-banner updated" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
          <div class="h1-banner_overlay">  
            <div class="h1-container">
              <span class="circle-logo"><img id="logo-svg" src="<?php echo get_template_directory_uri(); ?>/images/circle-logo-icon.svg" alt="Lawyerist Icon"></span>
              <h1 class="new-h1 headline entry-title"><?php echo $post_title; ?></h1>
            </div>
          </div>
        </div>

        <?php

      // Featured image
      //if ( has_post_thumbnail() ) {
      
      } else {
        ?>

        <div id="featured-image"><?php the_post_thumbnail(); ?></div>

        <h1 class="headline entry-title"><?php echo $post_title; ?></h1>
      
        <?php

      }

      ?>


      <div class="post_body" itemprop="articleBody">

        <?php the_content(); ?>

      </div>

    </div>

  </main>

  <?php

endwhile; endif; // Close the Loop.
