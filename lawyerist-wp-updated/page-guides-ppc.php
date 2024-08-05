<?php
/**
 * Template Name: Guides Download PPC
 */

// ACF Fields
$r1_left = get_field('row1_left_column');
$r1_right = get_field('row1_right_column');
$r3_graphic = get_field('row3_section_graphic');
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

            <div id="row-2" class="column-full">
                <h2><?php echo get_field('row2_chapters_section_title'); ?></h2>
                <?php if( have_rows('row2_chapters') ) : $count = 0; ?>
                    <div class="chapters-grid">
                    <?php while( have_rows('row2_chapters') ) : the_row(); $count++; $chapter_image = get_sub_field('chapter_image');?>
                        <div class="chapter">
                            <div class="copy">
                                <p class="pink-title-sm">Chapter <?php echo $count; ?></p>
                                <p class="grey-title-md"><?php the_sub_field('chapter_title'); ?></p>
                            </div>
                            <img src="<?php echo  $chapter_image['url']; ?>" alt="<?php esc_html_e( $chapter_image['alt'] ); ?>">
                        </div>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div id="row-3">
                <h2><?php the_field('row3_benifits_section_title'); ?></h2>
                <div class="column-50-50">
                    <div class="column-1">
                        <img src="<?php echo $r3_graphic['url']; ?>" alt="<?php esc_html_e( $r3_graphic['alt'] ); ?>">
                        
                    </div>
                    <div class="column-2">
                        <?php if( have_rows('row3_benefits') ) : ?>
                            <div class="benefits-grid">
                            <?php while( have_rows('row3_benefits') ) : the_row(); ?>
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
                <?php if( $footer_left ) : ?>
                <div class="column-1">
                    <h2><?php esc_html_e( $footer_left['form_cta_text'] ); ?></h2>
                    <?php echo do_shortcode( $footer_left['form_embed'] ); ?>
                </div>
                <?php endif; ?>
                
                <?php if( $footer_right ) : $footer_graphic = $footer_right['social_graphic']; ?>
                <div class="column-2">
                    <img src="<?php echo $footer_graphic['url']; ?>" alt="<?php esc_html_e( $footer_graphic['alt'] ); ?>">
                </div>
                <?php endif; ?>
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
