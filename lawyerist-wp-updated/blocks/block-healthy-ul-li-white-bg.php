<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <!-- Rectangle UL text -->
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> rectangle-ul">
            <div class="white-bg"></div>
            <?php block_field( 'ul-li' ); ?>
        </div>
    </div>
</section>