<?php  
    // (Block) quote-wt-authors-name
    $anchor = get_field( 'anchor' );
    $quote = get_field( 'quote' );
    $author = get_field( 'author' );
    $author_label = get_field( 'author_label' );
?>

<section class="start-content" <?php if( !empty( $anchor ) ): ?>id="<?php echo $anchor; ?>"<?php endif; ?>>
    <div class="container">
        <!-- Quote with top-bottom borders -->
        <div class="<?php if( !empty( $anchor ) ): ?><?php echo $anchor; ?><?php endif; ?> quote-wt-authors-name">
            <?php echo $quote; ?>

            <div class="user-details">
                <p class="username"><?php echo $author; ?></p>
                <p class="user-label"><?php echo $author_label; ?></p>
            </div>
        </div>
    </div>
</section>