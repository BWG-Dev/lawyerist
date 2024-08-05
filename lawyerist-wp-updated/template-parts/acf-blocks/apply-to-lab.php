<?php 

    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
    $sub_text = get_field( 'sub_text' );
    $featured_image = get_field( 'featured_image' );

    $position_pin_image = get_field( 'position_pin_image' );
    $position_pin_text = get_field( 'position_pin_text' );
    $position_pin_button_text = get_field( 'position_pin_button_text' );
    $position_pin_button_link = get_field( 'position_pin_button_link' );
    
?>

<div id="apply-to-lab">
    <div id="<?php echo $anchor; ?>" class="container">
        <div class="col-1">
            <h2><?php echo $heading; ?></h2>
            <p class="m-b-4"><?php echo $sub_text; ?></p>
            <?php if ( is_page(1403422) ) {
                if ( have_rows('cta_buttons') ): ?>
                    <div class="buy-book">
                        <div class="section-heading">
                            <div class="wrapper">
                                <h2 class="small">Buy the Book</h2>
                            </div>
                        </div>
                        <?php while ( have_rows('cta_buttons') ): the_row();
                            $button_text = get_sub_field('button_text');
                            $button_link = get_sub_field('button_link');
                            $add_icon = get_sub_field('add_button_icon');
                            $button_icon = get_sub_field('button_icon');
                        ?>
                            <ul class="buy-book_links">
                                <li>
                                    <a href="<?php echo $button_link; ?>" title="<?php echo $button_text; ?>" target="_blank">
                                        <?php if ( $add_icon == true ): ?>
                                            <i class="buy-book-icon"><img src="<?php echo esc_url($button_icon['url']); ?>" alt="<?php echo esc_attr($button_icon['alt']); ?>" /></i>
                                        <?php endif; ?>
                                        <span><?php echo $button_text; ?></span>
                                    </a>
                                </li>
                            </ul>
                        <?php endwhile; ?>
                    </div>
                <?php endif; 
            } else { 
                if ( have_rows('cta_buttons') ):
                    while ( have_rows('cta_buttons') ): the_row();
                        $button_text = get_sub_field('button_text');
                        $button_link = get_sub_field('button_link');
                        $add_icon = get_sub_field('add_button_icon');
                        $button_icon = get_sub_field('button_icon');
                    ?>
                        <a href="<?php echo $button_link; ?>">
                            <div class="orange-btn">
                                <div style="text-align:center;">
                                    <span><?php echo $button_text; ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;
                endif; ?>
            <?php } ?>
        </div>
        <div class="col-2">
            <img style="margin-bottom:8rem;" src="<?php if( !empty( $featured_image['url'] ) ): echo esc_url( $featured_image['url'] ); endif; ?>" alt="<?php if( !empty( $featured_image['alt'] ) ): echo esc_url( $featured_image['alt'] ); endif; ?>" />
            <div class="cta-fixed">
                <div class="cta-fixed_inner">
                    <img src="<?php if( !empty( $position_pin_image['url'] ) ): echo esc_url( $position_pin_image['url'] ); endif; ?>" alt="<?php if( !empty( $position_pin_image['alt'] ) ): echo esc_url( $position_pin_image['alt'] ); endif; ?>" />
                </div>
                <p class="ital"><?php echo $position_pin_text; ?></p>
                <a href="<?php echo $position_pin_button_link; ?>" class="link"><?php echo $position_pin_button_text; ?></a>
            </div>
        </div>
    </div>
</div>
