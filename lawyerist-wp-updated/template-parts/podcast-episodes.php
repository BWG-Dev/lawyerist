<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>

<div id="review_post_slider" class="related-resources-slider">

  <div class="title post-slider-title">
    <h4>Up Next from The Lawyerist Podcast</h4>
  </div>

  <?php
    global $post;

    $current_id[] = $post->ID;

      $podcast_episodes = get_posts([
        'fields'          => 'ids',
        'posts_per_page'  => 10,
        'post_type'       => 'podcasts',
        'post_name__in'   => $current_tags_slugs,
      ]);

    $podcast_episodes = new WP_Query([
      'post_type'       => 'podcasts',
      'posts_per_page'  => 10,
    ]);

    echo '<div class="post-slider-width">';
      echo '<div class="centered no-fouc">';
        if ( $podcast_episodes->have_posts() ) : while ( $podcast_episodes->have_posts() ) : $podcast_episodes->the_post();
          lawyerist_get_post_card();
        endwhile; endif;
      echo '</div>';
    echo '</div>';
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
