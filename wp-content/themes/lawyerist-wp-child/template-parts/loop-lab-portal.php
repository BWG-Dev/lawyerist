<?php /* Lab Portal Loop */

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post();  
    if ( is_user_logged_in() ) {
?>

<?php echo do_shortcode( '[labster_portal_upper]' ); ?>

<div id="column_container" class="lp-lower">

    <div id="content_column">
    <main>

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
  
   } else { ?>

<div id="column_container">

    <div id="content_column">
          <div class="post_body" itemprop="articleBody">

       <div id="lawyerist-login" style="display: block; position: static;">

        <div class="card">
            <img class="l-dot" src="<?php echo get_template_directory_uri(); ?>/images/circle-logo-icon.svg">

            <div id="login">
                <h2>Log into your Lab Portal</h2>
                <?php wp_login_form(); ?>
                <p class="remove_bottom">Forgot your password? <a href="<?php echo esc_url(wp_lostpassword_url(get_permalink())); ?>" alt="<?php esc_attr_e('Lost Password', 'textdomain'); ?>" class="forgot-password-link">Reset it here.</a></p>
            </div>

        </div>

    </div>
    </div>
    </div>
    </div>
<?php } 

endwhile; endif; // Close the Loop. ?>

	</div><!-- end #content_column -->

</div><!--end #column_container-->
