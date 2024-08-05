<?php  
    // (Block) Two Column Review and Text
    $anchor = get_field( 'anchor' );
    $avatar = get_field( 'avatar' );
    $username = get_field( 'username' );
    $user_label = get_field( 'user_label' );
    $rating = get_field( 'rating' );
    $heading = get_field( 'heading' );
    $content = get_field( 'content' );
    $avatar_col_two = get_field( 'avatar_col_two' );
    $username_two = get_field( 'username_two' );
    $user_label_two = get_field( 'user_label_two' );
    $podcast_episode = get_field( 'podcast_episode' );
    $podcast_title = get_field( 'podcast_title' );
    $url = get_field( 'url' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> two-review-column-text">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                    <div class="user">
                        <div class="avatar" style="background-image:url('<?php echo $avatar; ?>');"></div>
                        <div class="user-details">
                            <p class="username"><?php echo $username; ?></p>
                            <p class="user-label"><?php echo $user_label; ?></p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <?php echo lwyrst_star_rating($rating); ?>
                    <h2><?php echo $heading; ?></h2>
                    <p><?php echo $content; ?></p>
                </div>
            </div>

            <div class="col-2 bg-white">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="user">
                            <div class="avatar" style="background-image:url('<?php echo $avatar_col_two; ?>');"></div>
                            <div class="user-details">
                                <p class="username"><?php echo $username_two; ?></p>
                                <p class="user-label"><?php echo $user_label_two; ?></p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="content">
                            <p class="orange-txt cap">Go Deeper: Podcast Episode <?php echo $podcast_episode; ?></p>
                            <h2 class="h2"><?php echo $podcast_title; ?></h3>
                            <a href="<?php echo $url; ?>">Listen to Episode</a>
                        </div>
                    </div>
                            <img class="swirl-img" src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" />
                <div class="swirl"></div>
                </div>
            </div>
        </div>
    </div>
</section>