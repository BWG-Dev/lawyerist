<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <!-- Plain VLine text -->
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> plain-vline-text">
            <h2><span><?php block_field( 'number' ); ?></span><?php block_field( 'heading' ); ?></h2>
            <div class="orange-vline"></div>
            <p><?php block_field( 'content' ); ?></p>
        </div>
    </div>
</section>