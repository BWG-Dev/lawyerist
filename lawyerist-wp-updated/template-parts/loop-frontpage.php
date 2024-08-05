<?php
// Start the Loop.
if (have_posts()) : while (have_posts()) : the_post();

        // Assign post variables.
        $page_title = the_title('', '', FALSE);
        ?>

        <main>

            <div <?php post_class(); ?>>
                <?php
                // Featured image
                $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $backgroundImgsmall = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium_large');
                ?>

                <section id="hp-panel1" class="columns desktop-paint" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                    <div class="column-50-50">
                        <div class="column-1">
                            <div class="hp-hero">
                                <div class="hp-hero_intro">
                                    <h1><?php the_field('h1_title'); ?></h1>
                                    <h2><?php the_field('h2_intro'); ?></h2>
                                </div>
                                <div class="hp-hero_cta">
                                    <span class="hero-cta"><?php the_field('hero_cta'); ?></span>
                                    <a class="button" id="join-popup" title="Join Lawyerist">Join for Free</a>
                                    <span class="hero-disclaimer">Become an Insider to unlock unlimited article views.</span>
                                </div>
                            </div>
                        </div>

                        <div class="column-2">
                            <?php if (have_rows('link_list')): ?>
                                <div class="link-list">
                                    <?php while (have_rows('link_list')): the_row(); ?>
                                        <?php $url = get_sub_field('page_link'); ?>
                                        <span class="list-item">
                                            <a href="<?php echo esc_url($url); ?>"><?php the_sub_field('page_title'); ?></a>
                                        </span>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <section data-skip-lazy="" id="hp-panel1" class="columns mobile-paint" style="background-image: url('https://lawyerist.com/wp-content/uploads/2020/08/homepage-header-768x391.jpg');">
                    <div class="column-50-50">
                        <div class="column-1">
                            <div class="hp-hero">
                                <div class="hp-hero_intro">
                                    <h1><?php the_field('h1_title'); ?></h1>
                                    <h2><?php the_field('h2_intro'); ?></h2>
                                </div>
                                <div class="hp-hero_cta">
                                    <span class="hero-cta"><?php the_field('hero_cta'); ?></span>
                                    <a class="button" id="join-popup" title="Join Lawyerist">Join for Free</a>
                                    <span class="hero-disclaimer">Become an Insider to unlock unlimited article views.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     </section>
                    <section id="hp-panel1" class="columns mobile-paint" style="background: #434c55; height: 280px;">
                   
                    <div class="column-50-50">
                        <div class="column-2">
                            <?php if (have_rows('link_list')): ?>
                                <div class="link-list">
                                    <?php while (have_rows('link_list')): the_row(); ?>
                                        <?php $url = get_sub_field('page_link'); ?>
                                        <span class="list-item">
                                            <a href="<?php echo esc_url($url); ?>"><?php the_sub_field('page_title'); ?></a>
                                        </span>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <section id="hp-panel2" class="columns">
                    <div class="column-50-50">
                        <div class="column-1">
                            <div class="content-container">
                                <?php the_field('panel2_content'); ?>
                            </div>
                        </div>

                        <div class="column-2">
                            <?php
                            $args = array(
                                'post_type' => 'page',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'page_type',
                                        'field' => 'slug',
                                        'terms' => 'platinum-sponsor',
                                    ),
                                ),
                                'orderby' => 'rand'
                            );

                            $plat_sponsors_query = new WP_Query($args);

                            if ($plat_sponsors_query->have_posts()) :

                                echo '<div id="platinum-sponsors-hp">';

                                echo '<h3>Platinum Sponsors</h3>';

                                echo '<div id="platinum-sponsors">';

                                echo '<div id="platinum-sponsors_holder">';

                                while ($plat_sponsors_query->have_posts()) : $plat_sponsors_query->the_post();

                                    if (get_field('platinum_sidebar_image')) {

                                        $product_page_title = the_title('', '', FALSE);
                                        $product_page_url = get_permalink();
                                        $plat_sidebar_img = get_field('platinum_sidebar_image');

                                        echo '<span class="platinum-badge">';
                                        echo '<a href="' . $product_page_url . '?utm_source=lawyerist&amp;utm_medium=platinum_sidebar_widget">';
                                        echo wp_get_attachment_image($plat_sidebar_img, 'large');
                                        echo '</a>';
                                        echo '</span>';
                                    }

                                endwhile;
                                wp_reset_postdata();

                                echo '</div>';

                                echo '</div>';

                                echo '</div>';

                            endif;
                            ?>

                        </div>
                    </div>
                </section>

                <section id="hp-panel3" class="columns">
                    <div class="column-full">
                        <div class="column-holder">
                            <div class="content-container">
                                <?php the_field('panel3_content'); ?>
                            </div>
                            <div class="resource-list">
                                <?php if (have_rows('resource_list')): ?>
                                    <?php while (have_rows('resource_list')): the_row(); ?>
                                        <?php $url = get_sub_field('page_link'); ?>
                                        <div class="resource">
                                            <a class="resource_item" href="<?php echo esc_url($url); ?>">
                                                <h3 class="title"><?php the_sub_field('page_title'); ?></h3>
                                                <span class="desc"><?php the_sub_field('page_description'); ?></span>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="button-container">
                                <a class="button" href="/resources/" title="Resources">See All</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="hp-panel4" class="columns">
                    <div class="column-full">
                        <div class="column-holder">
                            <div class="content-container">
                                <?php the_field('panel4_content'); ?>
                            </div>

                            <div class="cta-list">
                                <?php if (have_rows('cta_list')): ?>
                                    <?php while (have_rows('cta_list')): the_row(); ?>
                                        <?php
                                        $url = get_sub_field('page_link');
                                        $logo = get_sub_field('logo');
                                        $image = get_sub_field('image');
                                        ?>
                                        <div class="cta-item" style="background-image: url('<?php echo $image; ?>');">
                                            <span class="cta-logo"><img src="<?php echo $logo; ?>" /></span>
                                            <a class="cta-link" href="<?php echo esc_url($url); ?>">
                                                <span class="cta-text"><?php the_sub_field('cta_text'); ?></span>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="sponsor-panel" class="columns">
                    <div class="column-full">
                        <div class="column-holder">
                            <div class="content-container">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="hp-panel5" class="columns">
                    <div class="column-50-50">
                        <div class="column-1">
                            <?php
                            $link = get_field('panel5_link');
                            $url = $link['url'];
                            $title = $link['title'];
                            ?>
                            <a class="panel5-image-link" href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>" 
                               style="background-image: url('<?php the_field('panel5_image'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100%; display: block;">
                                &nbsp
                            </a>
                        </div>
                        <div class="column-2">
                            <div class="content-container">
                                <?php the_field('panel5_content'); ?>
                                <a class="button" href="/about/" title="Join Lawyerist">About Lawyerist</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="hp-panel6" class="columns">
                    <div class="column-full">
                        <div class="column-holder">
                            <div class="content-container">
                                <?php the_field('panel6_content'); ?>
                            </div>

                            <div class="testimonials">
                                <?php if (have_rows('testimonials')): ?>
                                    <div class="testimonial-list">
                                        <?php while (have_rows('testimonials')): the_row(); ?>
                                            <div class="testimonial-item">
                                                <div class="info">
                                                    <span class="info_image"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name') ?>" /></span>
                                                    <span class="info_name"><?php the_sub_field('name') ?> says:</span>
                                                    <span class="info_date"><?php the_sub_field('date') ?></span>
                                                </div>
                                                <div class="content">
                                                    <span class="content_title"><?php the_sub_field('title') ?></span>

                                                    <div class="lawyerist-star-rating">
                                                        <div class="lawyerist-star-rating-wrapper">
                                                            <?php
                                                            $star_count = 0;
                                                            while ($star_count < 5) {
                                                                echo '<div class="icon rating-star"></div>';
                                                                $star_count++;
                                                            }

                                                            echo '<div class="lawyerist-star-rating-result" style="width: ' . $star_rating_width . '%">';

                                                            $star_result_count = 0;

                                                            while ($star_result_count < 5) {

                                                                echo '<div class="icon rating-star"></div>';

                                                                $star_result_count++;
                                                            }

                                                            echo '</div>';
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <span class="content_body"><?php the_sub_field('body') ?></span>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>      

            </div>

        </main>
        	
    <?php
endwhile; endif; // Close the Loop.