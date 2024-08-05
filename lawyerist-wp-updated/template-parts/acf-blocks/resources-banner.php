<?php
    $title = get_field('title');
    $sub_title = get_field('sub_title');
    $description = get_field('description');
    $featured_image = get_field('featured_image');
    $help_text = get_field('help_text');
    $pin_title = get_field('pin_title');
?>

<section class="start-content">
    <div id="review-banner">

        <div class="review-banner-container">

            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->

            <!-- start - #review-banner-image-mobile -->
            <div class="banner-image-container">
                <div class="featured-image">
                    <?php if( !empty( $featured_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <!-- end - #review-banner-image-mobile -->

            <!-- start - #review-banner-content -->
            <div id="review-banner-content">

                <div class="banner-pin">
                    <svg id="pin" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 137.21 196.74" fill="#FF7062"><path d="M101.22,1.54a68.6,68.6,0,0,1,68.6,68.61c0,37.89-68.6,128.14-68.6,128.14S32.61,108,32.61,70.15A68.61,68.61,0,0,1,101.22,1.54Zm0,98.38A29.77,29.77,0,1,0,71.45,70.15,29.77,29.77,0,0,0,101.22,99.92Z" transform="translate(-32.61 -1.54)"/></svg>
                    <p class="pin-text"><?php echo $pin_title; ?></p>

                    <div class="pin-path-container">
                        <svg id="pin-path" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 362.862 876.67">
                            <g id="product-landing-dotted-line-graphic-1" transform="translate(-810.138 -475.33)">
                                <path id="Path_859" data-name="Path 859" d="M-5065.85,430.669s-6.318,209.48,74.35,419.216,248.324,419.726,248.324,419.726" transform="translate(5877.137 44.691)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7"/>
                                <g id="Group_490" data-name="Group 490">
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

                        <h1 class="title"><?php echo $title; ?></h1>

                        <p class="m-sub-text"><?php echo $sub_title; ?></p>

                        <p class="m-description"><?php echo $description; ?></p>

                    </div>

                </div>

                <div class="banner-cta-container align-right">

                    <div class="desktop-align">

                        <p class="txt-orange question"><?php echo $help_text; ?></p>

                        <div class="banner-card-wrapper">


                        <?php if( have_rows('boxes') ): ?>
                            <?php while( have_rows('boxes') ): the_row(); 
                                $icon = get_sub_field('icon');
                                $title = get_sub_field('title');
                                $link = get_sub_field('link');
                                ?>

                            <a class="c1 cta" href="<?php echo $link; ?>" title="<?php echo $title; ?>">
                                <div class="svg-wrap">
                                    <?php if( !empty( $icon ) ): ?>
                                        <img src="<?php echo do_shortcode(esc_url($icon['url'])); ?>" alt="<?php echo $title; ?>" />
                                    <?php endif; ?>
                                </div>

                                <div class="card-title ct-01">
                                    <p class="title"><?php echo $title; ?></p>
                                </div>
                            </a>

                            <?php endwhile; ?>
                        <?php endif; ?>


                            <a class="c1 cta" style="visibility: hidden;">
                                <div class="card-title ct-01">
                                    <p class="title"></p>
                                </div>
                            </a>

                        </div>
                        
                    </div>

                </div>
                
            </div>
            <!-- end - #review-banner-content -->

        </div>

    </div>
</section>