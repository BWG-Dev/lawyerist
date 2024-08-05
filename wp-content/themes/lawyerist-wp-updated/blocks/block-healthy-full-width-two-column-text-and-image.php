<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> full-width bg-white">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                    <h2><?php block_field( 'heading' ); ?></h2>
                    <p><?php block_field( 'content' ); ?></p>
                </div>
            </div>
            <div class="col-2">
                <div class="container">
                    <div class="content-container">
                        <img src="<?php block_field( 'featured-image' ); ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>