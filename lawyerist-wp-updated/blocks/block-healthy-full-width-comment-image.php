<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>    
    <div id="cutouts-strategy">
        <div class="container">
            <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> wrapper">
                <div class="user">
                    <div class="avatar" style="background-image:url('<?php block_field( 'avatar-image' ); ?>');"></div>
                    <div class="user-details">
                        <p class="username"><?php block_field( 'username' ); ?></p>
                        <p class="user-label"><?php block_field( 'user-label' ); ?></p>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="strategy-content">
                    <div class="col-1">
                        <h2><?php block_field( 'heading' ); ?></h2>
                        <?php block_field( 'content' ); ?>
                        <?php if ( !empty( block_field('link') ) ) : ?>
                            <a href="<?php echo $link; ?>" class="link"><?php echo $link_text; ?></a>
                        <?php endif; ?>                    
                        </div>
                    <div class="col-2">
                        <div class="wrapper">
                            <img src="<?php block_field( 'featured-image' ); ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>