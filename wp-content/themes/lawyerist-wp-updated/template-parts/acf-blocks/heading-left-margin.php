<?php  
    // (Block) Heading Left Margin
    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- This is plain text container -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> left-margin-heading">
            <p><?php echo $heading; ?></p>
        </div>
    </div>
</section>