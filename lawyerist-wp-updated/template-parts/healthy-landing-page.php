<?php /* Template Name: Healthy Main Landing */ ?>

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

<div id="review_container" class="healthy-landing-page">

    <?php get_template_part( 'template-parts/sub', 'navigation' ); ?>

    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>

</div>

<?php get_footer(); ?>