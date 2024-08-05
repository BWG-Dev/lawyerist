<?php /* Template Name: Product Landing Page */ ?>

<?php get_header(); 


	// Assign post variables.
	$page_title = the_title( '', '', FALSE );

	// Featured image
	$show_featured_image 		= get_field( 'show_featured_image' );
	$updated_featured_image		= get_field( 'updated_featured_image' );
	$backgroundImg 				= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$include_PRW 				= get_field('include_rec_wizard');
	$PRW_link 					= get_field('rec_wizard_link');
	$PRW_url 					= $PRW_link['url'];
	$PRW_title 					= $PRW_link['title'];

    $banner_description		= get_field( 'banner_description' );
    $one_top		        = get_field( '01_sub_description_top' );
    $one_bottom	 	        = get_field( '01_sub_description_bottom' );
    $two_top		        = get_field( '02_sub_description_top' );
    $two_bottom		        = get_field( '02_sub_description_bottom' );
    $three_top		        = get_field( '03_sub_description_top' );
    $three_bottom		    = get_field( '03_sub_description_bottom' );

?>

<div id="review_container">

    <?php get_template_part( 'template-parts/sub', 'navigation' ); ?>
    <section class="start-content">
        <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>

        <div id="review-banner">

            <div class="review-banner-container">
                <!-- start - #review-banner-image-mobile -->
                <div class="banner-image-container">
                    <div class="image"></div>
                </div>
                <!-- end - #review-banner-image-mobile -->

                <!-- start - #review-banner-content -->
                <div id="review-banner-content">

                    <div class="banner-pin">
                        <svg id="pin" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 137.21 196.74" fill="#FF7062"><path d="M101.22,1.54a68.6,68.6,0,0,1,68.6,68.61c0,37.89-68.6,128.14-68.6,128.14S32.61,108,32.61,70.15A68.61,68.61,0,0,1,101.22,1.54Zm0,98.38A29.77,29.77,0,1,0,71.45,70.15,29.77,29.77,0,0,0,101.22,99.92Z" transform="translate(-32.61 -1.54)"/></svg>
                        <p class="pin-text">Explore where<br />you are in your journey.</p>

                        <div class="pin-path-container">
                            <svg id="pin-path" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 362.862 876.67">
                                <g id="product-landing-dotted-line-graphic-1" transform="translate(-810.138 -475.33)">
                                    <path id="Path_859" data-name="Path 859" d="M-5065.85,430.669s-6.318,209.48,74.35,419.216,248.324,419.726,248.324,419.726" transform="translate(5877.137 44.691)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7"/>
                                    <g id="Group_490" data-name="Group 490">
                                    <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                    <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                        <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                        <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                    </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="banner-responsive">

                        <div class="res-title">

                            <h1 class="title"><?php echo $page_title; ?></h1>

                            <p class="m-btm"><?php echo $banner_description; ?></p>

                        </div>

                    </div>

                    <div class="banner-cta-container">

                        <div class="desktop-align">

                            <p class="txt-orange question">What we can help you with?</p>

                            <div class="banner-card-wrapper">

                                <a class="c1 cta" href="#growing" title="Growing My Firm">
                                    <div class="svg-wrap">
                                        <svg xmlns="https://www.w3.org/2000/svg" width="90.042" height="68.466" viewBox="0 0 90.042 68.466">
                                        <g id="firm-growth-primary-icon" transform="translate(-664.044 -854.665)">
                                            <rect id="Rectangle_1287" data-name="Rectangle 1287" width="86.305" height="64.729" rx="7.821" transform="translate(665.912 856.534)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                            <line id="Line_21" data-name="Line 21" x2="86.305" transform="translate(665.912 871.717)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_22" data-name="Line 22" x2="6.113" transform="translate(713.18 866.59)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <rect id="Rectangle_1288" data-name="Rectangle 1288" width="4.795" height="4.795" transform="translate(726.365 861.796)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_23" data-name="Line 23" y1="4.855" x2="4.855" transform="translate(738.442 861.766)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_24" data-name="Line 24" x1="4.855" y1="4.855" transform="translate(738.442 861.766)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_25" data-name="Line 25" y2="3.776" transform="translate(679.452 905.08)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_26" data-name="Line 26" y2="6.473" transform="translate(685.074 902.383)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_27" data-name="Line 27" y2="9.709" transform="translate(690.697 899.147)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_28" data-name="Line 28" y2="12.946" transform="translate(696.319 895.91)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_29" data-name="Line 29" y2="8.091" transform="translate(701.942 900.765)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_30" data-name="Line 30" y2="10.788" transform="translate(707.564 898.068)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_31" data-name="Line 31" y2="14.025" transform="translate(713.186 894.831)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_32" data-name="Line 32" y2="17.261" transform="translate(718.809 891.595)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_33" data-name="Line 33" y2="20.497" transform="translate(724.431 888.359)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <path id="Path_867" data-name="Path 867" d="M678.844,899.49l17.475-10.081,5.622,5.445,22.49-12.968" fill="#ededed" stroke="#ff7062" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.99"/>
                                            <rect id="Rectangle_1289" data-name="Rectangle 1289" width="4.795" height="4.795" rx="0.393" transform="translate(734.18 892.003)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <path id="Path_868" data-name="Path 868" d="M733.891,882.993l1.862,1.862,3.532-3.532" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <rect id="Rectangle_1290" data-name="Rectangle 1290" width="4.795" height="4.795" rx="0.393" transform="translate(734.18 903.87)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        </g>
                                        </svg>
                                    </div>

                                    <div class="card-title ct-01">
                                        <p class="title">Growing My Firm</p>
                                    </div>
                                </a>

                                <a class="c1 cta" href="#serving" title="Delivering Services">
                                    <div class="svg-wrap">
                                        <svg xmlns="https://www.w3.org/2000/svg" width="87.244" height="75.191" viewBox="0 0 87.244 75.191">
                                        <g id="service-delivery-primary-icon" transform="translate(-662.691 -755.59)">
                                            <rect id="Rectangle_1291" data-name="Rectangle 1291" width="83.507" height="52.074" transform="translate(664.559 776.838)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                            <path id="Path_869" data-name="Path 869" d="M682.488,817.479V756.337h37.784l9.865,10.025v51.118" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <circle id="Ellipse_180" data-name="Ellipse 180" cx="2.186" cy="2.186" r="2.186" transform="translate(704.127 820.689)" fill="#424b54"/>
                                            <path id="Path_870" data-name="Path 870" d="M720.272,756.337V766.61h9.865" fill="#ff7062" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <path id="Path_871" data-name="Path 871" d="M682.488,817.479V756.337h37.784l9.865,10.025v51.118" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_34" data-name="Line 34" x2="84.008" transform="translate(664.308 817.976)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_35" data-name="Line 35" x2="16.404" transform="translate(691.109 773.072)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_36" data-name="Line 36" x2="32.808" transform="translate(691.109 780.253)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_37" data-name="Line 37" x2="32.808" transform="translate(691.109 787.433)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_38" data-name="Line 38" x2="16.404" transform="translate(691.109 794.613)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <path id="Path_872" data-name="Path 872" d="M690.446,808.7a12.05,12.05,0,0,0,3.513-2.888,1.756,1.756,0,0,1,2.9.088h0a1.744,1.744,0,0,0,2,.74l9.815-3.076" fill="#ededed" stroke="#ff7062" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <path id="Path_873" data-name="Path 873" d="M701.548,802.567s0-2.983,2.651-2.983" fill="#ededed" stroke="#ff7062" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.495"/>
                                        </g>
                                        </svg>
                                    </div>

                                    <div class="card-title ct-02">
                                        <p class="title">Delivering Services</p>
                                    </div>
                                </a>

                                <a class="c1 cta" href="#managing" title="Managing My Office">
                                    <div class="svg-wrap">
                                        <svg xmlns="https://www.w3.org/2000/svg" width="99.129" height="67.697" viewBox="0 0 99.129 67.697">
                                        <g id="office-management-primary-icon" transform="translate(-507.636 -763.084)">
                                            <rect id="Rectangle_1292" data-name="Rectangle 1292" width="83.507" height="52.074" transform="translate(509.505 776.838)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                            <path id="Path_874" data-name="Path 874" d="M509.505,776.838l34.436,33.275a10.53,10.53,0,0,0,14.635,0l34.436-33.275" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_39" data-name="Line 39" x2="27.914" y2="24.552" transform="translate(565.332 803.579)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <line id="Line_40" data-name="Line 40" x1="27.914" y2="24.552" transform="translate(509.505 803.579)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                            <circle id="Ellipse_181" data-name="Ellipse 181" cx="12.823" cy="12.823" r="12.823" transform="translate(579.25 764.953)" fill="#ff7062" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                            <g id="Group_499" data-name="Group 499">
                                            <path id="Path_875" data-name="Path 875" d="M587.294,773.125l4.119-1.8h2.913v13.448h-3.244V774.38l-3.1,1.349Z" fill="#fff"/>
                                            </g>
                                        </g>
                                        </svg>
                                    </div>

                                    <div class="card-title ct-03">
                                        <p class="title">Managing My Office</p>
                                    </div>
                                </a>

                            </div>
                            <div class="spacer-30"></div>
                            <a href="#field-guide-anchor" class="link field-guide large-icon">Download the Field Guide</a>
                        </div>

                    </div>
                    
                </div>
                <!-- end - #review-banner-content -->

            </div>

        </div>
    </section>

	<div id="review_content"><!-- start #reviewcontent -->
        <section class="start-content"><div class="spacer-30">&nbsp;</div></section>
        <section class="start-content" id="growing">
            <div class="review_content_section count-01">
                <div class="review_content_column_width">
                    <p class="count">01</p>
                    <h3>Firm Growth</h3>
                    <p><?php echo $one_top ?></p>
                    <div class="review_content_link_tabs">
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="seo" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 197.2 197.13"><path d="M198.62,67.69a56.88,56.88,0,0,0-56.87-57.14h-.13a56.63,56.63,0,0,0-40.25,16.57L69.6,58.74a59.09,59.09,0,0,0-4,4.4l-.9,1.12.18.14a57.05,57.05,0,0,0-5.69,4.88L27.43,100.91a57,57,0,0,0,40.12,97.44h.13a56.66,56.66,0,0,0,40.25-16.57l31.75-31.61,2-1.93c5.19-5,8.13-7.88,8.85-8.74l-.17-.14L181.86,108A56.65,56.65,0,0,0,198.62,67.69ZM103.23,177.06a50,50,0,0,1-35.55,14.63h-.12a50.39,50.39,0,0,1-35.43-86.06L63.9,74A50,50,0,0,1,99.44,59.38h.12a50.13,50.13,0,0,1,35.61,14.79c6.6,6.63,10.47,13.13,12.59,20.91l-18.07,18c.1-1.06.21-2.11.21-3.27A30.34,30.34,0,0,0,99.52,79.27h-.06a30.32,30.32,0,0,0-21.53,8.84L46.16,119.72a30.56,30.56,0,0,0,0,43.2,30.18,30.18,0,0,0,21.48,8.87h.09A30.24,30.24,0,0,0,89.19,163l8.21-8.17a57.84,57.84,0,0,0,12.31,1.39h.13a57.27,57.27,0,0,0,17-2.56ZM153,89.82c-2.59-7.4-6.72-13.88-13.25-20.45a56.47,56.47,0,0,0-20.62-13.11l5.63-5.6a23.68,23.68,0,0,1,16.83-6.9h0a23.84,23.84,0,0,1,16.77,40.69Zm-66.11-.31a23.76,23.76,0,0,1,12.53-3.58h.05a23.68,23.68,0,0,1,23.73,23.85,19.13,19.13,0,0,1-2.81,10.53A27.38,27.38,0,0,1,109.79,123,23.66,23.66,0,0,1,93,116C86,109,83.63,98.11,86.93,89.51Zm-30.51,29.4a56.2,56.2,0,0,0,33.7,33.73l-5.62,5.6a23.69,23.69,0,0,1-16.82,6.89h-.06a23.79,23.79,0,0,1-16.76-40.68Zm89,16a50.06,50.06,0,0,1-35.55,14.63h-.13a50,50,0,0,1-48-35.84L78.9,96.54a33.31,33.31,0,0,0,9.38,24.21,30.31,30.31,0,0,0,21.5,8.88h.08a30.27,30.27,0,0,0,21.5-8.84l31.77-31.62A30.45,30.45,0,0,0,141.69,37.1h-.06a30.34,30.34,0,0,0-21.53,8.84l-8.21,8.17a57.93,57.93,0,0,0-12.32-1.39h-.13a57.44,57.44,0,0,0-16.9,2.53l23.52-23.41a50,50,0,0,1,35.56-14.63h.11a50.4,50.4,0,0,1,35.44,86.06Z" transform="translate(-1.42 -1.22)"/><path d="M51.47,56a3.33,3.33,0,0,0,4.7-4.71L20,15.05a3.33,3.33,0,0,0-4.7,4.71Z" transform="translate(-1.42 -1.22)"/><path d="M48.07,62.62a3.33,3.33,0,0,0-3.33-3.33h-40a3.33,3.33,0,0,0,0,6.65h40A3.32,3.32,0,0,0,48.07,62.62Z" transform="translate(-1.42 -1.22)"/><path d="M62.81,47.87a3.33,3.33,0,0,0,3.33-3.33v-40a3.33,3.33,0,1,0-6.66,0v40A3.33,3.33,0,0,0,62.81,47.87Z" transform="translate(-1.42 -1.22)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/seo-marketing/" title="SEO & Marketing">SEO &#38; Marketing</a>
                            </div>
                        </div>
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="send-doc" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 195.25 190.23"><path d="M198.19,112.33l-.31-51.5-55-55L88.6,60H60.07a3,3,0,0,0,0,6H82.61L52.82,95.78H5.94a3,3,0,1,0,0,6H46.83L33.55,115.05l18.39,18.39H39.16a3,3,0,1,0,0,6H57.93L114.51,196Zm-6.26-43.07.23,36.4L173.85,87.35Zm-94.4,64.18H60.41L42,115.05l13.28-13.28H86.43a3,3,0,1,0,0-6H61.3L91.08,66h27.36a3,3,0,1,0,0-6H97.07l45.76-45.75,47.82,47.83L165.38,87.35,190,112l-75.53,75.53L66.4,139.43H97.53a3,3,0,0,0,0-6Z" transform="translate(-2.94 -5.78)"/><path d="M32.77,66H49.25a3,3,0,0,0,0-6H32.77a3,3,0,0,0,0,6Z" transform="translate(-2.94 -5.78)"/><path d="M28.33,133.44H11.85a3,3,0,0,0,0,6H28.33a3,3,0,1,0,0-6Z" transform="translate(-2.94 -5.78)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/intake-crm/" title="Intake CRM">Intake CRM</a>
                            </div>
                        </div>
                    </div>
                    <p class="normal-text"><?php echo $one_bottom ?></p>
                </div>
                <div class="review_content_column_width">
                    <div class="visual-media">
                        <img alt="Descriptive Text" src="/wp-content/uploads/2022/01/product-review-landing-firm-growth-img.png" />
                        <div class="animated-icon">
                            <div class="icons-01-main">
                                <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 90.042 68.466">
                                    <g id="firm-growth-primary-icon" transform="translate(-664.044 -854.665)">
                                        <rect id="Rectangle_1287" data-name="Rectangle 1287" width="86.305" height="64.729" rx="7.821" transform="translate(665.912 856.534)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                        <line id="Line_21" data-name="Line 21" x2="86.305" transform="translate(665.912 871.717)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_22" data-name="Line 22" x2="6.113" transform="translate(713.18 866.59)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <rect id="Rectangle_1288" data-name="Rectangle 1288" width="4.795" height="4.795" transform="translate(726.365 861.796)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_23" data-name="Line 23" y1="4.855" x2="4.855" transform="translate(738.442 861.766)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_24" data-name="Line 24" x1="4.855" y1="4.855" transform="translate(738.442 861.766)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_25" data-name="Line 25" y2="3.776" transform="translate(679.452 905.08)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_26" data-name="Line 26" y2="6.473" transform="translate(685.074 902.383)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_27" data-name="Line 27" y2="9.709" transform="translate(690.697 899.147)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_28" data-name="Line 28" y2="12.946" transform="translate(696.319 895.91)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_29" data-name="Line 29" y2="8.091" transform="translate(701.942 900.765)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_30" data-name="Line 30" y2="10.788" transform="translate(707.564 898.068)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_31" data-name="Line 31" y2="14.025" transform="translate(713.186 894.831)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_32" data-name="Line 32" y2="17.261" transform="translate(718.809 891.595)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_33" data-name="Line 33" y2="20.497" transform="translate(724.431 888.359)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <path id="Path_867" data-name="Path 867" d="M678.844,899.49l17.475-10.081,5.622,5.445,22.49-12.968" fill="#ededed" stroke="#ff7062" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.99"/>
                                        <rect id="Rectangle_1289" data-name="Rectangle 1289" width="4.795" height="4.795" rx="0.393" transform="translate(734.18 892.003)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <path id="Path_868" data-name="Path 868" d="M733.891,882.993l1.862,1.862,3.532-3.532" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <rect id="Rectangle_1290" data-name="Rectangle 1290" width="4.795" height="4.795" rx="0.393" transform="translate(734.18 903.87)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="icons-secondary-firm">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 170.03 196.59"><path d="M23.77,86a74.52,74.52,0,1,1,143,29.45l9.64,4.15A85,85,0,1,0,13.27,86c0,43.85,34.22,81,77.91,84.67l.87-10.47C53.76,157,23.77,124.41,23.77,86Z" transform="translate(-13.27 -0.97)"/><path d="M152.4,102.7a56.66,56.66,0,1,0-61,39.5l.51-4.17a52.59,52.59,0,1,1,56.52-36.57Z" transform="translate(-13.27 -0.97)"/><path d="M98.29,58.69a27.4,27.4,0,0,1,27.26,26.84l4.2-.07a31.48,31.48,0,1,0-38.61,31.17l1-4.09a27.28,27.28,0,0,1,6.2-53.85Z" transform="translate(-13.27 -0.97)"/><path d="M176.77,144l-68-49.57v84.13a4.38,4.38,0,0,0,2.5,4.19,4.6,4.6,0,0,0,4.94-1.35l16.13-15.65,16.19,28.58a6.69,6.69,0,0,0,4.26,3,7.34,7.34,0,0,0,1.75.2,8.71,8.71,0,0,0,4.61-1.36l7.32-4.61c3.71-2.33,5.09-6.83,3.14-10.23l-15-26H173c3.18-.06,5.64-1.76,6.41-4.45A6.22,6.22,0,0,0,176.77,144Zm-1.36,5.73a2.3,2.3,0,0,1-2.41,1.4H147.34L166,183.45c.8,1.41,0,3.48-1.75,4.59l-7.31,4.61a4.2,4.2,0,0,1-3.18.62,2.51,2.51,0,0,1-1.6-1.05L133.33,159l-20,19.44-.31.26s0-.08,0-.13V102.71l61.36,44.74.1.06A2,2,0,0,1,175.41,149.75Z" transform="translate(-13.27 -0.97)"/></svg>
                            </div>
                            <div class="icons-secondary-phone">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 179.15 195.52"><path d="M112.14,1.51H23.91A14.24,14.24,0,0,0,9.69,15.73V182.8A14.24,14.24,0,0,0,23.91,197h88.23a14.25,14.25,0,0,0,14.23-14.22V15.73A14.25,14.25,0,0,0,112.14,1.51Zm4.59,181.29a4.6,4.6,0,0,1-4.59,4.59H23.91a4.59,4.59,0,0,1-4.58-4.59V15.73a4.59,4.59,0,0,1,4.58-4.59h88.23a4.6,4.6,0,0,1,4.59,4.59Z" transform="translate(-9.69 -1.51)"/><path d="M77.32,18.06H46.55a1.93,1.93,0,0,0,0,3.85H77.32a1.93,1.93,0,1,0,0-3.85Z" transform="translate(-9.69 -1.51)"/><path d="M88.18,17.49A2.49,2.49,0,1,0,90.67,20,2.49,2.49,0,0,0,88.18,17.49Z" transform="translate(-9.69 -1.51)"/><path d="M176.75,87.55a12.07,12.07,0,0,0-11.91,10.37h-31a1.93,1.93,0,1,0,0,3.85h31.06a12.08,12.08,0,1,0,11.87-14.22Zm0,20.32A8.24,8.24,0,1,1,185,99.64,8.24,8.24,0,0,1,176.75,107.87Z" transform="translate(-9.69 -1.51)"/><path d="M176.75,51.45a12.06,12.06,0,0,0-12,10.87H157.4a6.86,6.86,0,0,0-6.84,6.85v5.09a3,3,0,0,1-3,3H134.23a1.93,1.93,0,1,0,0,3.85h13.33a6.85,6.85,0,0,0,6.85-6.85V69.17a3,3,0,0,1,3-3H165a12.08,12.08,0,1,0,11.78-14.73Zm0,20.33A8.24,8.24,0,1,1,185,63.54,8.25,8.25,0,0,1,176.75,71.78Z" transform="translate(-9.69 -1.51)"/><path d="M134.64,61.2h2.07A8.17,8.17,0,0,0,144.87,53V34.39a4.31,4.31,0,0,1,4.3-4.3H165a12.24,12.24,0,1,0-.18-3.86H149.17A8.18,8.18,0,0,0,141,34.39V53a4.31,4.31,0,0,1-4.3,4.31h-2.07a1.93,1.93,0,0,0,0,3.85Zm42.11-42a8.24,8.24,0,1,1-8.23,8.23A8.25,8.25,0,0,1,176.75,19.22Z" transform="translate(-9.69 -1.51)"/><path d="M176.75,122.9A12.09,12.09,0,0,0,165,132.35H157.4a3,3,0,0,1-3-3v-5.09a6.86,6.86,0,0,0-6.85-6.86H134.23a1.93,1.93,0,1,0,0,3.86h13.33a3,3,0,0,1,3,3v5.09a6.85,6.85,0,0,0,6.84,6.85h7.39a12.06,12.06,0,1,0,12-13.31Zm0,20.32A8.24,8.24,0,1,1,185,135,8.24,8.24,0,0,1,176.75,143.22Z" transform="translate(-9.69 -1.51)"/><path d="M176.75,159A12.09,12.09,0,0,0,165,168.44h-15.8a4.31,4.31,0,0,1-4.3-4.3V145.49a8.17,8.17,0,0,0-8.16-8.16h-2.07a1.93,1.93,0,0,0,0,3.85h2.07a4.31,4.31,0,0,1,4.3,4.31v18.65a8.17,8.17,0,0,0,8.16,8.16h15.62a12.06,12.06,0,1,0,12-13.31Zm0,20.33a8.24,8.24,0,1,1,8.24-8.24A8.25,8.25,0,0,1,176.75,179.32Z" transform="translate(-9.69 -1.51)"/></svg>
                            </div>
                        </div>
                        <div class="pin-path-container">
                            <svg id="pin-path-2" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 354.933 365.404">
                                <g id="product-landing-dotted-line-graphic-2" transform="translate(-736 -1665.596)">
                                    <path id="Path_862" data-name="Path 862" d="M-4562,1665.956s-42.3,109.744-117.233,190.549-193.331,136.674-193.331,136.674" transform="translate(5652)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                                    <g id="map-dot-icon" transform="translate(-370 679)">
                                    <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                    <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                        <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                        <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                    </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <section class="start-content" id="serving">
            <div class="review_content_section count-02">
                <div class="review_content_column_width">
                    <p class="count">02</p>
                    <h3>Delivering Services</h3>
                    <p class="normal-text"><?php echo $two_top ?></p>
                    <div class="review_content_link_tabs">
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="cog-check" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 196.73 196.74"><path d="M128.38,72.89a5.91,5.91,0,0,0-8.34,0l-29.49,29.5L79.78,91.62a5.9,5.9,0,0,0-8.33,0l-6.89,6.89a5.9,5.9,0,0,0,0,8.35l21,21a7,7,0,0,0,9.91,0l39.78-39.78a5.93,5.93,0,0,0,0-8.34ZM90.55,122.25,71,102.69l4.63-4.63,10.75,10.75a5.86,5.86,0,0,0,4.17,1.73h0a5.85,5.85,0,0,0,4.17-1.72l29.49-29.49L128.85,84Z" transform="translate(-1.55 -1.54)"/><path d="M193.86,116.23l-21-11.13c.24-3.42.23-6.9.29-11l20.68-10.5a8.13,8.13,0,0,0,3.83-10.3l-9.81-23.67a8.14,8.14,0,0,0-10-4.61l-22.73,7c-2.26-2.63-4.72-5.09-7.55-8l7.2-22a8.12,8.12,0,0,0-4.59-10l-23.66-9.8A8.12,8.12,0,0,0,116.24,6L105.09,27c-3.41-.23-6.89-.22-11-.29L83.6,6A8.12,8.12,0,0,0,73.29,2.16L49.62,12A8.14,8.14,0,0,0,45,22l7,22.73c-2.61,2.26-5.07,4.71-8,7.55L22,45a8.18,8.18,0,0,0-10,4.6L2.16,73.28A8.13,8.13,0,0,0,6,83.6L27,94.74c-.23,3.39-.23,6.87-.29,11L6,116.23a8.14,8.14,0,0,0-3.82,10.32L12,150.22a8.12,8.12,0,0,0,10,4.59l22.73-7c2.3,2.65,4.75,5.11,7.55,8l-7.2,22a8.12,8.12,0,0,0,4.59,10l23.67,9.81a8.13,8.13,0,0,0,10.31-3.82l11.14-21c3.36.23,6.84.22,11,.28l10.5,20.69a8.11,8.11,0,0,0,10.31,3.82l23.67-9.81a8.11,8.11,0,0,0,4.58-10l-7-22.74c2.64-2.29,5.11-4.74,8-7.54l22,7.2a8.17,8.17,0,0,0,10-4.59l9.81-23.68A8.15,8.15,0,0,0,193.86,116.23Zm-12.92,31.12a.59.59,0,0,1-.73.32l-22-7.19a8.16,8.16,0,0,0-8.68,2.45,65.66,65.66,0,0,1-6.58,6.55,8.11,8.11,0,0,0-2.46,8.68l7.21,22.06a.61.61,0,0,1-.34.73l-23.66,9.8a.62.62,0,0,1-.76-.28l-10.5-20.7a8.1,8.1,0,0,0-7.87-4.39,65.36,65.36,0,0,1-9.28,0,8.17,8.17,0,0,0-7.87,4.4L76.91,190.47a.59.59,0,0,1-.75.28L52.49,181a.61.61,0,0,1-.34-.74l7.2-22a8.11,8.11,0,0,0-2.45-8.68,63.41,63.41,0,0,1-6.54-6.57,8.09,8.09,0,0,0-8.69-2.47l-22.06,7.21a.6.6,0,0,1-.72-.33l-9.8-23.67a.58.58,0,0,1,.28-.75l20.68-10.5a8.1,8.1,0,0,0,4.4-7.88,66.87,66.87,0,0,1,0-9.28A8.15,8.15,0,0,0,30,87.39L9.37,76.91a.58.58,0,0,1-.28-.75l9.8-23.67a.57.57,0,0,1,.73-.33l22,7.2a8.11,8.11,0,0,0,8.67-2.46,66.6,66.6,0,0,1,6.58-6.54,8.13,8.13,0,0,0,2.46-8.69l-7.2-22a.59.59,0,0,1,.33-.74l23.67-9.8a.57.57,0,0,1,.75.28l10.5,20.68a8.12,8.12,0,0,0,7.89,4.41,62.36,62.36,0,0,1,9.27,0,8.13,8.13,0,0,0,7.87-4.4L122.92,9.37a.6.6,0,0,1,.76-.28l23.67,9.8a.6.6,0,0,1,.33.73l-7.21,22a8.14,8.14,0,0,0,2.46,8.66,65.64,65.64,0,0,1,6.55,6.58,8.15,8.15,0,0,0,8.68,2.47l22-7.21a.59.59,0,0,1,.74.33l9.81,23.66a.59.59,0,0,1-.29.76l-20.68,10.5a8.12,8.12,0,0,0-4.4,7.89,66.71,66.71,0,0,1,0,9.27,8.15,8.15,0,0,0,4.4,7.87l20.67,10.49a.58.58,0,0,1,.28.75Z" transform="translate(-1.55 -1.54)"/><path d="M79.48,50.57a53.41,53.41,0,1,0,69.78,28.91A53.47,53.47,0,0,0,79.48,50.57Zm62.86,66.92a45.92,45.92,0,1,1,0-35.14A45.66,45.66,0,0,1,142.34,117.49Z" transform="translate(-1.55 -1.54)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/law-practice-management-software/" title="Law Practice Management Software">Law Practice Management Software</a>
                            </div>
                        </div>
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="online-search" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 196.99 197.03"><path d="M179.12,20.73A66.62,66.62,0,0,0,82.1,112l-7.86,7.86-24.43-2L8.28,159.31a22.81,22.81,0,0,0,32.26,32.26l41.63-41.63L79,126.66l8.91-8.91a66.62,66.62,0,0,0,91.24-97ZM34.75,185.78a15,15,0,0,1-20.68,0,14.68,14.68,0,0,1,0-20.68l38.84-38.85,18,1.5L73.5,147Zm138.58-76.56a58.48,58.48,0,1,1,0-82.7A58.54,58.54,0,0,1,173.33,109.22Z" transform="translate(-1.62 -1.2)"/><path d="M104.74,40.62a4.09,4.09,0,1,0,5.79,5.79,30.55,30.55,0,0,1,43.14,0,4.09,4.09,0,1,0,5.79-5.79A38.77,38.77,0,0,0,104.74,40.62Z" transform="translate(-1.62 -1.2)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/online-legal-research/" title="Online Legal Research">Online Legal Research</a>
                            </div>
                        </div>
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="folder" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 193.49 197.9"><path d="M133.06,169.57H113.87V119.39l-17.23-9.23V29.78h36.42V52.29h6.66V23.11H96.64V.64L3.83,23.84V175.61l110,22.93v-22.3h25.85v-55h-6.66Zm-25.85,20.77L10.49,170.19V29.05L90,9.18v105l17.23,9.23Z" transform="translate(-3.83 -0.64)"/><path d="M189.28,50.77C179,70.71,168.44,70.6,149.48,70.52h-1.14V53.66L109.72,86.75l38.62,33.09V102.93c27.37-1.32,44.09-19.06,47.22-50.3l1.75-17.46ZM145,96.34h-3.33v9L120,86.75l21.7-18.6v9l7.77,0c14.8,0,26.39.17,36.44-10C179.76,86.35,165.84,96.34,145,96.34Z" transform="translate(-3.83 -0.64)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/document-management-automation/" title="Document Magement & Automation">Document Management &#38; Automation</a>
                            </div>
                        </div>
                    </div>
                    <p class="normal-text"><?php echo $two_bottom ?></p>
                </div>
                <div class="review_content_column_width">
                    <div class="visual-media">
                        <img alt="Descriptive Text" src="/wp-content/uploads/2022/01/product-review-category-law-practice-management-software-header-img.png" />
                        <div class="animated-icon">
                            <div class="icons-02-main">
                                <svg xmlns="https://www.w3.org/2000/svg" width="87.244" height="75.191" viewBox="0 0 87.244 75.191">
                                    <g id="service-delivery-primary-icon" transform="translate(-662.691 -755.59)">
                                        <rect id="Rectangle_1291" data-name="Rectangle 1291" width="83.507" height="52.074" transform="translate(664.559 776.838)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                        <path id="Path_869" data-name="Path 869" d="M682.488,817.479V756.337h37.784l9.865,10.025v51.118" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <circle id="Ellipse_180" data-name="Ellipse 180" cx="2.186" cy="2.186" r="2.186" transform="translate(704.127 820.689)" fill="#424b54"/>
                                        <path id="Path_870" data-name="Path 870" d="M720.272,756.337V766.61h9.865" fill="#ff7062" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <path id="Path_871" data-name="Path 871" d="M682.488,817.479V756.337h37.784l9.865,10.025v51.118" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_34" data-name="Line 34" x2="84.008" transform="translate(664.308 817.976)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_35" data-name="Line 35" x2="16.404" transform="translate(691.109 773.072)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_36" data-name="Line 36" x2="32.808" transform="translate(691.109 780.253)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_37" data-name="Line 37" x2="32.808" transform="translate(691.109 787.433)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_38" data-name="Line 38" x2="16.404" transform="translate(691.109 794.613)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <path id="Path_872" data-name="Path 872" d="M690.446,808.7a12.05,12.05,0,0,0,3.513-2.888,1.756,1.756,0,0,1,2.9.088h0a1.744,1.744,0,0,0,2,.74l9.815-3.076" fill="#ededed" stroke="#ff7062" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <path id="Path_873" data-name="Path 873" d="M701.548,802.567s0-2.983,2.651-2.983" fill="#ededed" stroke="#ff7062" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.495"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="icons-secondary-search">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 196.09 137.57"><path d="M65,99.82H17.77a8.46,8.46,0,0,1-8.44-8.45V50.94a8.45,8.45,0,0,1,8.44-8.44H145.2a4.06,4.06,0,1,0,0-8.11H17.77A16.58,16.58,0,0,0,1.22,50.94V91.37a16.58,16.58,0,0,0,16.55,16.56H65a4.06,4.06,0,1,0,0-8.11Z" transform="translate(-1.22 -34.39)"/><path d="M67.11,133.28H35.18a10.45,10.45,0,1,0,0,3.44H67.11a1.72,1.72,0,0,0,0-3.44Zm-42.22,8.93a7.22,7.22,0,1,1,7.18-7.52.83.83,0,0,0,0,.62A7.2,7.2,0,0,1,24.89,142.21Z" transform="translate(-1.22 -34.39)"/><path d="M67.11,159.79H35.18a10.46,10.46,0,1,0,0,3.43H67.11a1.72,1.72,0,1,0,0-3.43Zm-42.22,8.93a7.22,7.22,0,1,1,7.18-7.53,1.7,1.7,0,0,0-.06.31,1.8,1.8,0,0,0,.06.32A7.2,7.2,0,0,1,24.89,168.72Z" transform="translate(-1.22 -34.39)"/><path d="M103.56,80.29a19.93,19.93,0,0,0,0,28.15l1.71-1.71a17.5,17.5,0,0,1,0-24.73Z" transform="translate(-1.22 -34.39)"/><path d="M194.75,155,156.32,116.6a40.72,40.72,0,0,0-62.9-51,40.7,40.7,0,0,0,50.39,63.29l38.56,38.55a8.74,8.74,0,0,0,12.38,0A8.77,8.77,0,0,0,194.75,155Zm-95.6-37.6a32.62,32.62,0,1,1,46.12,0A32.65,32.65,0,0,1,99.15,117.43Zm93.9,48.28a6.51,6.51,0,0,1-9,0l-38.22-38.22a41.39,41.39,0,0,0,5.16-4.33,42,42,0,0,0,3.89-4.57l38.15,38.15a6.34,6.34,0,0,1,0,9Z" transform="translate(-1.22 -34.39)"/></svg>
                            </div>
                            <div class="icons-secondary-drawer">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 197.4 153.64"><path d="M176.49,42.18H165.36V52.36h5.15l18.25,32.86V87H138.84L126.62,99.16H73.86L61.65,87H11.72V85.22L30,52.36h5.14V42.18H24L1.54,82.58v91.88h197.4V82.58Zm12.27,122.1h-177V97.13H57.44l12.21,12.21h61.19l12.21-12.21h45.71Z" transform="translate(-1.54 -20.81)"/><polygon points="165.85 63.09 165.85 40.7 31.54 40.7 31.54 63.09 35.61 63.09 35.61 44.77 161.78 44.77 161.78 63.09 165.85 63.09"/><polygon points="47.82 24.42 149.57 24.42 149.57 34.59 153.64 34.59 153.64 20.35 43.75 20.35 43.75 34.59 47.82 34.59 47.82 24.42"/><polygon points="55.96 4.07 141.43 4.07 141.43 14.24 145.5 14.24 145.5 0 51.89 0 51.89 14.24 55.96 14.24 55.96 4.07"/><path d="M77.86,140.88A6.11,6.11,0,0,0,84,147h32.56a6.12,6.12,0,0,0,6.11-6.11V122.57H77.86Zm4.07-14.24h36.63v14.24a2,2,0,0,1-2,2H84a2,2,0,0,1-2-2Z" transform="translate(-1.54 -20.81)"/></svg>
                            </div>
                        </div>

                        <div class="pin-path-wrapper">
                            <svg id="pin-path-3" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 574.641 374.088">
                                <g id="product-landing-dotted-line-graphic-3" transform="translate(-662.419 -2372.02)">
                                    <g id="Group_493" data-name="Group 493" transform="translate(64.061 1394.108)">
                                    <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                    <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                        <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                        <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                    </g>
                                    </g>
                                    <path id="Path_863" data-name="Path 863" d="M-4988.791,2372.633s116.252,149.825,246.715,234.156,275.137,103.171,275.137,103.171" transform="translate(5652)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <section class="start-content" id="managing">
            <div class="review_content_section count-03">
                <div class="review_content_column_width">
                    <p class="count">03</p>
                    <h3>Office Management</h3>
                    <p class="normal-text"><?php echo $three_top ?></p>
                    <div class="review_content_link_tabs">
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="calculator" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 153.27 198.7"><path d="M160.77,199.59H43a17.76,17.76,0,0,1-17.74-17.73V18.63A17.76,17.76,0,0,1,43,.89h117.8a17.76,17.76,0,0,1,17.74,17.74V181.86A17.76,17.76,0,0,1,160.77,199.59ZM43,8.44A10.2,10.2,0,0,0,32.78,18.63V181.86A10.2,10.2,0,0,0,43,192.05h117.8A10.19,10.19,0,0,0,171,181.86V18.63A10.19,10.19,0,0,0,160.77,8.44Z" transform="translate(-25.23 -0.89)"/><path d="M157.14,63.14H46.6a6.25,6.25,0,0,1-6.24-6.24V22.73a6.25,6.25,0,0,1,6.24-6.25H157.14a6.25,6.25,0,0,1,6.25,6.25V56.9A6.25,6.25,0,0,1,157.14,63.14ZM47.9,55.6h108V24H47.9Z" transform="translate(-25.23 -0.89)"/><path d="M60.46,95.37H46.6a6.25,6.25,0,0,1-6.24-6.24V76.57a6.25,6.25,0,0,1,6.24-6.25H60.46a6.25,6.25,0,0,1,6.24,6.25V89.13A6.25,6.25,0,0,1,60.46,95.37ZM47.9,87.83H59.16v-10H47.9Z" transform="translate(-25.23 -0.89)"/><path d="M92.69,95.37H78.83a6.25,6.25,0,0,1-6.24-6.24V76.57a6.25,6.25,0,0,1,6.24-6.25H92.69a6.25,6.25,0,0,1,6.24,6.25V89.13A6.25,6.25,0,0,1,92.69,95.37ZM80.13,87.83H91.39v-10H80.13Z" transform="translate(-25.23 -0.89)"/><path d="M124.91,95.37H111.06a6.25,6.25,0,0,1-6.24-6.24V76.57a6.25,6.25,0,0,1,6.24-6.25h13.85a6.25,6.25,0,0,1,6.25,6.25V89.13A6.25,6.25,0,0,1,124.91,95.37Zm-12.55-7.54h11.25v-10H112.36Z" transform="translate(-25.23 -0.89)"/><path d="M157.14,95.37H143.28A6.25,6.25,0,0,1,137,89.13V76.57a6.25,6.25,0,0,1,6.24-6.25h13.86a6.25,6.25,0,0,1,6.25,6.25V89.13A6.25,6.25,0,0,1,157.14,95.37Zm-12.55-7.54h11.26v-10H144.59Z" transform="translate(-25.23 -0.89)"/><path d="M60.46,124.92H46.6a6.25,6.25,0,0,1-6.24-6.25V106.11a6.25,6.25,0,0,1,6.24-6.24H60.46a6.25,6.25,0,0,1,6.24,6.24v12.56A6.25,6.25,0,0,1,60.46,124.92ZM47.9,117.37H59.16v-10H47.9Z" transform="translate(-25.23 -0.89)"/><path d="M92.69,124.92H78.83a6.25,6.25,0,0,1-6.24-6.25V106.11a6.25,6.25,0,0,1,6.24-6.24H92.69a6.25,6.25,0,0,1,6.24,6.24v12.56A6.25,6.25,0,0,1,92.69,124.92Zm-12.56-7.55H91.39v-10H80.13Z" transform="translate(-25.23 -0.89)"/><path d="M124.91,124.92H111.06a6.25,6.25,0,0,1-6.24-6.25V106.11a6.25,6.25,0,0,1,6.24-6.24h13.85a6.25,6.25,0,0,1,6.25,6.24v12.56A6.25,6.25,0,0,1,124.91,124.92Zm-12.55-7.55h11.25v-10H112.36Z" transform="translate(-25.23 -0.89)"/><path d="M157.14,124.92H143.28a6.25,6.25,0,0,1-6.24-6.25V106.11a6.25,6.25,0,0,1,6.24-6.24h13.86a6.25,6.25,0,0,1,6.25,6.24v12.56A6.25,6.25,0,0,1,157.14,124.92Zm-12.55-7.55h11.26v-10H144.59Z" transform="translate(-25.23 -0.89)"/><path d="M60.46,154.46H46.6a6.25,6.25,0,0,1-6.24-6.24V135.65a6.25,6.25,0,0,1,6.24-6.24H60.46a6.25,6.25,0,0,1,6.24,6.24v12.57A6.25,6.25,0,0,1,60.46,154.46ZM47.9,146.91H59.16V137H47.9Z" transform="translate(-25.23 -0.89)"/><path d="M92.69,154.46H78.83a6.25,6.25,0,0,1-6.24-6.24V135.65a6.25,6.25,0,0,1,6.24-6.24H92.69a6.25,6.25,0,0,1,6.24,6.24v12.57A6.25,6.25,0,0,1,92.69,154.46Zm-12.56-7.55H91.39V137H80.13Z" transform="translate(-25.23 -0.89)"/><path d="M124.91,154.46H111.06a6.25,6.25,0,0,1-6.24-6.24V135.65a6.25,6.25,0,0,1,6.24-6.24h13.85a6.25,6.25,0,0,1,6.25,6.24v12.57A6.25,6.25,0,0,1,124.91,154.46Zm-12.55-7.55h11.25V137H112.36Z" transform="translate(-25.23 -0.89)"/><path d="M60.46,184H46.6a6.25,6.25,0,0,1-6.24-6.25V165.19A6.25,6.25,0,0,1,46.6,159H60.46a6.25,6.25,0,0,1,6.24,6.24v12.56A6.25,6.25,0,0,1,60.46,184ZM47.9,176.46H59.16v-10H47.9Z" transform="translate(-25.23 -0.89)"/><path d="M92.69,184H78.83a6.25,6.25,0,0,1-6.24-6.25V165.19A6.25,6.25,0,0,1,78.83,159H92.69a6.25,6.25,0,0,1,6.24,6.24v12.56A6.25,6.25,0,0,1,92.69,184Zm-12.56-7.54H91.39v-10H80.13Z" transform="translate(-25.23 -0.89)"/><path d="M124.91,184H111.06a6.25,6.25,0,0,1-6.24-6.25V165.19a6.25,6.25,0,0,1,6.24-6.24h13.85a6.25,6.25,0,0,1,6.25,6.24v12.56A6.25,6.25,0,0,1,124.91,184Zm-12.55-7.54h11.25v-10H112.36Z" transform="translate(-25.23 -0.89)"/><path d="M157.14,184H143.28a6.25,6.25,0,0,1-6.24-6.25v-42.1a6.25,6.25,0,0,1,6.24-6.24h13.86a6.25,6.25,0,0,1,6.25,6.24v42.1A6.25,6.25,0,0,1,157.14,184Zm-12.55-7.54h11.26V137H144.59Z" transform="translate(-25.23 -0.89)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/accounting-billing-finance/" title="Accounting, Billing & Finance">Accounting, Billing &#38; Finance</a>
                            </div>
                        </div>
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="sms" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 194.39 190.58"><path d="M179.38,82.19H162.84V30.69A24.84,24.84,0,0,0,138,5.87H27.49A24.85,24.85,0,0,0,2.67,30.69v80.5A24.85,24.85,0,0,0,27.43,136l14,.24v36.12L79.27,136h9.42v17a17.69,17.69,0,0,0,17.68,17.67h38.3l26.77,25.73V170.86l7.94-.14a17.68,17.68,0,0,0,17.67-17.67V99.87A17.69,17.69,0,0,0,179.38,82.19ZM76.24,128.49,49,154.7V128.87l-21.49-.38a17.32,17.32,0,0,1-17.3-17.3V30.69A17.32,17.32,0,0,1,27.49,13.4H138a17.31,17.31,0,0,1,17.29,17.29v80.5A17.32,17.32,0,0,1,138,128.49Zm113.29,24.56a10.18,10.18,0,0,1-10.22,10.15l-15.4.27v15.32L147.7,163.2H106.37a10.16,10.16,0,0,1-10.15-10.15V136H138a24.85,24.85,0,0,0,24.81-24.83V89.72h16.54a10.16,10.16,0,0,1,10.15,10.15Z" transform="translate(-2.67 -5.87)"/><path d="M131.24,40H36.77a3.76,3.76,0,0,0,0,7.52h94.47a3.76,3.76,0,1,0,0-7.52Z" transform="translate(-2.67 -5.87)"/><path d="M131.24,66.87H36.77a3.76,3.76,0,1,0,0,7.52h94.47a3.76,3.76,0,1,0,0-7.52Z" transform="translate(-2.67 -5.87)"/><path d="M90.89,93.77H36.77a3.76,3.76,0,0,0,0,7.52H90.89a3.76,3.76,0,1,0,0-7.52Z" transform="translate(-2.67 -5.87)"/></svg>
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/remote-office-phones-communication/" title="Remote Office, Phones & Communication">Remote Office, Phones & Communication</a>
                            </div>
                        </div>
                        <div class="content_tab">
                            <div class="icon">
                                <svg id="vr-phone" version="1.1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1024 1024"><path fill="#424B54" stroke="#424B54" d="M832 1024h-672c-35.36 0-64-28.672-64-64v-768c0-35.36 28.64-64 64-64v768c0 35.328 28.672 64 64 64h128c35.36 0 64-28.672 64-64v-768h416c35.36 0 64 28.672 64 64v768c0 35.328-28.64 64-64 64zM672 928h64v-64h-64v64zM672 832h64v-64h-64v64zM672 736h64v-64h-64v64zM672 640h64v-64h-64v64zM576 928h64v-64h-64v64zM576 832h64v-64h-64v64zM576 736h64v-64h-64v64zM576 640h64v-64h-64v64zM832 224c0-17.696-14.304-32-32-32h-288c-17.664 0-32 14.304-32 32v128c0 17.664 14.336 32 32 32h288c17.696 0 32-14.336 32-32v-128zM832 576h-64v64h64v-64zM832 672h-64v64h64v-64zM832 768h-64v64h64v-64zM832 864h-64v64h64v-64zM352 928h-128c-17.664 0-32-14.304-32-32v-800c0-17.696 14.336-32 32-32h62.016v-64h33.984v64h32c17.664 0 32 14.304 32 32v800c0 17.696-14.336 32-32 32z"></path></svg>                        
                            </div>
                            <div class="tab-text">
                                <a href="/reviews/virtual-receptionists-outsourced-staffing/" title="Virtual Receptionists & Outsourced Staffing">Virtual Receptionists & Outsourced Staffing</a>
                            </div>
                        </div>
                    </div>
                    <p class="normal-text"><?php echo $three_bottom ?></p>
                </div>
                <div class="review_content_column_width">
                    <div class="visual-media">
                        <img alt="Descriptive Text" src="/wp-content/uploads/2022/01/product-review-landing-office-management-img.png" />
                        <div class="animated-icon">
                            <div class="icons-03-main">
                                <svg xmlns="https://www.w3.org/2000/svg" width="99.129" height="67.697" viewBox="0 0 99.129 67.697">
                                    <g id="office-management-primary-icon" transform="translate(-507.636 -763.084)">
                                        <rect id="Rectangle_1292" data-name="Rectangle 1292" width="83.507" height="52.074" transform="translate(509.505 776.838)" fill="#ededed" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                        <path id="Path_874" data-name="Path 874" d="M509.505,776.838l34.436,33.275a10.53,10.53,0,0,0,14.635,0l34.436-33.275" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_39" data-name="Line 39" x2="27.914" y2="24.552" transform="translate(565.332 803.579)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <line id="Line_40" data-name="Line 40" x1="27.914" y2="24.552" transform="translate(509.505 803.579)" fill="none" stroke="#424b54" stroke-miterlimit="10" stroke-width="1.495"/>
                                        <circle id="Ellipse_181" data-name="Ellipse 181" cx="12.823" cy="12.823" r="12.823" transform="translate(579.25 764.953)" fill="#ff7062" stroke="#424b54" stroke-miterlimit="10" stroke-width="3.737"/>
                                        <g id="Group_499" data-name="Group 499">
                                        <path id="Path_875" data-name="Path 875" d="M587.294,773.125l4.119-1.8h2.913v13.448h-3.244V774.38l-3.1,1.349Z" fill="#fff"/>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="icons-secondary-register">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 167.47 196.09"><path d="M160,34.48h-5V28.16A26.65,26.65,0,0,0,128.44,1.54H74.27A26.65,26.65,0,0,0,47.65,28.16V63.51H13.58V86.05A22.57,22.57,0,0,0,36.12,108.6H64.69v60.92a28.16,28.16,0,0,0,28.13,28.12h60.11a28.16,28.16,0,0,0,28.12-28.12V61.45C181.05,48.48,173,34.48,160,34.48Zm-16-6.32V60.85H100.88V28.16a26.38,26.38,0,0,0-5.1-15.6h32.66A15.61,15.61,0,0,1,144,28.16ZM24.59,86.05V74.52H47.65V86.05a11.53,11.53,0,1,1-23.06,0ZM72,42.61a28,28,0,0,0-7.27,18.84V97.59h-9.3a22.29,22.29,0,0,0,3.28-11.54V28.16a15.6,15.6,0,0,1,31.2,0v6.39A25.68,25.68,0,0,0,72,42.61ZM170,169.52a17.12,17.12,0,0,1-17.1,17.1H92.82a17.12,17.12,0,0,1-17.11-17.1V61.45A17,17,0,0,1,80.13,50a14.5,14.5,0,0,1,9.74-4.37V60.85H85.09v4.41H160.5V60.85h-5.44V45.5h5c5.63,0,10,8.57,10,16Z" transform="translate(-13.58 -1.54)"/><path d="M152.92,80H92.82a9.33,9.33,0,0,0-9.33,9.33v80.18a9.33,9.33,0,0,0,9.33,9.32h60.1a9.34,9.34,0,0,0,9.33-9.32V89.34A9.34,9.34,0,0,0,152.92,80Zm-60.1,4.41h60.1a4.92,4.92,0,0,1,4.92,4.92v15.48H87.9V89.34A4.92,4.92,0,0,1,92.82,84.42Zm60.1,90H92.82a4.91,4.91,0,0,1-4.92-4.91V109.23h69.94v60.29A4.91,4.91,0,0,1,152.92,174.43Z" transform="translate(-13.58 -1.54)"/><rect x="85.44" y="121.04" width="5.51" height="4.41"/><rect x="106.46" y="121.04" width="5.52" height="4.41"/><rect x="127.47" y="121.04" width="5.52" height="4.41"/><rect x="85.44" y="138.03" width="5.51" height="4.41"/><rect x="106.46" y="138.03" width="5.52" height="4.41"/><rect x="127.47" y="138.03" width="5.52" height="4.41"/><rect x="85.44" y="155.02" width="5.51" height="4.41"/><rect x="106.46" y="155.02" width="5.52" height="4.41"/><rect x="127.47" y="155.02" width="5.52" height="4.41"/><rect x="95.36" y="25.39" width="26.84" height="4.41"/><rect x="95.36" y="40.03" width="12.2" height="4.41"/></svg>
                            </div>
                            <div class="icons-secondary-phone-profits">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 124.43 196.09"><path d="M137,1.87H66.79A27.17,27.17,0,0,0,39.65,29V170.83A27.17,27.17,0,0,0,66.79,198H137a27.17,27.17,0,0,0,27.14-27.13V29A27.17,27.17,0,0,0,137,1.87Zm-70.16,11H137A16.18,16.18,0,0,1,153.12,29v9H50.62V29A16.18,16.18,0,0,1,66.79,12.84Zm86.33,29.55V157.44H50.62v-115ZM137,187H66.79a16.18,16.18,0,0,1-16.17-16.16v-9h102.5v9A16.18,16.18,0,0,1,137,187Z" transform="translate(-39.65 -1.87)"/><rect x="54.75" y="19.71" width="14.93" height="4.39"/><rect x="45.14" y="131.09" width="4.39" height="10.94"/><rect x="61.59" y="117.59" width="4.39" height="24.44"/><rect x="78.04" y="123.41" width="4.39" height="18.62"/><rect x="94.49" y="114.11" width="4.39" height="27.93"/><rect x="28.69" y="134.6" width="4.39" height="7.43"/><polygon points="21.34 129.63 34.7 116.27 42.29 123.86 50.84 115.31 47.73 112.21 42.29 117.65 34.7 110.07 18.23 126.53 21.34 129.63"/><polygon points="81.28 112.48 101.68 92.09 101.68 96.87 106.06 96.87 106.06 84.6 93.8 84.6 93.8 88.99 98.58 88.99 78.18 109.38 81.28 112.48"/><path d="M101.24,81.59V95.72c-2.94-.55-5.45-2.13-6.55-4.34l-3.93,2c1.84,3.71,5.82,6.27,10.48,6.89v3.33h4.39v-3.36c6.52-.88,11.52-5.56,11.52-11.23,0-8.44-6.86-10.4-11.52-11.12V63.77a9,9,0,0,1,6.45,4.15l3.86-2.09c-1.91-3.51-5.82-5.93-10.31-6.54V56h-4.39v3.37c-6.51.88-11.51,5.55-11.51,11.22C89.73,76.49,93.63,80.18,101.24,81.59ZM112.76,89c0,3.3-3.05,6.06-7.13,6.81V82.31C110.91,83.31,112.76,85.15,112.76,89ZM101.24,63.74V77.15C95,75.8,94.12,73,94.12,70.54,94.12,67.24,97.16,64.48,101.24,63.74Z" transform="translate(-39.65 -1.87)"/></svg>
                            </div>
                            <div class="pin-path-container" style="display: none;">
                                <svg id="pin-path" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 354.933 365.404">
                                    <g id="product-landing-dotted-line-graphic-4" transform="translate(-990.892 -3122.766)">
                                        <path id="Path_1100" data-name="Path 1100" d="M-4562,1665.956s-42.3,109.744-117.233,190.549-193.331,136.674-193.331,136.674" transform="translate(5906.892 1457.17)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                                        <g id="Group_712" data-name="Group 712" transform="translate(-115.108 2136.17)">
                                        <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                        <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                            <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                            <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                        </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <div id="review_btm_cta" style="display: none;">
            <div class="cta-content">
                <div class="pin-path-container-cta">
                    <svg id="pin-path" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 354.933 365.404">
                        <g id="product-landing-dotted-line-graphic-4" transform="translate(-990.892 -3122.766)">
                            <path id="Path_1100" data-name="Path 1100" d="M-4562,1665.956s-42.3,109.744-117.233,190.549-193.331,136.674-193.331,136.674" transform="translate(5906.892 1457.17)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                            <g id="Group_712" data-name="Group 712" transform="translate(-115.108 2136.17)">
                            <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                            <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                            </g>
                            </g>
                        </g>
                    </svg>
                </div>

                <p>Part of the ‘Lawyerist<br />Healthy Law Firm’ Mission</p>
                <a>Learn more</a>
            </div>
        </div>
            
        <?php
            $title = get_field('in-page_cta_title', 1436117);
            $description = get_field('in-page_cta_title_desc', 1436117);
            $featured_image = get_field('in-page_cta_title_image', 1436117);
            $download_btn = get_field('guide_cta_link', 1436117);
        ?>

        <section class="start-content" id="field-guide-anchor">
            <div id="review_content"><!-- start #reviewcontent -->
                <div class="visual-media" id="field-pin-holder">   
                    <div class="pin-path-wrapper">
                        <svg id="pin-path-2" xmlns="http://www.w3.org/2000/svg" width="573.875" height="922.327" viewBox="0 0 573.875 922.327">
                            <g id="resources-landing-dotted-line-6" transform="translate(-730.105 -5078.521)">
                                <path id="Path_2522" data-name="Path 2522" d="M-4562,1665.956s-65.283,324.718-144.174,442.226-282.8,343.711-373.332,434.3" transform="translate(5865 3412.762)" fill="none" stroke="#88a2aa" stroke-width="2" stroke-dasharray="7 7"/>
                                <g id="Group_2329" data-name="Group 2329" transform="translate(-375.895 4648.848)">
                                <circle id="Ellipse_179" data-name="Ellipse 179" cx="18.5" cy="18.5" r="18.5" transform="translate(1121 1300)" fill="#ff7062" opacity="0.313"/>
                                <g id="Ellipse_178" data-name="Ellipse 178" transform="translate(1129 1308)" fill="#ff7062" stroke="#fff" stroke-width="3">
                                    <circle cx="10.5" cy="10.5" r="10.5" stroke="none"/>
                                    <circle cx="10.5" cy="10.5" r="9" fill="none"/>
                                </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="review_content_section count-02 count-04" id="field-guide-block">
                    <div class="review_content_column_width">
                        <p class="count">04</p>
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

        <div class="page-pin cta-fixed">
            <div class="container cta-fixed_inner">
                <img src="/wp-content/uploads/2022/05/product-review-landing-healthy-law-firm-graphic.svg"/>
            </div>
                <p class="ital pin-text">Part of the ‘Lawyerist Healthy Law Firm’</p>
                <a class="link" href="">Learn more</a>
            </div>
        </div>
	</div><!-- end #reviewcontent -->
    <!-- // Get the Loop. -->
    <?php get_template_part('template-parts/related-resources'); ?>

</div><!--end #review_container -->

<?php get_footer(); ?>