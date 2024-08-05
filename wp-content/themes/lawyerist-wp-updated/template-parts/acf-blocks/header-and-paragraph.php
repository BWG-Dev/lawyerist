<?php  
    // (Block) Header and Paragraph
    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
    $content = get_field( 'content' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- This is plain text container -->
        <div class="<?php if( !empty(  $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> plain">
            <h3><?php echo $heading; ?></h3>
            <p><?php echo $content; ?></p>
        </div>
    </div>
</section>