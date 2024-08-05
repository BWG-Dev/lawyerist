<?php  
    $background_image = get_field( 'background_image' );
    $heading = get_field( 'heading' );
    $description = get_field( 'description' );
    $guide_button = get_field( 'guide_button' );
    $featured_image = get_field( 'featured_image' );
    $download_btn = get_field('guide_cta_link', get_the_ID());

    $pin_image = get_field( 'pin_image' );
    $pin_text = get_field( 'pin_text' );
    $pin_link_text = get_field( 'pin_link_text' );
    $pin_link_url = get_field( 'pin_link_url' );
?>

<section class="start-content">
    <div id="review-banner" <?php if (!empty($background_image) ): ?>style="background-image: url('<?php echo $background_image; ?>');"<?php endif; ?>>
        <div class="review-banner-container">
            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->
        </div>

        <div class="banner-container">
            <div class="inner-wrapper">
                <div class="col-1">
                    <div class="content">
                        <?php echo $heading; ?>
                        <?php echo $description; ?>
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
                <div class="col-2">
                    <div class="featured-image">
                        <img class="img" src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                        <div class="ping">
                            <img src="<?php echo do_shortcode(esc_url($pin_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($pin_image['alt'])); ?>" />
                            <div class="learn-more">
                                <p><?php echo $pin_text; ?></p>
                                <a href="<?php echo $pin_link_url; ?>" class="link"><?php echo $pin_link_text; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>