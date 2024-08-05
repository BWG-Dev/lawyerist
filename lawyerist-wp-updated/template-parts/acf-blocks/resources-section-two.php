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
        <div class="review_content_section count-02">
            <div class="review_content_column_width">
                <p class="count"><?php echo $count; ?></p>
                <h3><?php echo $title; ?></h3>

                <p class="description"><?php echo $description; ?></p>

            </div>
            <div class="review_content_column_width">
                <div class="visual-media">

                    <?php if( !empty( $featured_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                    <?php endif; ?>

                    <div class="pin-path-wrapper">
                        <svg id="pin-path-3" xmlns="http://www.w3.org/2000/svg" width="679.859" height="2275.615" viewBox="0 0 679.859 2275.615">
                            <g id="resources-landing-dotted-line-3" transform="translate(-829.141 -2368.385)">
                                <path id="Path_2521" data-name="Path 2521" d="M-4911.965,283.205s468.277,785.909,515.953,1016.594,129.479,855.3,129.479,1205.757" transform="translate(5741.965 2085.691)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7"/>
                                <g id="Group_2328" data-name="Group 2328" transform="translate(336 3292)">
                                    <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                    <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                        <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                        <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <svg id="pin-path-3" xmlns="http://www.w3.org/2000/svg" width="679.859" height="2275.615" viewBox="0 0 679.859 2275.615">
                            <g id="resources-landing-dotted-line-3" transform="translate(-829.141 -2368.385)">
                                <path id="Path_2521" data-name="Path 2521" d="M-4911.965,283.205s468.277,785.909,515.953,1016.594,129.479,855.3,129.479,1205.757" transform="translate(5741.965 2085.691)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7"/>
                                <g id="Group_2328" data-name="Group 2328" transform="translate(336 3292)">
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