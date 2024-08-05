<?php

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <main class="content-container">
    <div <?php post_class(); ?>>
      <?php 
        $post_id = get_the_ID();
        $thumbnail = lawyerist_get_post_thumbnail($post_id); 
      ?>
      <div class="card post-card post-header-card no-meta">
        <div class="inner-wrapper">
          <?php if ( $thumbnail ) { echo $thumbnail; } ?>
          <div class="post-details">
            <?php the_title('<h1 class="headline">', '</h1>'); ?>
          </div><!--.post-details-->
        </div><!--.inner-wrapper-->
      </div><!--.card .post-card .post-header-card-->
      
      <div class="entry-content">
        <?php if (!is_user_logged_in()) { ?>
            <p>In order to take the Small Firm Scorecard, you'll need to take a few seconds to register an account and become an Insider so we can save your results.</p>
            <p><a class="button really-big-button register-link" href="">Join Now</a></p>	
            <p>Once you've done that, you'll be able to take the Scorecard on this page!</p>
        <?php }

        the_content();

        if ( is_user_logged_in() ) { ?>
            <p><strong>Before you begin, here are the instructions on how to take the Small Firm Scorecard assessment:</strong></p>
            <p>Each question is scored on a scale of 0-10 and fits into a 100-point scale. For each of the following questions, please rate your firm on a scale from 0 to 10 (0 being “I don’t agree at all” and 10 being “I definitely agree”).</p>
            <p>If a word or phrase is subjective, like <em>reasonable</em>, define it based on your subjective value. In case you’re not sure if you understand the word in how we’ve framed it in a sentence, please use your own understanding. This ensures the assessment results are authentic to you. If you aren’t quite sure what a term means, give yourself a 0 (and make a note to learn it after taking the scorecard!).</p>
            <p>If you can answer yes to a question but see room for improvement, give yourself at least a 7.</p>
            <?php
			if (is_page(220023)){
            	echo do_shortcode('[gravityform id=60 title=false description=true ajax=true]');
			} elseif (is_page(220030)){
				echo do_shortcode('[gravityform id=61 title=false description=true ajax=true]');
			}
        } ?>
      </div>
    </div>
  </main>
<?php endwhile; 
endif; // Close the Loop.
