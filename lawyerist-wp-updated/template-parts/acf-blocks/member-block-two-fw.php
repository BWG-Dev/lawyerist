<?php

    $col_one_image = get_field('col_one_image');
    $col_one_title = get_field('col_one_title');
    $col_one_description = get_field('col_one_description');

    $col_two_image = get_field('col_two_image');
    $col_two_title = get_field('col_two_title');
    $col_two_description = get_field('col_two_description');

    $large_pin_image_url  = get_field('large_pin_image_url');
    $small_pin_image_url  = get_field('small_pin_image_url');

    $large_pin_quote = get_field('large_pin_quote');
    $small_pin_quote = get_field('small_pin_quote');
?>

<!-- Section 1 -->
<div id="" class="member-block-two-fw">
    <div class="container">

        <?php if( !empty( $large_pin_image_url ) ): ?>
            <style>
                .xol {
                    display: none;
                }
                @media all and (min-width: 1024px) {
                    .xol {
                        display: block;
                    }
                }
            </style>
        <?php endif; ?>

        <div class="xol">
            <div class="map">
                <div class="ab-pin">
                    <style>
                        .xol .large-dot:after {
                            background: url('<?php echo $large_pin_image_url; ?>');
                        }
                        .xol .small-dot:after {
                            background: url('<?php echo $small_pin_image_url; ?>');
                        }
                    </style>

                    <?php if( !empty( $large_pin_image_url ) ): ?>
                        <div class="large-dot">
                            <div class="large-caption"><?php echo $large_pin_quote; ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if( !empty( $large_pin_image_url ) ): ?>
                        <div class="small-dot">
                            <div class="small-caption"><?php echo $small_pin_quote; ?></div>
                        </div>
                    <?php endif; ?>
                    <div class="pin"></div>
                </div>
            </div>
        </div>

        <div class="xolx">
            <div class="col-1">
                <div class="details">
                    <?php if( !empty( $col_one_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($col_one_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($col_one_image['alt'])); ?>" />
                    <?php endif; ?>
                    <p class="heading"><?php echo $col_one_title; ?></p>
                    <?php echo $col_one_description; ?>
                </div>
            </div>
            <div class="col-2">
                <div class="details">
                    <?php if( !empty( $col_two_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($col_two_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($col_two_image['alt'])); ?>" />
                    <?php endif; ?>
                    <p class="heading"><?php echo $col_two_title; ?></p>
                    <?php echo $col_two_description; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End section 1 -->