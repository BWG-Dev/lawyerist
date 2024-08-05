
<div id="review_content">
<?php if (have_rows('step_one')): ?>
    <?php while (have_rows('step_one')): the_row();

        $anchor = get_sub_field('anchor');
        $step_count = get_sub_field('step_count');
        $heading = get_sub_field('heading');
        $sub_text = get_sub_field('sub_text');
        $description = get_sub_field('description');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');
        $featured_image = get_sub_field('featured_image');

        $slide_one_avatar = get_sub_field('slide_one_avatar');
        $slide_one_name = get_sub_field('slide_one_name');
        $slide_one_label = get_sub_field('slide_one_label');
        $slide_one_review = get_sub_field('slide_one_review');
        $slide_one_review_sub = get_sub_field('slide_one_review_sub');

        $slide_two_avatar = get_sub_field('slide_two_avatar');
        $slide_two_name = get_sub_field('slide_two_name');
        $slide_two_label = get_sub_field('slide_two_label');
        $slide_two_review = get_sub_field('slide_two_review');
        $slide_two_review_sub = get_sub_field('slide_two_review_sub');

        $slide_three_avatar = get_sub_field('slide_three_avatar');
        $slide_three_label = get_sub_field('slide_three_label');
        $slide_three_name = get_sub_field('slide_three_name');
        $slide_three_review = get_sub_field('slide_three_review');
        $slide_three_review_sub = get_sub_field('slide_three_review_sub');

        $featured_name = get_sub_field('featured_name');
        $featured_label = get_sub_field('featured_label');

        ?>
        <section class="start-content" id="<?php if( !empty(  $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?>" ?>
            <div class="review_content_section count-01">

                <div class="review_content_column_width">
                    <p class="count"><?php echo $step_count; ?></p>
                    <h2><?php echo $heading; ?></h2>
                    <p><?php echo $sub_text; ?></p>
                    <div>
                        <?php echo $description; ?>
                        <a href="<?php echo $button_link; ?>">
                            <div class="orange-btn">
                                <div style="text-align:center;">
                                    <span><?php echo $button_text; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="m-spacer"></div>
                </div>
                <div class="review_content_column_width">
                    <div class="visual-media">
                        <img src="<?php if( !empty( $featured_image['url'] ) ): echo esc_url( $featured_image['url'] ); endif; ?>" alt="<?php if( !empty( $featured_image['alt'] ) ): echo esc_url( $featured_image['alt'] ); endif; ?>" />
                        <div class="featured-image-details">
                            <p class="name"><?php echo $featured_name; ?></p>
                            <p class="label"><?php echo $featured_label; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            <div class="full-width-review-slider position-r">
                <div class="container">
                    <div class="review-inner-slider coin-01x">
                        <div>
                            <?php if( !empty( $slide_one_name ) ) {?>
                            <div class="user">
                                <?php if( !empty( $slide_one_avatar['url'] ) ): ?>
                                    <div class="avatar" style="background-image:url('<?php if( !empty( $slide_one_avatar['url'] ) ): echo esc_url( $slide_one_avatar['url'] ); endif; ?>');"></div>
                                <?php endif; ?>
                                <div class="user-details">
                                    <p class="username"><?php echo $slide_one_name; ?></p>
                                    <p class="user-label"><?php echo $slide_one_label; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="lawyerist-star-rating">
                                <div class="lawyerist-star-rating-wrapper">
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="lawyerist-star-rating-result" style="width: 100%">
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo $slide_one_review; ?></h2>
                            <p><?php echo $slide_one_review_sub; ?></p>
                            <?php }; ?>
                        </div>
                        <div>
                            <?php if( !empty($slide_two_name ) ) {?>
                            <div class="user">
                                <?php if( !empty( $slide_two_avatar['url'] ) ): ?>
                                    <div class="avatar" style="background-image:url('<?php if( !empty( $slide_two_avatar['url'] ) ): echo esc_url( $slide_two_avatar['url'] ); endif; ?>');"></div>
                                <?php endif; ?>
                                <div class="user-details">
                                    <p class="username"><?php echo $slide_two_name; ?></p>
                                    <p class="user-label"><?php echo $slide_two_label; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="lawyerist-star-rating">
                                <div class="lawyerist-star-rating-wrapper">
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="lawyerist-star-rating-result" style="width: 100%">
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo $slide_two_review; ?></h2>
                            <p><?php echo $slide_two_review_sub; ?></p>
                            <?php }; ?>
                        </div>
                        <div>
                            <?php if( !empty( $slide_three_name ) ) {?>
                            <div class="user">
                                <?php if( !empty( $slide_three_avatar['url'] ) ): ?>
                                    <div class="avatar" style="background-image:url('<?php if( !empty( $slide_three_avatar['url'] ) ): echo esc_url( $slide_three_avatar['url'] ); endif; ?>');"></div>
                                <?php endif; ?>
                                <div class="user-details">
                                    <p class="username"><?php echo $slide_three_name; ?></p>
                                    <p class="user-label"><?php echo $slide_three_label; ?></p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="lawyerist-star-rating">
                                <div class="lawyerist-star-rating-wrapper">
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="icon rating-star"></div>
                                    <div class="lawyerist-star-rating-result" style="width: 100%">
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo $slide_three_review; ?></h2>
                            <p><?php echo $slide_three_review_sub; ?></p>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
                <div class="fixed-swirl-01">
                    <img src="/wp-content/uploads/2022/01/topographic-map-graphic.svg"/>
                </div>
            </div>
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
        </section>
</div>

<script defer>
jQuery(document).ready(function() {
    jQuery('.coin-01x').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<div class="prev-arrow-o"><svg fill="#424b54" width="40" height="40" fill xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,996.3c272.85,0,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66,4.66,228.64,4.66,501.48,226.63,996.3,499.49,996.3Zm0-961.09c257.11,0,466.27,209.17,466.27,466.27S756.6,967.75,499.49,967.75,33.21,758.58,33.21,501.48,242.37,35.21,499.49,35.21Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="501.5 637.55 501.5 538.59 656.67 538.59 656.67 428.49 501.5 428.49 501.5 335.39 411.1 410.93 320.36 486.46 410.82 562 501.5 637.55" style="fill-rule:evenodd"/></svg></div>',
        nextArrow: '<div class="next-arrow-o"><svg fill="#424b54" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,6.66c-272.86,0-494.83,222-494.83,494.82s222,494.82,494.83,494.82,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66Zm0,961.09c-257.12,0-466.28-209.17-466.28-466.27S242.37,35.21,499.49,35.21,965.76,244.38,965.76,501.48,756.6,967.75,499.49,967.75Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="488.14 352.09 488.14 451.05 332.98 451.05 332.98 561.15 488.14 561.15 488.14 654.25 578.54 578.72 669.28 503.18 578.83 427.64 488.14 352.09" style="fill-rule:evenodd"/></svg></div>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            }]
    });
});
</script>