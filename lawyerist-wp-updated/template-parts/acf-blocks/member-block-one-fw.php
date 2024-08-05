<?php
    $heading = get_field('heading');
    $description = get_field('description');
    $slider_username = get_field('slider_username');
    $slider_reviewer = get_field('slider_reviewer');
    $slider_quote = get_field('slider_quote');
    $slider_two_reviewer = get_field('slider_two_reviewer');
    $slider_two_description = get_field('slider_two_description');
    $large_pin_image_url  = get_field('large_pin_image_url');
    $small_pin_image_url  = get_field('small_pin_image_url');

    $large_pin_quote = get_field('large_pin_quote');
    $small_pin_quote = get_field('small_pin_quote');
?>

<!-- Section 1 -->
<div id="" class="member-block-one-fw">
    <div class="container">
        <div class="col-1">
            <h2 class="heading"><?php echo $heading; ?></h2>
            <p class="description"><?php echo $description; ?></p>

            <div class="review-inner-slider coin-01x">
                <div>
                    <div class="user">
                        <div class="user-details">
                            <p class="username">WHAT <span class="txt-orange"><?php echo $slider_reviewer; ?></span> HAS TO SAY ABOUT <span class="txt-orange"><?php echo $slider_username; ?></span>:</p>
                        </div>
                    </div>
                    <?php echo $slider_quote; ?>
                </div>
                <div>
                    <div class="user">
                        <div class="user-details">
                            <p class="username">WHAT <span class="txt-orange"><?php echo $slider_two_reviewer; ?></span> HAS TO SAY ABOUT <span class="txt-orange"><?php echo $slider_username; ?></span>:</p>
                        </div>
                    </div>
                    <?php echo $slider_two_description; ?>
                </div>
            </div>
        </div>

        <?php if( !empty( $large_pin_image_url ) ): ?>
            <style>
                .show-block {
                    display: none;
                }
                @media all and (min-width: 1024px) {
                    .show-block {
                        display: block;
                    }
                }
            </style>
        <?php endif; ?>
        <div class="col-2 show-block">
            <div class="map">
                <div class="ab-pin">
                    <style>
                        .col-2 .large-dot:after {
                            background: url('<?php echo $large_pin_image_url; ?>');
                        }
                        .col-2 .small-dot:after {
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
    </div>
</div>
<!-- End section 1 -->