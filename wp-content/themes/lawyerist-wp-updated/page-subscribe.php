<?php /* Template Name: Subscribe */ ?>

<?php get_header();

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

    <div id="review_container" class="subscribe-page">

        <div class="review-banner-container">
            <!-- start - #review-breadcrumbs -->
            <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
            <!-- end - #review-breadcrumbs -->
        </div>

        <div class="c-container">
            <div class="col-1">
                <div class="form-wrapper">
                    <h1><?php the_field('page_title'); ?></h1>
                    <div class="page-meta">
                        <?php the_field('page_meta'); ?>
                    </div>
                    <?php if (is_user_logged_in()) { ?>
                        <div class="subscriber-message">
                            <?php the_field('subscriber_message'); ?>
                        </div>
                    <?php } else { ?>
                        <div class="form-pro-wrapper" style="position:relative;">
                            <?php the_field('contact_form'); ?>
                        </div>
                    <?php } ?>

                    <?php if( is_page('1437957') ) :
											//the following logic chooses a URL to put into the download button based on where ther user came from. It takes into account Guide pages and PPC landing pages
											//TODO: put these URL choices into global ACF options fields
                        $redirected_post_id = $_GET['ppc-id'];
                        if( $redirected_post_id == '1437965' || $redirected_post_id == '1404735' ) { // Guide to Managing a Law Firm
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Complete-Guide-to-Managing-a-Law-Firm-v2.pdf?hsCtaTracking=8fb1d478-61f0-480f-9667-89ccc35f04b4%7C1c36d78e-4056-4e25-9a1c-0168a3cb58bb';
                        } elseif( $redirected_post_id == '1437963' || $redirected_post_id == '1404766' ) { //Law Firm Hiring & Staffing
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Law-Firm-Hiring-Staffing-GrowingComplete-Guide--v2.pdf?hsCtaTracking=f1c656ad-52bf-4f87-bf3a-0810b9eca4e6%7C20007566-2429-4f9d-a904-65ff81cdba0a';
                        } elseif( $redirected_post_id == '1437961' || $redirected_post_id == '1404741' ) { //Law Firm Marketing
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Law-Firm-Marketing-Complete-Guide.pdf?hsCtaTracking=f091bbe3-46fe-464c-907d-ec9b7ef4e9d2%7C1f042232-d193-49a3-b0ef-63e823558897';
                        } elseif( $redirected_post_id == '1437959' || $redirected_post_id == '1404724' ) { //Law Firm Pricing
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Law-Firm-Pricing-Complete-Guide.pdf?hsCtaTracking=afac0950-73bf-4ca7-89c2-04b2ce8ed585%7Ce30f3655-6d83-49fd-97db-4a9352c83d66';
                        } elseif( $redirected_post_id == '1404821' ) { //Legal Technology
                            $guide_url = ' https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Law-Firm-Legal-Tech-Complete-Guide-v2.pdf?hsCtaTracking=2541cd71-e2b0-40f6-8a02-d7b139e7a224%7C0841d222-a094-4fe5-a0cf-4ccf86bd7e5c';
                        } elseif($redirected_post_id == '1404808' ) { // Web Design
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Law-Firm-Web-Design-Complete-Guide-v2.pdf?hsCtaTracking=31c22ffc-29a3-4339-8b03-3074fba7b8de%7C9c3c03fc-f43a-47a1-9e51-cd2340083a77';
                        } elseif($redirected_post_id == '1404730' ) { // Law Firm Finances
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Guides/Lawyerist_Law-Firm-Finances-Guide.pdf?hsCtaTracking=769a9c7d-3ba7-4067-aa38-45a63ba265ff%7Ce59ef5af-a756-4fcc-8e88-556529e99157';
                        } elseif($redirected_post_id == '1403714' ) { // Law Firm Clients
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Law-Firm-Clients-Complete-Guide.pdf?hsCtaTracking=d2163b9c-b77a-49a9-a237-698e449b5ac4%7C450d86d1-667d-4db5-b4a7-f2cfc8f7b11a';
                        } elseif($redirected_post_id == '1404756' ) { // How to Start a Law Firm
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist-Complete-Guide-How-to-Start-Law-a-Firm-v2.pdf?hsCtaTracking=05058c42-6a7d-441d-9a1a-eadd94296281%7Cb0214bc3-256c-4d80-b574-013454eb09ca';
                        } elseif($redirected_post_id == '1436117' ) { //Field Guide
                            $guide_url = 'https://2910598.fs1.hubspotusercontent-na1.net/hubfs/2910598/Lawyerist_FieldGuide_BuyingProducts&Services_3rdEdition%20(1).pdf';
                        } else {
                            $guide_url = '/';
                        } ?>
                        <div class="spacer-15">&nbsp;</div>
                        <div id="download-pdf-btn">
                            <a target="_blank" href="<?php echo esc_url($guide_url); ?>">Download PDF</a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-2">
                <?php the_post_thumbnail(); ?>
                <div class="pin-container">
                    <div class="pin-map"></div>
                    <div class="pin-text">
                        <div class="pin"></div>
                        <p class="pin-p">We Are Here</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="subscribe-page_lower">
            <?php the_content(); ?>
            <div class="spacer-60">&nbsp;</div>
        </div>

    </div>

<style>
    #footer {
        position: relative;
        z-index:3;
    }
</style>

<?php get_footer(); ?>
