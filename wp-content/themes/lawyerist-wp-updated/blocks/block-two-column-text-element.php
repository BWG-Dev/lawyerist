<section class="start-content">    
    <div class="two-column-text">
        <div class="wrapper">
            <div class="col-1">
                <div class="content">
                <h3><span><?php block_field( 'number' ); ?></span><?php block_field( 'header' ); ?></h3>
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
                            <h3 class="h3"><?php block_field( 'podcast_title' ); ?></h3>
                            <a href="<?php block_field( 'podcast_url' ); ?>">Listen to Episode</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>