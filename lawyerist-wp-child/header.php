<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5B7C7JS');</script>
        <!-- End Google Tag Manager -->

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <?php $template_url = get_bloginfo('template_url'); ?>

        <link rel="shortcut icon" href="<?php echo $template_url; ?>/images/circle-logo-icon.svg">
        <?php
        // Enqueues Gravity Forms scripts necessary for the #lawyerist-login modal.
        gravity_form_enqueue_scripts(59, true);

        wp_head();

        // Noindexes/nofollows Lab Workshop archives and posts.
        if (is_category('lab-workshops') || has_category('lab-workshops')) {
            echo '<!-- Showing a Lab Workshops archive or post, so this page is noindexed and nofollowed. -->';
            echo '<meta name="robots" content="noindex, nofollow">';
        }
        ?>

        <!-- Add GA Goal Tracking Script to Sponsored Product Pages -->
        <?php 
            $sp_taxonomy = 'page_type';
            $sp_terms = array('platinum-sponsor', 'gold-sponsor', 'silver-sponsor', 'bronze-sponsor', 'affinity-partner');
            $sponsored_page = has_term('', $sp_taxonomy);

            if ( $sponsored_page == true ) {
                ?>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    window.dataLayer.push({
                    'event': 'sponsored-post-pageview',
                    'page_type': 'sponsored'
                    });
                </script>
                <script>
                    console.log('script added successfully');
                </script>
                <?php
            }
        ?>

        <!-- Google Webmaster Tools site verification tag for Sam -->
        <meta name="google-site-verification" content="GwbQ-BLG3G-tXV4-uG-_kZIaxXxm_Wqmzg5wFSBa9hI" />

        <!-- Google Webmaster Tools site verification tag for Aaron -->
        <meta name="google-site-verification" content="d_OrAi2nt_o3Y3uQ-dicRpRYaxZSynFLUhHY15cnJUY" />

        <script type="text/javascript">
            // Disables Wistia's third-party performance tracking script.
            window.wistiaDisableMux = true
        </script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js" defer>
            //Controls page banner visibility
        </script>

        <style>
            body.page-template-frontpage #column_container .desktop-paint#hp-panel1 {
                display: block;
            }
            body.page-template-frontpage #column_container .mobile-paint#hp-panel1 {
                display: none;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_intro h2 {
                border-left: #ff7062 1px solid;
                font-family: "courier-prime",monospace;
                color: #fff;
                font-weight: 300;
                font-size: 2.2rem;
                padding: 1rem 2rem;
                margin: 3.5rem 0 2rem;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta .button::before {
                content: '\e911';
                font-family: "Icomoon";
                color: #fff;
                margin-right: 12px;
                display: inline-block;
                text-decoration: none;
                font-size: 1.3rem;
                margin-right: 16px;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta .hero-disclaimer {
                display: block;
                color: #fff;
                font-size: 1.4rem;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta .hero-disclaimer::before {
                content: '*';
                display: inline-block;
                position: static;
                top: -2px;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-2 .link-list .list-item:first-of-type {
                border-top: rgba(255,255,255,.4) 1px solid;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-2 .link-list .list-item a {
                display: block;
                color: #fff;
                font-size: 1.8rem;
                font-family: "courier-prime",monospace;
                font-weight: 600;
                text-decoration: none;
            }
            body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-2 .link-list .list-item a::before {
                content: '\e911';
                font-family: "Icomoon";
                color: #ff7062;
                margin-right: 12px;
                display: inline-block;
                text-decoration: none;
                font-size: 1.3rem;
                margin-right: 16px;
            }
            @media screen and (max-width: 1024px) {
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta {
                    width: 100%;
                }

                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-2 {
                    flex-basis: 100%;
                    padding: 4rem 0;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-2 .link-list {
                    width: 100%;
                }
            }

            @media screen and(max-width: 768px) {
                body.page-template-frontpage #column_container .desktop-paint#hp-panel1 {
                    display: none;
                }
                body.page-template-frontpage #column_container .mobile-paint#hp-panel1 {
                    display: block;
                }
                .hp-hero {
                    max-height: 100%;
                }
                .hp-hero_intro{
                    max-height: 100%;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta {
                    padding: 0;
                }
            }
            @media screen and (max-width: 480px) {
                body.page-template-frontpage #column_container .desktop-paint#hp-panel1 {
                    display: none;
                }
                body.page-template-frontpage #column_container .mobile-paint#hp-panel1 {
                    display: block;
                }
                .hp-hero {
                    max-height: 100%;
                }
                .hp-hero_intro{
                    max-height: 100%;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta {
                    padding: 0;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_intro h1 {
                    font-size: 3.4rem;
                    line-height: 4.2rem;
                    margin-bottom: 0;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_intro h2 {
                    font-size: 1.6rem;
                    line-height: 2.4rem;
                    margin: 1.5rem 0;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta .hero-cta {
                    font-size: 1.7rem;
                    line-height: 2.7rem;
                }
                body.page-template-frontpage #column_container .columns#hp-panel1 .column-50-50 .column-1 .hp-hero_cta .button {
                    padding: 1rem 3rem;
                    width: 100%;
                    margin: 2.5rem 0;
                }
            }
        </style>
    </head>

    <?php
    $classes = array();

    if (!is_page_template('product-page.php') && !is_page_template('full-width.php') && !is_product()) {
        $classes[] = 'show-plat-in-content';
    }
    ?>

    <body <?php body_class($classes); ?>>
        <!-- Google Tag Manager (noscript) -->
        
        <!-- End Google Tag Manager (noscript) --> 

        <?php
        wp_body_open();

        /**
         * Displays the signup wall notice, which also triggers the signup wall script
         * to record a pageview. (The script will only record pageviews when the notice
         * is present.)
         *
         * The notice is displayed only if (1) the user is not logged in AND (2) viewing
         * a single post or page, AND (3) that post or page is NOT one of the listed
         * exceptions in $exclude. This should probably be turned into an option using
         * ACF so we can more easily add exceptions.
         */
        global $post;
        
        get_template_part( 'block', 'main-nav' ); ?>
