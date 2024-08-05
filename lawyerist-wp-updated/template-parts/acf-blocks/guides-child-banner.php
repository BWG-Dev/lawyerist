<?php
    $chapter = get_field('chapter');
    $title = get_field('title');
    $category = get_field('category');
    $duration = get_field('duration');
    $featured_image = get_field('featured_image');
    $color = get_field('guide_color');

    $pageid = get_the_ID();
    $parentid = wp_get_post_parent_id($pageid);
    $downloadid = $parentid;
    $download_btn = get_field('guide_cta_link', $downloadid);
?>

<section class="start-content">
    <div id="review-banner">
        <div class="review-banner-container">
            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->
        </div>

        <div class="digital-read-banner white-bg">
            <div class="inner-wrapper">
                <div class="col-1">
                    <div class="content">
                        <p class="chapter"><?php echo $chapter; ?></p>
                        <h1 class="header"><?php echo $title; ?></h1>
                        <p class="label" style="background: <?php echo $color; ?>;"><?php echo $category; ?></p>
                        <p class="duration"><?php echo $duration; ?></p>
                    </div>
                </div>

                <div class="col-2">
                    <div class="featured-image">
                        <img class="tablet-image" src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
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
                                    <p>Already an Insider? <a href="#">Log in to your account</a> to receive your e-book!</p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>