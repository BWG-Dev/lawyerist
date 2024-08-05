<?php
    $anchor =    get_field('anchor');
    $featured_image =    get_field('featured_image');
    $heading =    get_field('heading');
    $sub_text =    get_field('sub_text');
    $description =    get_field('description');
    $button_text =    get_field('button_text');
    $button_link =    get_field('button_link');
?>

<div id="<?php echo $anchor; ?>" class="two-column-limage-rtext">
    <div class="container">
        <div class="col-1">
            <div class="wrapper">
                <img src="<?php if( !empty( $featured_image['url'] ) ): echo $featured_image['url']; endif; ?>" alt=""/>
            </div>
        </div>
        <div class="col-2">
            <div class="wrapper">
                <?php echo $heading; ?>
                <p><?php echo $sub_text; ?></p>
                <p class="font-initial"><?php echo $description; ?></p>
                <a href="<?php echo $button_link; ?>">
                    <div class="orange-btn">
                        <span><?php echo $button_text; ?></span>
                    </div>    
                </a>
            </div>
        </div>
    </div>
</div>