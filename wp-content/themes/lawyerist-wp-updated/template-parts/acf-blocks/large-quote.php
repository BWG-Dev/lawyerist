<?php  
    // (Block) Large Quote
    $anchor = get_field( 'anchor' );
    $quote = get_field( 'quote' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- Quote with top-bottom borders -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> quote-wt-borders">
            <?php echo $quote; ?>
        </div>
    </div>
</section>