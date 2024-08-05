<div class="in-page-ad">
    <div class="card">
        <div class="card_upper">

            <a class="image" href="<?php echo $product_page_url; ?>">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
            </a>
            <div class="title_container">
                <a class="title" href="<?php echo $product_page_url; ?>"><?php echo $product_page_title; ?></a>
            </div>

        </div> <!-- End card_upper -->

        <span class="excerpt"><?php echo $page_excerpt; ?> <a href="<?php echo $product_page_url; ?>">Learn more about <?php echo $product_page_title; ?></a></span>
    
    </div>
</div>