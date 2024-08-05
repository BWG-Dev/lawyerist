<?php 

/**
 * Block Name: Relevant Object
 * 
 * Template for relevant object block. 
 * This element can be used to display a variety of objects.
 * 
 */

$relevant_object_group = get_field('relevant_object_block'); 
$enabled = $relevant_object_group['enable_block'];

?>


<?php if( $enabled ) : 
   $object_type = $relevant_object_group['object_type']; 
   $object_quantity = $relevant_object_group['amount_to_display'];
   if( $object_quantity > 3 ) {
    $class_rows = 'two-rows';
   } else {
    $class_rows = 'one-row';
   }

   switch ($object_type) {
    case 'podcasts':
        $object_categories = 'podcasts';
        $object_card_class = 'podcasts-card';
        $object_img_class = 'podcast-img';
        $object_taxonomy = 'podcast-tag';
        $taxonomy_terms = $relevant_object_group['podcast_tag'];
        break;
    default:
        $object_categories = '';
        $object_card_class = '';
        $object_img_class = '';
        $object_taxonomy = '';
        break;
    }

   $args = array(
    'post_type' => $object_type,
    'posts_per_page' => $object_quantity,
    );
    if( $taxonomy_terms !== '' ) {
        $args['tax_query'] = [
        [
            'taxonomy' => $object_taxonomy,
            'field' => 'slug',
            'terms' => $taxonomy_terms
        ]
      ];
    }
   
   $query = new WP_Query( $args );
   if ( $query->have_posts() ) : ?>
   <div class="related-objects-wrapper">
        <h3>Related <?php echo $object_type; ?></h3>
        <div class="relevant-object-block <?php echo $class_rows; ?>">
            <?php while ( $query->have_posts() ) : $query->the_post(); 
            $permalink = get_the_permalink();
            $title = get_the_title();
            $category = get_the_category();
            $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
            ?>
                <div class="object-card <?php echo $object_card_class; ?>">
                    <a class="object-link" href="<?php echo $permalink; ?>"></a>
                    <div class="post-card-img-holder <?php echo $object_img_class;?>">    
                        <?php if( $featured_img ) : ?>
                            <img src="<?php echo $featured_img; ?>" alt="<?php echo $title; ?>">
                        <?php endif; ?>
                    </div>
                    <div class="copy-holder">
                        <p>
                            <?php echo '<span class="episode-number">Episode #' . get_field('episode_no', $post->ID) . '</span>'; ?>
                            <span class="date"><?php echo get_the_time('j M Y', $post->ID); ?></span>
                        </p>
                        <h2 class="headline"><?php echo $title; ?></h2>
                        <a href="/podcast/" class="category"><?php echo $category[0]->name; ?></a>
                        <p class="listen-copy">Listen to Episode</p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
   </div>
   <?php wp_reset_postdata(); ?>

    <?php endif; ?>


<?php endif; ?>