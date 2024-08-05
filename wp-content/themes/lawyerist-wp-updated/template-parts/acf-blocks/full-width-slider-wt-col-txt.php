<?php
    $heading = get_field('heading');
    $slider_username = get_field('slider_username');
    $slider_reviewer = get_field('slider_reviewer');
    $slider_quote = get_field('slider_quote');
    $slider_two_reviewer = get_field('slider_two_reviewer');
    $slider_two_description = get_field('slider_two_description');
?>

<!-- Section 1 -->
<div id="" class="full-width-slider-wt-col-txt">
    <div class="container">
        <div class="col-1">
            <h2 class="heading"><?php echo $heading; ?></h2>

            <div class="review-inner-slider coin-01x">
                <div>
                    <div class="user">
                        <div class="user-details">
                            <p class="username">WHAT <span class="txt-orange"><?php echo $slider_reviewer; ?></span> HAS TO SAY ABOUT <span class="txt-orange"><?php echo $slider_username; ?></span>:</p>
                        </div>
                    </div>
                    <?php echo $slider_quote; ?>
                </div>
                <div>
                    <div class="user">
                        <div class="user-details">
                            <p class="username">WHAT <span class="txt-orange"><?php echo $slider_two_reviewer; ?></span> HAS TO SAY ABOUT <span class="txt-orange"><?php echo $slider_username; ?></span>:</p>
                        </div>
                    </div>
                    <?php echo $slider_two_description; ?>
                </div>
            </div>

            <div class="steps">
                <div class="col-1">
                    <p class="title">First…</p>
                    <p class="description">we help lawyers learn what law school left out—how to build, grow, and manage a small law firm. Through our go-to website, best selling book, The Small Firm Roadmap, and highly-rated podcast, we provide today’s best business practices so they are easy to digest and implement. Lawyers ready for more sustainable growth, a future-proofed firm, and faster results work with us through our paid business coaching community, Lawyerist Lab.

</p>
                </div>
                <div class="col-1">
                <p class="title">Next…</p>
                    <p class="description">we connect small law firm owners with the services and tools they need to successfully run their firms. If you are searching through the morase to find the best product for your team, you can search no more. Our review pages are designed to give you the right information so you can make a confident decision. While our industry partners do sponsor or highlight certain content, rest assured that our editorial team works hard to give you their honest and unbiased reviews.

</p>
                </div>
            </div>
        </div>

        <style>
            .show-block {
                display: none;
            }
            @media all and (min-width: 1024px) {
                .show-block {
                    display: block;
                }
            }
        </style>
        <div class="col-2 show-block">
            <div class="map">
                <div class="ab-pin">
                    <div class="pin"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End section 1 -->