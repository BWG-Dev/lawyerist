<?php  
    $anchor = get_field( 'anchor' );
    $avatar = get_field( 'avatar' );
    $quote = get_field( 'quote' );
    $author = get_field( 'author' );
    $author_label = get_field( 'author_label' );
    $description = get_field( 'description' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> quote-wt-authors-quote-description">
            <div class="user">
                <div class="avatar" style="background-image:url('<?php echo $avatar; ?>');"></div>
                <div class="user-details">
                    <p class="username"><?php echo $author; ?></p>
                    <p class="user-label"><?php echo $author_label; ?></p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="quote"><?php echo $quote; ?></div>
            <div class="description"><?php echo $description; ?></div>
            <div class="divider"></div>
        </div>
    </div>
</section>