<?php
    $anchor = get_field('anchor');
    $header = get_field('header');
?>
<section class="start-content" id="<?php echo $anchor; ?>">
    <div id="review_content" class="box-holder"><!-- start #reviewcontent -->
        <div class="box-podcasts">
            <div class="box-podcasts_inner">
                <div class="heading">
                    <p class="pink-h" syle="margin-bottom: 0px !important;"><?php echo $header; ?></p>
                </div>
                <!-- Portfolio Gallery Grid -->

                <?php 
                    $podcast_episodes = new WP_Query([
                        'post_type'   => 'podcasts',
                        'posts_per_page'  => 3,
                    ]);
                ?>

                <?php if ( $podcast_episodes->have_posts() ) : ?>
                    <div id="all-articles">
                        <div class="article-cards">
                            <?php
                            while ( $podcast_episodes->have_posts() ) : $podcast_episodes->the_post();
                                lawyerist_get_post_card();
                            endwhile;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                                    
            </div>
        </div> 
    </div> 
</section>