<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <main class="podcast-episode-content-container content-container">
    <div <?php post_class(); ?>>
      <div class="podcast-episode-header row">
        <?php lawyerist_get_post_header(get_the_ID()); ?>
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
      <div id="review_container" class="single-post">
        <div class="entry-content">
          <?php if ( get_field('pod_abstract') ) { ?>
            <div class="section-heading">
              <div class="wrapper">
                <h2>Episode Notes</h2>
              </div>
            </div>
            <?php echo '<p>' . get_field('pod_abstract') . '</p>'; ?>
			<p>
				If today's podcast resonates with you and you haven't read <i>The Small Firm Roadmap Revisited</i> yet, <a href="https://lawyerist.com/book/" target="_blank">get the first chapter right now for free!</a> Looking for help beyond the book? <a href="https://lawyerist.com/coaching/" target="_blank">Check out our coaching community</a> to see if it's right for you.
			</p>
            <?php if ( have_rows('pod_topics') ) : ?>
              <ul class="podcast-topics">
                <?php while ( have_rows('pod_topics') ) : the_row(); ?>
                  <?php if ( have_rows('pod_point_group') ) : while ( have_rows('pod_point_group') ) : the_row(); ?>
                    <li><span class="timestamp"><strong><?php the_sub_field('pod_point_time_code'); ?></span>.</strong> <?php the_sub_field('pod_point_description'); ?></li>
                  <?php endwhile; endif; ?>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          <?php } ?>
          <?php if ( get_field('pod_transcript') ) { ?>
            <button class="podcast-transcript-button expandthis-click">Read Full Transcript</button>
            <div class="podcast-transcript expandthis-hide">
              <div class="section-heading">
                <div class="wrapper">
                  <h2>Transcript</h2>
                </div>
              </div>
              <?php echo get_field('pod_transcript'); ?>
            </div>
          <?php } ?>
          <?php if ( have_rows('pod_interviewer')) : ?>
            <div class="section-heading">
              <div class="wrapper">
                <h2>Your Hosts</h2>
              </div>
            </div>
            <?php while ( have_rows('pod_interviewer') ) : the_row(); ?>
              <?php $host = get_sub_field('interviewer_name'); ?>
              <div class="podcast-host">
                <div class="podcast-host-avatar"><?php echo get_avatar($host['ID']); ?></div>
                <div class="col">
                  <p class="podcast-host-name"><strong><?php echo $host['display_name']; ?></strong></p>
                  <p class="podcast-host-bio"><?php echo $host['user_description']; ?></p>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php if ( (have_rows('guest_info')) || (have_rows('staff_guest_info')) ): ?>
            <div class="section-heading">
              <div class="wrapper">
                <h2>Featured Guests</h2>
              </div>
            </div>
            <?php while ( have_rows('guest_info') ) : the_row(); ?>
              <?php $guest_id = get_sub_field('guest_name'); 
                    $guest_img = get_field('pod_guest_headshot', $guest_id); ?>
              <div class="podcast-guest">
                <div class="podcast-guest-avatar">
                  <?php
                    if ( !empty($guest_img) ) { ?>
                      <img class="avatar" src="<?php echo esc_url($guest_img['url']); ?>" alt="<?php echo esc_attr($guest_img['alt']); ?>" />
                    <?php }
                  ?>
                </div>
                <div class="col">
                  <p class="podcast-guest-name"><strong><?php echo get_the_title($guest_id); ?></strong></p>
                  <p class="podcast-guest-bio"><?php echo get_field('pod_guest_bio', $guest_id); ?></p>
                </div>
              </div>
            <?php endwhile; ?>
            <?php while ( have_rows('staff_guest_info') ) : the_row(); ?>
              <?php $guest = get_sub_field('staff_guest_name'); ?>
              <div class="podcast-guest">
                <div class="podcast-guest-avatar"><?php echo get_avatar($guest->ID); ?></div>
                <div class="col">
                  <p class="podcast-guest-name"><strong><?php echo $guest->data->display_name; ?></strong></p>
                  <p class="podcast-guest-bio"><?php echo get_user_meta($guest->ID, 'description', true); ?></p>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php the_content(); ?>
          <div class="section-heading">
            <div class="wrapper">
              <h2>Share Episode</h2>
              <?php echo dpsp_get_share_buttons([
                'shape'       => 'circle',
                'show_mobile' => true,
                'size'        => 'large',
              ]); ?>
            </div>
          </div>
          <p class="last-updated">Last updated <?php echo get_the_modified_date('F jS, Y'); ?></p>
        </div><!--.entry-content-->
      </div>
    </div>
  </main>
  <?php get_template_part('template-parts/podcast-episodes'); ?>
<?php endwhile; endif; ?>
