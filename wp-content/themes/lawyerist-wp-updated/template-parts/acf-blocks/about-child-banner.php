<?php
    $member_image = get_field('member_image');
    $full_name = get_field('full_name');
    $labels = get_field('labels');
    $text = get_field('text');
?>

<!-- Section 1 -->
<div id="" class="about-child-banner">
    <div class="container">
        <div class="col-1">
            <div class="featured-image">
                <?php if( !empty( $member_image ) ): ?>
                    <img src="<?php echo do_shortcode(esc_url($member_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($member_image['alt'])); ?>" />
                <?php endif; ?>
            </div>
        </div>
        <div class="col-2">
            <div class="details">
                <h1><?php echo $full_name; ?></h1>
                <?php echo $labels; ?>
                <div class="quote">
                    <?php echo $text; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End section 1 -->