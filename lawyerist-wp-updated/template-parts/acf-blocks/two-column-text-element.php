<?php $anchor = get_field('anchor'); ?>
<section class="start-content" <?php if( !empty( $anchor ) ) { echo 'id="' . $anchor . '"'; } ?>>
    <div class="<?php if( !empty( the_field( 'anchor' ) ) ): ?><?php the_field( 'anchor' ); ?><?php endif; ?> two-column-text">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                <h2><span><?php the_field( 'number' ); ?></span><?php the_field( 'header' ); ?></h2>
                <div class="orange-vline"></div>
                <p><?php the_field( 'content' ); ?></p>
                </div>
            </div>

            <div class="col-2 bg-white">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="user">
                            <div class="avatar" style="background-image:url('<?php the_field( 'avatar' ); ?>')"></div>
                            <div class="user-details">
                                <p class="username"><?php the_field( 'username' ); ?></p>
                                <p class="user-label"><?php the_field( 'user_label' ); ?></p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="content">
                            <p class="orange-txt cap">Go Deeper: Podcast Episode <?php the_field( 'podcast_episode' ); ?></p>
                            <h2 class="h2"><?php the_field( 'podcast_title' ); ?></h2>
                            <a href="<?php  the_field( 'podcast_url' ); ?>">Listen to Episode</a>
                        </div>
                    </div>
                </div>
                            <img class="swirl-img" src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" />
                <div class="swirl"></div>
            </div>
        </div>
    </div>
</section>