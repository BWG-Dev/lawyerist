<?php 
    // (Block) Frontpage Banner
    $header = get_field( 'header' );
    $sub_text = get_field( 'sub_text' );
    $sub_description = get_field( 'sub_description' );
    $link_one = get_field( 'link_one' );
    $link_one_text = get_field( 'link_one_text' );
    $link_two = get_field( 'link_two' );
    $link_two_text = get_field( 'link_two_text' );
    $background_image = get_field('background_image');
?>

<section class="start-content">
    <div id="review-banner" class="dark-bkgd" style="background:#424b54;"><!-- Start Banner -->

        <div  class="review-banner-container">
            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->
            <!-- Start - #banner-inner-content -->
            <div id="banner-inner-content">
                <div class="col-1">
                    <div class="wrapper">
                        <?php echo $header; ?>
                        <p class="sub-title"><?php echo $sub_text; ?></p>
                        <p class="sub-description"><?php echo $sub_description; ?></p>
                        <div class="options-container">
                            <p>We can help.</p>
                            <a href="<?php echo $link_one; ?>">
                                <div class="btn">
                                    <span><?php echo $link_one_text; ?></span>
                                </div>
                            </a>
                            <a href="<?php echo $link_two; ?>">
                                <div class="btn">
                                    <span><?php echo $link_two_text; ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="image-mobile">
                    <div class="b-content"></div>
                    <div class="member-name"><span>Stephanie Everett</span><br /><span class="font-cur">CEO & Lab Coach<span></div>
                </div>
                <div class="image-desktop">
                    <div class="b-content"></div>
                    <div class="member-name"><span>Stephanie Everett</span><br /><span class="font-cur">CEO & Lab Coach<span></div>
                </div>
            </div>
            <!-- End -->
        </div>
    </div><!-- End Banner -->
</section>
