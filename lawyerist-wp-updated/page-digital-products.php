<?php /*  Template Name: Digital Products 
          Template Post Type: page, small firm services
      */ ?>

<?php 
$product_type = get_field('product_type');
get_header(); ?>


<div id="articles-page-container" class="page-container podcast-episodes-container">
  <div class="content-container">

    <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>

    <main id="articles" class="podcasts" data-nonce="<?php echo wp_create_nonce('podcasts_nonce'); ?>">

      <div class="podcast-header">
        <div class="featured-image col">
          <?php $thumbnail = get_the_post_thumbnail();
            echo $thumbnail; ?>
        </div>
        <div class="page-title col">
          <div class="page-title-container">
            <div class="page-icon"><img src='/wp-content/uploads/2022/01/lawyerist-accredidation-badge-icon.svg' alt="Lawyerist Logo"></div>
            <div class="page-title"><h1><?php single_post_title(); ?></h1></div>
          </div>
          <div class="page-content">
            <?php the_content(); ?>

          </div>
        </div>
      </div>

      <div id="all-articles">
        <div class="spacer-60"></div>
        <div class="article-cards">
        <?php

        // If the product type is a digital course or learning manual, switch to the Lawyerist blog to get the products. Then loop through the products and display them.
        if ( $product_type == 'digital-course' || $product_type == 'learning-manuals' ) {
          switch_to_blog(2);


          $args = array(
            'post_type' => 'product',
            'tax_query' => [
              [
                'taxonomy'  => 'product_cat',
                'field'     => 'slug',
                'terms'     =>$product_type
              ]
            ]
          );

          $product_query = new WP_Query($args);

          if( $product_query->have_posts() ) :

            // run the loop for each post
            while( $product_query->have_posts() ) : $product_query->the_post();
                $post_id = get_the_ID();

                if ( !$post_id ) { global $post; $post_id = get_the_ID(); }
                if ( !$post_id ) { return; }

                // Assigns card classes based on post type and a couple of special cases.
                $post_type      = get_post_type($post_id);
                $post_classes[] = 'card';
                $post_classes[] = $post_type . '-card';

                $thumbnail = get_the_post_thumbnail( $post_id );
                if ( $thumbnail ) { $post_classes[] = 'has-post-thumbnail'; }

                // Gets the post title and permalink for the link container.
                $post_title = get_the_title($post_id);
                $post_url   = get_permalink($post_id);

                $post_title = get_the_title($post_id);
                $post_url = get_permalink($post_id);
                $text  = $post_title;
                $limit = 8; ?>

                  <article class="card products podcasts-card has-post-thumbnail podcasts type-podcasts status-publish hentry category-podcasts">
                    <?php if ( $thumbnail ) { echo $thumbnail; } ?>
                    <div class="post-details">
                      <div class="post-details_inner">
                      <h2 class="headline" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                    </div>
                  </article>

                <?php

            endwhile;

          else :
            echo 'No posts found for this criteria';
          endif;
          restore_current_blog(); 
        } else { // If the product type is a small firm service, get the products from the current blog and display them.
          $args = array(
            'post_type' => 'small_firm_service',
          );

          $product_query = new WP_Query($args);

          if( $product_query->have_posts() ) :

            // run the loop for each post
            while( $product_query->have_posts() ) : $product_query->the_post();
                $post_id = get_the_ID();
            

                if ( !$post_id ) { global $post; $post_id = get_the_ID(); }
                if ( !$post_id ) { return; }

                // Assigns card classes based on post type and a couple of special cases.
                $post_type      = get_post_type($post_id);
                $post_classes[] = 'card';
                $post_classes[] = $post_type . '-card';

                $thumbnail = get_the_post_thumbnail( $post_id );
                if ( $thumbnail ) { $post_classes[] = 'has-post-thumbnail'; }

                // Gets the post title and permalink for the link container.
                $post_title = get_the_title($post_id);
                $post_url   = get_permalink($post_id);

                $post_title = get_the_title($post_id);
                $post_url = get_permalink($post_id);
                $text  = $post_title;
                $link_url = get_field('target_url', $post_id);
                $limit = 8; ?>

                  <article class="card products podcasts-card has-post-thumbnail podcasts type-podcasts status-publish hentry category-podcasts">
                    <?php if ( $thumbnail ) { echo $thumbnail; } ?>
                    <div class="post-details">
                      <div class="post-details_inner">
                      <h2 class="headline" title="<?php the_title(); ?>"><a href="<?php echo esc_attr($link_url); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                    </div>
                  </article>

                <?php

            endwhile;

          else :
            echo 'No posts found for this criteria';
          endif;
        }?>
        </div>
      </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>
