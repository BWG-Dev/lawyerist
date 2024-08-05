<?php /* Template Name: Navigational */ ?>

<?php get_header(); ?>


<div id="review_container">
    <!-- start - #review-breadcrumbs -->
    <div class="wrapper-fof">
        <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>
    </div>
</div>
<!-- end - #review-breadcrumbs -->

<div id="review_container" class="navigational-page">

    <div class="top-map">
        <img src="/wp-content/uploads/2022/02/topographic-map-graphic.svg" alt="Map"/>
    </div>

    <?php get_template_part( 'template-parts/loop', 'navigational' ); ?>

</div><!--end #review_container-->

<?php get_footer(); ?>
