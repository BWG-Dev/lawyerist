<?php
/**
 * Template Name: Lab Platinum PPC
 */

// ACF Fields
$form_success = get_field('form_success');
$r1_left = get_field('row1_left_column');
$r1_right_banner = get_field('row1_right_column_banner');
$whats_included_block = get_field('row2_whats_included_block');
$review_block = get_field('row2_review_block');
$whos_it_for_block = get_field('row2_whos_it_for_block');
$benefits_block = get_field('row2_benefits_block');
$footer_left = get_field('footer_left_column');
$footer_right_banner = get_field('footer_right_column_banner');

get_header(); ?>

<?php if ($form_success == true) { // use form success layout ?>
    <main class="ppc-form-success">

        <section class="ppc-body">
        
            <div id="row-1" class="column-50-50">
                <?php if( $r1_left ) : ?>
                <div class="column-1">
                    <a class="logo-wrapper" href="<?php echo home_url(); ?>" title="Visit Lawyerist Homepage">
                        <img data-skip-lazy="" width="282" height="65" src="/wp-content/uploads/2020/11/lawyerist-logo-tagline.svg" class="custom-logo skip-lazy" alt="Lawyerist">
                    </a>
                    <div class="wrapper">
                        <h1><?php esc_html_e( $r1_left['form_cta_text'] ); ?></h1>  
                        <p class="info-text"><?php echo ( $r1_left['info_copy'] ); ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if( $r1_right_banner ) : ?>
                <div class="column-2">
                    <img src="<?php echo $r1_right_banner['url'] ; ?>" alt="<?php esc_html_e( $r1_right_banner['alt'] ); ?>">
                </div>
                <?php endif; ?>
            </div>
        
        </section>
        <section class="ppc-footer">
            <div class="logo-wrapper">
                <div class="wrapper">
                    <div class="title-box">
                        <div style="overflow:hidden;height:100%;background: #fff;display: flex;align-items: center;padding-right: 13px;padding-left: 12px;">
                            <div id="title">
                                <a href="<?php echo home_url(); ?>" title="Visit Lawyerist Homepage">
                                    <img data-skip-lazy="" width="282" height="65" src="/wp-content/uploads/2020/11/lawyerist-logo-tagline.svg" class="custom-logo skip-lazy" alt="Lawyerist">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php } else { // use main PPC layout ?>
    <main>
        <section class="ppc-body">
            
                <div id="row-1" class="column-50-50">
                    <?php if( $r1_left ) : ?>
                    <div class="column-1">
                        <a class="logo-wrapper" href="<?php echo home_url(); ?>" title="Visit Lawyerist Homepage">
                            <img data-skip-lazy="" width="282" height="65" src="/wp-content/uploads/2020/11/lawyerist-logo-tagline.svg" class="custom-logo skip-lazy" alt="Lawyerist">
                        </a>
                        <div class="wrapper">
                            <h1><?php esc_html_e( $r1_left['form_cta_text'] ); ?></h1> 
                            <p class="intro-text"><?php esc_html_e( $r1_left['intro_copy'] ); ?></p>

                            <?php echo do_shortcode( $r1_left['form_embed'] ); ?>
                            <p class="info-text"><?php esc_html_e( $r1_left['info_copy'] ); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if( $r1_right_banner ) : ?>
                    <div class="column-2">
                        <img src="<?php echo $r1_right_banner['url'] ; ?>" alt="<?php esc_html_e( $r1_right_banner['alt'] ); ?>">
                    </div>
                    <?php endif; ?>
                </div>

                <div id="row-2">
                    <div class="wrapper">

                        <div class="featured-block column-50-50">
                            <div class="column-1">
                                <?php echo $whats_included_block['featured_copy']; ?>
                                <p class="pricing"><strong><?php echo $r1_left['pricing_copy']; ?></strong></p>
                                <a href="#apply-for-lab-platinum" class="apply-btn">Get Started Today</a>
                            </div>
                            <div class="column-2">
                                <div class="featured-container">
                                    <img src="<?php echo $whats_included_block['featured_image']['url']; ?>" alt="<?php esc_html_e( $whats_included_block['featured_image']['alt'] ); ?>">
                                    <div class="featured-info">
                                        <p class="name"><?php echo $whats_included_block['featured_name']; ?></p>
                                        <p class="title"><?php echo $whats_included_block['featured_title'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="review-block column-50-50">
                            <div class="column-1">
                                <div class="user">
                                    <div class="avatar" style="background-image:url('<?php echo $review_block['reviewer_image']['url']; ?>');"></div>
                                    <div class="user-details">
                                        <p class="username"><?php echo $review_block['reviewer_name']; ?></p>
                                        <p class="user-label"><?php echo $review_block['reviewer_title']; ?></p>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="lawyerist-star-rating">
                                    <div class="lawyerist-star-rating-wrapper">
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                        <div class="icon rating-star"></div>
                                    </div>
                                </div>
                                <h2><span class="pink">“</span><?php echo $review_block['review']; ?><span class="pink">”</span></h2>
                            </div>
                        </div>

                        <div class="featured-block column-50-50">
                            <div class="column-1">
                                <div class="featured-container">
                                <img src="<?php echo $whos_it_for_block['whos_featured_image']['url']; ?>" alt="<?php esc_html_e( $whos_it_for_block['whos_featured_image']['alt'] ); ?>">
                                    <div class="featured-info">
                                        <p class="name"><?php echo $whos_it_for_block['featured_name']; ?></p>
                                        <p class="title"><?php echo $whos_it_for_block['featured_title'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="column-2">
                                <?php echo $whos_it_for_block['featured_copy']; ?>
                                <a href="#apply-for-lab-platinum" class="apply-btn">Get Started Today</a>
                            </div>
                        </div>

                        <div class="featured-block column-50-50">
                            <div class="column-1">
                                <?php echo $benefits_block['featured_copy']; ?>
                                <a href="#apply-for-lab-platinum" class="apply-btn">Get Started Today</a>
                            </div>
                            <div class="column-2">
                                <div class="featured-container">
                                    <img src="<?php echo $benefits_block['featured_image']['url']; ?>" alt="<?php esc_html_e( $benefits_block['featured_image']['alt'] ); ?>">
                                    <div class="featured-info">
                                        <p class="name"><?php echo $benefits_block['featured_name']; ?></p>
                                        <p class="title"><?php echo $benefits_block['featured_title'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            
        </section>

        <section class="ppc-footer">
            
            <div class="column-50-50">
                
                <?php if( $footer_left ) : ?>
                <div class="column-1">
                    <div class="wrapper">
                        <span id="apply-for-lab-platinum"></span>
                        <h2><?php echo( $footer_left['form_cta_text'] ); ?></h2>  
                        <?php echo do_shortcode( $footer_left['form_embed'] ); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if( $footer_right_banner ) : ?>
                <div class="column-2">
                    <img src="<?php echo $footer_right_banner['url'] ; ?>" alt="<?php esc_html_e( $footer_right_banner['alt'] ); ?>">
                </div>
                <?php endif; ?>
                
            </div>
            
            <div class="logo-wrapper">
                <div class="wrapper">
                    <div class="title-box">
                        <div style="overflow:hidden;height:100%;background: #fff;display: flex;align-items: center;padding-right: 13px;padding-left: 12px;">
                            <div id="title">
                                <a href="<?php echo home_url(); ?>" title="Visit Lawyerist Homepage">
                                    <img data-skip-lazy="" width="282" height="65" src="/wp-content/uploads/2020/11/lawyerist-logo-tagline.svg" class="custom-logo skip-lazy" alt="Lawyerist">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php } ?>

<?php get_footer(); ?>