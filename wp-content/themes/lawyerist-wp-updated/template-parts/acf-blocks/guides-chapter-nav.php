<?php
    $prev_title = get_field('prev_title');
    $prev_url = get_field('prev_link');

    $next_title = get_field('next_title');
    $next_url = get_field('next_link');
?>


<section class="start-content">
    <div class="container">
        <div class="guides-chapter-navigation">
            <div class="col-1 one">
                <?php if ( !empty($prev_title) ) { ?> 
                    <p class="prev-c">Previous Chapter</p>
                    <a href="<?php echo $prev_url; ?>" class="link"><?php echo $prev_title; ?></a>
                <?php } else {
                    echo '<div class="placeholder">&nbsp;</div>';
                } ?>
            </div>
            <div class="col-1 two">
                <?php if ( !empty($next_title) ) { ?>
                    <p class="next-c">Next Chapter</p>
                    <a href="<?php echo $next_url; ?>" class="link"><?php echo $next_title; ?></a>
                <?php } else {
                    echo '<div class="placeholder">&nbsp;</div>';
                } ?>
            </div>
        </div>
    </div>
</section>