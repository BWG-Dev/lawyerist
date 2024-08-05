<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
  $post_id = get_the_ID();
  $thumbnail = lawyerist_get_post_thumbnail($post_id);
  
  $thumbnail_alt = wp_get_attachment_image_src($thumbnail_id, 'large');
  $backgroundImg = $thumbnail_alt[0];
?>
  <main class="content-container">
    <div <?php post_class(); ?>>
      <div class="card post-card post-header-card <?php if ( $backgroundImg == null ): echo 'no-thumbnail'; endif; ?>">
      <div class="inner-wrapper">
        <?php echo $thumbnail; ?>
        <div class="post-details">
          <?php the_title('<h1 class="headline">', '</h1>'); ?>
        </div><!--.post-details-->
      </div><!--.inner-wrapper-->
    </div><!--.card .post-card .post-header-card-->
      
      <div id="review_container" class="default-template">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </main>
<?php endwhile; 
endif; // Close the Loop.
