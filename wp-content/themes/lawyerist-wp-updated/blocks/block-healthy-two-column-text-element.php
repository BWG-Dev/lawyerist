<section class="start-content" <?php if( !empty(  block_field( 'anchor' ) ) ): ?>id="<?php block_field( 'anchor' ); ?>"<?php endif; ?>>
    <div class="<?php if( !empty(  block_field( 'anchor' ) ) ): ?><?php block_field( 'anchor' ); ?><?php endif; ?> two-column-text">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                <h2><span><?php block_field( 'number' ); ?></span><?php block_field( 'header' ); ?></h2>
                <div class="orange-vline"></div>
                <p><?php block_field( 'content' ); ?></p>
                </div>
            </div>

            <div class="col-2 bg-white">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="user">
                            <div class="avatar" style="background-image:url('<?php block_field( 'avatar' ); ?>')"></div>
                            <div class="user-details">
                                <p class="username"><?php block_field( 'username' ); ?></p>
                                <p class="user-label"><?php block_field( 'user-label' ); ?></p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="content">
                            <p class="orange-txt cap">Go Deeper: Podcast Episode <?php block_field( 'podcast_episode' ); ?></p>
                            <h2 class="h2"><?php block_field( 'podcast_title' ); ?></h2>
                            <a href="<?php block_field( 'podcast_url' ); ?>">Listen to Episode</a>
                        </div>
                    </div>
                </div>
                            <img class="swirl-img" src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" />
                <div class="swirl"></div>
            </div>
        </div>
    </div>
</section>