<?php  
    // (Block) Two Column Image Quote
    $anchor = get_field( 'anchor' );
    $image = get_field( 'image' );
    $header = get_field( 'header' );
    $content = get_field( 'content' );
    $two_header = get_field( 'two_header' );
    $two_content = get_field( 'two_content' );
?>
<section class="start-content" id="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?>">
    <div class="two-column-image-quote">
        <div class="wrapper">
            <div class="col-1">
                <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> vline-content">
                    <img src="<?php if( !empty( $image['url'] ) ): echo $image['url']; endif; ?>"/>
                    <h2><?php echo $header; ?></h2>
                    <div class="orange-vline"></div>
                    <p><?php echo $content; ?></p>
                </div>
            </div>

            <div class="col-2">
                <div class="container bg-white">
                    <div class="content-wrapper">
                        <div class="content">
                            <h2 class="h2"><?php echo $two_header; ?></h2>
                            <p><?php echo $two_content; ?></p>
                        </div>
                    </div>
                            <img class="swirl-img" src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" />
                <div class="swirl"></div>
                </div>
            </div>
        </div>
    </div>
</section>