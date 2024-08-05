<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <!-- Plain VLine text -->
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> plain-vline-nimage-text">
            <div class="m-top-image">
                <img src="<?php block_field( 'image' ); ?>"/>
            </div>
            <h2><?php block_field( 'title' ); ?></h2>
            <div class="orange-vline"></div>
            <p><?php block_field( 'content' ); ?></p>
        </div>
    </div>
</section>