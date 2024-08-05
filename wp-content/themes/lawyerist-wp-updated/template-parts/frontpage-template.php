<?php /* Template Name: Frontpage Template */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

<div id="review_container" class="frontpage">

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
        <!-- Footer Slider -->
    <?php get_template_part('template-parts/related-resources');
    endwhile; /* End loop */ ?>
</div>

<?php get_footer(); ?>