<?php 

if ( is_page(1401936) ) { // Homepage version
    $cta = get_field('header_cta', 'options');
    $icon = get_field('header_icon', 'options');
    $icon_alt = get_field('header_icon_alt', 'options'); ?>
    <div id="breadcrumbs-accreditation-container" class="white-version">
        <div class="breadcrumbs">&nbsp;</div>
        <div class="accreditation">
            <div class="accreditation-txt"><p><?php echo $cta; ?></p></div>
            <img src="<?php echo esc_url($icon_alt['url']); ?>" alt="<?php echo esc_attr($icon_alt['alt']); ?>">
        </div>
    </div>
<?php } elseif ( is_page_template('template-parts/healthy-landing-page.php') ) { // Dark background version
    $cta = get_field('header_cta', 'options');
    $icon = get_field('header_icon', 'options');
    $icon_alt = get_field('header_icon_alt', 'options'); ?> <!-- Use alt color icon -->
    <div id="breadcrumbs-accreditation-container" class="white-version"> 
        <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
            }
        ?>
        <div class="accreditation">
            <div class="accreditation-txt"><p><?php echo $cta; ?></p></div>
            <img src="<?php echo esc_url($icon_alt['url']); ?>" alt="<?php echo esc_attr($icon_alt['alt']); ?>">
        </div>
    </div>
<?php } else if (is_tree(301729)){ // Product Review Tree
    $cta = get_field('sec_cta', 'options');
    $icon = get_field('sec_icon', 'options');?>
    <div id="breadcrumbs-accreditation-container">
        <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
            }
        ?>
        <div class="accreditation">
            <div class="accreditation-txt"><p><?php echo $cta; ?></p></div>
            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
        </div>
    </div>
<?php } else { // Global Option/Fallback
    $cta = get_field('header_cta', 'options');
    $icon = get_field('header_icon', 'options'); ?>
    <div id="breadcrumbs-accreditation-container">
        <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
            }
        ?>
        <div class="accreditation">
            <div class="accreditation-txt"><p><?php echo $cta; ?></p></div>
            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
        </div>
    </div>
<?php } ?>