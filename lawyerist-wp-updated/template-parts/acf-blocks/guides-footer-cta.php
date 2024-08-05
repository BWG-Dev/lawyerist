<?php  
    $pageid = get_the_ID();
    $title = get_field( 'title' );
    $description = get_field( 'description' );
    $guide_button = get_field( 'guide_button' );
    $featured_image = get_field( 'featured_image' );

    $pageid = get_the_ID();
    $downloadid = $pageid;
    if ( is_page_template( 'template-parts/guides-child-page.php' ) ) :
        $parentid = wp_get_post_parent_id($pageid);
        $downloadid = $parentid;
    endif;
    $download_btn = get_field('guide_cta_link', $downloadid);
?>

<div class="download-footer">
    <div class="container">
        <div class="col-1">
            <p class="title"><?php echo $title; ?></p>
            <p class="description"><?php echo $description; ?></p>
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
                        <p>Already an Insider? <a href="#">Log in to your account</a> to receive your e-book!</p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-1">
            <div class="img-container">
                <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>"/>
            </div>
        </div>
    </div>
</div>


<script>
/*function toggleDownloadFooter() {
  var x = document.querySelector(".download-footer .form-container .form");
  if (x.style.display !== "none") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

// Add event listener to table
const elZ = document.querySelector(".download-footer .form-container .orange-btn");
elZ.addEventListener("click", toggleDownloadFooter, false);*/
</script>