<?php
    $anchor = get_field('anchor');
    $header = get_field('header');
?>

<section class="start-content" id="<?php echo $anchor; ?>">
    <div id="review_content" class="box-holder"><!-- start #reviewcontent -->
        <div class="box-posts">
            <div class="box-posts_inner">
                <div class="heading">
                    <p class="pink-h" syle="margin-bottom: 0px !important;"><?php echo $header; ?></p>
                </div>
                <?php 
                    $news_articles = new WP_Query([
                        'category_name'   => 'news-articles',
                        'posts_per_page'  => 3,
                    ]);
                ?>

                <?php if ( $news_articles->have_posts() ) : ?>
                    <div id="all-articles">
                        <div class="article-cards">
                            <?php
                            while ( $news_articles->have_posts() ) : $news_articles->the_post();
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
