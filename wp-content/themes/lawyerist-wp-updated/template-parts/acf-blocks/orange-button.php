<?php  
    // (Block) Orange Button
    $anchor = get_field( 'anchor' );
    $button_text = get_field( 'button_text' );
    $button_link = get_field( 'button_link' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- CTA Button -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> cta-wrapper">
            <a href="<?php echo $button_link; ?>">
                <div class="button">
                    <span>
                        <?php echo $button_text; ?>
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>