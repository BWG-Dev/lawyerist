<?php get_header(); 

global $wp_query;
$id = $wp_query->get_queried_object_id();
$tag = get_term($id);
$tag_name = $tag->name;
$current_slug = $tag->slug;

/* Find related page */
$review_slugs = array(
  $current_slug,
  'reviews/' . $current_slug,
  'reviews/seo-marketing/' . $current_slug, 
  'reviews/intake-crm/' . $current_slug, 
  'reviews/law-practice-management-software/' . $current_slug,
  'reviews/online-legal-research/' . $current_slug,
  'reviews/document-management-automation/' . $current_slug,
  'reviews/accounting-billing-finance/' . $current_slug,
  'reviews/remote-office-phones-communication/' . $current_slug,
  'reviews/virtual-receptionists-outsourced-staffing/' . $current_slug,
);
?>

<div id="articles-page-container" class="page-container">
  <div class="content-container">
    <?php get_template_part( 'template-parts/breadcrumbs-accreditation-container' ); ?>

    <main id="articles" class="news-archive" data-nonce="<?php echo wp_create_nonce( 'articles_nonce' ); ?>">

      <h1>Lawyerist News Articles</h1>

      <?php // Gets the newest post.
      $related_review = new WP_Query( 
        array(
          'posts_per_page'  =>  -1,
          'post_name__in'   =>  $review_slugs,
          'post_type'   => 'page'
        )
      );

      if ( $related_review->have_posts() ): ?>
        <div class="section-heading">
          <div class="wrapper">
            <h2>Related Reading</h2>
          </div>
        </div>
        <?php while ( $related_review->have_posts() ) : $related_review->the_post(); ?>
          <div id="newest-post">
            <?php lawyerist_get_post_card( '', '', '', true ); ?>
          </div>
        <?php endwhile;
      endif; ?>

      <div class="section-heading">
        <div class="wrapper">
          <h2>All <?php echo $tag_name; ?> Articles</h2>
        </div>
      </div>

      <div class="filters-sponsor-flag-container">
        <?php if( !is_tax( 'podcast-tag' ) ) : ?>
        <div class="filters">
          <div id="sort-articles" class="field-group">
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
                  'Sort by Date<br>(Newest First)' => 'date,desc',
                  'Sort by Date<br>(Oldest First)' => 'date,asc',
                  'Sort A&rarr;Z'               => 'title,asc',
                  'Sort Z&rarr;A'               => 'title,desc',
                ];
                foreach ( $sort_options as $key => $val ) {
                  $selected = '';
                  $val_arr  = explode( ',', $val );
                  if (
                    ( ! isset( $wp_query->query['orderby'] ) && $key == array_key_first($sort_options) ) ||
                    ( $val_arr[0] == $wp_query->query['orderby'] && $val_arr[1] == $wp_query->query['order'] )
                  ) {
                    $selected = ' class="selected"';
                  }
                  echo '<li data-sort_selection="' . $val . '"' . $selected . '>' . $key . '</li>';
                }
              ?>
            </ul>
          </div>
          <div id="filter-articles" class="field-group">
            <div class="placeholder">
              Filter by …
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 width="16px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
              <polygon style="fill:#ffffff;" points="11,6 7.5,9.5 4,6 3,7 7.5,11.5 12,7 "/>
              </svg>

            </div>
            <ul class="card drop-down-card">
              <?php
                //$filters = get_categories();
                $filters = get_terms( array(
                  'taxonomy'    =>    'category',
                  'exclude'   =>    array(50061, 1320)
                  )
                );
                foreach ( $filters as $filter ) {
                  echo '<li class="filter" data-cat_id="' . $filter->term_id . '">' . $filter->name . '</li>';
                } ?>
                  <li id="podcast-link"><a href="/podcast/" title="View all podcasts">View All Podcasts</a></li>
            </ul>
          </div>
          <a class="reset" style="display:none;">Reset Filter</a>
        </div>
        <?php endif; ?>
        <div class="sponsor-flag">
          <svg class="sponsor-flag-icon" xmlns="http://www.w3.org/2000/svg" width="31.001" height="24.425" viewBox="0 0 31.001 24.425">
            <path stroke="#ff7062" id="Path_989" data-name="Path 989" d="M547.847,990.689H516.9V975.463h30.943l-3.111,7.2Z" transform="translate(-516.846 -975.463)" fill="#ff7062"/>
            <path stroke="#db5953" id="Path_990" data-name="Path 990" d="M516.938,989.746l10.938,9.2v-9.2Z" transform="translate(-516.849 -974.52)" fill="#db5953"/>
          </svg>
          <div class="card-fragment"></div>
          <div class="sponsor-flag-label"> = Sponsored</div>
        </div>
      </div>
      <?php    
      
      if ( have_posts() ) : ?>
        <div id="all-articles">
          <div class="article-cards">
            <?php
              while ( have_posts() ) : the_post();
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
        </div>
      <?php else : ?>
        <p class="post">No posts match your query.</p>
      <?php endif; ?>

    </main>
  </div>
</div>

<?php get_footer(); ?>