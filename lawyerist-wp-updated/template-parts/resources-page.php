<?php /* Template Name: Resources Page Template */ ?>

<?php get_header(); 


	// Assign post variables.
	$page_title = the_title( '', '', FALSE );

	// Featured image
	$show_featured_image 		= get_field( 'show_featured_image' );
	$updated_featured_image		= get_field( 'updated_featured_image' );
	$backgroundImg 				= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	//$include_PRW 				= get_field('include_rec_wizard');
	//$PRW_link 					= get_field('rec_wizard_link');
	//$PRW_url 					= $PRW_link['url'];
	//$PRW_title 					= $PRW_link['title'];

    $banner_description		= get_field( 'banner_description' );
    $one_top		        = get_field( '01_sub_description_top' );
    $one_bottom	 	        = get_field( '01_sub_description_bottom' );
    $two_top		        = get_field( '02_sub_description_top' );
    $two_bottom		        = get_field( '02_sub_description_bottom' );
    $three_top		        = get_field( '03_sub_description_top' );
    $three_bottom		    = get_field( '03_sub_description_bottom' );

?>

<div id="review_container" class="resources-page">

    <div class="page-pin">
        <div class="container">
            <div class="image">
                <img src="/wp-content/uploads/2022/04/healthy-firm-graphic-small-with-line.svg"/>
            </div>
            <p class="pin-text">Part of the ‘Lawyerist Healthy Law Firm’</p>
            <a class="link" href="">Learn more</a>
        </div>
    </div>
    <?php get_template_part( 'template-parts/sub', 'navigation' ); ?>

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>

    <?php 
        if ( is_page( 1403792 ) ) { // "Lawyerist Healthy Firm" Logo to /resources/
            ?>

                <style>
                    @media all and ( min-width: 1365px ) {

                        #legal-podcast .visual-media {
                            position: relative;
                        }

                        #legal-podcast .visual-media:before {
                            position: absolute;
                            content: "";
                            width: 1009px;
                            height: 800px;
                            top: 450px;
                            left: -350px;
                            z-index: 1;
                            background-image: url('/wp-content/uploads/2022/04/resources-landing-dotted-line.svg');
                            background-size: contain;
                            background-repeat: no-repeat;
                        }


                        #articles .visual-media {
                            position: relative;
                        }

                        #articles .visual-media:before {
                            position: absolute;
                            content: "";
                            width: 409px;
                            height: 401px;
                            top: 157px;
                            left: 350px;
                            z-index: 1;
                            background-image: url('/wp-content/uploads/2022/04/resources-landing-dotted-line-1.svg');
                            background-size: contain;
                            background-repeat: no-repeat;
                            transform: rotate(338deg);
                        }
                        #scorecard .pin-path-container {
                            visibility: hidden;
                        }
                    }

                </style>

            <?php
        }
    ?>


</div><!--end #review_container -->

<?php get_footer(); ?>