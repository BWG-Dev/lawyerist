<section class="start-content">
    <div class="two-column-image-quote">
        <div class="wrapper">
            <div class="col-1">
                <div id="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?>" class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> vline-content">
                    <img src="<?php block_field( 'image' ); ?>"/>
                    <h2><?php block_field( 'header' ); ?></h2>
                    <div class="orange-vline"></div>
                    <p><?php block_field( 'content' ); ?></p>
                </div>
            </div>

            <div class="col-2">
                <div class="container bg-white">
                    <div class="content-wrapper">
                        <div class="content">
                            <h2 class="h2"><?php block_field( 'two-header' ); ?></h2>
                            <p><?php block_field( 'two-content' ); ?></p>
                        </div>
                    </div>
                <img class="swirl-img" src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" />
                <div class="swirl"></div>
                </div>
            </div>
        </div>
    </div>
</section>