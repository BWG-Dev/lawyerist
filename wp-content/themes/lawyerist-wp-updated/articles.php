<?php

/**
 * Post Cards
 *
 * Outputs the post card for use in lists of posts. This is used all over the
 * place.
 *
 * @param int $post_id Optional. Accepts a valid post ID.
 * @param string $card_top_label Optional.
 * @param string $card_bottom_label Optional.
 * @param bool $show_signature Optional. Defaults to false (i.e., don't show the signature block).
 * @param bool $is_featured Optional. Defaults to false.
 */
function lawyerist_get_post_card(
  $post_id            = null,
  $card_top_label     = null,
  $card_bottom_label  = null,
  $show_signature     = null,
  $is_featured        = null
) {

  // Checks for a post ID, tries to get one from the global $post variable if a
  // post ID wasn't specified, then quits if it still can't find one.
  if ( !$post_id ) { global $post; $post_id = get_the_ID(); }
  if ( !$post_id ) { return; }

  // Assigns card classes based on post type and a couple of special cases.
  $post_type      = get_post_type($post_id);
  $post_classes[] = 'card';
  $post_classes[] = $post_type . '-card';
  if ( !empty($card_top_label) || !empty($card_bottom_label) ) { $post_classes = 'has-card-label'; }
  if ( $is_featured ) { $post_classes[] = 'is-featured-post'; }
  // Gets the post thumbnail and assigns a card class if it finds one.
  $thumbnail = lawyerist_get_post_thumbnail($post_id, $is_featured);
  if ( $thumbnail ) { $post_classes[] = 'has-post-thumbnail'; }

  // Gets the post title and permalink for the link container.
  $post_title = get_the_title($post_id);
  $post_url   = get_permalink($post_id);

  $post_title = get_the_title($post_id);
  $post_url = get_permalink($post_id);
  $text  = $post_title;
  $limit = 8;

  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos   = array_keys($words);
      $title_text  = substr($text, 0, $pos[$limit]);
      $no_space = rtrim($title_text) . '...';
  } else {
      $no_space = $post_title;
  }
  $title_trim = $no_space;

  $page_desc = get_field('product_description');
  $desc_text = $page_desc;
  $desc_limit = 16;

  if (str_word_count($desc_text, 0) > $desc_limit) {
    $desc_words = str_word_count($desc_text, 2);
    $desc_pos   = array_keys($desc_words);
    $desc_title_text  = substr($desc_text, 0, $desc_pos[$desc_limit]);
    $desc_no_space = rtrim($desc_title_text) . '...';
  } else {
    $desc_no_space = $desc_text;
  }
  $desc_trim = $desc_no_space;

  if ( $post_type == 'podcasts' ) {
    $readmore = 'Listen to Episode';
  // Assembles the card.
  ?>
    <article <?php post_class($post_classes); ?>>
      <?php if ( !empty($card_top_label) ) { ?>
        <p class="card-label card-top-label"><?php echo $card_top_label; ?></p>
      <?php } ?>
      <?php if ( $thumbnail ) { echo $thumbnail; } ?>
      <div class="post-details">
        <div class="post-details_inner">
        <p>
          <?php echo '<span class="episode-number">Episode #' . get_field('episode_no', $post_id) . '</span>'; ?>
          <span class="date"><?php echo get_the_time('j M Y', $post_id); ?></span>
        </p>
        <?php if ( has_category('sponsored') ) { ?>
          <svg class="sponsor-flag-icon" xmlns="http://www.w3.org/2000/svg" width="31.001" height="24.425" viewBox="0 0 31.001 24.425">
            <path stroke="#ff7062" id="Path_989" data-name="Path 989" d="M547.847,990.689H516.9V975.463h30.943l-3.111,7.2Z" transform="translate(-516.846 -975.463)" fill="#ff7062"/>
            <path stroke="#db5953" id="Path_990" data-name="Path 990" d="M516.938,989.746l10.938,9.2v-9.2Z" transform="translate(-516.849 -974.52)" fill="#db5953"/>
          </svg>
        <?php } ?>
        <h2 class="headline" title="<?php echo $title_trim; ?>"><a href="<?php echo $post_url; ?>" title="<?php echo $title_trim; ?>"><?php echo $title_trim; ?></a></h2>
        <?php if ( !empty($page_desc) ) { ?>
          <p><?php echo $desc_trim; ?></p>
        <?php } ?>
        <p class="categories-tags">
          <span class="categories">
              <a id="category-podcasts" href="/podcast/" title="See all podcast posts" rel="category tag">Podcasts</a>
          </span>
          <?php $tags_list = get_the_terms($post_id, 'podcast-tag');
          if( $tags_list ) : ?>
            <span class="tags">
              <?php foreach( $tags_list as $tag) {
                $name = $tag->name;
                $slug =$tag->slug;
                echo "<a href='/podcasts/tag/{$slug}' rel='tag'>{$name}</a>";
              }?>
              <?php echo get_the_tag_list('', '', '', $post_id); ?>
            </span>
          <?php endif; ?>
        </p>
        </div>
        <p class="episode-read-more">
          <?php if ( get_field('episode_length') ) { echo '<span class="episode-length">' . get_field('episode_length') . '</span>'; } ?>
          <span class="read-post"><a href="<?php the_permalink(); ?>"><?php echo $readmore; ?></a></span>
        </p>
      </div>

      <?php if ( ! empty($card_bottom_label) ) { ?>
        <p class="card-label card-bottom-label"><?php echo $card_bottom_label; ?></p>
      <?php } ?>
    </article>
  <?php } else if ( $post_type !== 'podcasts' ) {
    if ( $post_type == 'page' ) {
      $readmore = 'Visit Page';
    } else {
      $readmore = 'Read Post';
    }
    $author     = get_the_author_meta('display_name');
    $author_id  = get_the_author_meta('ID');
    if ( $author == 'Lawyerist' ) {
      $author = 'the Lawyerist editorial team';
    }
    if ( $post_type == 'page' ) {
      $byline = '';
    } else {
      $byline = 'By <span class="vcard author"><cite class="fn">' . $author . '</cite></span> ';
    }
    // Changes the byline for sponsored posts.
    if ( has_category('sponsored') ) {
      $sponsor_id = get_field('sponsored_post_partner', $post_id);
      $sponsor_link = get_the_permalink($sponsor_id);
      $sponsor_name = get_field('full_name', $sponsor_id);
      if ( !empty($sponsor_link) ) {
        $sponsor = '<a href="' . $sponsor_link . '" title="Visit ' . $sponsor_name . ' Product Page">' . $sponsor_name . '</a>';
      } else {
        $sponsor = $sponsor_name;
      }
      if ( has_tag('product-spotlights') ) {
        // Adds "sponsored by" after the author on product spotlights.
        $byline = 'By <span class="vcard author"><cite class="fn">' . $author . '</cite></span>,&nbsp;<span class="sponsor">sponsored by <span class="sponsor_name">' . $sponsor . '</span></span>, ';
      } else {
        // Otherwise, replaces the author with the sponsor's name.
        $byline = '<span class="sponsor">Sponsored by <span class="sponsor_name">' . $sponsor . '</span></span> ';
      }
    }
  // Assembles the card.
  ?>
    <article <?php post_class($post_classes); ?>>
      <?php if ( !empty($card_top_label) ) { ?>
        <p class="card-label card-top-label"><?php echo $card_top_label; ?></p>
      <?php } ?>
      <?php if ( $thumbnail ) { echo $thumbnail; } ?>
      <div class="post-details">
        <div class="post-details_inner">
        <p>
          <span class="date"><?php echo get_the_time('j M Y', $post_id); ?></span>
        </p>
        <?php if ( has_category('sponsored') ) { ?>
          <svg class="sponsor-flag-icon" xmlns="http://www.w3.org/2000/svg" width="31.001" height="24.425" viewBox="0 0 31.001 24.425">
            <path stroke="#ff7062" id="Path_989" data-name="Path 989" d="M547.847,990.689H516.9V975.463h30.943l-3.111,7.2Z" transform="translate(-516.846 -975.463)" fill="#ff7062"/>
            <path stroke="#db5953" id="Path_990" data-name="Path 990" d="M516.938,989.746l10.938,9.2v-9.2Z" transform="translate(-516.849 -974.52)" fill="#db5953"/>
          </svg>
        <?php } ?>
        <h2 class="headline" title="<?php echo $title_trim; ?>"><a href="<?php echo $post_url; ?>" title="<?php echo $title_trim; ?>"><?php echo $title_trim; ?></a></h2>
        <?php if ( !empty($page_desc) ) { ?>
          <p><?php echo $desc_trim; ?></p>
        <?php }
          if ( $byline ) {
            if ( $show_signature && !has_category('sponsored') ) {
              ?>
                <div class="postmeta-block">
                  <?php echo get_avatar($author_id, 72, '', $author); ?>
                  <div class="postmeta">
                    <?php if ( !has_category('sponsored') ) :
                        $img_shortcode = '[pp-user-cover-image user="' . $author_id . '"]';
                        echo '<div class="author_signature">';
                          echo do_shortcode($img_shortcode);
                        echo '</div>';
                      else : echo '<div class="spacer-30">&nbsp;</div>';
                      endif;
                    ?>
                    <p class="byline"><?php echo $byline; ?></p>
                  </div>
                </div>
              <?php
            } else {
              echo '<p class="byline">' . $byline . '</p>';
            }
          }
        ?>
        <p class="categories-tags">
          <span class="categories">
            <?php $cats = get_the_category($post_id);
            foreach ( $cats as $cat ) {
              $link = $cat->slug;
              $name = $cat->name; ?>
              <a id="category-<?php echo $link; ?>" href="<?php echo '/' . $link . '/'; ?>" title="See all <?php echo $name; ?> posts" rel="category tag"><?php echo $name; ?></a>
            <?php } ?>
          </span>
          <span class="tags">
            <?php echo get_the_tag_list('', '', '', $post_id); ?>
          </span>
        </p>
        </div>
        <p class="episode-read-more">
          <span class="read-post"><a href="<?php the_permalink(); ?>"><?php echo $readmore; ?></a></span>
        </p>
      </div>

      <?php if ( ! empty($card_bottom_label) ) { ?>
        <p class="card-label card-bottom-label"><?php echo $card_bottom_label; ?></p>
      <?php } ?>
    </article>
  <?php
  }
  unset($thumbnail);
  wp_reset_postdata();
}

// Determines whether there is a post thumbnail and gets the post thumbnail ID.
// Or for podcasts, gets a random image from the Options / Podcast Featured
// Images repeater.
function lawyerist_get_post_thumbnail(
  $post_id      = null,
  $is_featured  = null
) {
  //if ( ! has_post_thumbnail($post_id) && ! has_category('podcasts', $post_id) ) { return; }
  $post_type = get_post_type($post_id);
  $thumbnail_id = get_post_thumbnail_id($post_id);
  $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'large');

  if ( $post_type == 'podcasts' ) {
    if ( have_rows('podcast_images', 'option') ) {
      $images = [];
      while ( have_rows('podcast_images', 'option') ) {
        the_row();
        $images[] = get_sub_field('podcast_featured_images', 'option');
      }
      $thumbnail_id = $images[mt_rand(0, count($images) - 1)];
    }

    if ($thumbnail) {
      $backgroundImg = 'url(\'' . $thumbnail[0] . '\');" ';
    } else {
      $backgroundImg = $thumbnail_id;
    }

    $thumbnail_style = ' style="background-size: cover; background-position: center; background-repeat: no-repeat; background-image: ';
    $thumbnail_style .= 'linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), ';
    $thumbnail_style .= $backgroundImg;

    ob_start();
    if ( has_category('sponsored') ) {
      $tag = 'a';
      $tag_attr = ' class="post-card-img sponsored-overlay no-thumbnail podcast-holder" href="' . get_permalink($post_id) . '" title="' . get_the_title($post_id) .'" ';
    } else {
      $tag = 'a';
      $tag_attr = ' class="post-card-img no-thumbnail podcast-holder" href="' . get_permalink($post_id) . '" title="' . get_the_title($post_id) .'" ';
    }
    echo '<div class="post-card-img-holder podcast-img">';
      echo '<' . $tag . $tag_attr . '>&nbsp;</' . $tag . '>';
      if ( has_category('sponsored') ) {
        $sponsor_id = get_field('sponsored_post_partner', $post_id);
        ?>
          <div class="sponsored-image-overlay">
            <a href="<?php echo get_the_permalink($sponsor_id); ?>" title="Visit <?php echo get_the_title($sponsor_id); ?> Product Page" class="sponsored-image-overlay_inner">
              <span class="img-label">Sponsored by</span>
              <div class="img-holder" style="background-image: url('<?php echo get_the_post_thumbnail_url( $sponsor_id ); ?>');"></div>
            </a>
          </div>
        <?php
      } else {
        ?>
        <div class="podcast-featured-image-overlay">
          <?php
            echo file_get_contents(home_url() . '/wp-content/themes/lawyerist-wp-updated/images/podcast-tile-img-graphic.svg');
          ?>
        </div>
        <?php
      }
    echo '</div>';
  } else if ( $post_type !== 'podcasts' ) {
    if ($thumbnail) {
      $backgroundImg = 'url(\'' . $thumbnail[0] . '\');" ';
    } else {
      $backgroundImg = null;
    }
    //if ( get_field('use_alt_image') ) { $backgroundImg = get_field('alt_featured_img'); }
    if ( ! has_post_thumbnail($post_id) ) {
      $backgroundImg = 'linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(\'/wp-content/uploads/2022/06/articles-default-img.jpg\'); background-repeat: no-repeat; background-size: cover; background-position: center;" ';
    }
    $thumbnail_style = ' style="background-image: ';
    $thumbnail_style .= $backgroundImg;

    ob_start();
    if ( has_category('sponsored') && ( $backgroundImg == null ) ) {
      $tag = 'a';
      $tag_attr = ' class="post-card-img sponsored-overlay no-thumbnail" href="' . get_permalink($post_id) . '" title="' . get_the_title($post_id) .'" ';
    } else if ( has_category('sponsored') ) {
      $tag = 'a';
      $tag_attr = ' class="post-card-img sponsored-overlay" href="' . get_permalink($post_id) . '" title="' . get_the_title($post_id) . '"';
    } else if ( !has_category('sponsored') && ( $backgroundImg == null ) ) {
      $tag = 'a';
      $tag_attr = ' class="post-card-img no-thumbnail" href="' . get_permalink($post_id) . '" title="' . get_the_title($post_id) .'" ';
    } else {
      $tag = 'a';
      $tag_attr = ' class="post-card-img" href="' . get_permalink($post_id) . '" title="' . get_the_title($post_id) . '"' . $thumbnail_style;
    }
    echo '<div class="post-card-img-holder"' . $thumbnail_style . '>';
      echo '<' . $tag . $tag_attr . '>&nbsp;</' . $tag . '>';
      if  ( has_category('sponsored') ) {
        $sponsor_id = get_field('sponsored_post_partner', $post_id);
        ?>
          <div class="sponsored-image-overlay">
            <a href="<?php echo get_the_permalink($sponsor_id); ?>" title="Visit <?php echo get_the_title($sponsor_id); ?> Product Page" class="sponsored-image-overlay_inner">
              <span class="img-label">Sponsored by</span>
              <div class="img-holder" style="background-image: url('<?php echo get_the_post_thumbnail_url( $sponsor_id ); ?>');"></div>
            </a>
          </div>
        <?php
      }
    echo '</div>';
  }

  return ob_get_clean();
}


function enqueue_filter_sort_articles_script() {
  global $wp_query;

  wp_register_script('filter-sort-articles', get_template_directory_uri() . '/assets/js/filter-sort-articles.js', ['jquery'], '', true);
  wp_localize_script(
    'filter-sort-articles',
    'vars', [
      'ajaxurl' => admin_url('admin-ajax.php'),
      'query_vars' => json_encode($wp_query->query),
    ]
  );
  //prevent query overwrite
  if( !is_tax( 'podcast-tag' ) ) {
    wp_enqueue_script('filter-sort-articles');
  }

}

add_action('wp_enqueue_scripts', 'enqueue_filter_sort_articles_script');


function filter_sort_articles() {
  if ( !wp_verify_nonce($_POST['nonce'], 'articles_nonce') ) { exit('Invalid nonce.'); }

  $query_vars = json_decode(stripslashes($_POST['query_vars']), true);

  // include podcasts when sorting but not filtering
  if( !$_POST['cat'] ) { $query_vars['post_type']  = ['post', 'podcasts']; }
  $query_vars['cat']          = $_POST['cat'] ? $_POST['cat'] : $query_vars['cat'];
  $query_vars['order']        = $_POST['order'] ? $_POST['order'] : $query_vars['order'];
  $query_vars['orderby']      = $_POST['orderby'] ? $_POST['orderby'] : $query_vars['orderby'];
  $query_vars['paged']        = $_POST['target_page'] ? $_POST['target_page'] : $_POST['current_page'];
  $query_vars['post_status']  = 'publish';

  $articles = new WP_Query( $query_vars );
  $GLOBALS['wp_query'] = $articles;

  if ( $articles->have_posts() ) :
    ?>
      <div class="article-cards">
        <?php
          while ( $articles->have_posts() ) : $articles->the_post();
            lawyerist_get_post_card();
          endwhile;
        ?>
      </div>
      <div class="page-links">
        <?php
          echo paginate_links([
            'prev_text' => 'PREV',
            'mid_size'  => 3,
            'next_text' => 'NEXT',
          ]);
        ?>
      </div>
    <?php
  endif;

  die();
}

add_action('wp_ajax_sort_filter_articles', 'filter_sort_articles'); // Logged-in users.
add_action('wp_ajax_nopriv_sort_filter_articles', 'filter_sort_articles'); // Not-logged-in users.


function enqueue_sort_podcasts_script() {

  wp_register_script('sort-podcasts', get_template_directory_uri() . '/assets/js/sort-podcasts.js', ['jquery'], '', true);
  wp_localize_script(
    'sort-podcasts',
    'vars', [
      'ajaxurl' => admin_url('admin-ajax.php'),
    ]
  );

  wp_enqueue_script('sort-podcasts');
}

add_action('wp_enqueue_scripts', 'enqueue_sort_podcasts_script');

function sort_podcasts() {
  if ( !wp_verify_nonce($_POST['nonce'], 'podcasts_nonce') ) { exit('Invalid nonce.'); }

  $podcast_args = [
    'post_type' => 'podcasts',
    'order'         => $_POST['order'] ? $_POST['order'] : 'desc',
    'orderby'       => $_POST['orderby'] ? $_POST['orderby'] : 'date',
    'paged'         => $_POST['target_page'] ? $_POST['target_page'] : $_POST['current_page'],
    'post_status'   => 'publish',
  ];

  if( $_POST['tag'] !== '[]' && $_POST['tag'] !== NULL && count($_POST['tag']) !== 0 ) {
    $podcast_args['tax_query'] = [
      [
        'taxonomy' => 'podcast-tag',
        'field' => 'term_id',
        'terms' => $_POST['tag']
      ]
    ];
  }

  $podcast_episodes_query = new WP_Query($podcast_args);

  // $GLOBALS['wp_query'] = $podcast_episodes_query;

  if ( $podcast_episodes_query->have_posts() ) :
    ?>
      <div class="article-cards">
        <?php
          while ( $podcast_episodes_query->have_posts() ) : $podcast_episodes_query->the_post();
            lawyerist_get_post_card();
          endwhile;
        ?>
      </div>
      <div class="page-links">
        <?php
          echo paginate_links([
            'current'   => max(1, intval($podcast_episodes_query->query['paged'])),
            'total'     => $podcast_episodes_query->max_num_pages,
            'prev_text' => 'PREV',
            'mid_size'  => 3,
            'next_text' => 'NEXT',
          ]);
        ?>
      </div>
    <?php
  endif;

  die();
}

add_action('wp_ajax_sort_podcasts', 'sort_podcasts'); // Logged-in users.
add_action('wp_ajax_nopriv_sort_podcasts', 'sort_podcasts'); // Not-logged-in users.

/**
 * Post header (headline, etc.)
 */
function lawyerist_get_post_header($post_id = null) {
  if ( ! $post_id ) { return; }

  $post_id = get_the_ID();
  $post_type = get_post_type($post_id);

  $thumbnail = lawyerist_get_post_thumbnail($post_id);
  $thumbnail_id = get_post_thumbnail_id($post_id);
  $thumbnail_alt = wp_get_attachment_image_src($thumbnail_id, 'large');
  if ( $thumbnail_alt != false ) {
    $backgroundImg = $thumbnail_alt[0];
  } else {
    $backgroundImg = null;
  }

  if ( $post_type == "podcasts" ) {
    $imgNum = rand(1,14);
    $pod_backgroundImg = '/wp-content/uploads/2022/04/podcast-preview-img-' . $imgNum . '.jpeg';
    ?>
    <div class="card post-card post-header-card podcasts-card <?php if ( $backgroundImg == null ): echo 'no-thumbnail'; endif; ?>">
      <?php if ( has_category('sponsored') ) { ?>
        <svg class="sponsor-flag-icon" xmlns="http://www.w3.org/2000/svg" width="31.001" height="24.425" viewBox="0 0 31.001 24.425">
          <path stroke="#ff7062" id="Path_989" data-name="Path 989" d="M547.847,990.689H516.9V975.463h30.943l-3.111,7.2Z" transform="translate(-516.846 -975.463)" fill="#ff7062"/>
          <path stroke="#db5953" id="Path_990" data-name="Path 990" d="M516.938,989.746l10.938,9.2v-9.2Z" transform="translate(-516.849 -974.52)" fill="#db5953"/>
        </svg>
      <?php } ?>
      <div class="inner-wrapper">
        <?php  if ( $backgroundImg == null ) { ?>
            <div class="post-card-img pod-img" style="background-size: cover; background-position: center; background-repeat: no-repeat; background-image: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php echo $pod_backgroundImg; ?>');">
              <div class="podcast-featured-image-overlay">
                <svg xmlns="http://www.w3.org/2000/svg" width="104" height="51.95" viewBox="0 0 104 51.95">
                  <g id="Group_3764" data-name="Group 3764" transform="translate(-1503.75 -1200.05)">
                    <g id="Group_3761" data-name="Group 3761" transform="translate(1582.46 1202.728)">
                      <rect id="Rectangle_1938" data-name="Rectangle 1938" width="2.717" height="15.268" transform="translate(10.039 15.995)" fill="#556169"></rect>
                      <rect id="Rectangle_1939" data-name="Rectangle 1939" width="0.672" height="14.037" transform="translate(7.989 15.995)" fill="#556169"></rect>
                      <g id="Group_3751" data-name="Group 3751" transform="translate(8.325 7.679)">
                        <ellipse id="Ellipse_682" data-name="Ellipse 682" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(0)" fill="#ff7062"></ellipse>
                        <ellipse id="Ellipse_683" data-name="Ellipse 683" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(3.429)" fill="#ff7062"></ellipse>
                        <ellipse id="Ellipse_684" data-name="Ellipse 684" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(6.858)" fill="#ff7062"></ellipse>
                      </g>
                      <g id="Group_3752" data-name="Group 3752" transform="translate(10.039 4.136)">
                        <ellipse id="Ellipse_685" data-name="Ellipse 685" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(0 0)" fill="#ff7062"></ellipse>
                        <ellipse id="Ellipse_686" data-name="Ellipse 686" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(3.429 0)" fill="#ff7062"></ellipse>
                      </g>
                      <g id="Group_3753" data-name="Group 3753" transform="translate(10.039 11.468)">
                        <ellipse id="Ellipse_687" data-name="Ellipse 687" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(0)" fill="#ff7062"></ellipse>
                        <ellipse id="Ellipse_688" data-name="Ellipse 688" cx="0.891" cy="0.891" rx="0.891" ry="0.891" transform="translate(3.429)" fill="#ff7062"></ellipse>
                      </g>
                      <g id="Group_3754" data-name="Group 3754" transform="translate(0 0)">
                        <path id="Path_3816" data-name="Path 3816" d="M132.886,87.7a7.526,7.526,0,0,0,7.518-7.518V63.23a7.518,7.518,0,0,0-15.036,0V80.185A7.526,7.526,0,0,0,132.886,87.7Zm0-30.571a6.106,6.106,0,0,1,6.1,6.1V71h-12.2V63.23A6.106,6.106,0,0,1,132.886,57.131Zm-6.1,15.285h12.2v7.768a6.1,6.1,0,0,1-12.2,0Z" transform="translate(-120.241 -55.712)" fill="#88a2aa"></path>
                        <path id="Path_3817" data-name="Path 3817" d="M139.48,109.611h-1.419a11.226,11.226,0,0,1-22.452,0H114.19a12.649,12.649,0,0,0,11.936,12.609v9.443h1.419V122.22A12.649,12.649,0,0,0,139.48,109.611Z" transform="translate(-114.19 -84.888)" fill="#88a2aa"></path>
                      </g>
                    </g>
                    <g id="Group_3760" data-name="Group 3760" transform="translate(1504.5 1205.372)">
                      <ellipse id="Ellipse_689" data-name="Ellipse 689" cx="20.744" cy="20.744" rx="20.744" ry="20.744" transform="translate(0 0)" fill="none" stroke="#88a2aa" stroke-miterlimit="10" stroke-width="1.5"></ellipse>
                      <g id="Group_3756" data-name="Group 3756" transform="translate(12.978 10.771)">
                        <path id="Path_3818" data-name="Path 3818" d="M39.982,38.3a1.916,1.916,0,0,0-1.857,0,1.021,1.021,0,0,0-.272.8V44.37H29.929V34.885S27.778,36.966,27.735,37l-.206.147V44.37H24.936a1.031,1.031,0,0,0-.777.248,1.638,1.638,0,0,0,0,1.681,1.026,1.026,0,0,0,.777.248H39.245a1.026,1.026,0,0,0,.777-.248,1.215,1.215,0,0,0,.232-.84V39.1A1.023,1.023,0,0,0,39.982,38.3Z" transform="translate(-23.927 -27.242)" fill="#fff"></path>
                        <path id="Path_3819" data-name="Path 3819" d="M33.9,21.694c-.357-.223-1.868.068-2.306.08a2.351,2.351,0,0,1-.629-.068q-.8.051-3.254.063a17.958,17.958,0,0,0-3.455.434l2.465,1.837h0l.374.278a1.14,1.14,0,0,1,.464.929c-.006.412.049.939.083,1.325l-.026.85c-.012.06-.021.12-.037.18.011.348,0,.834-.018,1.652a4.21,4.21,0,0,0,.627-.755L31.008,25.1l.7-.82c.12-.124.266-.265.439-.424l.825-.853a4.881,4.881,0,0,0,.936-1.3h-.009Z" transform="translate(-24.068 -21.61)" fill="#ff7062"></path>
                      </g>
                    </g>
                    <rect id="Rectangle_1942" data-name="Rectangle 1942" width="1.299" height="51.95" transform="translate(1563.593 1200.05)" fill="#fff" opacity="0.229"></rect>
                  </g>
                </svg>
              </div>
            </div>
          <?php } else if ( $thumbnail ) {
            echo $thumbnail;
          } ?>
        <div class="post-details">
          <p>
            <?php if ( get_field('episode_no') ) { echo '<span class="episode-number">Episode #' . get_field('episode_no') . '</span>'; } ?>
            <span class="date"><?php echo get_the_time( 'j M Y', $post_id ); ?></span>
          </p>
          <?php the_title('<h1 class="headline">', '</h1>'); ?>
          <?php // Assembles the author meta block (author avatar, signature, and byline).
            if ( has_category('sponsored') ) {
              $sponsor_id = get_field('sponsored_post_partner', $post_id);
              $sponsor_link = get_the_permalink($sponsor_id);
              $sponsor_name = get_field('full_name', $sponsor_id);
              if ( !empty($sponsor_link) ) {
                $sponsor = '<a href="' . $sponsor_link . '" title="Visit ' . $sponsor_name . ' Product Page">' . $sponsor_name . '</a>';
              } else {
                $sponsor = $sponsor_name;
              }
              if ( has_tag('product-spotlights') ) {
                // Adds "sponsored by" after the author on product spotlights.
                $byline = 'By <span class="vcard author"><cite class="fn">' . $author . '</cite></span>,&nbsp;<span class="sponsor">sponsored by <span class="sponsor_name">' . $sponsor . '</span></span>, ';
              } else {
                // Otherwise, replaces the author with the sponsor's name.
                $byline = '<span class="sponsor">Sponsored by <span class="sponsor_name">' . $sponsor . '</span></span> ';
              }
            }
          ?>
          <p class="categories-tags">
            <span class="categories">
                <a id="category-podcasts" href="/podcast/" title="See all podcast posts" rel="category tag">Podcasts</a>
            </span>
            <?php $tags_list = get_the_terms($post_id, 'podcast-tag');
            if( $tags_list ) : ?>
              <span class="tags">
                <?php foreach( $tags_list as $tag) {
                  $name = $tag->name;
                  $slug =$tag->slug;
                  echo "<a href='/podcasts/tag/{$slug}' rel='tag'>{$name}</a>";
                }?>
                <?php echo get_the_tag_list('', '', '', $post_id); ?>
              </span>
            <?php endif; ?>
          </p>
          <?php if ( get_field('episode_length') ) { echo '<p class="episode-length">' . get_field('episode_length') . '</p>'; } ?>
        </div><!--.post-details-->
      </div><!--.inner-wrapper-->
      <?php if ( get_field('add_sponsors') ==  true ) { ?>
        <div class="section-heading podcast-sponsors-heading">
          <?php if ( have_rows('sponsor_list') ): ?>
            <div class="wrapper">
              <h2>This Podcast Is Brought to You By</h2>
            </div>
            <div class="inner">
              <?php while ( have_rows('sponsor_list') ): the_row();
                $name = get_sub_field('sponsor_name');
                $url = get_sub_field('sponsor_url');
                $image = get_sub_field('sponsor_image'); ?>
                <a href="<?php echo $url; ?>" target="_blank" title="View <?php echo $name; ?>">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php } ?>
      <div class="podcast-episode-embed">
        <?php if ( get_field('pod_embed') ) {
          $pod = the_field('pod_embed', false, false, false);
            if($pod) {
              echo wp_kses_post($pod);
            }
        } else {
          ?>
          <iframe src="<?php the_field('pod_embed_url'); ?>" style="border:none;width:100%;" scrolling="no" loading="lazy"></iframe><script src="https://legaltalknetwork.com/embed-iframe-resize.js"></script>
          <?php
        }
         ?>
      </div>
  <?php } else if ( $post_type !== 'podcasts' ) {
    $news_backgroundImg = '/wp-content/uploads/2022/06/articles-default-img.jpg';
  ?>
    <div class="card post-card post-header-card <?php if ( $backgroundImg == null ): echo 'no-thumbnail'; endif; ?>">
      <?php if ( has_category('sponsored') ) { ?>
        <svg class="sponsor-flag-icon" xmlns="http://www.w3.org/2000/svg" width="31.001" height="24.425" viewBox="0 0 31.001 24.425">
          <path stroke="#ff7062" id="Path_989" data-name="Path 989" d="M547.847,990.689H516.9V975.463h30.943l-3.111,7.2Z" transform="translate(-516.846 -975.463)" fill="#ff7062"/>
          <path stroke="#db5953" id="Path_990" data-name="Path 990" d="M516.938,989.746l10.938,9.2v-9.2Z" transform="translate(-516.849 -974.52)" fill="#db5953"/>
        </svg>
      <?php } ?>
      <div class="inner-wrapper">
        <?php  if ( $backgroundImg == null ) { ?>
            <div class="post-card-img" style="background-image: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php echo $news_backgroundImg; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">&nbsp;</div>
          <?php } else if ( $thumbnail ) {
            echo $thumbnail;
          } ?>
        <div class="post-details">
          <p>
            <span class="date"><?php echo get_the_time( 'j M Y', $post_id ); ?></span>
          </p>
          <?php the_title('<h1 class="headline">', '</h1>'); ?>
          <?php // Assembles the author meta block (author avatar, signature, and byline).
              $author     = get_the_author_meta('display_name');
              $author_id  = get_the_author_meta('ID');
              if ( $author == 'Lawyerist' ) {
                $author = 'the Lawyerist editorial team';
              }
              if ( has_category('sponsored') ) {
                $sponsor_id = get_field('sponsored_post_partner', $post_id);
                $sponsor_link = get_the_permalink($sponsor_id);
                $sponsor_name = get_field('full_name', $sponsor_id);
                if ( !empty($sponsor_link) ) {
                  $sponsor = '<a href="' . $sponsor_link . '" title="Visit ' . $sponsor_name . ' Product Page">' . $sponsor_name . '</a>';
                } else {
                  $sponsor = $sponsor_name;
                }
                if ( has_tag('product-spotlights') ) {
                  // Adds "sponsored by" after the author on product spotlights.
                  $byline = 'By <span class="vcard author"><cite class="fn">' . $author . '</cite></span>,&nbsp;<span class="sponsor">sponsored by <span class="sponsor_name">' . $sponsor . '</span></span>, ';
                } else {
                  // Otherwise, replaces the author with the sponsor's name.
                  $byline = '<span class="sponsor">Sponsored by <span class="sponsor_name">' . $sponsor . '</span></span> ';
                }
              } else {
                $byline = 'By <span class="vcard author"><cite class="fn">' . $author . '</cite></span> ';
              }
              ?>
                <div class="postmeta-block">
                  <?php echo get_avatar($author_id, 72, '', $author); ?>
                  <div class="postmeta">
                    <?php if ( !has_category('sponsored') ) :
                        $img_shortcode = '[pp-user-cover-image user="' . $author_id . '"]'; // This is the author's signature when they have it in their profile.
                        echo '<div class="author_signature">';
                          echo do_shortcode($img_shortcode);
                        echo '</div>';
                      else : echo '<div class="spacer-30">&nbsp;</div>';
                      endif;
                    ?>
                    <p class="byline"><?php echo $byline; ?></p>
                  </div><!--.postmeta-->
                </div><!--.postmeta-block-->
          <p class="categories-tags">
            <span class="categories">
              <?php //echo get_the_category_list(' ', '', $post_id); ?>
              <?php $cats = get_the_category($post_id);
              foreach ( $cats as $cat ) {
                $link = $cat->slug;
                $name = $cat->name; ?>
                <a id="category-<?php echo $link; ?>" href="<?php echo '/' . $link . '/'; ?>" title="See all <?php echo $name; ?> posts" rel="category tag"><?php echo $name; ?></a>
              <?php } ?>
            </span>
            <span class="tags">
              <?php echo get_the_tag_list('', '', '', $post_id); ?>
            </span>
          </p>
        </div><!--.post-details-->
      </div><!--.inner-wrapper-->
  <?php } ?>
    </div><!--.card .post-card .post-header-card-->
<?php }

// Register Podcast Guests Custom Post Type
function podcasts_cpt() {

	$labels = array(
		'name'                  => _x( 'Podcasts', 'Post Type General Name', 'lawyerist-wp-updated' ),
		'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'lawyerist-wp-updated' ),
		'menu_name'             => __( 'Podcasts', 'lawyerist-wp-updated' ),
		'name_admin_bar'        => __( 'Podcast', 'lawyerist-wp-updated' ),
		'archives'              => __( 'Podcast Archives', 'lawyerist-wp-updated' ),
		'attributes'            => __( 'Podcast Attributes', 'lawyerist-wp-updated' ),
		'parent_item_colon'     => __( 'Parent Podcast:', 'lawyerist-wp-updated' ),
		'all_items'             => __( 'All Podcasts', 'lawyerist-wp-updated' ),
		'add_new_item'          => __( 'Add New Podcasts', 'lawyerist-wp-updated' ),
		'add_new'               => __( 'Add New', 'lawyerist-wp-updated' ),
		'new_item'              => __( 'New Podcast', 'lawyerist-wp-updated' ),
		'edit_item'             => __( 'Edit Podcast', 'lawyerist-wp-updated' ),
		'update_item'           => __( 'Update Podcast', 'lawyerist-wp-updated' ),
		'view_item'             => __( 'View Podcast', 'lawyerist-wp-updated' ),
		'view_items'            => __( 'View Podcasts', 'lawyerist-wp-updated' ),
		'search_items'          => __( 'Search Podcasts', 'lawyerist-wp-updated' ),
		'not_found'             => __( 'Not found', 'lawyerist-wp-updated' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lawyerist-wp-updated' ),
		'featured_image'        => __( 'Featured Image', 'lawyerist-wp-updated' ),
		'set_featured_image'    => __( 'Set featured image', 'lawyerist-wp-updated' ),
		'remove_featured_image' => __( 'Remove featured image', 'lawyerist-wp-updated' ),
		'use_featured_image'    => __( 'Use as featured image', 'lawyerist-wp-updated' ),
		'insert_into_item'      => __( 'Insert into podcast', 'lawyerist-wp-updated' ),
		'uploaded_to_this_item' => __( 'Uploaded to this podcast', 'lawyerist-wp-updated' ),
		'items_list'            => __( 'Podcast list', 'lawyerist-wp-updated' ),
		'items_list_navigation' => __( 'Podcast list navigation', 'lawyerist-wp-updated' ),
		'filter_items_list'     => __( 'Filter podcast list', 'lawyerist-wp-updated' ),
	);
  $rewrite = array(
		'slug'                  => 'podcast',
		'with_front'            => false,
	);
	$args = array(
		'label'                 => __( 'Podcasts', 'lawyerist-wp-updated' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-microphone',
		'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'taxonomies'            => array('category'),
    'capability_type'       => 'post',
    'query_var'             => 'podcasts_posts',
    'rewrite'               => $rewrite,
	);
	register_post_type( 'podcasts', $args );
}

add_action( 'init', 'podcasts_cpt', 0 );

add_filter( 'manage_podcasts_posts_columns', 'set_custom_edit_podcasts_columns' );
function set_custom_edit_podcasts_columns($columns) {
	$columns['ep_number'] = __( 'Episode No');
	$columns['embed'] = __( 'Embed' );

    return $columns;
}

// Add the data to the custom columns for the podcast post type:
add_action( 'manage_podcasts_posts_custom_column' , 'custom_podcasts_column', 10, 2 );
function custom_podcasts_column( $column, $post_id ) {
    switch ( $column ) {

        case 'embed' :
            $embed = get_field("pod_embed", $post_id);
			echo $embed;
			break;
		case 'ep_number' :
			$episode = get_field("episode_no", $post_id);
			echo $episode;
			break;
    }
}

// Register Podcast Guests Custom Post Type
function podcast_guest_cpt() {

	$labels = array(
		'name'                  => _x( 'Podcast Guests', 'Post Type General Name', 'lawyerist-wp-updated' ),
		'singular_name'         => _x( 'Podcast Guest', 'Post Type Singular Name', 'lawyerist-wp-updated' ),
		'menu_name'             => __( 'Podcast Guests', 'lawyerist-wp-updated' ),
		'name_admin_bar'        => __( 'Podcast Guest', 'lawyerist-wp-updated' ),
		'archives'              => __( 'Podcast Guest Archives', 'lawyerist-wp-updated' ),
		'attributes'            => __( 'Podcast Guest Attributes', 'lawyerist-wp-updated' ),
		'parent_item_colon'     => __( 'Parent Guest:', 'lawyerist-wp-updated' ),
		'all_items'             => __( 'All Podcast Guests', 'lawyerist-wp-updated' ),
		'add_new_item'          => __( 'Add New Podcast Guest', 'lawyerist-wp-updated' ),
		'add_new'               => __( 'Add New', 'lawyerist-wp-updated' ),
		'new_item'              => __( 'New Podcast Guest', 'lawyerist-wp-updated' ),
		'edit_item'             => __( 'Edit Podcast Guest', 'lawyerist-wp-updated' ),
		'update_item'           => __( 'Update Podcast Guest', 'lawyerist-wp-updated' ),
		'view_item'             => __( 'View Podcast Guest', 'lawyerist-wp-updated' ),
		'view_items'            => __( 'View Podcast Guests', 'lawyerist-wp-updated' ),
		'search_items'          => __( 'Search Podcast Guests', 'lawyerist-wp-updated' ),
		'not_found'             => __( 'Not found', 'lawyerist-wp-updated' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lawyerist-wp-updated' ),
		'featured_image'        => __( 'Featured Image', 'lawyerist-wp-updated' ),
		'set_featured_image'    => __( 'Set featured image', 'lawyerist-wp-updated' ),
		'remove_featured_image' => __( 'Remove featured image', 'lawyerist-wp-updated' ),
		'use_featured_image'    => __( 'Use as featured image', 'lawyerist-wp-updated' ),
		'insert_into_item'      => __( 'Insert into podcast guest', 'lawyerist-wp-updated' ),
		'uploaded_to_this_item' => __( 'Uploaded to this guest', 'lawyerist-wp-updated' ),
		'items_list'            => __( 'Podcast guests list', 'lawyerist-wp-updated' ),
		'items_list_navigation' => __( 'Podcast guests list navigation', 'lawyerist-wp-updated' ),
		'filter_items_list'     => __( 'Filter podcast guests list', 'lawyerist-wp-updated' ),
	);
	$rewrite = array(
		'slug'                  => 'podcast-guest',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Podcast Guest', 'lawyerist-wp-updated' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => 'podcast_guest',
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'podcast_guest', $args );

}

add_action( 'init', 'podcast_guest_cpt', 0 );