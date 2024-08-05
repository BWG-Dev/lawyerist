<?php /* Template Name: LabCon Materials */ ?>

<?php get_header(); ?>

<div id="column_container">

	<div id="content_column">

      <?php

      // Start the Loop.
      if ( have_posts() ) : while ( have_posts() ) : the_post();

        // Assign post variables.
        $page_title = the_title( '', '', FALSE );

        // Breadcrumbs
        /*if ( function_exists( 'yoast_breadcrumb' ) ) {
          yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
        }*/

        ?>

        <main>

          <div <?php post_class(); ?>>

            <?php

            // Featured image
            $show_featured_image = get_field( 'show_featured_image' );

            if ( ( is_null( $show_featured_image ) || $show_featured_image == true ) && has_post_thumbnail() ) {

              ?>

              <div id="featured-image"><?php echo the_post_thumbnail(); ?></div>

              <?php

            }

            ?>

            <h1 class="headline entry-title"><?php echo $page_title; ?></h1>

            <div class="post_body" itemprop="articleBody">

              <?php

              if ( !is_user_logged_in() ) {

                ?>

                <p>These materials are only for LabCon attendees. Please <a class="login-link">log in</a> so we can check your attendance.</p>

                <?php

              } else {

                $user_id = get_current_user_id();
                $labcon_id = get_field('labcon_product_id');

                if ( wc_customer_bought_product( '', $user_id, $labcon_id ) ) :

                  the_content();

              else: 
                  ?>

                  <p>Sorry, we can't find your LabCon registration in our records. If you think this is an error, please <a href="https://lawyerist.com/about/contact/">contact us</a>. (You can also use the Zoom chat if you are currently in a LabCon session.)</p>

                  <?php

                endif;

              }

              ?>

            </div>

          </div>

        </main>

        <?php

      endwhile; endif; // Close the Loop.

      ?>

	</div><!-- end #content_column -->

</div><!--end #column_container-->

<?php get_footer(); ?>
