<?php $anchor = get_field('anchor'); ?>

<div id="<?php echo $anchor; ?>" class="full-width-review-slider position-r">
    <div class="container">
        <div class="heading">
            <h2>Don’t Just Take our Word for It…</h2>
            <p>Hear it from members of Lawyerist Lab, our comprehensive coaching program:</p>
        </div>
        <div class="review-inner-slider review-01">
            <div>
                <?php if( have_rows('slide_one') ): ?>
                    <?php while( have_rows('slide_one') ): the_row(); 
                        $avatar =    get_sub_field('avatar');
                        $name =    get_sub_field('name');
                        $label =    get_sub_field('label');
                        $review_bold =    get_sub_field('review_bold');
                        $review_sub =    get_sub_field('review_sub');
                        $link_text =    get_sub_field('link_text');
                        $link_url =    get_sub_field('link_url');
                    ?>
                    <div class="user">
                        <div class="avatar" style="background-image:url('<?php if( !empty( $avatar['url'] ) ): echo $avatar['url']; endif; ?>');"></div>
                        <div class="user-details">
                            <p class="username"><?php echo $name; ?></p>
                            <p class="user-label"><?php echo $label; ?></p>
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
                    <?php echo $review_bold; ?>
                    <p><?php echo $review_sub; ?></p>
                    <a href="<?php echo $link_url; ?>" class="link"><?php echo $link_text; ?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div>
            <?php if( have_rows('slide_two') ): ?>
                <?php while( have_rows('slide_two') ): the_row(); 
                    $avatar =    get_sub_field('avatar');
                    $name =    get_sub_field('name');
                    $label =    get_sub_field('label');
                    $review_bold =    get_sub_field('review_bold');
                    $review_sub =    get_sub_field('review_sub');
                    $link_text =    get_sub_field('link_text');
                    $link_url =    get_sub_field('link_url');
                ?>
                <div class="user">
                    <div class="avatar" style="background-image:url('/wp-content/uploads/2020/09/review-jan.jpg');"></div>
                    <div class="user-details">
                        <p class="username"><?php echo $name; ?></p>
                        <p class="user-label"><?php echo $label; ?></p>
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
                <?php echo $review_bold; ?>
                <p><?php echo $review_sub; ?></p>
                <a href="<?php echo $link_url; ?>" class="link"><?php echo $link_text; ?></a>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <div>
            <?php if( have_rows('slide_three') ): ?>
                <?php while( have_rows('slide_three') ): the_row(); 
                    $avatar =    get_sub_field('avatar');
                    $name =    get_sub_field('name');
                    $label =    get_sub_field('label');
                    $review_bold =    get_sub_field('review_bold');
                    $review_sub =    get_sub_field('review_sub');
                    $link_text =    get_sub_field('link_text');
                    $link_url =    get_sub_field('link_url');
                ?>
                <div class="user">
                    <div class="avatar" style="background-image:url('<?php if( !empty( $avatar['url'] ) ): echo $avatar['url']; endif; ?>');"></div>
                    <div class="user-details">
                        <p class="username"><?php echo $name; ?></p>
                        <p class="user-label"><?php echo $label; ?></p>
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
                <?php echo $review_bold; ?>
                <p><?php echo $review_sub; ?></p>
                <a href="<?php echo $link_url; ?>" class="link"><?php echo $link_text; ?></a>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="fixed-swirl-03">
        <img src="/wp-content/uploads/2022/01/topographic-map-graphic.svg"/>
    </div>
</div>

<script defer>
jQuery(document).ready(function() {
    jQuery('.review-01').slick({
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