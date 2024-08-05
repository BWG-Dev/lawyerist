<?php
    $text = get_field('text');
    $icon_image = get_field('icon_image');
    $link_text = get_field('link_text');
    $link_url = get_field('link_url');
?>

<section class="start-content">
    <div class="container">
        <div class="icon-title-light-btn">
            <div class="divider"></div>
            <p class="text"><?php echo $text; ?></p>

            <div class="review_content_link_tabs">
                <div class="content_tab">
                    <div class="icon">
                        <img id="seo" src="<?php echo do_shortcode(esc_url($icon_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($icon_image['alt'])); ?>" />
                    </div>
                    <div class="tab-text">
                        <a href="<?php echo $link_url; ?>" title="SEO &amp; Marketing"><?php echo $link_text; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
