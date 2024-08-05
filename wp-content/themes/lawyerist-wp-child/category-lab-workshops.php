<?php get_header(); ?>

<div id="column_container">

  <div id="content_column">

    <?php

  // Breadcrumbs
  /*if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
  } */?>

    <h1 class="new-h1 headline entry-title">Lab Workshops</h1>
    <h3>On This Page</h3>
    <ul class="table-of-contents">
      <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();

          // Gets the post title and permalink for the link container.
          $post_title = get_the_title($post_id);
          $post_url = get_permalink($post_id);
          $id = $post->ID;
          ?>

          <li class="toc-list">
            <a href="#<?php echo $id; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a>
          </li>
      <?php endwhile; endif; ?>
    </ul>

   <?php // Start the Loop.
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      lawyerist_get_post_card($post_id = null, $card_top_label = null, $card_bottom_label = null, $title_only = false);

    endwhile;

    echo '<div class="page_links">';
      echo paginate_links();
    echo '</div>';

    else :

      echo '<p class="post">No posts match your query.</p>';

    endif; // Close the Loop.

    ?>

	</div>
  <!-- end #content_column -->

</div>
<!-- end #column_container -->

<?php get_footer(); ?>
