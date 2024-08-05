<?php
    $anchor = get_field('anchor');
    $count = get_field('count');
    $title = get_field('title');
    $description = get_field('description');
    $link = get_field('link');
    $link_text = get_field('link_text');
    $featured_image = get_field('featured_image');
?>

<section class="start-content" id="<?php echo $anchor; ?>">
    <div id="review_content"><!-- start #reviewcontent -->
        <div class="review_content_section count-01">
            <div class="review_content_column_width">
                <p class="count"><?php echo $count; ?></p>
                <h3><?php echo $title; ?></h3>

                <p class="description"><?php echo $description; ?></p>

                <div class="cta-wrapper">
                    <a href="<?php echo $link; ?>">
                        <div class="button">
                            <span><?php echo $link_text; ?></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="review_content_column_width">
                <div class="visual-media">

                    <?php if( !empty( $featured_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div> 
    </div> 
</section>