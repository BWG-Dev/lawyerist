<?php  
    // (Block) Plain vLine And Text
    $anchor = get_field( 'anchor' );
    $number = get_field( 'number' );
    $heading = get_field( 'heading' );
    $content = get_field( 'content' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- Plain VLine text -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> plain-vline-text">
            <h2><span><?php echo $number; ?></span><?php echo $heading; ?></h2>
            <div class="orange-vline"></div>
            <p><?php echo $content; ?></p>
        </div>
    </div>
</section>