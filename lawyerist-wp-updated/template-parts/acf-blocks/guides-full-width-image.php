<?php
    $full_image = get_field('full_image');
?>

<div class="full-width-single-image">
    <div class="container">
        <div style="background-image:url('<?php echo do_shortcode(esc_url($full_image['url'])); ?>');background-position:center;background-repeat:no-repeat;background-size:cover;"></div>
    </div>
</div>