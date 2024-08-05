<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <!-- CTA Button -->
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> cta-wrapper">
            <a href="<?php block_field( 'button-link' ); ?>">
                <div class="button">
                    <span>
                        <?php block_field( 'button-text' ); ?>
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>