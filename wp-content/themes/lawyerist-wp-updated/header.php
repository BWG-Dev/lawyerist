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
        <link rel="preload" as="image" href="/wp-content/uploads/2020/11/lawyerist-logo-tagline.svg">
        <link rel="preload" as="image" href="/wp-content/uploads/2020/08/homepage-header-768x391.jpg">
        
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

        <!-- Google Webmaster Tools site verification tag for Zack -->
		    <meta name="google-site-verification" content="4LVuvlqR9xpZ29215UlPKCokkU86v7GPgAvC-MsV1Os" />

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

        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '254894638282349');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=254894638282349&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->

        <!-- Twitter conversion tracking base code -->
        <script>
        !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
        },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js',
        a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
        twq('config','o4yv3');
        </script>
        <!-- End Twitter conversion tracking base code -->


    </head>

    <?php
    $classes = array();

    if (!is_page_template('product-page.php') && !is_page_template('full-width.php') ) {
        $classes[] = 'show-plat-in-content ';
    }
    ?>

    <body <?php body_class($classes); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5B7C7JS"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <?php
        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        } else {
            do_action( 'wp_body_open' );
        }

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
        $post_type = get_post_type();
        $guides = array(
            '1404821', '1404741', '1404808',
            '1404730', '1404724', '1403714',
            '1404756', '1404735', '1404766'
        );
        if (    ( !is_user_logged_in() ) // user isn't logged in
                &&  (
                        ( is_single() && ( $post_type != 'podcasts' ) ) // is a news article, not a podcast
                        || ( is_page( $guides ) ) // is a guides page
                        || ( is_child( $guides[0]) || is_child( $guides[1]) || is_child( $guides[2]) // is a guides child page
                            || is_child( $guides[3]) || is_child( $guides[4]) || is_child( $guides[5])
                            || is_child( $guides[6]) || is_child( $guides[7]) || is_child( $guides[8])
                        )
                )
                /*&& ( is_single() || is_page() ) &&
                !( is_product_portal() || // Product portals
                    is_page_template('product-page.php') || // Product pages
                get_field('exclude_from_signup_wall') || // Option on posts and pages
                has_category('sponsored')                 // Sponsored posts
                )*/
        ) {
            ?>

            <div id="article-counter-container">
                <div id="article-counter" data-post_id="<?php echo $post->ID; ?>"></div>
            </div>

            <?php
        }

        /**
         * The modal login/register.
         */
        echo get_lawyerist_login();
        ?>

        <?php get_template_part( 'template-parts/main', 'navigation' ); ?>


        <?php if ( is_page_template('product-rec-results.php') ) { ?>  <!-- Product Recommendation Animations -->
            <div class="prw-animate">
                <svg id="ey14k4vfasa1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45.977000 159.285000" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><g id="ey14k4vfasa2" transform="matrix(1 0 0 1 -863.84799999999996 -330.83100000000002)"><g id="ey14k4vfasa3" transform="matrix(1 0 0 1 0 200.00349768066405)"><path id="ey14k4vfasa4" d="M886.836000,363.174000C874.145628,363.188329,863.861777,373.472627,863.848000,386.163000L863.848000,420.069000C863.853476,426.563059,866.599890,432.753113,871.411000,437.115000L872.855000,435.515000C868.495414,431.562414,866.006213,425.953631,866,420.069000L866,386.163000C866,374.655871,875.328371,365.327500,886.835500,365.327500C898.342629,365.327500,907.671000,374.655871,907.671000,386.163000L907.671000,420.069000C907.701542,425.383431,905.690914,430.506827,902.054000,434.382000L871.054000,444.352000L871.054000,454.015000L900.385000,444.766000L900.459000,450.196000L871.327000,458.852000L871.327000,468.217000L889.483000,462.879000L889.483000,460.635000L873.483000,465.341000L873.483000,460.458000L902.635000,451.797000L902.501000,441.842000L873.210000,451.080000L873.210000,445.922000L903.235000,436.266000L903.422000,436.072000C907.561843,431.777857,909.860841,426.036642,909.829000,420.072000L909.829000,386.163000C909.814668,373.470906,899.528096,363.186124,886.836000,363.174000Z" transform="matrix(1 0 0 1 0 9.46000000000000)" fill="rgb(136,162,170)" stroke="none" stroke-width="1"/><line id="ey14k4vfasa5" x1="0" y1="0" x2="0" y2="45.689000" transform="matrix(1 0 0 1 886.83600000000001 404.06999999999999)" fill="none" stroke="rgb(136,162,170)" stroke-width="1.666000" stroke-linecap="round" stroke-miterlimit="10"/></g><g id="ey14k4vfasa6" transform="matrix(1 0 0 1 892.61699999999996 668.94000000000005)"><circle id="ey14k4vfasa7" r="1.493000" transform="matrix(1 0 0 1 1.49300000000000 1.49300000000000)" fill="rgb(136,162,170)" stroke="none" stroke-width="1"/><circle id="ey14k4vfasa8" r="1.493000" transform="matrix(1 0 0 1 1.49300000000000 7.55400000000000)" fill="rgb(136,162,170)" stroke="none" stroke-width="1"/><circle id="ey14k4vfasa9" r="1.493000" transform="matrix(1 0 0 1 1.49300000000000 13.61600000000000)" fill="rgb(136,162,170)" stroke="none" stroke-width="1"/><circle id="ey14k4vfasa10" r="1.493000" transform="matrix(1 0 0 1 1.49300000000000 19.67700000000000)" fill="rgb(136,162,170)" stroke="none" stroke-width="1"/></g><g id="ey14k4vfasa11" transform="matrix(1 0 0 1 877.45799999999997 392.05399999999997)"><ellipse id="ey14k4vfasa12" rx="9.378000" ry="5.764000" transform="matrix(1 0 0 1 9.37800000000000 5.76400000000000)" opacity="0" fill="none" stroke="rgb(136,162,170)" stroke-width="1.306000" stroke-miterlimit="10"/><ellipse id="ey14k4vfasa13" rx="9.378000" ry="5.764000" transform="matrix(1 0 0 1 9.37800000000000 13.09800000000000)" opacity="0" fill="none" stroke="rgb(136,162,170)" stroke-width="1.306000" stroke-miterlimit="10"/><ellipse id="ey14k4vfasa14" rx="9.378000" ry="5.764000" transform="matrix(1 0 0 1 9.37800000000000 20.43200000000000)" opacity="0" fill="none" stroke="rgb(136,162,170)" stroke-width="1.306000" stroke-miterlimit="10"/><ellipse id="ey14k4vfasa15" rx="9.378000" ry="5.764000" transform="matrix(1 0 0 1 9.37800000000000 27.76700000000000)" opacity="0" fill="none" stroke="rgb(136,162,170)" stroke-width="1.306000" stroke-miterlimit="10"/><ellipse id="ey14k4vfasa16" rx="9.378000" ry="5.764000" transform="matrix(1 0 0 1 9.37800000000000 35.10100000000000)" opacity="0" fill="none" stroke="rgb(136,162,170)" stroke-width="1.306000" stroke-miterlimit="10"/></g><path id="ey14k4vfasa17" d="M889.390000,343.300000L884.943000,344.750000L884.934000,330.832000L876.893000,351.552000L881.340000,350.102000L881.349000,364.020000Z" transform="matrix(1 0 0 1 3.81500000000000 0)" opacity="0" fill="rgb(255,112,98)" stroke="none" stroke-width="1"/></g><script><![CDATA[!function(t,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):(t=t||self).__SVGATOR_PLAYER__=n()}(this,(function(){"use strict";function t(n){return(t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(n)}function n(t,n){if(!(t instanceof n))throw new TypeError("Cannot call a class as a function")}function e(t,n){for(var e=0;e<n.length;e++){var r=n[e];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function r(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}function i(t){return(i=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)})(t)}function u(t,n){return(u=Object.setPrototypeOf||function(t,n){return t.__proto__=n,t})(t,n)}function o(t,n){return!n||"object"!=typeof n&&"function"!=typeof n?function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t):n}function a(t){var n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var e,r=i(t);if(n){var u=i(this).constructor;e=Reflect.construct(r,arguments,u)}else e=r.apply(this,arguments);return o(this,e)}}function l(t,n,e){return(l="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function(t,n,e){var r=function(t,n){for(;!Object.prototype.hasOwnProperty.call(t,n)&&null!==(t=i(t)););return t}(t,n);if(r){var u=Object.getOwnPropertyDescriptor(r,n);return u.get?u.get.call(e):u.value}})(t,n,e||t)}var f=Math.abs;function s(t){return t}function c(t,n,e){var r=1-e;return 3*e*r*(t*r+n*e)+e*e*e}function h(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1;return t<0||t>1||e<0||e>1?null:f(t-n)<=1e-5&&f(e-r)<=1e-5?s:function(i){if(i<=0)return t>0?i*n/t:0===n&&e>0?i*r/e:0;if(i>=1)return e<1?1+(i-1)*(r-1)/(e-1):1===e&&t<1?1+(i-1)*(n-1)/(t-1):1;for(var u,o=0,a=1;o<a;){var l=c(t,e,u=(o+a)/2);if(f(i-l)<1e-5)break;l<i?o=u:a=u}return c(n,r,u)}}function v(){return 1}function d(t){return 1===t?1:0}function y(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;if(1===t){if(0===n)return d;if(1===n)return v}var e=1/t;return function(t){return t>=1?1:(t+=n*e)-t%e}}function g(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:2;if(Number.isInteger(t))return t;var e=Math.pow(10,n);return Math.round(t*e)/e}var p=Math.PI/180;function m(t,n,e){return t>=.5?e:n}function b(t,n,e){return 0===t||n===e?n:t*(e-n)+n}function w(t,n,e){var r=b(t,n,e);return r<=0?0:r}function x(t,n,e){return 0===t?n:1===t?e:{x:b(t,n.x,e.x),y:b(t,n.y,e.y)}}function k(t,n,e){return 0===t?n:1===t?e:{x:w(t,n.x,e.x),y:w(t,n.y,e.y)}}function A(t,n,e){var r=function(t,n,e){return Math.round(b(t,n,e))}(t,n,e);return r<=0?0:r>=255?255:r}function _(t,n,e){return 0===t?n:1===t?e:{r:A(t,n.r,e.r),g:A(t,n.g,e.g),b:A(t,n.b,e.b),a:b(t,null==n.a?1:n.a,null==e.a?1:e.a)}}function S(t,n,e){if(0===t)return n;if(1===t)return e;var r=n.length;if(r!==e.length)return m(t,n,e);for(var i=[],u=0;u<r;u++)i.push(_(t,n[u],e[u]));return i}function M(t,n,e){var r=n.length;if(r!==e.length)return m(t,n,e);for(var i=new Array(r),u=0;u<r;u++)i[u]=b(t,n[u],e[u]);return i}function O(t,n){for(var e=[],r=0;r<t;r++)e.push(n);return e}function E(t,n){if(--n<=0)return t;var e=(t=Object.assign([],t)).length;do{for(var r=0;r<e;r++)t.push(t[r])}while(--n>0);return t}var B,I=function(){function t(e){n(this,t),this.list=e,this.length=e.length}return r(t,[{key:"setAttribute",value:function(t,n){for(var e=this.list,r=0;r<this.length;r++)e[r].setAttribute(t,n)}},{key:"removeAttribute",value:function(t){for(var n=this.list,e=0;e<this.length;e++)n[e].removeAttribute(t)}},{key:"style",value:function(t,n){for(var e=this.list,r=0;r<this.length;r++)e[r].style[t]=n}}]),t}(),j=/-./g,P=function(t,n){return n.toUpperCase()};function F(t){return"function"==typeof t?t:m}function R(t){return t?"function"==typeof t?t:Array.isArray(t)?function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:s;if(!Array.isArray(t))return n;switch(t.length){case 1:return y(t[0])||n;case 2:return y(t[0],t[1])||n;case 4:return h(t[0],t[1],t[2],t[3])||n}return n}(t,null):function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:s;switch(t){case"linear":return s;case"steps":return y(n.steps||1,n.jump||0)||e;case"bezier":case"cubic-bezier":return h(n.x1||0,n.y1||0,n.x2||0,n.y2||0)||e}return e}(t.type,t.value,null):null}function T(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3],i=n.length-1;if(t<=n[0].t)return r?[0,0,n[0].v]:n[0].v;if(t>=n[i].t)return r?[i,1,n[i].v]:n[i].v;var u,o=n[0],a=null;for(u=1;u<=i;u++){if(!(t>n[u].t)){a=n[u];break}o=n[u]}return null==a?r?[i,1,n[i].v]:n[i].v:o.t===a.t?r?[u,1,a.v]:a.v:(t=(t-o.t)/(a.t-o.t),o.e&&(t=o.e(t)),r?[u,t,e(t,o.v,a.v)]:e(t,o.v,a.v))}function q(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;return t&&t.length?"function"!=typeof n?null:("function"!=typeof e&&(e=null),function(r){var i=T(r,t,n);return null!=i&&e&&(i=e(i)),i}):null}function C(t,n){return t.t-n.t}function V(n,e,r,i,u){var o,a="@"===r[0],l="#"===r[0],f=B[r],s=m;switch(a?(o=r.substr(1),r=o.replace(j,P)):l&&(r=r.substr(1)),t(f)){case"function":if(s=f(i,u,T,R,r,a,e,n),l)return s;break;case"string":s=q(i,F(f));break;case"object":if((s=q(i,F(f.i),f.f))&&"function"==typeof f.u)return f.u(e,s,r,a,n)}return s?function(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3];if(r)return t instanceof I?function(r){return t.style(n,e(r))}:function(r){return t.style[n]=e(r)};if(Array.isArray(n)){var i=n.length;return function(r){var u=e(r);if(null==u)for(var o=0;o<i;o++)t[o].removeAttribute(n);else for(var a=0;a<i;a++)t[a].setAttribute(n,u)}}return function(r){var i=e(r);null==i?t.removeAttribute(n):t.setAttribute(n,i)}}(e,r,s,a):null}function N(n,e,r,i){if(!i||"object"!==t(i))return null;var u=null,o=null;return Array.isArray(i)?o=function(t){if(!t||!t.length)return null;for(var n=0;n<t.length;n++)t[n].e&&(t[n].e=R(t[n].e));return t.sort(C)}(i):(o=i.keys,u=i.data||null),o?V(n,e,r,o,u):null}function z(t,n,e){if(!e)return null;var r=[];for(var i in e)if(e.hasOwnProperty(i)){var u=N(t,n,i,e[i]);u&&r.push(u)}return r.length?r:null}function D(t,n){if(!n.duration||n.duration<0)return null;var e=function(t,n){if(!n)return null;var e=[];if(Array.isArray(n))for(var r=n.length,i=0;i<r;i++){var u=n[i];if(2===u.length){var o=null;if("string"==typeof u[0])o=t.getElementById(u[0]);else if(Array.isArray(u[0])){o=[];for(var a=0;a<u[0].length;a++)if("string"==typeof u[0][a]){var l=t.getElementById(u[0][a]);l&&o.push(l)}o=o.length?1===o.length?o[0]:new I(o):null}if(o){var f=z(t,o,u[1]);f&&(e=e.concat(f))}}}else for(var s in n)if(n.hasOwnProperty(s)){var c=t.getElementById(s);if(c){var h=z(t,c,n[s]);h&&(e=e.concat(h))}}return e.length?e:null}(t,n.elements);return e?function(t,n){var e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1/0,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,i=arguments.length>4&&void 0!==arguments[4]&&arguments[4],u=arguments.length>5&&void 0!==arguments[5]?arguments[5]:1,o=t.length,a=r>0?n:0;i&&e%2==0&&(a=n-a);var l=null;return function(f,s){var c=f%n,h=1+(f-c)/n;s*=r,i&&h%2==0&&(s=-s);var v=!1;if(h>e)c=a,v=!0,-1===u&&(c=r>0?0:n);else if(s<0&&(c=n-c),c===l)return!1;l=c;for(var d=0;d<o;d++)t[d](c);return v}}(e,n.duration,n.iterations||1/0,n.direction||1,!!n.alternate,n.fill||1):null}function L(t,n){if(B=n,!t||!t.root||!Array.isArray(t.animations))return null;for(var e=document.getElementsByTagName("svg"),r=!1,i=0;i<e.length;i++)if(e[i].id===t.root&&!e[i].svgatorAnimation){(r=e[i]).svgatorAnimation=!0;break}if(!r)return null;var u=t.animations.map((function(t){return D(r,t)})).filter((function(t){return!!t}));return u.length?{element:r,animations:u,animationSettings:t.animationSettings,options:t.options||void 0}:null}var U=function(){function t(e,r){var i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};n(this,t),this._id=0,this._running=!1,this._rollingBack=!1,this._animations=e,this.duration=r.duration,this.alternate=r.alternate,this.fill=r.fill,this.iterations=r.iterations,this.direction=i.direction||1,this.speed=i.speed||1,this.fps=i.fps||100,this.offset=i.offset||0,this.rollbackStartOffset=0}return r(t,[{key:"_rollback",value:function(){var t=this,n=1/0,e=null;this.rollbackStartOffset=this.offset,this._rollingBack||(this._rollingBack=!0,this._running=!0);this._id=window.requestAnimationFrame((function r(i){if(t._rollingBack){null==e&&(e=i);var u=i-e,o=t.rollbackStartOffset-u,a=Math.round(o*t.speed);if(a>t.duration&&n!=1/0){var l=!!t.alternate&&a/t.duration%2>1,f=a%t.duration;a=(f+=l?t.duration:0)||t.duration}var s=t.fps?1e3/t.fps:0,c=Math.max(0,a);if(c<n-s){t.offset=c,n=c;for(var h=t._animations,v=h.length,d=0;d<v;d++)h[d](c,t.direction)}var y=!1;if(t.iterations>0&&-1===t.fill){var g=t.iterations*t.duration,p=g==a;a=p?0:a,t.offset=p?0:t.offset,y=a>g}a>0&&t.offset>=a&&!y?t._id=window.requestAnimationFrame(r):t.stop()}}))}},{key:"_start",value:function(){var t=this,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=-1/0,r=null,i={},u=function u(o){t._running=!0,null==r&&(r=o);var a=Math.round((o-r+n)*t.speed),l=t.fps?1e3/t.fps:0;if(a>e+l&&!t._rollingBack){t.offset=a,e=a;for(var f=t._animations,s=f.length,c=0,h=0;h<s;h++)i[h]?c++:(i[h]=f[h](a,t.direction),i[h]&&c++);if(c===s)return void t._stop()}t._id=window.requestAnimationFrame(u)};this._id=window.requestAnimationFrame(u)}},{key:"_stop",value:function(){this._id&&window.cancelAnimationFrame(this._id),this._running=!1,this._rollingBack=!1}},{key:"play",value:function(){!this._rollingBack&&this._running||(this._rollingBack=!1,this.rollbackStartOffset>this.duration&&(this.offset=this.rollbackStartOffset-(this.rollbackStartOffset-this.offset)%this.duration,this.rollbackStartOffset=0),this._start(this.offset))}},{key:"stop",value:function(){this._stop(),this.offset=0,this.rollbackStartOffset=0;var t=this.direction,n=this._animations;window.requestAnimationFrame((function(){for(var e=0;e<n.length;e++)n[e](0,t)}))}},{key:"reachedToEnd",value:function(){return this.iterations>0&&this.offset>=this.iterations*this.duration}},{key:"restart",value:function(){this._stop(),this.offset=0,this._start()}},{key:"pause",value:function(){this._stop()}},{key:"reverse",value:function(){this.direction=-this.direction}}],[{key:"build",value:function(n,e){return(n=L(n,e))?{el:n.element,options:n.options||{},player:new t(n.animations,n.animationSettings,n.options)}:null}}]),t}();!function(){for(var t=0,n=["ms","moz","webkit","o"],e=0;e<n.length&&!window.requestAnimationFrame;++e)window.requestAnimationFrame=window[n[e]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[n[e]+"CancelAnimationFrame"]||window[n[e]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(n){var e=Date.now(),r=Math.max(0,16-(e-t)),i=window.setTimeout((function(){n(e+r)}),r);return t=e+r,i},window.cancelAnimationFrame=window.clearTimeout)}();var W=function(t,n){var e=!1,r=null;return function(i){e&&clearTimeout(e),e=setTimeout((function(){return function(){for(var i=0,u=window.innerHeight,o=0,a=window.innerWidth,l=t.parentNode;l instanceof Element;){var f=window.getComputedStyle(l);if("visible"!==f.overflowY||"visible"!==f.overflowX){var s=l.getBoundingClientRect();"visible"!==f.overflowY&&(i=Math.max(i,s.top),u=Math.min(u,s.bottom)),"visible"!==f.overflowX&&(o=Math.max(o,s.left),a=Math.min(a,s.right))}if(l===l.parentNode)break;l=l.parentNode}e=!1;var c=t.getBoundingClientRect(),h=Math.min(c.height,Math.max(0,i-c.top)),v=Math.min(c.height,Math.max(0,c.bottom-u)),d=Math.min(c.width,Math.max(0,o-c.left)),y=Math.min(c.width,Math.max(0,c.right-a)),g=(c.height-h-v)/c.height,p=(c.width-d-y)/c.width,m=Math.round(g*p*100);null!==r&&r===m||(r=m,n(m))}()}),100)}},Y=function(){function t(e,r,i){n(this,t),r=Math.max(1,r||1),r=Math.min(r,100),this.el=e,this.onTresholdChange=i&&i.call?i:function(){},this.tresholdPercent=r||1,this.currentVisibility=null,this.visibilityCalculator=W(e,this.onVisibilityUpdate.bind(this)),this.bindScrollWatchers(),this.visibilityCalculator()}return r(t,[{key:"bindScrollWatchers",value:function(){for(var t=this.el.parentNode;t&&(t.addEventListener("scroll",this.visibilityCalculator),t!==t.parentNode&&t!==document);)t=t.parentNode}},{key:"onVisibilityUpdate",value:function(t){var n=this.currentVisibility>=this.tresholdPercent,e=t>=this.tresholdPercent;if(null===this.currentVisibility||n!==e)return this.currentVisibility=t,void this.onTresholdChange(e);this.currentVisibility=t}}]),t}(),G=/\.0+$/g;function H(t){return Number.isInteger(t)?t+"":t.toFixed(6).replace(G,"")}function X(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:" ";return t&&t.length?t.map(H).join(n):""}function $(t){return H(t.x)+","+H(t.y)}function Q(t){return t?null==t.a||t.a>=1?"rgb("+t.r+","+t.g+","+t.b+")":"rgba("+t.r+","+t.g+","+t.b+","+t.a+")":"transparent"}var Z={f:null,i:k,u:function(t,n){return function(e){var r=n(e);t.setAttribute("rx",H(r.x)),t.setAttribute("ry",H(r.y))}}},J={f:null,i:function(t,n,e){return 0===t?n:1===t?e:{width:w(t,n.width,e.width),height:w(t,n.height,e.height)}},u:function(t,n){return function(e){var r=n(e);t.setAttribute("width",H(r.width)),t.setAttribute("height",H(r.height))}}},K=Math.sin,tt=Math.cos,nt=Math.acos,et=Math.asin,rt=Math.tan,it=Math.atan2,ut=Math.PI/180,ot=180/Math.PI,at=Math.sqrt,lt=function(){function t(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,u=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,o=arguments.length>4&&void 0!==arguments[4]?arguments[4]:0,a=arguments.length>5&&void 0!==arguments[5]?arguments[5]:0;n(this,t),this.m=[e,r,i,u,o,a],this.i=null,this.w=null,this.s=null}return r(t,[{key:"point",value:function(t,n){var e=this.m;return{x:e[0]*t+e[2]*n+e[4],y:e[1]*t+e[3]*n+e[5]}}},{key:"translateSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;if(!t&&!n)return this;var e=this.m;return e[4]+=e[0]*t+e[2]*n,e[5]+=e[1]*t+e[3]*n,this.w=this.s=this.i=null,this}},{key:"rotateSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0;if(t%=360){var n=K(t*=ut),e=tt(t),r=this.m,i=r[0],u=r[1];r[0]=i*e+r[2]*n,r[1]=u*e+r[3]*n,r[2]=r[2]*e-i*n,r[3]=r[3]*e-u*n,this.w=this.s=this.i=null}return this}},{key:"scaleSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1;if(1!==t||1!==n){var e=this.m;e[0]*=t,e[1]*=t,e[2]*=n,e[3]*=n,this.w=this.s=this.i=null}return this}},{key:"skewSelf",value:function(t,n){if(n%=360,(t%=360)||n){var e=this.m,r=e[0],i=e[1],u=e[2],o=e[3];t&&(t=rt(t*ut),e[2]+=r*t,e[3]+=i*t),n&&(n=rt(n*ut),e[0]+=u*n,e[1]+=o*n),this.w=this.s=this.i=null}return this}},{key:"resetSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1,i=arguments.length>4&&void 0!==arguments[4]?arguments[4]:0,u=arguments.length>5&&void 0!==arguments[5]?arguments[5]:0,o=this.m;return o[0]=t,o[1]=n,o[2]=e,o[3]=r,o[4]=i,o[5]=u,this.w=this.s=this.i=null,this}},{key:"recomposeSelf",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,e=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null,r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null,i=arguments.length>4&&void 0!==arguments[4]?arguments[4]:null;return this.isIdentity||this.resetSelf(),t&&(t.x||t.y)&&this.translateSelf(t.x,t.y),n&&this.rotateSelf(n),e&&(e.x&&this.skewSelf(e.x,0),e.y&&this.skewSelf(0,e.y)),!r||1===r.x&&1===r.y||this.scaleSelf(r.x,r.y),i&&(i.x||i.y)&&this.translateSelf(i.x,i.y),this}},{key:"decompose",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=this.m,r=e[0]*e[0]+e[1]*e[1],i=[[e[0],e[1]],[e[2],e[3]]],u=at(r);if(0===u)return{origin:{x:e[4],y:e[5]},translate:{x:t,y:n},scale:{x:0,y:0},skew:{x:0,y:0},rotate:0};i[0][0]/=u,i[0][1]/=u;var o=e[0]*e[3]-e[1]*e[2]<0;o&&(u=-u);var a=i[0][0]*i[1][0]+i[0][1]*i[1][1];i[1][0]-=i[0][0]*a,i[1][1]-=i[0][1]*a;var l=at(i[1][0]*i[1][0]+i[1][1]*i[1][1]);if(0===l)return{origin:{x:e[4],y:e[5]},translate:{x:t,y:n},scale:{x:u,y:0},skew:{x:0,y:0},rotate:0};i[1][0]/=l,i[1][1]/=l,a/=l;var f=0;return i[1][1]<0?(f=nt(i[1][1])*ot,i[0][1]<0&&(f=360-f)):f=et(i[0][1])*ot,o&&(f=-f),a=it(a,at(i[0][0]*i[0][0]+i[0][1]*i[0][1]))*ot,{origin:{x:e[4],y:e[5]},translate:{x:t,y:n},scale:{x:u,y:l},skew:{x:a,y:0},rotate:f}}},{key:"toString",value:function(){return null===this.s&&(this.s="matrix("+this.m.map(st).join(" ")+")"),this.s}},{key:"determinant",get:function(){var t=this.m;return t[0]*t[3]-t[1]*t[2]}},{key:"isIdentity",get:function(){if(null===this.i){var t=this.m;this.i=1===t[0]&&0===t[1]&&0===t[2]&&1===t[3]&&0===t[4]&&0===t[5]}return this.i}}]),t}(),ft=/\.0+$/;function st(t){return Number.isInteger(t)?t:t.toFixed(14).replace(ft,"")}Object.freeze({M:2,L:2,Z:0,H:1,V:1,C:6,Q:4,T:2,S:4,A:7});function ct(t,n,e){return t+(n-t)*e}function ht(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3],i={x:ct(t.x,n.x,e),y:ct(t.y,n.y,e)};return r&&(i.a=vt(t,n)),i}function vt(t,n){return Math.atan2(n.y-t.y,n.x-t.x)}function dt(t,n,e,r){var i=1-r;return i*i*t+2*i*r*n+r*r*e}function yt(t,n,e,r){return 2*(1-r)*(n-t)+2*r*(e-n)}function gt(t,n,e,r){var i=arguments.length>4&&void 0!==arguments[4]&&arguments[4],u={x:dt(t.x,n.x,e.x,r),y:dt(t.y,n.y,e.y,r)};return i&&(u.a=pt(t,n,e,r)),u}function pt(t,n,e,r){return Math.atan2(yt(t.y,n.y,e.y,r),yt(t.x,n.x,e.x,r))}function mt(t,n,e,r,i){var u=i*i;return i*u*(r-t+3*(n-e))+3*u*(t+e-2*n)+3*i*(n-t)+t}function bt(t,n,e,r,i){var u=1-i;return 3*(u*u*(n-t)+2*u*i*(e-n)+i*i*(r-e))}function wt(t,n,e,r,i){var u=arguments.length>5&&void 0!==arguments[5]&&arguments[5],o={x:mt(t.x,n.x,e.x,r.x,i),y:mt(t.y,n.y,e.y,r.y,i)};return u&&(o.a=xt(t,n,e,r,i)),o}function xt(t,n,e,r,i){return Math.atan2(bt(t.y,n.y,e.y,r.y,i),bt(t.x,n.x,e.x,r.x,i))}function kt(t,n,e){var r=arguments.length>3&&void 0!==arguments[3]&&arguments[3];if(_t(n)){if(St(e))return gt(n,e.start,e,t,r)}else if(_t(e)){if(n.end)return gt(n,n.end,e,t,r)}else{if(n.end)return e.start?wt(n,n.end,e.start,e,t,r):gt(n,n.end,e,t,r);if(e.start)return gt(n,e.start,e,t,r)}return ht(n,e,t,r)}function At(t,n,e){var r=kt(t,n,e,!0);return r.a=function(t){var n=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return n?t+Math.PI:t}(r.a)/p,r}function _t(t){return!t.type||"corner"===t.type}function St(t){return null!=t.start&&!_t(t)}var Mt=new lt;var Ot={f:function(t){return t?t.join(" "):""},i:function(n,e,r){if(0===n)return e;if(1===n)return r;var i=e.length;if(i!==r.length)return m(n,e,r);for(var u,o=new Array(i),a=0;a<i;a++){if((u=t(e[a]))!==t(r[a]))return m(n,e,r);if("number"===u)o[a]=b(n,e[a],r[a]);else{if(e[a]!==r[a])return m(n,e,r);o[a]=e[a]}}return o}},Et={f:null,i:M,u:function(t,n){return function(e){var r=n(e);t.setAttribute("x1",H(r[0])),t.setAttribute("y1",H(r[1])),t.setAttribute("x2",H(r[2])),t.setAttribute("y2",H(r[3]))}}},Bt={f:H,i:b},It={f:H,i:function(t,n,e){var r=b(t,n,e);return r<=0?0:r>=1?1:r}},jt={f:function(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:" ";return t&&t.length>0&&(t=t.map((function(t){return Math.floor(1e4*t)/1e4}))),X(t,n)},i:function(t,n,e){var r,i,u,o=n.length,a=e.length;if(o!==a)if(0===o)n=O(o=a,0);else if(0===a)a=o,e=O(o,0);else{var l=(u=(r=o)*(i=a)/function(t,n){for(var e;n;)e=n,n=t%n,t=e;return t||1}(r,i))<0?-u:u;n=E(n,Math.floor(l/o)),e=E(e,Math.floor(l/a)),o=a=l}for(var f=[],s=0;s<o;s++)f.push(g(w(t,n[s],e[s]),6));return f}};function Pt(t,n,e,r,i,u,o,a){return n=function(t,n,e){for(var r,i,u,o=t.length-1,a={},l=0;l<=o;l++)(r=t[l]).e&&(r.e=n(r.e)),r.v&&"g"===(i=r.v).t&&i.r&&(u=e.getElementById(i.r))&&(a[i.r]=u.querySelectorAll("stop"));return a}(t,r,a),function(r){var i,u=e(r,t,Ft);return u?"c"===u.t?Q(u.v):"g"===u.t?(n[u.r]&&function(t,n){for(var e=0,r=t.length;e<r;e++)t[e].setAttribute("stop-color",Q(n[e]))}(n[u.r],u.v),(i=u.r)?"url(#"+i+")":"none"):"none":"none"}}function Ft(t,n,e){if(0===t)return n;if(1===t)return e;if(n&&e){var r=n.t;if(r===e.t)switch(n.t){case"c":return{t:r,v:_(t,n.v,e.v)};case"g":if(n.r===e.r)return{t:r,v:S(t,n.v,e.v),r:n.r}}}return m(t,n,e)}var Rt={blur:k,brightness:w,contrast:w,"drop-shadow":function(t,n,e){return 0===t?n:1===t?e:{blur:k(t,n.blur,e.blur),offset:x(t,n.offset,e.offset),color:_(t,n.color,e.color)}},grayscale:w,"hue-rotate":b,invert:w,opacity:w,saturate:w,sepia:w};function Tt(t,n,e){if(0===t)return n;if(1===t)return e;var r=n.length;if(r!==e.length)return m(t,n,e);for(var i,u=[],o=0;o<r;o++){if(n[o].type!==e[o].type)return n;if(!(i=Rt[n[o].type]))return m(t,n,e);u.push({type:n.type,value:i(t,n[o].value,e[o].value)})}return u}var qt={blur:function(t){return t?function(n){t.setAttribute("stdDeviation",$(n))}:null},brightness:function(t,n,e){return(t=Vt(e,n))?function(n){n=H(n),t.map((function(t){return t.setAttribute("slope",n)}))}:null},contrast:function(t,n,e){return(t=Vt(e,n))?function(n){var e=H((1-n)/2);n=H(n),t.map((function(t){t.setAttribute("slope",n),t.setAttribute("intercept",e)}))}:null},"drop-shadow":function(t,n,e){var r=e.getElementById(n+"-blur");if(!r)return null;var i=e.getElementById(n+"-offset");if(!i)return null;var u=e.getElementById(n+"-flood");return u?function(t){r.setAttribute("stdDeviation",$(t.blur)),i.setAttribute("dx",H(t.offset.x)),i.setAttribute("dy",H(t.offset.y)),u.setAttribute("flood-color",Q(t.color))}:null},grayscale:function(t){return t?function(n){t.setAttribute("values",X(function(t){return[.2126+.7874*(t=1-t),.7152-.7152*t,.0722-.0722*t,0,0,.2126-.2126*t,.7152+.2848*t,.0722-.0722*t,0,0,.2126-.2126*t,.7152-.7152*t,.0722+.9278*t,0,0,0,0,0,1,0]}(n)))}:null},"hue-rotate":function(t){return t?function(n){return t.setAttribute("values",H(n))}:null},invert:function(t,n,e){return(t=Vt(e,n))?function(n){n=H(n)+" "+H(1-n),t.map((function(t){return t.setAttribute("tableValues",n)}))}:null},opacity:function(t,n,e){return(t=e.getElementById(n+"-A"))?function(n){return t.setAttribute("tableValues","0 "+H(n))}:null},saturate:function(t){return t?function(n){return t.setAttribute("values",H(n))}:null},sepia:function(t){return t?function(n){return t.setAttribute("values",X(function(t){return[.393+.607*(t=1-t),.769-.769*t,.189-.189*t,0,0,.349-.349*t,.686+.314*t,.168-.168*t,0,0,.272-.272*t,.534-.534*t,.131+.869*t,0,0,0,0,0,1,0]}(n)))}:null}};var Ct=["R","G","B"];function Vt(t,n){var e=Ct.map((function(e){return t.getElementById(n+"-"+e)||null}));return-1!==e.indexOf(null)?null:e}var Nt={fill:Pt,"fill-opacity":It,stroke:Pt,"stroke-opacity":It,"stroke-width":Bt,"stroke-dashoffset":{f:H,i:b},"stroke-dasharray":jt,opacity:It,transform:function(n,e,r,i){if(!(n=function(n,e){if(!n||"object"!==t(n))return null;var r=!1;for(var i in n)n.hasOwnProperty(i)&&(n[i]&&n[i].length?(n[i].forEach((function(t){t.e&&(t.e=e(t.e))})),r=!0):delete n[i]);return r?n:null}(n,i)))return null;var u=function(t,i,u){var o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:null;return n[t]?r(i,n[t],u):e&&e[t]?e[t]:o};return e&&e.a&&n.o?function(t){var e=r(t,n.o,At);return Mt.recomposeSelf(e,u("r",t,b,0)+e.a,u("k",t,x),u("s",t,x),u("t",t,x)).toString()}:function(t){return Mt.recomposeSelf(u("o",t,kt,null),u("r",t,b,0),u("k",t,x),u("s",t,x),u("t",t,x)).toString()}},"#filter":function(t,n,e,r,i,u,o,a){if(!n.items||!t||!t.length)return null;var l=function(t,n){var e=(t=t.map((function(t){return t&&qt[t[0]]?(n.getElementById(t[1]),qt[t[0]](n.getElementById(t[1]),t[1],n)):null}))).length;return function(n){for(var r=0;r<e;r++)t[r]&&t[r](n[r].value)}}(n.items,a);return l?(t=function(t,n){return t.map((function(t){return t.e=n(t.e),t}))}(t,r),function(n){l(e(n,t,Tt))}):null},"#line":Et,points:{f:X,i:M},d:Ot,r:Bt,"#size":J,"#radius":Z,_:function(t,n){if(Array.isArray(t))for(var e=0;e<t.length;e++)this[t[e]]=n;else this[t]=n}};return function(t){!function(t,n){if("function"!=typeof n&&null!==n)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(n&&n.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),n&&u(t,n)}(o,t);var e=a(o);function o(){return n(this,o),e.apply(this,arguments)}return r(o,null,[{key:"build",value:function(t){var n=l(i(o),"build",this).call(this,t,Nt),e=n.el,r=n.options,u=n.player;return function(t,n,e){if("click"===e.start){return void n.addEventListener("click",(function(){switch(e.click){case"freeze":return!t._running&&t.reachedToEnd()&&(t.offset=0),t._running?t.pause():t.play();case"restart":return t.offset>0?t.restart():t.play();case"reverse":var n=!t._rollingBack&&t._running,r=t.reachedToEnd();return n||r&&1===t.fill?(t.pause(),r&&(t.offset=t.duration-1),t._rollback()):r?t.restart():t.play();case"none":default:return!t._running&&t.offset?t.restart():t.play()}}))}if("hover"===e.start)return n.addEventListener("mouseenter",(function(){return t.reachedToEnd()?t.restart():t.play()})),void n.addEventListener("mouseleave",(function(){switch(e.hover){case"freeze":return t.pause();case"reset":return t.stop();case"reverse":return t.pause(),t._rollback();case"none":default:return}}));if("scroll"===e.start)return void new Y(n,e.scroll||25,(function(n){n?t.reachedToEnd()?t.restart():t.play():t.pause()}));t.play()}(u,e,r),u}}]),o}(U)}));
                __SVGATOR_PLAYER__.build({"root":"ey14k4vfasa1","animations":[{"duration":3000,"direction":1,"iterations":1,"fill":1,"alternate":false,"elements":{"ey14k4vfasa3":{"transform":{"data":{"t":{"x":-1750.686653564453,"y":-755.986502319336}},"keys":{"o":[{"t":0,"v":{"x":1750.686653564453,"y":955.99,"type":"corner"}},{"t":1000,"v":{"x":1750.686653564453,"y":755.99,"type":"corner"}}]}}},"ey14k4vfasa6":{"transform":{"keys":{"o":[{"t":0,"v":{"x":892.617,"y":668.94,"type":"corner"}},{"t":1000,"v":{"x":892.617,"y":468.94,"type":"corner"}}]}}},"ey14k4vfasa12":{"opacity":[{"t":0,"v":0},{"t":1900,"v":0.05},{"t":2300,"v":0.25}]},"ey14k4vfasa13":{"opacity":[{"t":0,"v":0},{"t":1700,"v":0.05},{"t":2100,"v":0.25}]},"ey14k4vfasa14":{"opacity":[{"t":0,"v":0},{"t":1500,"v":0.05},{"t":1900,"v":0.25}]},"ey14k4vfasa15":{"opacity":[{"t":0,"v":0},{"t":1300,"v":0.05},{"t":1700,"v":0.25}]},"ey14k4vfasa16":{"opacity":[{"t":0,"v":0},{"t":1100,"v":0.05},{"t":1500,"v":0.25}]},"ey14k4vfasa17":{"opacity":[{"t":2300,"v":0},{"t":3000,"v":1}]}}}],"options":{"start":"load","hover":"freeze","click":"freeze","scroll":25,"exportedIds":"unique","title":"lightbulb-icon"},"animationSettings":{"duration":3000,"direction":1,"iterations":1,"fill":1,"alternate":false}})]]></script></svg>            </div>
            <?php } ?>

        <!-- Page Banner -->

        <div id="page-cta-container" class="hidden">
            <?php
            $career = 242936;     // Career Goals
            $includeCareer = get_field('career-include_banner', 'options');

            $strategy = 238435;   // Strategy
            $includeStrategy = get_field('strategy-include_banner', 'options');

            $client = 243358;     // Client Service
            $includeClient = get_field('client-include_banner', 'options');

            $marketing = 239228;  // Legal Marketing
            $includeMarketing = get_field('marketing-include_banner', 'options');

            $management = 243412; // Office Management
            $includeManagement = get_field('management-include_banner', 'options');

            $technology = 239226; // Legal Technology
            $includeTechnology = get_field('technology-include_banner', 'options');

            $finances = 243203;   // Finances
            $includeFinances = get_field('finances-include_banner', 'options');

            $hiring = 243408;     // Hiring & Staffing
            $includeHiring = get_field('hiring-include_banner', 'options');

            $starting = 275656;     // Starting a Law Firm
            $includeStarting = get_field('starting-include_banner', 'options');
            ?>

            <?php if ((is_tree($career)) && ( $includeCareer == true ) && (have_rows('career_banner', 'options'))) { ?>

                <?php if (have_rows('career_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('career_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <!-- Manually adding "Starting a Law Firm" -->
            <?php } else if ( is_page( '275656' ) ) { ?>

                    <span class="close-btn"></span>
                    <div class="page-cta">
                        <a class="button" href="/subscribe/" title="Lawyerist Insider">Lawyerist Insider</a>
                        <a class="page-link" href="/subscribe/" title="Lawyerist Insider">Become an Insider. Join today.</a>
                        <a class="quick-link" href="/subscribe/" title="Lawyerist Insider">Join</a>
                    </div>

            <?php } else if ((is_tree($strategy)) && ( $includeStrategy == true ) && (have_rows('strategy_banner', 'options'))) { ?>

                <?php if (have_rows('strategy_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('strategy_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_tree($client)) && ( $includeClient == true ) && (have_rows('client_banner', 'options'))) { ?>

                <?php if (have_rows('client_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('client_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_tree($marketing)) && ( $includeMarketing == true ) && (have_rows('marketing_banner', 'options'))) { ?>

                <?php if (have_rows('marketing_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('marketing_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_tree($management)) && ( $includeManagement == true ) && (have_rows('management_banner', 'options'))) { ?>

                <?php if (have_rows('management_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('management_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_tree($technology)) && ( $includeTechnology == true ) && (have_rows('technology_banner', 'options'))) { ?>

                <?php if (have_rows('technology_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('technology_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_tree($finances)) && ( $includeFinances == true ) && (have_rows('finances_banner', 'options'))) { ?>

                <?php if (have_rows('finances_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('finances_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_tree($hiring)) && ( $includeHiring == true ) && (have_rows('hiring_banner', 'options'))) { ?>

                <?php if (have_rows('hiring_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('hirinng_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else if ((is_page($starting)) && ( $includeStarting == true ) && (have_rows('starting_banner', 'options'))) { ?>

                <?php if (have_rows('starting_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('starting_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } else { ?>

                <?php if (have_rows('global_banner', 'options')): ?>
                    <span class="close-btn"></span>
                    <?php while (have_rows('global_banner', 'options')): the_row(); ?>
                        <div class="page-cta">

                            <?php if (have_rows('button')): ?>
                                <?php
                                while (have_rows('button')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('page_link')): ?>
                                <?php
                                while (have_rows('page_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="page-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php if (have_rows('quick_link')): ?>
                                <?php
                                while (have_rows('quick_link')): the_row();
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a class="quick-link" href="<?php echo esc_url($link); ?>" alt="<?php echo $text; ?>"><?php echo $text; ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } ?>
        </div>

<?php
if ( check_sponsors() == true && is_page_template('product-single-review.php') ) { ?>
    <div id="sidebar-logo-link">
        <div class="partner-image-border">
            <!-- Product Thumbnail -->
            <?php if ( has_post_thumbnail() ) { ?>
                <div itemprop="image"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
            <?php } ?>
        </div>
        <div class="partner-link">
            <?php echo lwyrst_new_trial_btn('Website'); ?>
        </div>
    </div>
<?php } else { ?>
    <div id="back-to-top"><a data-scroll href="#header-top" title="back to top"><span class="icon-form-dropdown-icon1"></span><span class="btt-text">Back to Top</span></a></div>
<?php } ?>
