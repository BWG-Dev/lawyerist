<?php

// Start the Loop.
if ( have_posts() ) : while ( have_posts() ) : the_post();

  // Assign post variables.
  $page_title = the_title( '', '', FALSE );

  // Breadcrumbs
  if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
  }

  ?>

  <main>

    <div <?php post_class(); ?>>
        <div class="header-banner">
            <h1 class="headline entry-title"><?php echo $page_title; ?></h1>
            <span class="header-banner_description"><?php the_field('nav_introduction'); ?></span>
        </div>

      <div class="post_body" itemprop="articleBody">

      <?php if (is_page(1374860)) { // Resources Page
          
        the_content();

      } else {
        // Start repeater
        if ( have_rows('nav_accordion') ):
          while( have_rows('nav_accordion') ) : the_row();
            $title = get_sub_field('accordion_title');
            $subtitle = get_sub_field('accordion_subtitle');
          ?>
          <div class="accordions">
              <div class="accordions_title">
                <div class="accordions_title_cta">
                  <h2><?php echo $title; ?></h2>
                  <span class="plus"></span>
                </div>
                <span class="accordions_title_desc"><?php echo $subtitle; ?></span>
              </div>
              <div class="accordions_content">
                <ul class="accordion">
                  <?php if ( have_rows('accordion_links') ):
                    while( have_rows('accordion_links') ) : the_row(); 
                      $page = get_sub_field('accordion_page');
                      $link_url = $page['url'];
                      $link_title = $page['title'];
                    ?>
                      <li class="page_item"><a href="<?php echo $link_url; ?>" title="<?php echo $link_title; ?>"><?php echo $link_title; ?></a></li>
                    <?php endwhile;
                  endif; // End links repeater ?>
                </ul>
              </div>
          </div>

      <?php endwhile;
        endif; // End accordion repeater
      }
      ?>

      </div>

    </div>

  </main>

  <?php

endwhile; endif; // Close the Loop.
