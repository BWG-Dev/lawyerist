<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>

<div id="review_post_slider" class="related-resources-slider">

  <div class="title post-slider-title">
    <h4>Learn the Latest from Our Partners and Community</h4>
  </div>

  <?php if ( is_page_template('product-single-review.php')) {
      lawyerist_get_related_posts_reviews();
    } else if ( is_page_template('/template-parts/frontpage-template.php') ) {
      global $post;

      $current_id[] = $post->ID;
      $related_posts = get_posts([
        'fields'          => 'ids',
        'post__not_in'    => $current_id,
        'posts_per_page'  => -1,
        'post_type'       => 'post',
      ]);

      $related_resources = new WP_Query([
        'post__in'  => $related_posts,
        'post_type' => 'post',
      ]); 

      echo '<div class="post-slider-width">';
        echo '<div class="centered no-fouc">';
          if ( $related_resources->have_posts() ) : while ( $related_resources->have_posts() ) : $related_resources->the_post();
            lawyerist_get_post_card();
          endwhile; endif;
        echo '</div>';
      echo '</div>';
    } else {
      global $post;

      $current_id[] = $post->ID;
      $current_tags = get_the_tags($post->ID);
      $current_tags_slugs = [];

      if ( ($current_tags == false) ) { 
        $related_posts = get_posts([
          'fields'          => 'ids',
          'post__not_in'    => $current_id,
          'posts_per_page'  => -1,
          'post_type'       => 'post',
        ]);

        $related_resources = new WP_Query([
          'post__in'  => $related_posts,
          'post_type' => 'post',
        ]); 
      } else {
        foreach ( $current_tags as $current_tag ) {
          $current_tags_slugs[] = $current_tag->slug;
        }

        $related_pages = get_posts([
          'fields'          => 'ids',
          'post__not_in'    => $current_id,
          'posts_per_page'  => -1,
          'post_type'       => 'page',
          'post_name__in'   => $current_tags_slugs,
        ]);

        $related_posts = get_posts([
          'fields'          => 'ids',
          'post__not_in'    => $current_id,
          'posts_per_page'  => -1,
          'post_type'       => 'post',
          'tag_slug__in'    => $current_tags_slugs,
        ]);

        $related_resources = new WP_Query([
          'post__in'  => array_merge($related_pages, $related_posts),
          'post_type' => ['post','page'],
        ]);
      }

      echo '<div class="post-slider-width">';
        echo '<div class="centered no-fouc">';
          if ( $related_resources->have_posts() ) : while ( $related_resources->have_posts() ) : $related_resources->the_post();
            lawyerist_get_post_card();
          endwhile; endif;
        echo '</div>';
      echo '</div>';
    }
  ?>

</div><!--#review_post_slider -->

<script src='https://kenwheeler.github.io/slick/slick/slick.js'></script>
<script>
  jQuery.noConflict();
  jQuery(document).ready(function(){

  jQuery(".centered").slick({
    centerMode: false,
    centerPadding: "0px",
    slidesToShow: 3,
    infinite: true,
    arrows: true,
    autoplay: false,
    responsive: [
      {
        breakpoint: 1395,
        settings: {
          arrows: true,
          centerMode: false,
          centerPadding: "0px",
          slidesToShow: 2
        }
      },
      {
      breakpoint: 996,
      settings: {
          arrows: true,
          centerMode: false,
          centerPadding: "0px",
          slidesToShow: 1
        }
      }
    ]
  });

  // Make LEFT and RIGHT slides - i.e. not centered
  // clickable - i.e. Go to PREVIOUS and NEXT
  // slides respectively.
  jQuery(".centered").on("click", ".slick-slide", function(e) {
  e.stopPropagation();
  var index = jQuery(this).data("slick-index");
    if (jQuery(".centered").slick("slickCurrentSlide") !== index) {
      jQuery(".centered").slick("slickGoTo", index);
    }
  });

  // Remove class FOUC
  // --> Flash Of Unstyled Content <-- from Carousel when // web page is loaded.
  jQuery(function() {
    jQuery('.no-fouc').removeClass('no-fouc');
  });
});
</script>
