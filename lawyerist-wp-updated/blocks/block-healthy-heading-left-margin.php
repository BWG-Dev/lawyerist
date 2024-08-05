<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <!-- This is plain text container -->
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> left-margin-heading">
            <p><?php block_field( 'heading' ); ?></p>
        </div>
    </div>
</section>