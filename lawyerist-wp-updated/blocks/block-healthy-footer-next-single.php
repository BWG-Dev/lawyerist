<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="container">
        <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> next-healthy-page">
            <!-- This is plain text container -->
            <div class="orange-text"><?php block_field( 'orange-text' ); ?></div>
            <div class="divider"></div>
            <a href="<?php block_field( 'link-url' ); ?>" title="Learn more about <?php block_field( 'link-text' ); ?>"><?php block_field( 'link-text' ); ?></a>
            <p><?php block_field( 'content' ); ?></p>
            <a class="center-image" href="<?php block_field( 'link-url' ); ?>" title="Learn more about <?php block_field( 'link-text' ); ?>">
                <img src="<?php block_field( 'image' ); ?>"/>
            </a>
        </div>
    </div>
</section>