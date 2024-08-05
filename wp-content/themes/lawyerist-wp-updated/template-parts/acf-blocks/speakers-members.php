<div class="members">
    <div class="container">

        <div class="row">

        <?php if( have_rows('member') ): ?>
            
            <?php while( have_rows('member') ): the_row(); 
                $image = get_sub_field('image');

                $featured_image = get_sub_field('featured_member');
                $title = get_sub_field('title');
                $label = get_sub_field('label');
                $link = get_sub_field('link');
                ?>

            <div class="column lab-coaches show">
                <a href="<?php echo $link; ?>">
                    <div class="content">
                        <?php if( !empty( $featured_image ) ): ?>
                            <img src="<?php echo do_shortcode(esc_url($featured_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($featured_image['alt'])); ?>" />
                        <?php endif; ?>

                        <span class="member-name"><?php echo $title; ?></span>
                        <p class="member-label" <?php if( $title == 'Zack Glaser' ): ?>style="margin-bottom:-13px;"<?php endif; ?>><?php echo $label; ?></p>
                    </div>
                </a>    
            </div>

            <?php endwhile; ?>
            
        <?php endif; ?>



        </div>
    </div>
</div>
