<?php get_header(); ?>

<div id="articles-page-container" class="page-container podcast-episodes-container">
  <div class="content-container">
        <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>


    <main id="articles" class="podcasts" data-nonce="<?php echo wp_create_nonce('podcasts_nonce'); ?>">

      <div class="podcast-header">
        <div class="featured-image col">
          <?php echo wp_get_attachment_image(1404585, 'full'); ?>
        </div>
        <div class="page-title col">
          <div class="page-title-container">
            <div class="page-icon"><img src='/wp-content/uploads/2022/04/podcast-icon.svg' alt="Lawyerist Podcast Logo"></div>
            <div class="page-title"><h1><?php single_post_title(); ?></h1></div>
          </div>
          <div class="page-content">
            <?php the_content(); ?>
            <div class="podcast-subscribe-box-wrapper">
              <div class="section-heading">
                <div class="wrapper">
                  <h2>Subscribe & Other Ways to Listen</h2>
                </div>
              </div>
              <ul class="podcast-subscribe-box">
                <li><a href="https://podcasts.apple.com/us/podcast/lawyerist-podcast/id951946132" target="_blank" title="View the Lawyerist Podcast on Apple Podcasts"><i class="podcast-network-icon"><?php echo wp_get_attachment_image(1404582, [38,38], true); ?></i><span>Apple Podcasts</span></a></li>
                <li><a href="https://podcasts.google.com/feed/aHR0cHM6Ly9mZWVkcy5tZWdhcGhvbmUuZm0vTFRONDk1MjczNzY5OQ" target="_blank" title="View the Lawyerist Podcast on Google Podcasts"><i class="podcast-network-icon"><?php echo wp_get_attachment_image(1404584, [38,38], true); ?></i><span>Google Podcasts</span></a></li>
                <li><a href="https://open.spotify.com/show/11NrvXspmp0gKec8zEx0WP" target="_blank" title="View the Lawyerist Podcast on Spotify"><i class="podcast-network-icon"><?php echo wp_get_attachment_image(1404587, [38,38], true); ?></i><span>Spotify Podcasts</span></a></li>
                <li><a href="https://www.stitcher.com/show/lawyerist-podcast" target="_blank" title="View the Lawyerist Podcast on Stitcher"><i class="podcast-network-icon"><?php echo wp_get_attachment_image(1404588, [38,38], true); ?></i><span>Stitcher</span></a></li>
                <li><a href="https://www.pandora.com/search/lawyerist/podcasts" target="_blank" title="View the Lawyerist Podcast on Pandora"><i class="podcast-network-icon"><?php echo wp_get_attachment_image(1404586, [38,38], true); ?></i><span>Pandora</span></a></li>
                <li><a href="https://www.audible.com/pd/Lawyerist-Podcast-Podcast/B08JJNHY7Q" target="_blank" title="View the Lawyerist Podcast on Audible"><i class="podcast-network-icon"><?php echo wp_get_attachment_image(1404583, [38,38], true); ?></i><span>Audible</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <?php // Gets the newest post.
        $podcast_episodes_query = new WP_Query([
          'post_type'   => 'podcasts',
          'order'           => 'desc',
          'orderby'         => 'date',
        ]);

        if ( ! is_paged() && $podcast_episodes_query->have_posts() ) : 
          $newest = $podcast_episodes_query->posts[0];
          $new_post = $newest->ID;
          ?>
            <div class="section-heading">
              <div class="wrapper">
                <h2>New Episode!</h2>
              </div>
            </div>
            <div id="newest-post">
              <?php lawyerist_get_post_card( $new_post, '', '', true, true ); ?>
            </div>
          <?php
      ?>

      <div class="section-heading">
        <div class="wrapper">
          <h2>All Episodes</h2>
        </div>
      </div>

      <div class="filters-sponsor-flag-container">
        <div class="filters">
          <div id="sort-podcasts" class="field-group">
            <div class="placeholder">
              Sort by …
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 width="16px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
              <polygon style="fill:#ffffff;" points="11,6 7.5,9.5 4,6 3,7 7.5,11.5 12,7 "/>
              </svg>
            </div>
            <ul class="card drop-down-card">
              <?php
                $sort_options = [
                  'Sort by Date<br>(Newest First)'  => 'date,desc',
                  'Sort by Date<br>(Oldest First)'  => 'date,asc',
                  'Sort A&rarr;Z'                   => 'title,asc',
                  'Sort Z&rarr;A'                   => 'title,desc',
                ];
                foreach ( $sort_options as $key => $val ) {
                  $selected = '';
                  $val_arr  = explode( ',', $val );
                  if (
                    ( ! isset( $podcast_episodes_query->query['orderby'] ) && $key == array_key_first($sort_options) ) ||
                    ( $val_arr[0] == $podcast_episodes_query->query['orderby'] && $val_arr[1] == $podcast_episodes_query->query['order'] )
                  ) {
                    $selected = ' class="selected"';
                  }
                  echo '<li data-sort_selection="' . $val . '"' . $selected . '>' . $key . '</li>';
                }
              ?>
            </ul>
          </div>
          <?php $podcast_tags = get_categories('taxonomy=podcast-tag&type=podcasts');
          if( $podcast_tags ) : ?>
          <div id="filter-podcasts" class="field-group">
            <div class="placeholder">
              Filter by …
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 width="16px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
              <polygon style="fill:#ffffff;" points="11,6 7.5,9.5 4,6 3,7 7.5,11.5 12,7 "/>
              </svg>
            </div>
            <ul class="card drop-down-card">
              <?php
                foreach($podcast_tags as $tag ) {
                  echo "<li class='filter' data-sort-tag-id='{$tag->term_id}'>{$tag->name}</li>";
                }
              ?>
            </ul>
          </div>
          <a class="reset" style="display:none;">Reset Filter</a>
          <?php endif; ?>
        </div>
        <div class="sponsor-flag">
          <svg class="sponsor-flag-icon" xmlns="http://www.w3.org/2000/svg" width="31.001" height="24.425" viewBox="0 0 31.001 24.425">
            <path stroke="#ff7062" id="Path_989" data-name="Path 989" d="M547.847,990.689H516.9V975.463h30.943l-3.111,7.2Z" transform="translate(-516.846 -975.463)" fill="#ff7062"/>
            <path stroke="#db5953" id="Path_990" data-name="Path 990" d="M516.938,989.746l10.938,9.2v-9.2Z" transform="translate(-516.849 -974.52)" fill="#db5953"/>
          </svg>
          <div class="card-fragment"></div>
          <div class="sponsor-flag-label"> = Sponsored</div>
        </div>
      </div>
        <div id="all-articles">
          <div class="article-cards">
            <?php
              while ( $podcast_episodes_query->have_posts() ) : $podcast_episodes_query->the_post();
                lawyerist_get_post_card();
              endwhile;
            ?>
          </div>
          <div class="page-links">
            <?php
              $big = 9999;
              echo paginate_links([
                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'    => '?paged=%#%',
                'current'   => max( 1, get_query_var('paged') ),
                'total'     => $podcast_episodes_query->max_num_pages,
                'prev_text' => 'PREV',
                'mid_size'  => 3,
                'next_text' => 'NEXT',
              ]);
            ?>
          </div>
        </div>
      <?php else : ?>
        <p class="post">No posts match your query.</p>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </main>
  </div>
</div>

<?php get_footer(); ?>
