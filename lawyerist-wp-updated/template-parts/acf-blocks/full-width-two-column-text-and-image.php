<?php  
    // (Block) Full Width Two Column Text and Image
    $anchor = get_field( 'anchor' );
    $heading = get_field( 'heading' );
    $content = get_field( 'content' );
    $featured_image = get_field( 'featured_image' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> full-width bg-white">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                    <h2><?php echo $heading; ?></h2>
                    <p><?php echo $content; ?></p>
                </div>
            </div>
            <div class="col-2">
                <div class="container">
                    <div class="content-container">
                        <img src="<?php echo $featured_image['url']; ?>" alt="<?php echo $featured_image['alt']; ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>