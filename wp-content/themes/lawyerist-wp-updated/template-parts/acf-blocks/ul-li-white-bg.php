<?php  
    // (Block) UL / LI (White BG)
    $anchor = get_field( 'anchor' );
    $ul__li = get_field( 'ul__li' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- Rectangle UL text -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> rectangle-ul">
            <div class="white-bg"></div>
            <?php echo $ul__li; ?>
        </div>
    </div>
</section>