<?php

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post();

  // Assign post variables.
  $page_title = the_title( '', '', FALSE );

  ?>

    <main id="product-recommender">

      <?php the_content(); ?>
    
    </main>

<?php 

endwhile; endif; // Close the Loop.
