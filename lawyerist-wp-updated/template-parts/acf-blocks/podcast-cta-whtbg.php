<?php  
    // (Block) Podcast CTA whtBG
    $anchor = get_field( 'anchor' );
    $podcast_episode = get_field( 'podcast_episode' );
    $podcast_title = get_field( 'podcast_title' );
    $podcast_url = get_field( 'podcast_url' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- Podcast CTA whtBG -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> podcast-box">
            <div class="wrapper">
                <p class="orange-txt cap">Go Deeper: Podcast Episode <?php echo $podcast_episode; ?></p>
                <p class="bold-txt"><?php echo $podcast_title; ?></p>
                <a href="<?php echo $podcast_url; ?>">Listen to Episode</a>
            </div>
        </div>
    </div>
</section>