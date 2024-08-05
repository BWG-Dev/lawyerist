<?php /* Template Name: Search Template */ ?>

<!-- <
    $u_time = get_the_time('U');
    $u_modified_time = get_the_modified_time('U');
        if ($u_modified_time >= $u_time + 86400) {
    echo "Last updated ";
        the_modified_time('F jS, Y');
    echo ""; }
    else {echo "Posted "; the_time('F jS, Y');}
> -->

<?php get_header(); 

	// Assign post variables.
	$page_title = the_title( '', '', FALSE );
?>

<div id="review_container" class="frontpage">


    <?php while (have_posts()) : the_post();/* Start loop */ ?>
        <?php the_content(); ?>
    <?php endwhile; /* End loop */ ?>


    <div class="search-container">
        <div>
            <div>
                <p>Not seeing what you’re looking for? Refine your search!</p>
            </div>
            <div>
                <?php get_search_form(); ?>
            </div>
        </div>

        <div class="results-container">
            <h1>Search Results for ‘Lorem Ipsum’</h1>

            <div class="top">
                <p>PAGE 1 OUT OF 68</p>
                <p>10 Results per page</p>
            </div>

            <!-- Post loop start -->
            <div class="post-block">
                <div class="col-1">
                    <img src=""/>
                </div>
                <div class="col-2">
                    <a>Cras Ornare Tristique Nunc sit Amet Egestas</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ornare tristique nunc sit amet egestas. Curabitur eget dictum dui, vel dapibus arcu. Praesent ligula tortor, rutrum ut maximus ac, pellentesque…</p>
                </div>  
            </div> 

        </div>

        <div>Pagination</div>
    </div>

</div>

<?php get_footer(); ?>