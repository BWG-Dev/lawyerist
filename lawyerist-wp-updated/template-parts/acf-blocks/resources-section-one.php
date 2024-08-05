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

                    <div class="pin-path-container">
                        <svg id="pin-path-2" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 354.933 365.404">
                            <g id="product-landing-dotted-line-graphic-2" transform="translate(-736 -1665.596)">
                                <path id="Path_862" data-name="Path 862" d="M-4562,1665.956s-42.3,109.744-117.233,190.549-193.331,136.674-193.331,136.674" transform="translate(5652)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                                <g id="map-dot-icon" transform="translate(-370 679)">
                                <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                    <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                    <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</section>