<?php  

    $heading = get_field( 'heading' );
?>

<div class="chapters">
    <div class="container">
        <div class="heading">
            <h2 class="h2"><?php echo $heading; ?></h2>
        </div>

        <!-- Portfolio Gallery Grid -->

        <div class="row">
        <?php if( have_rows('chapters') ): ?>
            <?php while( have_rows('chapters') ): the_row(); 
                $chapter = get_sub_field('chapter');
                $title = get_sub_field('title');
                $duration = get_sub_field('duration');
                $chapter_url = get_sub_field('chapter_url');
                $chapter_image = get_sub_field('chapter_image');
                ?>

            <div class="column">
                <a href="<?php echo $chapter_url; ?>">
                    <div class="content">
                        <p class="chapter"><?php echo $chapter; ?></p>
                        <p class="title"><?php echo $title; ?></p>
                        <div class="details">
                            <p class="duration"><?php echo $duration; ?></p>
                            <p class="chapter-path">Read Chapter</p>
                        </div>
                        <img src="<?php echo do_shortcode(esc_url($chapter_image['url'])); ?>" alt="<?php echo do_shortcode(esc_attr($chapter_image['alt'])); ?>" style="width:100%"/>
                    </div>
                </a>
            </div>

            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</div>