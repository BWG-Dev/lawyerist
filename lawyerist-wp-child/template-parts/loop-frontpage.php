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

        </main>

        <?php
    endwhile; endif; // Close the Loop.