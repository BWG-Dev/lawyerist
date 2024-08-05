<?php
    $anchor = get_field('anchor');
    $header = get_field('header');
?>

<section class="start-content" id="<?php echo $anchor; ?>">
    <div id="review_content" class="box-holder"><!-- start #reviewcontent -->
        <div class="box-guides">
            <div class="box-guides_inner">
                <!-- Portfolio Gallery Grid -->


                <?php if( have_rows('box') ): ?>

                    <?php while( have_rows('box') ): the_row(); 
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $featured_image = get_sub_field('image');
                        $link = get_sub_field('link');
                        ?>

                        <div class="column">
                            <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
                                <div class="content">
                                    <p class="title"><?php echo $title; ?></p>

                                    <?php if( !empty( $featured_image ) ): ?>
                                        <img class="chapter-img" src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                                    <?php endif; ?>
                                    
                                    <p class="description"><?php echo $description; ?></p>

                                    <div class="cta-wrapper">
                                        <a href="<?php echo $link; ?>">
                                            <div class="button">
                                                <span>View Guide</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>



            </div>
        </div> 
    </div> 
</section>