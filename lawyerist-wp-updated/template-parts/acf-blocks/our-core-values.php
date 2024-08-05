
<?php
    $header = get_field('header');

    $box_one_image = get_field('box_one_image');
    $box_one_title = get_field('box_one_title');
    $box_one_description = get_field('box_one_description');

    $box_two_image = get_field('box_two_image');
    $box_two_title = get_field('box_two_title');
    $box_two_description = get_field('box_two_description');

    $box_three_image = get_field('box_three_image');
    $box_three_title = get_field('box_three_title');
    $box_three_description = get_field('box_three_description');

    $box_four_image = get_field('box_four_image');
    $box_four_title = get_field('box_four_title');
    $box_four_description = get_field('box_four_description');

    $box_five_image = get_field('box_five_image');
    $box_five_title = get_field('box_five_title');
    $box_five_description = get_field('box_five_description');
?>

<div class="our-core-values">
    <div class="container">
        <h2><?php echo $header; ?></h2>
        <div class="divider"></div>
        <div class="boxay">
            <div class="box">
                <?php if( !empty( $box_one_image ) ): ?>
                    <img src="<?php echo do_shortcode(esc_url($box_one_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($box_one_image['alt'])); ?>" />
                <?php endif; ?>
                <p class="title"><?php echo $box_one_title; ?></p>
                <div class="divider"></div>
                <p class="bottom"><?php echo $box_one_description; ?></p>
            </div>
            <div class="box">
                <?php if( !empty( $box_two_image ) ): ?>
                    <img class="box-two-image" src="<?php echo do_shortcode(esc_url($box_two_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($box_two_image['alt'])); ?>" />
                <?php endif; ?>
                <p class="title"><?php echo $box_two_title; ?></p>
                <div class="divider"></div>
                <p class="bottom"><?php echo $box_two_description; ?></p>
            </div>
        </div>
        <div class="boxay">
            <div class="box">
                <?php if( !empty( $box_three_image ) ): ?>
                    <img src="<?php echo do_shortcode(esc_url($box_three_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($box_three_image['alt'])); ?>" />
                <?php endif; ?>
                <p class="title"><?php echo $box_three_title; ?></p>
                <div class="divider"></div>
                <p class="bottom"><?php echo $box_three_description; ?></p>
            </div>
            <div class="box">
                <?php if( !empty( $box_four_image ) ): ?>
                    <img src="<?php echo do_shortcode(esc_url($box_four_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($box_four_image['alt'])); ?>" />
                <?php endif; ?>
                <p class="title"><?php echo $box_four_title; ?></p>
                <div class="divider"></div>
                <p class="bottom"><?php echo $box_four_description; ?></p>
            </div>

            <?php if( !empty( $box_five_image ) ): ?>
            <div class="box">
                    <img src="<?php echo do_shortcode(esc_url($box_five_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($box_five_image['alt'])); ?>" />
                <p class="title"><?php echo $box_five_title; ?></p>
                <div class="divider"></div>
                <p class="bottom"><?php echo $box_five_description; ?></p>
            </div>
            <div class="box" style="background:transparent;height:1px;border:2px solid transparent;"></div>
          <?php endif; ?>
        </div>
    </div>
</div>
