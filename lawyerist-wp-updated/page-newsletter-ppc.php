<?php
/**
 * Template Name: Newsletter PPC
 */

// ACF Fields
$r1_left = get_field('row1_left_column');
$r1_right = get_field('row1_right_column');
$r2_graphic = get_field('row2_section_graphic');
$footer_left = get_field('footer_left_column');
$footer_right = get_field('footer_right_column');

get_header(); ?>

<main>
    <section class="ppc-body">
        <div class="wrapper">
            <div id="row-1" class="column-50-50">
                <?php if( $r1_left ) : ?>
                <div class="column-1">
                    <h1><?php esc_html_e( $r1_left['form_cta_text'] ); ?></h1>  
                    <?php echo do_shortcode( $r1_left['form_embed'] ); ?>
                </div>
                <?php endif; ?>

                <?php if( $r1_right ) : 
                    $social_graphic = $r1_right['social_graphic']; ?>
                <div class="column-2">
                    <div class="flex-row">
                        <img src="<?php echo $social_graphic['url'] ; ?>" alt="<?php esc_html_e( $social_graphic['alt'] ); ?>">
                        <p><?php esc_html_e( $r1_right['social_copy'] ); ?></p>
                    </div>
                    <p class="info-text"><?php esc_html_e( $r1_right['info_copy'] ); ?></p>
                </div>
                <?php endif; ?>
            </div>

            <div id="row-3">
                <h2><?php the_field('row2_benefits_section_title'); ?></h2>
                <div class="column-50-50">
                    <div class="column-1">
                        <img src="<?php echo $r2_graphic['url']; ?>" alt="<?php esc_html_e( $r2_graphic['alt'] ); ?>">
                        
                    </div>
                    <div class="column-2">
                        <?php if( have_rows('row2_benefits') ) : ?>
                            <div class="benefits-grid">
                            <?php while( have_rows('row2_benefits') ) : the_row(); ?>
                                <div class="benefit">
                                    <p class="grey-title-sm"><?php the_sub_field('benefit_title'); ?></p>
                                    <p><?php the_sub_field('benefit_copy'); ?></p>
                                </div>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="ppc-footer">
        <div class="wrapper">
            <div class="column-50-50">
                
                <div class="column-1">
                    <h2><?php the_field('footer_section_title'); ?></h2>
                </div>
                
                
                
                <div class="column-2">
                    <?php echo do_shortcode( get_field('footer_form_embed') ); ?>
                </div>
                
            </div>
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

<?php get_footer(); ?>
