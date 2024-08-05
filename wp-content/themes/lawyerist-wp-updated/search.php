 <?php 
    get_header();
    $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $total_paged = $wp_query->max_num_pages;
?>

<div id="review_container" class="search-results">

    <div class="review-banner-container">

        <!-- start - #review-breadcrumbs -->
        <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
        <!-- end - #review-breadcrumbs -->

    </div>

    <div class="search-container">
        <div class="search-block">
            <div class="question">
                <p><span>Not seeing what you’re looking for?</span> Refine your search!</p>
            </div>
            <div class="input">
                <?php get_search_form(); ?>
            </div>
        </div>

        <div class="results-container">
            <h1 class="post-title f-center" title="<?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: <?php the_search_query(); ?>"><?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"</h1> <!--Edit these values to adjust page being shown.-->

            <div class="top">
                <p class="out-of">PAGE <?php echo $paged; ?> OUT OF <?php echo $total_paged; ?></p>
                <p class="results-per-page">10 Results per page</p>
            </div>

            <?php
            if (have_posts()):
            while ( have_posts()) : the_post(); ?>

            <!-- Post loop start -->
            <div class="post-block">
                <div class="col-2">
                    <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                    <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                </div>  
                <div class="col-1">
                    <a href="<?php the_permalink(); ?>">
                        <div class="image" style="background:url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>); background-size: cover; background-repeat: no-repeat; background-position: center top;"></div>
                    </a>
                </div>
            </div> 


            <?php endwhile; 
            ?>

            <div class="nav-pagination">
                <?php 
                    echo paginate_links( array(
                        'end_size'     => 1,
                        'mid_size'     => 2,
                        'prev_text'    => sprintf( '<i></i> %1$s', __( 'PREV', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s <i></i>', __( 'NEXT', 'text-domain' ) ),
                    ) );
                ?>
                <?php wp_reset_postdata();
                endif;  ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

