<?php
    $anchor = get_field('anchor');
    $count = get_field('count');
    $title = get_field('title');
    $description = get_field('description');
    $featured_image = get_field('featured_image');
    $download_btn = get_field('guide_cta_link', 1436117);
?>

<section class="start-content" id="field-guide-anchor">
    <div id="review_content"><!-- start #reviewcontent -->
        <div class="visual-media" id="field-pin-holder">   
            <div class="pin-path-wrapper">
                <svg id="pin-path-2" xmlns="http://www.w3.org/2000/svg" width="573.875" height="922.327" viewBox="0 0 573.875 922.327">
                    <g id="resources-landing-dotted-line-6" transform="translate(-730.105 -5078.521)">
                        <path id="Path_2522" data-name="Path 2522" d="M-4562,1665.956s-65.283,324.718-144.174,442.226-282.8,343.711-373.332,434.3" transform="translate(5865 3412.762)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                        <g id="Group_2329" data-name="Group 2329" transform="translate(-375.895 4648.848)">
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
        <div class="review_content_section count-02 count-04" id="field-guide-block">
            <div class="review_content_column_width">
                <p class="count"><?php echo $count; ?></p>
                <h3><?php echo $title; ?></h3>
                
                <p class="description"><?php echo $description; ?></p>

                <div class="cta-wrapper">
                    <?php if ( is_user_logged_in() ) { ?>
                        <div class="form-container hs-orange-btn">
                            <div class="orange-btn o-trig">
                                <?php echo $download_btn; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-container banner-trig accordions">
                            <div class="orange-btn o-trig accordions_title">
                                <span class="cta-message">Download the Full Guide</span>
                            </div>
                            <div class="form banner-hide">
                                <?php echo do_shortcode('[gravityform id="98"]'); ?>
                                <p>Already a Subscriber? <a href="#">Log in to your account</a> to receive your e-book!</p>
                            </div>
                        </div>
                    <?php } ?>
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