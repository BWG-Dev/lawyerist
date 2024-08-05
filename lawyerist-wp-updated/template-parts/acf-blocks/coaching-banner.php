<?php 

    $featured_image = get_field( 'featured_image' );
    $ceo_name = get_field( 'ceo_name' );
    $ceo_label = get_field( 'ceo_label' );
    $pin_text = get_field( 'pin_text' );
    $header = get_field( 'header' );
    $description = get_field( 'description' );
    $sub_text = get_field( 'sub_text' );
    $button_text = get_field( 'button_text' );
    $button_link = get_field( 'button_link' );
?>

<section class="start-content">
    <div id="review-banner">
        <div class="review-banner-container">
            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->

            <!-- start - #review-banner-image-mobile -->
            <div class="banner-image-container">
                <img class="banner-image" src="<?php if( !empty( $featured_image['url'] ) ): echo esc_url( $featured_image['url'] ); endif; ?>"  alt="<?php if( !empty( $featured_image['alt'] ) ): echo esc_url( $featured_image['alt'] ); endif; ?>"/>
                <div class="member-details">
                    <p class="name"><?php echo $ceo_name; ?></p>
                    <p><?php echo $ceo_label; ?></p>
                </div>
            </div>
            <!-- end - #review-banner-image-mobile -->

            <!-- start - #review-banner-content -->
            <div id="review-banner-content">

                <div class="banner-pin">
                    <svg id="pin" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 137.21 196.74" fill="#FF7062"><path d="M101.22,1.54a68.6,68.6,0,0,1,68.6,68.61c0,37.89-68.6,128.14-68.6,128.14S32.61,108,32.61,70.15A68.61,68.61,0,0,1,101.22,1.54Zm0,98.38A29.77,29.77,0,1,0,71.45,70.15,29.77,29.77,0,0,0,101.22,99.92Z" transform="translate(-32.61 -1.54)"/></svg>
                    <p class="pin-text"><?php echo $pin_text; ?></p>

                    <div class="pin-path-container">
                        <svg id="pin-path" xmlns="http://www.w3.org/2000/svg" width="323.782" height="630.527" viewBox="0 0 323.782 630.527">
                            <g id="coaching-dotten-line-1" transform="translate(-849.218 -730.497)">
                                <path id="Path_859" data-name="Path 859" d="M-5026.926,685.926s16.131,133.345,80.158,295.086,203.592,288.6,203.592,288.6" transform="translate(5877.137 44.691)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7"/>
                                <g id="Group_2477" data-name="Group 2477" transform="translate(0 9.024)">
                                <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                    <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                    <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>

                <div class="banner-responsive">

                <div class="res-title">

                    <h1 class="title"><?php echo $header; ?></h1>

                    <p class="m-btm"><?php echo $sub_text; ?></p>
                    <p class="m-btm"><?php echo $description; ?></p>
                    <a href="<?php echo $button_link; ?>">
                        <div class="orange-btn">
                            <div style="text-align:center;">
                                <span><?php echo $button_text; ?></span>
                            </div>
                        </div>
                    </a>
                </div>

                </div>

                <div class="banner-cta-container align-right">

                    <div class="desktop-align">

                        <p class="txt-orange question">HOW CAN WE HELP?</p>

                        <div class="banner-card-wrapper">

                        <?php if (have_rows('block_options')): ?>
                            <?php while (have_rows('block_options')): the_row();
                                $box_one_icon = get_sub_field('box_one_icon');
                                $box_one_text = get_sub_field('box_one_text');
                                $box_one_link = get_sub_field('box_one_link');

                                $box_two_icon = get_sub_field('box_two_icon');
                                $box_two_text = get_sub_field('box_two_text');
                                $box_two_link = get_sub_field('box_two_link');

                                $box_three_icon = get_sub_field('box_three_icon');
                                $box_three_text = get_sub_field('box_three_text');
                                $box_three_link = get_sub_field('box_three_link');
                                
                                ?>

                            <a class="c1 cta" href="#<?php echo $box_one_link; ?>" title="<?php echo $box_one_text; ?>">
                                <div class="svg-wrap">
                                    <img src="<?php if( !empty( $box_one_icon['url'] ) ): echo esc_url( $box_one_icon['url'] ); endif; ?>" alt="<?php if( !empty( $box_one_icon['alt'] ) ): echo esc_url( $box_one_icon['alt'] ); endif; ?>" />
                                </div>

                                <div class="card-title ct-01">
                                    <p class="title"><?php echo $box_one_text; ?></p>
                                </div>
                            </a>

                            <a class="c1 cta" href="#<?php echo $box_two_link; ?>" title="<?php echo $box_two_text; ?>">
                                <div class="svg-wrap">
                                    <img src="<?php if( !empty( $box_two_icon['url'] ) ): echo esc_url( $box_two_icon['url'] ); endif; ?>" alt="<?php if( !empty( $box_two_icon['alt'] ) ): echo esc_url( $box_two_icon['alt'] ); endif; ?>" />
                                </div>

                                <div class="card-title ct-02">
                                    <p class="title"><?php echo $box_two_text; ?></p>
                                </div>
                            </a>

                            <a class="c1 cta" href="#<?php echo $box_three_link; ?>" title="<?php echo $box_three_text; ?>">
                                <div class="svg-wrap">
                                    <img src="<?php if( !empty( $box_three_icon['url'] ) ): echo esc_url( $box_three_icon['url'] ); endif; ?>" alt="<?php if( !empty( $box_three_icon['alt'] ) ): echo esc_url( $box_three_icon['alt'] ); endif; ?>" />
                                </div>

                                <div class="card-title ct-03">
                                    <p class="title"><?php echo $box_three_text; ?></p>
                                </div>
                            </a>

                            <?php endwhile; ?>
                        <?php endif; ?>

                        </div>
                        
                    </div>

                </div>
                
            </div>
            <!-- end - #review-banner-content -->
        </div>
    </div>
</section>