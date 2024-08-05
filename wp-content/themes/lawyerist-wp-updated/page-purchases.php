<?php
/**
 * Template Name: Purchase Dashboard
 */
get_header(); ?>

<div id="articles-page-container" class="page-container podcast-episodes-container">
  <div class="content-container">

    <main id="articles" class="podcasts" data-nonce="<?php echo wp_create_nonce('podcasts_nonce'); ?>">

     <div class="podcast-header">
        <div class="page-title col">
          <div class="page-title-container">
            <div class="page-icon"><img src='/wp-content/uploads/2022/01/lawyerist-accredidation-badge-icon.svg' alt="Lawyerist Logo"></div>
            <div class="page-title"><h1><?php the_title(); ?></h1></div>
          </div>
        </div>
      </div>

      <div id="all-articles">
        <div class="article-cards">
            <?php switch_to_blog(2); // Switch to /online/
                function misha_populate_products_page() {
                    global $wpdb;
                    // this SQL query allows to get all the products purchased by the current user
                    // in this example we sort products by date but you can reorder them another way
                    $purchased_products_ids = $wpdb->get_col( 
                        $wpdb->prepare(
                            "
                            SELECT      itemmeta.meta_value
                            FROM        " . $wpdb->prefix . "woocommerce_order_itemmeta itemmeta
                            INNER JOIN  " . $wpdb->prefix . "woocommerce_order_items items
                                        ON itemmeta.order_item_id = items.order_item_id
                            INNER JOIN  $wpdb->posts orders
                                        ON orders.ID = items.order_id
                            INNER JOIN  $wpdb->postmeta ordermeta
                                        ON orders.ID = ordermeta.post_id
                            WHERE       itemmeta.meta_key = '_product_id'
                                        AND ordermeta.meta_key = '_customer_user'
                                        AND ordermeta.meta_value = %s
                            ORDER BY    orders.post_date DESC
                            ",
                            get_current_user_id()
                        )
                    );

                    // some orders may contain the same product, but we do not need it twice
                    $purchased_products_ids = array_unique( $purchased_products_ids );

                    // if the customer purchased something
                    if( ! empty( $purchased_products_ids ) ) {

                        // it is time for a regular WP_Query
                        $purchased_products = new WP_Query( array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'post__in' => $purchased_products_ids,
                            'orderby' => 'post__in',
                            'posts_per_page' => -1,
                        ) );

                        while ( $purchased_products->have_posts() ) : $purchased_products->the_post();

                            global $product;

                            $title = $product->get_name();
                            $desc_link = get_permalink( $product->get_id() );
                            $cat = $product->get_categories();
                            $cat_id = $product->get_category_ids();
                            $downloads = $product->get_downloads();

                            //$image = $product->get_image();
                            $image_id = $product->get_image_id();
                            $img = wp_get_attachment_image( $image_id, 'full-size' );



                            if ( $cat_id = 49807 ) { // Learning Manuals
                                $cta = "Download Learning Manual";
                            } /*else if ( $cat_id = 49817 ) {
                                $cta = "Go to Course";
                            }*/
                            
                            ?>

                            <article class="card products podcasts-card has-post-thumbnail podcasts type-podcasts status-publish hentry category-podcasts">
                                <?php if ( $img ) { echo $img; } ?>
                                   
                                <div class="post-details">
                                    <div class="post-details_inner">
                                        <h2 class="headline" title="<?php echo $title; ?>"><a href="<?php echo $desc_link; ?>"><?php echo $title; ?></a></h2>                                        
                                        <?php if ( $cat_id == 49807 ) { // Downloads
                                            foreach( $downloads as $key => $each_download ) :
                                                echo '<a target="_blank" title="' . $cta . '" class="button" href="'.$each_download["file"].'">' . $cta . '</a>';
                                            endforeach;
                                        } else { // Courses
                                            echo '<a class="button" href="' . $desc_link . '">Access Course</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </article>                        
                        <?php endwhile;
                        wp_reset_postdata();
                    } else {
                        echo 'Nothing purchased yet.';
                    }

                }
                misha_populate_products_page();
            restore_current_blog(); ?>
        </div>
      </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>
