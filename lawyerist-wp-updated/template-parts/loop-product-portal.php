<?php

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post();
    

  ?>

  <main>

    <div <?php post_class(); ?>>

      <div class="post_body" itemprop="articleBody">

        <?php

        if ( is_product_portal() && !is_page( 'reviews' ) ) {

          if ( !has_shortcode( $post->post_content, 'list-featured-products' ) ) {
            echo do_shortcode( '[list-featured-products]' );
          }

        }


		  
        the_content();


		  
        if ( is_product_portal() && !is_page( 'reviews' ) ) {

          if ( !has_shortcode( $post->post_content, 'list-products' ) ) {
            echo do_shortcode( '[list-products]' );
          }

          if ( !has_shortcode( $post->post_content, 'list-product-features' ) ) {
            echo do_shortcode( '[list-product-features]' );
          }

        }

        // Show page navigation if the post is paginated unless we're displaying
        // the RSS feed.
        if ( !is_feed() ) {

          $wp_link_pages_args = array(
            'before'            => '<p class="page_links">',
            'after'             => '</p>',
            'link_before'       => '<span class="page_number">',
            'link_after'        => '</span>',
            'next_or_number'    => 'next',
            'nextpagelink'      => 'Next Page &raquo;',
            'previouspagelink'  => '&laquo; Previous Page',
            'separator'         => '|',
          );

          wp_link_pages( $wp_link_pages_args );

        }

        ?>

      </div>

    </div>

  </main>

  <?php

  // Shows review template if comments are open and reviews are enabled. The only
  // reason this is present on plain pages is that we're using the regular page
  // template for a few specific pages like Lab and LabCon.
  if ( comments_open() && function_exists( 'wp_review_show_total' ) ) {

    ?>

    <div id="comments_container"><?php comments_template( '/reviews.php' ); ?></div>

    <?php

  }

  lawyerist_get_related_posts();

endwhile; endif; // Close the Loop.