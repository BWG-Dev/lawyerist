<?php  
    // (Block) Plain Image vLine and Text
    $anchor = get_field( 'anchor' );
    $image = get_field( 'image' );
    $title = get_field( 'title' );
    $content = get_field( 'content' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- Plain VLine text -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> plain-vline-nimage-text">
            <div class="m-top-image">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>" />
            </div>
            <h2><?php echo $title; ?></h2>
            <div class="orange-vline"></div>
            <p><?php echo $content; ?></p>
        </div>
    </div>
</section>