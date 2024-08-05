<section class="start-content">
    <div id="cutouts-strategy">
        <div class="container">
            <div class="wrapper">
                <div class="user">
                    <div class="avatar" style="background-image:url('<?php echo block_field( 'avatar-image' ); ?>');"></div>
                    <div class="user-details">
                        <p class="username"><?php echo block_field( 'username' ); ?></p>
                        <p class="user-label"><?php echo block_field( 'user-label' ); ?></p>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="strategy-content">
                    <div class="col-1">
                        <h2><?php echo block_field( 'heading' ); ?></h2>
                        <p><?php echo block_field( 'description' ); ?></p>
                        <?php if ( !empty( block_field('link') ) ) : ?>
                            <a href="<?php echo $link; ?>" class="link"><?php echo $link_text; ?></a>
                        <?php endif; ?>                    
                        </div>
                    <div class="col-2">
                        <div class="wrapper">
                            <?php echo block_field( 'featured-image' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>