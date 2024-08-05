
<?php
    $header = get_field('heading');

    $col_one_image = get_field('col_one_image');
    $col_one_description = get_field('col_one_description');

    $col_two_image = get_field('col_two_image');
    $col_two_description = get_field('col_two_description');

    $col_three_image = get_field('col_three_image');
    $col_three_description = get_field('col_three_description');

    $connect_image = get_field('connect_image');
    $connect_description = get_field('connect_description');

?>

<div class="working-with-lawyerist">
    <div class="container">
        <h2>Working with Lawyerist</h2>
        <div class="row">
            <div class="col-1">
                <div class="content">
                    <?php if( !empty( $col_one_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($col_one_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($col_one_image['alt'])); ?>" />
                    <?php endif; ?>
                    <p><?php echo $col_one_description; ?></p>
                </div>
            </div>
            <div class="col-1">
                <div class="content">
                    <?php if( !empty( $col_two_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($col_two_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($col_two_image['alt'])); ?>" />
                    <?php endif; ?>
                    <p><?php echo $col_two_description; ?></p>
                </div>
            </div>
            <div class="col-1">
                <div class="content">
                    <?php if( !empty( $col_three_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($col_three_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($col_three_image['alt'])); ?>" />
                    <?php endif; ?>
                    <p><?php echo $col_three_description; ?></p>
                </div>
            </div>
        </div>
        
        <div class="connect">
            <?php if( !empty( $connect_image ) ): ?>
                <img src="<?php echo do_shortcode(esc_url($connect_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($connect_image['alt'])); ?>" />
            <?php endif; ?>
            <p class="text"><?php echo $connect_description; ?></p>
        </div>
    </div>
</div>