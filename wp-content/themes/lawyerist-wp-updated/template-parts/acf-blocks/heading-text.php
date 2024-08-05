<?php 
    // (Block) Frontpage Banner
    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
    $text_one = get_field( 'text_one' );
    $text_two = get_field( 'text_two' );
    $text_three = get_field( 'text_three' );
?>

<!-- Section 1 -->
<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container cus-width">
        <div class="heading-text">
            <h2><?php echo $heading; ?></h2>
            <p><?php echo $text_one; ?></p>
            <p><?php echo $text_two; ?></p>
            <p><?php echo $text_three; ?></p>
        </div>
    </div>
</section>
<!-- End section 1 -->