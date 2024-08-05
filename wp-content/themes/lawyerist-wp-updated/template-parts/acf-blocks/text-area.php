<?php  
    // (Block) Single Page Banner
    $anchor = get_field( 'anchor' );
    $text_area = get_field( 'text_area' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- This is plain text container -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> plain">
            <?php echo $text_area; ?>
        </div>
    </div>
</section>