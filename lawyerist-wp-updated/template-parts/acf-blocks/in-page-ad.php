<?php
/**
 * In-Page Partner Ad Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'in-page-ad-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'in-page-ad';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
/*$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 295;
$background_color = get_field('background_color');
$text_color = get_field('text_color');*/

$image          = get_field('image');
    $image_url      = $image['url'];
    $image_alt      = $image['alt'];
$badge          = get_field('badge');
    $badge_url      = $badge['url'];
    $badge_alt      = $badge['alt'];
$testimonial    = get_field('testimonial');
$author         = get_field('author');
    $author_url     = $author['url'];
    $author_title   = $author['title'];
$description    = get_field('description');
$button         = get_field('button');
$button_url     = $button['url'];
$button_title   = $button['title'];

?>


<div class="in-page-ad">
    <div class="card">
        <div class="card_upper">

            <a class="image" href="<?php echo esc_url($button_url); ?>" title="<?php echo esc_attr($button_title); ?>">
                <div class="image_inner" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
            </a>
            <img class="ad-partner-badge" alt="<?php echo esc_url($badge_alt); ?>" src="<?php echo esc_url($badge_url); ?>"/>

        </div> <!-- End card_upper -->

        <div class="ad-body">
            <span class="testimonial"><?php echo $testimonial; ?></span>
            <a class="author" href="<?php echo esc_url($author_url); ?>" title="<?php echo esc_attr($author_title); ?>" target="_blank"><?php echo $author_title; ?></a>
            <span class="description"><?php echo $description; ?></span>
            <a class="arrow-btn button" href="<?php echo esc_url($button_url); ?>" title="<?php echo esc_attr($button_title); ?>" target="_blank"><?php echo $button_title; ?></a>
        </div>    
    </div>
</div>