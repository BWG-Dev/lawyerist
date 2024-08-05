<?php
    $featured_image = get_field('featured_image');
    $title = get_field('title');
    $description_one = get_field('description_one');
    $bold = get_field('bold');
    $description_two = get_field('description_two');

    $speakers_name = get_field('speakers_name');
    $speakers_label = get_field('speakers_label');
?>

<div class="banner">
    <div class="container">
        <div class="col-1">
            <?php if( !empty( $featured_image ) ): ?>
                <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
            <?php endif; ?>

            <div class="label-float">
                <div class="name"><?php echo $speakers_name; ?></div>
                <div class="label"><?php echo $speakers_label; ?></div>
            </div>
        </div>
        <div class="col-1">
            <h1><?php echo $title; ?></h1>
            <p class="description"><?php echo $description_one; ?></p>
            <p class="bold"><?php echo $bold; ?></p>
            <p class="description"><?php echo $description_two; ?></p>
        </div>
    </div>
</div>