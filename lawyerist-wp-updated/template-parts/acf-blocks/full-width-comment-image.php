<?php  
    // (Block) Healthy Full Width - Comment + Image
    $anchor = get_field( 'anchor' );
    $avatar_image = get_field( 'avatar_image' );
    $username = get_field( 'username' );
    $user_label = get_field( 'user_label' );
    $heading = get_field( 'heading' );
    $content = get_field( 'content' );
    $link = get_field( 'link' );
    $link_text = get_field( 'link_text' );
    $featured_image = get_field( 'featured_image' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div id="cutouts-strategy">
        <div class="container">
            <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> wrapper">
                <div class="user">
                    <div class="avatar" style="background-image:url('<?php if( !empty( $avatar_image['url'] ) ): echo esc_url($avatar_image['url']); endif; ?>');"></div>
                    <div class="user-details">
                        <p class="username"><?php echo $username; ?></p>
                        <p class="user-label"><?php echo $user_label; ?></p>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="strategy-content">
                    <div class="col-1">
                        <h2><?php echo $heading; ?></h2>
                        <?php echo $content; ?>
                        <?php if( !empty( $link ) ): ?>
                            <a href="<?php echo $link; ?>" class="link"><?php echo $link_text; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-2">
                        <div class="wrapper">
                            <?php if( !empty( $featured_image ) ): ?>
                                <img src="<?php echo $featured_image['url']; ?>" alt="<?php echo $featured_image['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>