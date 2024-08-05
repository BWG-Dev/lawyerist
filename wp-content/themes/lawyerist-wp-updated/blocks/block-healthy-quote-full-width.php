<section class="start-content">
    <div id="quote-full-width">
        <div class="container">
            <div id="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?>" class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> user">
                <div class="avatar" style="background:url('<?php block_field( 'avatar' ); ?>');"></div>
                <div class="user-details">
                    <p class="username"><?php block_field( 'username' ); ?></p>
                    <p class="user-label"><?php block_field( 'user-label' ); ?></p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="strategy-content">
                <h2 class="quote"><?php block_field( 'quote' ); ?></h2>
                <?php block_field( 'content' ); ?>
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
