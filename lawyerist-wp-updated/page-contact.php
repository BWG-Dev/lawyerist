<?php /* Template Name: Contact Page Template */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

    <div id="review_container" class="contact-page">

        <div class="review-banner-container">

            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->
        </div>
        
        <div class="c-container">
            <div class="col-1">
                <div class="form-wrapper">
                    <h1>Contact Us</h1>
                    <p>We love to hear from members of the Lawyerist community, so feel free to email us using the submission form below.</p>
                    <div class="form-pro-wrapper" style="position:relative;">
                        <?php echo do_shortcode('[gravityform id="99"]'); ?>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="company-details">
                        <div class="orange-title">FOLLOW US ON SOCIAL</div>
                        <div class="divider"></div>

                        <div class="social-icons">
                            <a href="<?php the_field('facebook_url', 'options'); ?>" target="_blank" title="Lawyerist Facebook" class="social-icon_facebook"></a>
                            <a href="<?php the_field('linkedin_url', 'options'); ?>" target="_blank" title="Lawyerist LinkedIn" class="social-icon_linkedin"></a>

                        </div>
                        <div class="tb-spacing"></div>
                        <div class="orange-title">OUR ADDRESS</div>
                        <div class="divider"></div>
                        <p class="company-name">Lawyerist</p>
                        <?php the_field('company_details', 'options'); ?>
                    <div class="pin-container">
                        <div class="pin-map"></div>
                        <div class="pin-text">
                            <div class="pin"></div>
                            <p class="pin-p">We Are Here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script>
jQuery( document ).ready(function() {

    //TOGGLING NESTED ul
    jQuery(".drop-down .selected a").click(function() {
        jQuery(".drop-down .options ul").toggle();
    });

    //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
    jQuery(".drop-down .options ul li a").click(function() {
        var text = jQuery(this).html();
        jQuery(".drop-down .selected a span").html(text);
        jQuery(".drop-down .options ul").hide();

        let innerP = document.querySelector(".selected .value").innerText;
        console.log(innerP);
        if (innerP == 1) {
            jQuery(".general-block-one").show();
        } else {
            jQuery(".general-block-one").hide();
        }
        if (innerP == 2) {
            jQuery(".general-block-two").show();
        } else {
            jQuery(".general-block-two").hide();
        }
        if (innerP == 3) {
            jQuery(".general-block-three").show();
        } else {
            jQuery(".general-block-three").hide();
        }
        if (innerP == 4) {
            jQuery(".general-block-four").show();
        } else {
            jQuery(".general-block-four").hide();
        }
    }); 

    //HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
    jQuery(document).bind('click', function(e) {
        var $clicked = jQuery(e.target);
        if (! $clicked.parents().hasClass("drop-down"))
        jQuery(".drop-down .options ul").hide();
    });
    
});
</script>

<style>
    #footer {
        position: relative;
        z-index:3;
    }
</style>

<?php get_footer(); ?>