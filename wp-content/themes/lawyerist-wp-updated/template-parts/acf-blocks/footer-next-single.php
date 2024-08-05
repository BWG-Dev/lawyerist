<?php  
    // (Block) Footer Next Single
    $anchor = get_field( 'footer_anchor' );
    $orange_text = get_field( 'footer_orange_text' );
    $link_text = get_field( 'footer_link_text' );
    $link_url = get_field( 'footer_link_url' );
    $content = get_field( 'footer_content' );
    $image = get_field( 'footer_image' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> next-healthy-page">
            <!-- This is plain text container -->
            <div class="orange-text"><?php echo $orange_text; ?></div>
            <div class="divider"></div>
            <a href="<?php echo $link_url; ?>" title="Learn more about <?php echo $link_text; ?>"><?php echo $link_text; ?></a>
            <p><?php echo $content; ?></p>
            <a class="center-image" href="<?php echo $link_url; ?>" title="Learn more about <?php echo $link_text; ?>">
                <?php if( !empty( $image ) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>" />
                <?php endif; ?>
            </a>
        </div>
    </div>
</section>