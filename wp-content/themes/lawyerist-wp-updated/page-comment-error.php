
<?php 
//custom comment error template
get_header();  ?>


<div id="review_container" class="fof page-comment-error">

    <div class="top-map">
        <img src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" alt="Map"/>
    </div>

    <div class="fof-wrapper">
        <div class="col-1">
            <div class="mobile-spacing"></div>
            <div class="content">
                <div class="where-you-are">
                    <div class="path">
                        <img src="/wp-content/uploads/2022/03/404-line-1.svg" alt="Path side to 404"/>
                    </div>
                    <div class="path-two">
                        <img src="/wp-content/uploads/2022/03/404-line-2.svg" alt="Path down to 404"/>
                    </div>
                    <p class="pin-text">You are<br />here</p>
                </div>
                <div class="c-container">
                    <h1>Oops...</h1>
                    <p>A field appears to be missing! Be sure to include a <strong>title</strong>, <strong>review</strong>, and <strong>rating</strong>!</p>
                    <a href="#" onclick="history.back()">
                        <div class="orange-btn">
                            <span>Go Back</span>
                        </div>
                    </a>                    
                </div>
            </div>
        </div>
    </div>

</div>


<?php get_footer(); ?>