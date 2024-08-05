<?php /* Template Name: Guides Parent Template */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

<div id="review_container" class="guides-parent">

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>

</div>

<?php get_footer(); ?>