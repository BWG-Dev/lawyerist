<?php /* Template Name: Guides Child Template */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

<div id="review_container" class="guides-child-page ">

    <div class="page-pin">
        <div class="container">
            <div class="image">
                <img src="/wp-content/uploads/2022/04/healthy-firm-graphic-small-with-line.svg" alt=""/>
            </div>
            <p class="pin-text">Part of the ‘Lawyerist Healthy Law Firm’</p>
            <a class="link" href="/healthy-firm/" title="Learn more about Lawyerist Healthy Law Firm">Learn more</a>
        </div>
    </div>

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>


</div>

<?php get_footer(); ?>