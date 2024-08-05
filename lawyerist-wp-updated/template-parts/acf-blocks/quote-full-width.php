<?php  
    // (Block) Quote Full Width
    $anchor = get_field( 'anchor' );
    $avatar = get_field( 'avatar' );
    $username = get_field( 'username' );
    $user_label = get_field( 'user_label' );
    $quote = get_field( 'quote' );
    $content = get_field( 'content' );
?>

<section class="start-content">
    <div id="quote-full-width">
        <div class="container">
            <div id="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?>" class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> user">
                <div class="avatar" style="background:url('<?php if( !empty( $avatar['url'] ) ): echo $avatar['url']; endif; ?>');"></div>
                <div class="user-details">
                    <p class="username"><?php echo $username; ?></p>
                    <p class="user-label"><?php echo $user_label; ?></p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="strategy-content">
                <?php if ( $quote ): ?>
                    <h2 class="quote"><?php echo the_field( 'quote', false, false ); ?></h2>
                <?php endif; ?>
                <?php echo $content; ?>
            </div>
        </div>
        <img class="swirl-img" src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" alt="Swirl"/>
        <div class="swirl"></div>
    </div>
</section>

<style>
div#quote-full-width:nth-child(2n) > .swirl-img {
    top:100px !important;
    left:-700px !important;
}
</style>
