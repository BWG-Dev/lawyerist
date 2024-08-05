
<?php if( is_page_template('product-single-review.php')) { // Single Product Page 
    //get the name of the product from the 'full_name' ACF field if it exists there
if (get_field( "full_name" )) {
    $prod_title = get_field( "full_name" );
}   else{
    $prod_title = the_title( '', '', FALSE );
}
    ?>
    <div id="review_secondary_nav"> <!-- start - Desktop #review_secondary_nav -->
        <div class="fixed-secondary-nav">
            <ul>
                <li id="review-bannerX"><p>About <?php echo $prod_title; ?></p></li>
                <li class="nav-item" id="core-features-anchorX"><span class="nav-item_inner"><a href="#core-features-anchor">Features</a></span></li>
                <?php $alternatives = get_field('alternative_products');
                if ( !empty($alternatives) ): ?>
                    <li class="nav-item" id="compare-similar-products-anchorX"><span class="nav-item_inner"><a href="#compare-similar-products-anchor">Compare Products</a></span></li>
                <?php endif; ?>
                <li class="nav-item" id="community-reviews-anchorX"><span class="nav-item_inner"><a href="#community-reviews-anchor">Community Reviews</a></span></li>
                <?php $faq_fields = get_field('faqs_group');
                if ( !empty($faq_fields) ): ?>
                    <li class="nav-item" id="faq-anchorX"><span class="nav-item_inner"><a href="#faq-anchor">Product FAQs</a></span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div> <!-- end - Desktop #review_secondary_nav -->

    <div id="review_mobile_secondary_nav"> <!-- start - Mobile #review_secondary_nav -->
        <div class="fixed-toggle-bar">
            <p>About <?php echo $prod_title; ?></p>
            <div id="menu-icon-secondary" class="toggle-second-nav">
                    <span class="icon-holder"></span>
                    <span class="menu-label">MENU</span>
                </div>
        </div>
        <div class="fixed-mobile-secondary-nav">
            <ul>
                <li class="nav-item" id="core-features-anchorX"><span class="nav-item_inner"><a href="#core-features-anchor">Features</a></span></li>
                <?php $alternatives = get_field('alternative_products');
                if ( !empty($alternatives) ): ?>
                    <li class="nav-item" id="compare-similar-products-anchorX"><span class="nav-item_inner"><a href="#compare-similar-products-anchor">Compare Products</a></span></li>
                <?php endif; ?>
                <li class="nav-item" id="community-reviews-anchorX"><span class="nav-item_inner"><a href="#community-reviews-anchor">Community Reviews</a></span></li>
                <?php $faq_fields = get_field('faqs_group');
                if ( !empty($faq_fields) ): ?>
                    <li class="nav-item" id="faq-anchorX"><span class="nav-item_inner"><a href="#faq-anchor">Product FAQs</a></span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div> <!-- end - Mobile #review_secondary_nav -->
<?php } else if ( is_page_template('product-practice-review.php') ) { // Category Product Page ?>
    <div id="review_secondary_nav"> <!-- start - Desktop #review_secondary_nav -->
        <div class="fixed-secondary-nav">
            <ul>
                <li id="review-bannerX"><span>On this page</span></li>
                <li class="nav-item" id="productsX"><span class="nav-item_inner"><a href="#products">Products</a></span></li>
                <?php $cat_faqs = get_field( 'category_faqs' );
                if ( !empty($cat_faqs) ) : ?> 
                    <li class="nav-item" id="faqX"><span class="nav-item_inner"><a href="#faq">FAQs</a></span></li>
                <?php endif; ?>
                <li class="nav-item" id="how-to-chooseX"><span class="nav-item_inner"><a href="#how-to-choose">How to Choose</a></span></li>
                <li class="nav-item" id="featuresX"><span class="nav-item_inner"><a href="#features">Features</a></span></li>
            </ul>
        </div>
    </div> <!-- end - Desktop #review_secondary_nav -->
    <div id="review_mobile_secondary_nav"> <!-- start - Mobile #review_secondary_nav -->
        <div class="fixed-toggle-bar">
            <p>About <?php echo $prod_title; ?></p>
            <div id="menu-icon-secondary" class="toggle-second-nav">
                <span class="icon-holder"></span>
                <span class="menu-label">MENU</span>
            </div>
        </div>
        <div class="fixed-mobile-secondary-nav">
            <ul>
                <li class="nav-item" id="productsX"><span class="nav-item_inner"><a href="#products">Products</a></span></li>
                <?php $cat_faqs = get_field( 'category_faqs' );
                if ( !empty($cat_faqs) ) : ?> 
                    <li class="nav-item" id="faqX"><span class="nav-item_inner"><a href="#faq">FAQs</a></span></li>
                <?php endif; ?>
                <li class="nav-item" id="how-to-chooseX"><span class="nav-item_inner"><a href="#how-to-choose">How to Choose</a></span></li>
                <li class="nav-item" id="featuresX"><span class="nav-item_inner"><a href="#features">Features</a></span></li>
            </ul>
        </div>
    </div> <!-- end - Mobile #review_secondary_nav -->
<?php } else { 
    if ( have_rows('links') ):
    while( have_rows('links') ): the_row(); 
        // Get sub field values.
        $nav_title              = get_sub_field('nav_title');
        $anchor_link_one        = get_sub_field('anchor_link_one');
        $anchor_one_label       = get_sub_field('anchor_one_label');
        $anchor_link_two        = get_sub_field('anchor_link_two');
        $anchor_two_label       = get_sub_field('anchor_two_label');
        $anchor_link_three      = get_sub_field('anchor_link_three');
        $anchor_three_label     = get_sub_field('anchor_three_label');
        $anchor_link_four       = get_sub_field('anchor_link_four');
        $anchor_four_label      = get_sub_field('anchor_four_label');
        $anchor_link_five       = get_sub_field('anchor_link_five');
        $anchor_five_label      = get_sub_field('anchor_five_label');
        $anchor_link_six        = get_sub_field('anchor_link_six');
        $anchor_six_label       = get_sub_field('anchor_six_label');
    ?>
    <div id="review_secondary_nav"> <!-- start - Desktop #review_secondary_nav -->
        <div class="fixed-secondary-nav">
            <ul>
                <li id="review-bannerX"><span><?php echo do_shortcode($nav_title); ?></span></li>
                <?php if( !empty( $anchor_link_one ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_one); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_one); ?>')" class="lnk"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_one); ?>" title="<?php echo do_shortcode($anchor_one_label); ?>" id="sub_nav_link">01. <?php echo do_shortcode($anchor_one_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_two ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_two); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_two); ?>')" class="lnk"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_two); ?>" title="<?php echo do_shortcode($anchor_two_label); ?>" id="sub_nav_link">02. <?php echo do_shortcode($anchor_two_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_three ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_three); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_three); ?>')" class="lnk"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_three); ?>" title="<?php echo do_shortcode($anchor_three_label); ?>" id="sub_nav_link">03. <?php echo do_shortcode($anchor_three_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_four ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_four); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_four); ?>')" class="lnk"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_four); ?>" title="<?php echo do_shortcode($anchor_four_label); ?>" id="sub_nav_link">04. <?php echo do_shortcode($anchor_four_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_five ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_five); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_five); ?>')" class="lnk"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_five); ?>" title="<?php echo do_shortcode($anchor_five_label); ?>" id="sub_nav_link">05. <?php echo do_shortcode($anchor_five_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_six ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_six); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_six); ?>')" class="lnk"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_six); ?>" title="<?php echo do_shortcode($anchor_six_label); ?>" id="sub_nav_link">06. <?php echo do_shortcode($anchor_six_label); ?></a></span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div> <!-- end - Desktop #review_secondary_nav -->

    <div id="review_mobile_secondary_nav"> <!-- start - Mobile #review_secondary_nav -->
        <div class="fixed-toggle-bar">
            <p>On this page</p>
            <div id="menu-icon-secondary" class="toggle-second-nav">
                <span class="icon-holder"></span>
                <span class="menu-label">MENU</span>
            </div>
        </div>
        <div class="fixed-mobile-secondary-nav">
            <ul>
                <?php if( !empty( $anchor_link_one ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_one); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_one); ?>')"><span class="nav-item_inner"><a href="<?php echo "#" .  do_shortcode($anchor_link_one); ?>" title="<?php echo do_shortcode($anchor_one_label); ?>">01. <?php echo do_shortcode($anchor_one_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_two ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_two); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_two); ?>')"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_two); ?>" title="<?php echo do_shortcode($anchor_two_label); ?>">02. <?php echo do_shortcode($anchor_two_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_three ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_three); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_three); ?>')"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_three); ?>" title="<?php echo do_shortcode($anchor_three_label); ?>">03. <?php echo do_shortcode($anchor_three_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_four ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_four); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_four); ?>')"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_four); ?>" title="<?php echo do_shortcode($anchor_four_label); ?>">04. <?php echo do_shortcode($anchor_four_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_five ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_five); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_five); ?>')"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_five); ?>" title="<?php echo do_shortcode($anchor_five_label); ?>">05. <?php echo do_shortcode($anchor_five_label); ?></a></span></li>
                <?php endif; ?>
                <?php if( !empty( $anchor_link_six ) ): ?>
                    <li class="nav-item" id="<?php echo do_shortcode($anchor_link_six); ?>X" onclick="onClickAnchor('#<?php echo do_shortcode($anchor_link_six); ?>')"><span class="nav-item_inner"><a href="<?php echo "#" . do_shortcode($anchor_link_six); ?>" title="<?php echo do_shortcode($anchor_six_label); ?>">06. <?php echo do_shortcode($anchor_six_label); ?></a></span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div> <!-- end - Mobile #review_secondary_nav -->
    <?php endwhile; ?>
<?php endif;
} ?>

<style>
    .subnav-active { background: #424B54; } 
    .subnav-active a { color: white !important; }
</style>

<script>

    let distance = jQuery('#review_secondary_nav').offset().top,
        mobile_distance = jQuery('#review_mobile_secondary_nav').offset().top,
        viewportWidth = window.innerWidth || document.documentElement.clientWidth,
        $window = jQuery(window);

    if (viewportWidth > 1024) {
        $window.scroll(function() {
            if ( $window.scrollTop() >= 100 ) {
                // Your div has reached above top
                // console.log('Sub nav has reached the top!');
                jQuery('#review_secondary_nav').addClass('reviews_navbar-fixed-top');

            } else if ( $window.scrollTop() <= mobile_distance ) {
                // Your div has reached below top
                // console.log('No longer at the top!');
                jQuery('#review_secondary_nav').removeClass('reviews_navbar-fixed-top');

            }
        });
    } else if (viewportWidth < 1024) {
        $window.scroll(function() {
            if ( $window.scrollTop() >= 100 ) {
                // Your div has reached above top
                // console.log('Sub nav has reached the top!');
                jQuery('#review_mobile_secondary_nav').addClass('reviews_navbar-fixed-top');

            } else if ( $window.scrollTop() <= mobile_distance ) {
                // Your div has reached below top
                // console.log('No longer at the top!');
                jQuery('#review_mobile_secondary_nav').removeClass('reviews_navbar-fixed-top');

            }
        });
    }

    // Click "Write a Review" buttton
    function showDiv() {
        document.getElementById('respond').style.display = "block";
    }

    function tooogleX() {
        var x = document.querySelector(".fixed-mobile-secondary-nav");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    /*jQuery('a#sub_nav_link').click(function() {
        tablinks = document.getElementsByClassName('lnk');
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active-option", "");
            //tablinks[i].className = tablinks[i].className.replace(" radio-b", "");
        }
        
        jQuery( this ).parent('li.lnk').addClass('active-option');
    });

    function onClickAnchor(link) {
        window.location.href = link;
    }*/
</script>