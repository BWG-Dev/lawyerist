<?php /* Template Name: Product Single Review */

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post();

// Assign post variables.
$page_title = the_title( '', '', FALSE );

//get the name of the product from the 'full_name' ACF field if it exists there
if (get_field( "full_name" )) {
    $prod_title = get_field( "full_name" );
}   else{
    $prod_title = the_title( '', '', FALSE );
}

// Product Featured Rating
$ft_customer_experience = law_get_featured_ratings('Group1');
$ft_future_oriented = law_get_featured_ratings('Group2');
$ft_automation = law_get_featured_ratings('Group3');
$ft_organization = law_get_featured_ratings('Group4');

// Checks for a rating, then assigns variables if they will be needed.
//if ( comments_open() && function_exists( 'wp_review_show_total' ) ) {

    $our_rating             = lwyrst_get_our_rating();
    $community_rating       = lwyrst_get_community_rating();
    $community_review_count = lwyrst_get_community_review_count();
    $composite_rating       = lwyrst_get_composite_rating();

    if ( $community_review_count > 0 ) {
        $get_rating_five =  get_average_rating(5,lawyerist_get_comment_rating_count(5), $community_review_count);
        $get_rating_four =  get_average_rating(4,lawyerist_get_comment_rating_count(4), $community_review_count);
        $get_rating_three = get_average_rating(3,lawyerist_get_comment_rating_count(3), $community_review_count);
        $get_rating_two =   get_average_rating(2,lawyerist_get_comment_rating_count(2), $community_review_count);
        $get_rating_one =   get_average_rating(1,lawyerist_get_comment_rating_count(1), $community_review_count);
    }
//}

$comment_count = get_comments_number(get_the_ID());

// Gets the $trial_button if there is one.
$trial_button = trial_button();

get_template_part('template-parts/reviews-functions'); // creates updated features chart

foreach ( get_the_terms( get_the_ID(), 'product_category' ) as $tax ) {
    $product_cat = ( $tax->name );
}
$url = get_field('website');
$description = get_field('product_description');
$add_details = get_field('product_additional_details');
$who_for = get_field('who_prod_is_for');
if (has_post_thumbnail()) {
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail = wp_get_attachment_image($thumbnail_id, 'thumbnail');
}
// Tree-based loops for category ACF

    if ( $product_cat == 'Credit Card Processing' ) { // Credit Card Processing
        $group_id = 511008;
        $category = $product_cat;
        $cost = get_field('fc_cc_monthly_fee');
    } else if ( is_child(1439250) ) { // AI Software
        $group_id = 1439287;
        $category = $product_cat;
        $cost = get_field('fc_AI_cost');
    } else if ( $product_cat == 'eDiscovery Software' ) { // eDiscovery Software
        $group_id = 510758;
        $category = $product_cat;
        $cost = get_field('fc_ed_cost');
    } else if ( $product_cat == 'Managed Accounting' ) { // Managed Accounting
        $group_id = 1387791;
        $category = $product_cat;
        $cost = get_field('fc_ma_starting_price');
    } else if ( $product_cat == 'Productivity Tools' ) { // Productivity Tools
        $group_id = 1379188;
        $category = $product_cat;
        $cost = get_field('fc_ptl_starting_price');
    } else if ( $product_cat == 'Staffing Services' ) { // Staffing Services
        $group_id = 1103526;
        $category = $product_cat;
        $cost = get_field('fc_va_starting_price');
    } else if ( $product_cat == 'Consultants' ) { // Staffing Services
          $group_id = 1435646;
          $category = $product_cat;
          $cost = get_field('fc_cons_starting_price');
    } else if ( $product_cat == 'Video Conferencing' ) { // Video Conferencing
        $group_id = 1386963;
        $category = $product_cat;
        $cost = get_field('fc_vcl_starting_price');
    } else if ( $product_cat == 'VoIP Providers' ) { // VoIP Providers
        $group_id = 1351302;
        $category = $product_cat;
        $cost = get_field('fc_voip_starting_price');
    } else if ( $product_cat == 'Timekeeping Billing Software' ) { // Timekeeping & Billing Software
        $group_id = 545853;
        $category = 'Timekeeping & Billing Software';
        $cost = get_field('fc_time_pricing');
    } else if ( $product_cat == 'Managed IT' ) { // Managed IT
        $group_id = 1401577;
        $category = 'Managed IT';
        $cost = get_field('fc_mit_starting_price');
    } else if ( is_child(226192) ) { // SEO & Marketing
        $group_id = 761359;
        $category = 'SEO Services & Marketing Agencies';
        $cost = get_field('fc_seo_starting_price');
    } else if ( is_child(238035) ) { // Intake CRM
        $group_id = 519846;
        $category = 'Intake CRM';
        $cost = get_field('fc_crm_starting_price');
    } else if ( is_child(121024) ) { // Law Practice Management Software
        $group_id = 471015;
        $category = 'Law Practice Management Software';
        $cost = get_field('fc_lpms_cost');
    } else if ( is_child(212684) ) { // Online Legal Research
        $group_id = 480121;
        $category = 'Online Legal Research';
        $cost = get_field('fc_lr_cost');
    } else if ( is_child(306014) && ( $product_cat !== 'eDiscovery Software' ) && ( $product_cat !== 'Productivity Tools' )) { // Document Management & Automation
        $group_id = 627369;
        $category = 'Document Management & Automation';
        $cost = get_field('fc_dm_starting_price');
    } else if ( is_child(158523) && ($product_cat !== 'Credit Card Processing') && ( $product_cat !== 'Managed Accounting' ) && ( $product_cat !== 'Timekeeping & Billing Software' )) { // Accounting, Billing & Finance
        $group_id = 513265;
        $category = 'Accounting & Bookkeeping';
        $cost = get_field('fc_acctg_starting_price');
    } else if ( is_child(1388753) && ( $product_cat !== 'Video Conferencing' ) && ( $product_cat !== 'VoIP Providers' ) && ( $product_cat !== 'Managed IT' ) ) { // Remote Office, Phones & Communication
        $group_id = 1389280;
        $category = 'Remote Office, Phones & Communication';
        $cost = get_field('fc_mit_starting_price');
    } else if ( is_child(195769) ) { // Virtual Receptionists & Outsourced Staffing
        $group_id = 566001;
        $category = 'Virtual Receptionists & Outsourced Staffing';
        $cost = get_field('fc_vr_starting_price');
    }
?>

<?php get_header(); ?>

<script>
function progress_per_bar(rating, community_rating, total_rating) {
    const progressBarFull = document.getElementById('progressBarFull'+rating);
    let RATING = community_rating;
    const MAX_RATING = total_rating;
    progressBarFull.style.width = `${(RATING / MAX_RATING) * 100}%`;}
</script>

<style>div#article-counter-container{display:none;}:target::before,.target::before{display:none!important;}*{outline:none;}a:focus,a:visited,a:active{outline:none;}</style>

<div id="review_container" class="product-single-review">

    <?php get_template_part( 'template-parts/sub', 'navigation' ); ?>


<section class="start-content">
    <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
    <div id="review-single-hero">
        <div class="main-title-container">
            <h1><?php echo $page_title; ?></h1>
        </div>
        <div class="hero-container">
            <!-- Product Title -->
            <div class="info-box">
                <div class="box">
                    <div class="box-inner-container">
                        <?php if ( has_term( 'affinity-partner', 'page_type', $post->ID) ) { ?>
                                <div class="partner-image-border add-affinity">
                                    <!-- Product Thumbnail -->
                                    <?php if ( !empty($thumbnail) ) { ?>
                                        <div itemprop="image">
                                            <?php echo $thumbnail; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="partner-image-border">
                                    <!-- Product Thumbnail -->
                                    <?php if ( !empty($thumbnail) ) { ?>
                                        <div itemprop="image">
                                            <?php echo $thumbnail; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                        <div class="partner-rating">
                            <div class="border-line-behind"></div>
                            <div class="rating-box-title">
                                <?php $shortname = get_field('short_name');
                                if ( !empty($shortname) ) { ?>
                                    <p class="rating-title">Lawyerist Rating for <span><?php echo $shortname; ?></span></p>
                                <?php } else { ?>
                                    <p class="rating-title">Lawyerist Rating for <span><?php echo $page_title; ?></span></p>
                                <?php } ?>
                            </div>

                            <div class="rating-container">
                                <?php if ( !empty( $composite_rating ) ) { ?>
                                    <?php echo lwyrst_star_rating(); ?>
                                    <div class="tool-tip">
                                        <span class="tool-tip_icon">i</span>
                                        <div class="tool-tip_description rating-breakdown">
                                            <h3>Rating Breakdown</h3>

                                            <?php if ( !empty( $our_rating ) ) { ?>

                                                <p class="rating">Our Rating: <strong><?php echo $our_rating; ?></strong>/5</p>
                                                <p><small>Our rating is based on our subjective judgment. Use our resources—including our rating and community ratings and reviews—to find the best fit for your firm.</small></p>

                                            <?php } ?>

                                            <?php if ( !empty( $community_rating ) ) { ?>

                                                <p class="rating">Community Rating: <strong><?php echo $community_rating; ?></strong>/5 (based on <?php echo $community_review_count . _n( ' rating', ' ratings', $community_review_count ); ?>)</p>
                                                <p><small>The community rating is based on the average of the community reviews below.</small></p>

                                            <?php } ?>

                                            <?php if ( !empty( $our_rating ) && !empty( $community_rating ) ) { ?>

                                                <p class="rating composite-rating">Composite Rating: <strong><?php echo $composite_rating; ?></strong>/5</p>
                                                <p><small>The composite rating is a weighted average of our rating and the community ratings below.</small></p>

                                            <?php } ?>

                                        </div>
                                    </div>
                                    <p class="number-rating"><?php echo $composite_rating; ?>/5</p>
                                <?php } ?>
                            </div>
                            <div class="border-line"></div>
                            <?php if ( has_term( 'affinity-partner', 'page_type', $post->ID ) && get_field( 'affinity_active' ) == true ) {
                                echo affinity_notice();
                            } ?>

                            
                        </div>
                    </div>
                </div>
                <?php echo lwyrst_new_trial_btn('Website'); ?>
            </div>
            <div class="info-content">
                <div class="featured-wrapper">
                    <!-- Slideshow container -->
                    <div class="slideshow-container">
                        <!-- Tab text with active class state -->
                        <div id="first-slide" class="mySlides fade">
                            <div class="numbertext">
                                <div class="active first-active">Overview</div>
                                <div onclick="currentSlide(2)">Featured Rating</div>
                                <?php
                                    $includeVideo = get_field('include_demo');
                                    $secondVideo = get_field('partner_video_location');

                                    if ( $includeVideo == true ) { ?>
                                        <div onclick="currentSlide(3)">Demo</div>
                                    <?php }
                                    if ( !empty($secondVideo) ) { ?>
                                        <div onclick="currentSlide(4)">More</div>
                                    <?php } ?>
                            </div>

                            <div class="what-is">
                                <h3>What is <?php echo $prod_title; ?>?</h3>
                                <p class="description"><?php echo $description; ?></p>
                                <p class="pricing"><span>Starting Cost: </span><?php echo $cost; ?></p>
                                <div class="break-line"></div>
                                <?php
                                $single_product_pros = get_field('Pros');
                                $single_product_cons = get_field('Cons');
                                if ( !empty($single_product_pros) && !empty($single_product_cons) ): ?>
                                    <div class="pros-cons-container">
                                        <div class="pros">
                                            <b class="thumb-up">Pros</b>
                                            <ul>
                                                <?php foreach( $single_product_pros as $pros ): ?>
                                                    <li><?php echo $pros; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="cons">
                                            <b class="thumb-down">Cons</b>
                                            <ul>
                                                <?php foreach( $single_product_cons as $cons ): ?>
                                                    <li><?php echo $cons; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="break-line"></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div id="second-slide" class="mySlides fade">
                            <div class="numbertext">
                                <div onclick="currentSlide(1)">Overview</div>
                                <div class="active">Featured Ratings</div>
                                <?php $includeVideo = get_field('include_demo');
                                    if ( $includeVideo == true ) { ?>
                                        <div onclick="currentSlide(3)">Demo</div>
                                    <?php }
                                    if ( !empty($secondVideo) ) { ?>
                                        <div onclick="currentSlide(4)">More</div>
                                    <?php }
                                ?>
                            </div>

                            <div class="features">
                                <h3><?php echo $page_title; ?> Features</h3>

                                <div class="ratings">
                                    <p class="title">Customer Experience & Support</p>
                                    <div class="star-rating">
                                        <?php echo lwyrst_star_rating($ft_customer_experience); ?>
                                        <p class="out-of"><?php echo $ft_customer_experience; ?>/5</p>
                                    </div>
                                </div>
                                <div class="ratings">
                                    <p class="title">Price & Value</p>
                                    <div class="star-rating">
                                        <?php echo lwyrst_star_rating($ft_future_oriented); ?>
                                        <p class="out-of"><?php echo $ft_future_oriented; ?>/5</p>
                                    </div>
                                </div>
                                <div class="ratings">
                                    <p class="title">Security</p>
                                    <div class="star-rating">
                                        <?php echo lwyrst_star_rating($ft_automation); ?>
                                        <p class="out-of"><?php echo $ft_automation; ?>/5</p>
                                    </div>
                                </div>
                                <div class="ratings">
                                    <p class="title">Innovation & Future-Proofing</p>
                                    <div class="star-rating">
                                        <?php echo lwyrst_star_rating($ft_organization); ?>
                                        <p class="out-of"><?php echo $ft_organization; ?>/5</p>
                                    </div>
                                </div>
                                <div class="divider"></div>
                            </div>

                        </div>
                        <?php
                            if ( $includeVideo == true ) { ?>
                                <div id="third-slide" class="mySlides fade">
                                    <div class="numbertext">
                                        <div onclick="currentSlide(1)">Overview</div>
                                        <div onclick="currentSlide(2)">Featured Rating</div>
                                        <div class="active">Demo</div>
                                        <?php if ( !empty($secondVideo) ) { ?>
                                            <div onclick="currentSlide(4)">More</div>
                                        <?php } ?>
                                    </div>

                                    <div class="review-single-wistia">
                                        <h3><?php echo $page_title; ?> Demo</h3>
                                            <div class="demo-video-slides">
                                                <?php echo get_field('demo_video_location'); ?>
                                            </div>
                                        <div class="divider"></div>
                                    </div>
                                </div>
                            <?php }

                            if ( !empty('partner_video_location') ) { ?>
                                <div id="fourth-slide" class="mySlides fade">
                                    <div class="numbertext">
                                        <div onclick="currentSlide(1)">Overview</div>
                                        <div onclick="currentSlide(2)">Featured Rating</div>
                                        <?php if ( $includeVideo == true ) { ?>
                                            <div onclick="currentSlide(3)">Demo</div>
                                        <?php } ?>
                                        <div class="active">More</div>
                                    </div>

                                    <div class="review-single-wistia">
                                        <h3><?php echo $page_title; ?> Video</h3>
                                            <div class="demo-video-slides">
                                                <?php the_field('partner_video_location'); ?>
                                            </div>
                                        <div class="divider"></div>
                                    </div>
                                </div>
                            <?php } ?>

                        <div class="bottom-nav">
                            <!-- Next and previous buttons -->
                            <div class="toggler">
                                <a class="prev" onclick="plusSlides(-1)"><svg version="1.1" id="left-arrow-btn" width="20px" fill="#424B54" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 198.7 178.5" style="enable-background:new 0 0 198.7 178.5;" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><path id="Path_583" class="st0" d="M107,0L53.6,44.6L0,89.3l53.4,44.6l53.6,44.6v-58.4h91.7v-65H107V0z"/></svg></a>
                                <a class="next" onclick="plusSlides(1)"><svg id="right-arrow-btn" data-name="Layer 1" width="20px" fill="#424B54" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 198.69 178.5"><path id="Path_583" data-name="Path 583" d="M92.41,189.33l53.4-44.62,53.62-44.64L146,55.45,92.41,10.83V69.27H.73v65H92.41Z" transform="translate(-0.73 -10.83)" style="fill-rule:evenodd"/></svg></a>
                            </div>
                            <div class="more-link">
                                <a href="#compare-similar-products-anchor" class="link">Compare with Other <?php echo $category; ?> Products</a>
                                <a href="#field-guide-anchor" class="link field-guide">Download the Field Guide</a>
                            </div>
                        </div>
                    </div>

                    <script>
                        var slideIndex = 1;
                        showSlides(slideIndex);

                        // Next/previous controls
                        function plusSlides(n) {
                            showSlides(slideIndex += n);
                        }

                        // Thumbnail image controls
                        function currentSlide(n) {
                            showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            if (n > slides.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = slides.length
                            }
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex-1].style.display = "block";
                            dots[slideIndex-1].className += " active";
                        }
                    </script>

                </div>

            </div>
        </div>
    </div>
</section>

<section class="start-content" id="core-features-anchor">
    <?php build_features_chart($group_id, $category); ?>
</section>
<style>.cell input[type=radio]{visibility:hidden!important}.cell input[type=radio]::before{border:2px solid #424b54!important;height:.6em!important;width:.6em!important;border-radius:50%!important;display:block!important;content:" "!important;cursor:auto!important;visibility:visible!important}.cell input[type=radio]:checked::before{background:radial-gradient(#ff7062 50%,transparent 38%)!important}</style>

<?php $alternatives = get_field('alternative_products');
    if ( !empty($alternatives) ): ?>
<section class="start-content" id="compare-similar-products-anchor">
    <div class="spacer-60 anchor"></div>
    <div id="compare-similar-products">
        <div class="compare-wrapper">

            <div class="title">
                <h3>Compare <?php echo $prod_title; ?> Similar Products</h3>
            </div>

            <div class="compare-cards">
                <div class="compare-swtch-options">
                    <div class="compare-excerpt">
                        <p>Select another product to compare:</p>
                    </div>

                    <div class="tab compare-partner-tabs">
                        <ul>
                            <?php echo lawyerist_get_compared_products_list(); ?>
                        </ul>
                    </div>
                </div>
                <div class="similar-prod-wrapper">
                    <div class="similar-products">
                        <div class="this-product">
                            <div class="card">
                                <div class="wrapper">
                                    <div class="header">
                                        <h3><?php echo $prod_title; ?></h3>
                                        <div class="rating-container">
                                            <?php if ( !empty( $composite_rating ) ) { ?>
                                                <?php echo lwyrst_star_rating(); ?>
                                                <p class="number-rating"><?php echo $composite_rating; ?>/5</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if ( has_term( 'affinity-partner', 'page_type', $post->ID) ) { ?>
                                        <div class="partner-image-border add-affinity">
                                            <!-- Product Thumbnail -->
                                            <?php if ( !empty($thumbnail) ) { ?>
                                                <div itemprop="image">
                                                    <?php echo $thumbnail; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="partner-image-border">
                                            <!-- Product Thumbnail -->
                                            <?php if ( !empty($thumbnail) ) { ?>
                                                <div itemprop="image">
                                                    <?php echo $thumbnail; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ( has_term( 'affinity-partner', 'page_type', $post->ID ) && get_field( 'affinity_active' ) == true ) {
                                        echo affinity_notice();
                                    }
                                    if ( !empty($single_product_pros) && !empty($single_product_cons) ): ?>
                                        <div class="pros-cons-container">
                                            <div class="pros">
                                                <b class="thumb-up">Pros</b>
                                                <ul>
                                                    <?php foreach( $single_product_pros as $pros ): ?>
                                                        <li><?php echo $pros; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="cons">
                                                <b class="thumb-down">Cons</b>
                                                <ul>
                                                    <?php foreach( $single_product_cons as $cons ): ?>
                                                        <li><?php echo $cons; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-divider">
                        <svg id="left-right" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 199.44 158.31" fill="#FFFFFF"><path id="Path_625" data-name="Path 625" d="M63.46,20.44,31.89,46.82.2,73.2,31.79,99.59,63.46,126V91.42h54.19V53H63.46Z" transform="translate(-0.2 -20.44)" style="fill-rule:evenodd"/><path id="Path_626" data-name="Path 626" d="M136.37,178.74l31.57-26.38L199.64,126,168,99.6,136.37,73.22v34.54H82.18v38.46h54.19Z" transform="translate(-0.2 -20.44)" style="fill-rule:evenodd"/></svg>
                    </div>
                    <div class="similar-products">
                        <?php echo lawyerist_get_compared_products_card(); ?>
                    </div>
                </div>

                <script>
                    function similarProd(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                            //tablinks[i].className = tablinks[i].className.replace(" radio-b", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                        //evt.currentTarget.className += " radio-b";
                    }
                    document.querySelector(".clickme").click();
                </script>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
if ( have_rows('faqs_group') ) :
while ( have_rows('faqs_group') ): the_row();
//if ( !empty($faq_fields) ):
    $faq1test = get_sub_field('FAQ1');
    if ( !empty($faq1test) ): ?>
    <section class="start-content" id="faq-anchor">
        <div class="spacer-90 anchor"></div>
                <div id="faq">
                    <div class="wrapper">
                        <div class="title">
                            <h3>Frequently Asked Questions</h3>
                        </div>
                        <div class="tabs-wrapper">
                            <?php
                                $faq1 = get_sub_field_object('FAQ1');
                                $faq1_question = $faq1['label'];
                                $faq1_answer = $faq1['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq1_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq1_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq2 = get_sub_field_object('FAQ2');
                                $faq2_question = $faq2['label'];
                                $faq2_answer = $faq2['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq2_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq2_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq3 = get_sub_field_object('FAQ3');
                                $faq3_question = $faq3['label'];
                                $faq3_answer = $faq3['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq3_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq3_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq4 = get_sub_field_object('FAQ4');
                                $faq4_question = $faq4['label'];
                                $faq4_answer = $faq4['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq4_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq4_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq5 = get_sub_field_object('FAQ5');
                                $faq5_question = $faq5['label'];
                                $faq5_answer = $faq5['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq5_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq5_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq6 = get_sub_field_object('FAQ6');
                                $faq6_question = $faq6['label'];
                                $faq6_answer = $faq6['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq6_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq6_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq7 = get_sub_field_object('FAQ7');
                                $faq7_question = $faq7['label'];
                                $faq7_answer = $faq7['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq7_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq7_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq8 = get_sub_field_object('FAQ8');
                                $faq8_question = $faq8['label'];
                                $faq8_answer = $faq8['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq8_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq8_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq9 = get_sub_field_object('FAQ9');
                                $faq9_question = $faq9['label'];
                                $faq9_answer = $faq9['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq9_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq9_answer; ?></p>
                                </div>
                            </details>
                            <?php
                                $faq10 = get_sub_field_object('FAQ10');
                                $faq10_question = $faq10['label'];
                                $faq10_answer = $faq10['value'];
                            ?>
                            <details>
                                <summary><?php echo str_replace("{{PROD}}", $prod_title, $faq10_question); ?></summary>
                                <div class="faq__content">
                                    <p><?php echo $faq10_answer; ?></p>
                                </div>
                            </details>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </section>
<?php  endif;
    endwhile;
endif; ?>

<?php if ( !empty($add_details) ): ?>
    <div id="additional-details">
        <div class="wrapper">
            <div class="title">
                <h3>Additional Details about <?php echo $prod_title; ?></h3>
            </div>
            <div class="details">
                <?php echo $add_details; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ( !empty($who_for) ): ?>
    <div id="additional-details">
        <div class="wrapper">
            <div class="title">
                <h3>Who <?php echo $prod_title; ?> is for</h3>
            </div>
            <div class="details">
                <?php echo $who_for; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
    $title = get_field('in-page_cta_title', 1436117);
    $description = get_field('in-page_cta_title_desc', 1436117);
    $featured_image = get_field('in-page_cta_title_image', 1436117);
    $download_btn = get_field('guide_cta_link', 1436117);
?>

<section class="start-content" id="field-guide-anchor">
    <div id="review_content"><!-- start #reviewcontent -->
        <div class="review_content_section count-02 count-04" id="field-guide-block">
            <div class="review_content_column_width">
                <p class="count"><?php echo $count; ?></p>
                <h3><?php echo $title; ?></h3>

                <p class="description"><?php echo $description; ?></p>

                <div class="cta-wrapper">
                    <?php if ( is_user_logged_in() ) { ?>
                        <div class="form-container hs-orange-btn">
                            <div class="orange-btn o-trig">
                                <?php echo $download_btn; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-container banner-trig accordions">
                            <div class="orange-btn o-trig accordions_title">
                                <span class="cta-message">Download the Full Guide</span>
                            </div>
                            <div class="form banner-hide">
                                <?php echo do_shortcode('[gravityform id="98"]'); ?>
                                <p>Already a Subscriber? <a href="#">Log in to your account</a> to receive your e-book!</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="review_content_column_width">
                <div class="visual-media">
                    <?php if( !empty( $featured_image ) ): ?>
                        <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="start-content" id="community-reviews-anchor">
    <div class="spacer-60 anchor"></div>
    <div id="community-reviews">
        <div class="wrapper">
            <div class="title">
                <h3><?php echo $prod_title; ?> Community Reviews</h3>
            </div>
            <div class="review-stats">
                <div class="r-column rate">
                    <p class="rating-title"><?php echo $community_rating ?></p>
                    <div><?php echo lwyrst_star_rating($community_rating); ?></div>
                    <?php $rating_count = lwyrst_get_community_review_count(get_the_ID());
                    if ( $rating_count == 1 ) {
                        $rating_sub = "Based on " . $rating_count . " Rating";
                    } else {
                        $rating_sub = "Based on " . $rating_count . " Ratings";
                    } ?>
                    <p class="sub-text"><?php echo $rating_sub; ?></p>
                    <div class="divider"></div>
                </div>
                <div class="r-column bars">
                    <div class="data-wrapper">
                        <div class="stats">
                            <div class="comp-stars"><?php echo lwyrst_star_rating(4.8); ?></div>
                            <div class="comp-bars"><div class="container"><div id="progressBar"><div id="progressBarFullFive"></div></div></div></div>
                            <div class="comp-total"><?php echo lawyerist_get_comment_rating_count(5); ?></div>
                        </div>
                        <div class="stats">
                            <div class="comp-stars"><?php echo lwyrst_star_rating(4); ?></div>
                            <div class="comp-bars"><div class="container"><div id="progressBar"><div id="progressBarFullFour"></div></div></div></div>
                            <div class="comp-total"><?php echo lawyerist_get_comment_rating_count(4); ?></div>
                        </div>
                        <div class="stats">
                            <div class="comp-stars"><?php echo lwyrst_star_rating(3); ?></div>
                            <div class="comp-bars"><div class="container"><div id="progressBar"><div id="progressBarFullThree"></div></div></div></div>
                            <div class="comp-total"><?php echo lawyerist_get_comment_rating_count(3); ?></div>
                        </div>
                        <div class="stats">
                            <div class="comp-stars"><?php echo lwyrst_star_rating(2); ?></div>
                            <div class="comp-bars"><div class="container"><div id="progressBar"><div id="progressBarFullTwo"></div></div></div></div>
                            <div class="comp-total"><?php echo lawyerist_get_comment_rating_count(2); ?></div>
                        </div>
                        <div class="stats">
                            <div class="comp-stars"><?php echo lwyrst_star_rating(1); ?></div>
                            <div class="comp-bars"><div class="container"><div id="progressBar"><div id="progressBarFullOne"></div></div></div></div>
                            <div class="comp-total"><?php echo lawyerist_get_comment_rating_count(1); ?></div>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
                <script>progress_per_bar('Five',  <?php echo lawyerist_get_comment_rating_count(5); ?>, <?php echo $community_review_count; ?>);</script>
                <script>progress_per_bar('Four',  <?php echo lawyerist_get_comment_rating_count(4); ?>, <?php echo $community_review_count; ?>);</script>
                <script>progress_per_bar('Three', <?php echo lawyerist_get_comment_rating_count(3); ?>, <?php echo $community_review_count; ?>);</script>
                <script>progress_per_bar('Two',   <?php echo lawyerist_get_comment_rating_count(2); ?>, <?php echo $community_review_count; ?>);</script>
                <script>progress_per_bar('One',   <?php echo lawyerist_get_comment_rating_count(1); ?>, <?php echo $community_review_count; ?>);</script>
                <div class="r-column">
                    <div class="write-review">
                        <div class="write-review-button" onclick="showDiv(); return false;">Write a Review</div>
                    </div>
                </div>
            </div>
            <div class="review-box">
                <?php
                    comment_form( array(
                        'title_reply'           => __( 'Leave a Review' ),
                        'comment_notes_before'  => '<p class="comment-notes">' . __( 'Your email address will not be published. All fields are required.' ) . '</p>',
                        'comment_notes_after'   => '<p class="comment-notes">' . __( 'By leaving a review you agree to abide by our <a href="/community-standards/">community standards</a>.' ) . '</p>',
                        'must_log_in'           => '<p class="must-log-in">' .  sprintf( __( 'You must <a href="%s">login or register</a> to post a review.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                        )
                    );
                ?>
            </div>
            <div id="comments_container">
                <?php
                    comments_template('/comments.php');
                    endwhile;
                endif; // Close the Loop.
                wp_reset_postdata();

                if ( $comment_count > 6 ) { ?>
                    <div id="add-more-comments">
                        <a href="#" class="comments_loadmore">Load More Reviews</a>
                    </div>
                <?php }
                load_comments();
?>
            </div>
    </div>
</div><!-- do not delete closing tags -->
</section>

    <!-- Footer Slider -->
    <?php get_template_part('blocks/block', 'relevant-object'); ?>
    <?php get_template_part('template-parts/related-resources');

?>

</div>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>

<?php get_footer(); ?>
