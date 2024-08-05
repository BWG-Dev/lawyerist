<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>

<div id="#start-here" class="main healthy_firm_slider"><!-- start healthy_firm_slider -->
    <div class="col-1">
        <div id="healthy-slider" class="slider-nav" dir="rtl">
            <div class="card healthy">
                <div class="container">
                    <div class="icon-with-title">
                        <div class="svg black">
                            <img src="/wp-content/uploads/2022/02/healthy-firm-strategy-icon.svg" alt="Healthy Strategy"/>
                        </div>
                        <p><a href="/healthy-strategy/">Start Here<span>!</span></a></p>
                    </div>
                    <a href="/healthy-strategy/">Healthy Strategy</a>
                    <p>We know that a healthy business starts with a healthy strategy. You need a clear vision and values with real goals that help you see where you’re going and what you’re building.</p>
                </div>
                <img class="fixed-btm-img" src="/wp-content/uploads/2022/01/healthy-page-cutouts-strategy.png" alt=""/>
            </div>
            <div class="card healthy">
                <div class="container">
                    <div class="icon-with-title">
                        <div class="svg orange">
                            <img src="/wp-content/uploads/2022/02/healthy-firm-team-icon.svg" alt="Healthy Teams"/>
                        </div>
                    </div>
                    <a href="/healthy-team/">Healthy Team</a>
                    <p>Next, you need to build a healthy team—team members who are aligned with your strategy, are properly managed, and understand how to consistently deliver.</p>
                </div>
                <img class="fixed-btm-img" src="/wp-content/uploads/2022/01/healthy-page-cutouts-team.png" alt=""/>
            </div>
            <div class="card healthy">
                <div class="container">
                    <div class="icon-with-title">
                        <div class="svg grey">
                            <img src="/wp-content/uploads/2022/02/healthy-firm-clients-icon.svg" alt="Healthy Clients"/>
                        </div>
                    </div>
                    <a href="/healthy-clients/">Healthy Clients</a>
                    <p>Are you attracting and converting the right clients? Do you consistently offer an exceptional client experience that creates raving fans who happily refer your team?</p>
                </div>
                <img class="fixed-btm-img" src="/wp-content/uploads/2022/02/healthy-page-cutouts-clients-1.png" alt=""/>
            </div>
            <div class="card healthy">
                <div class="container">
                    <div class="icon-with-title">
                        <div class="svg green">
                            <img src="/wp-content/uploads/2022/02/healthy-firm-systems-icon.svg" alt="Healthy Systems"/>
                        </div>
                    </div>
                    <a href="/healthy-systems/">Healthy Systems</a>
                    <p>Your systems, technology, procedures, and data security all exist to make your life easier and your client’s experience better.</p>
                </div>
                <img class="fixed-btm-img" src="/wp-content/uploads/2022/01/healthy-page-cutouts-systems.png" alt=""/>
            </div>
            <div class="card healthy">
                <div class="container">
                    <div class="icon-with-title">
                        <div class="svg d-green">
                            <img src="/wp-content/uploads/2022/02/healthy-firm-profit-icon.svg" alt="Healthy Profit"/>
                        </div>
                    </div>
                    <a href="/healthy-profits/">Healthy Profits</a>
                    <p>Every business needs a financial strategy with a growth strategy; and data (or KPIs) to make meaningful decisions.</p>
                </div>
                <img class="fixed-btm-img" src="/wp-content/uploads/2022/01/healthy-page-cutouts-profits.png" alt=""/>
            </div>
            <div class="card healthy">
                <div class="container">
                    <div class="icon-with-title">
                        <div class="svg burg">
                            <img src="/wp-content/uploads/2022/02/healthy-firm-owner-icon.svg" alt="Healthy Owner"/>
                        </div>
                    </div>
                    <a href="/healthy-owners/">Healthy Owner</a>
                    <p>Your business should serve you and your goals. Are you living the life you dreamed of? Properly compensated? And professionally fulfilled?</p>
                </div>
                <img class="fixed-btm-img" src="/wp-content/uploads/2022/01/healthy-page-cutouts-profits-1.png" alt=""/>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="svg-slider">
            <div class="svg-graphic">
                <?php get_template_part( 'template-parts/svg', 'stages' ); ?>
            </div>
            <!--<div class="action">
                <a href="#" data-slide="1"></a>
                <a href="#" data-slide="2"></a>
                <a href="#" data-slide="3"></a>
                <a href="#" data-slide="4"></a>
                <a href="#" data-slide="5"></a>
                <a href="#" data-slide="6"></a>
            </div>-->
        </div>
        <div class="background-swirl">
            <img src="/wp-content/uploads/2022/01/topographic-map-graphic.svg" alt=""/>
        </div>
    </div>

</div><!-- end healthy_firm_slider -->

<script src='https://kenwheeler.github.io/slick/slick/slick.js'></script>
<script>
jQuery.noConflict();
jQuery(document).ready(function(){ 

    jQuery('.slider-nav').slick({
        slidesToShow: 2,
        infinite: true,
        slidesToScroll: 1,
        dots: false,
        focusOnSelect: true,
        rtl: true,
        arrows: true,
        prevArrow: '<svg fill="#424b54" id="nextAr" width="40" height="40" fill xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,996.3c272.85,0,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66,4.66,228.64,4.66,501.48,226.63,996.3,499.49,996.3Zm0-961.09c257.11,0,466.27,209.17,466.27,466.27S756.6,967.75,499.49,967.75,33.21,758.58,33.21,501.48,242.37,35.21,499.49,35.21Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="501.5 637.55 501.5 538.59 656.67 538.59 656.67 428.49 501.5 428.49 501.5 335.39 411.1 410.93 320.36 486.46 410.82 562 501.5 637.55" style="fill-rule:evenodd"/></svg>',
        nextArrow: '<svg fill="#424b54" id="prevAr" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 989.64 989.64"><path d="M499.49,6.66c-272.86,0-494.83,222-494.83,494.82s222,494.82,494.83,494.82,494.82-222,494.82-494.82S772.34,6.66,499.49,6.66Zm0,961.09c-257.12,0-466.28-209.17-466.28-466.27S242.37,35.21,499.49,35.21,965.76,244.38,965.76,501.48,756.6,967.75,499.49,967.75Z" transform="translate(-4.66 -6.66)" style="fill-rule:evenodd"/><polygon points="488.14 352.09 488.14 451.05 332.98 451.05 332.98 561.15 488.14 561.15 488.14 654.25 578.54 578.72 669.28 503.18 578.83 427.64 488.14 352.09" style="fill-rule:evenodd"/></svg>',
        responsive: [
        {
        breakpoint: 1395,
        settings: {
                centerMode: false,
                centerPadding: "0px",
                slidesToShow: 2
            }
        },
        {
        breakpoint: 1200,
        settings: {
                centerMode: false,
                centerPadding: "0px",
                slidesToShow: 1
            }
        },
        {
        breakpoint: 285,
        settings: {
                centerMode: true,
                centerPadding: "0px",
                slidesToShow: 1
            }
        }
    ]
    });

    jQuery('a[data-slide]').click(function(e) {
        e.preventDefault();
        var slideno = jQuery(this).data('slide');
        jQuery('.slider-nav').slick('slickGoTo', slideno - 1);
    });

    jQuery(function() {
        jQuery('.no-fouc').removeClass('no-fouc');
    // Console message that page is ready.
        console.log( "Page ready! Show Carousel" );
    });
});
</script>