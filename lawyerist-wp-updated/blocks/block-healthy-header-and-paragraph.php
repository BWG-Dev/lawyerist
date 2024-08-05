<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <!-- This is plain text container -->
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> plain">
            <h3><?php block_field( 'heading' ); ?></h3>
            <p><?php block_field( 'content' ); ?></p>
        </div>
    </div>
</section>