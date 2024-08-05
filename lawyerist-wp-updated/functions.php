<?php function stylesheets_scripts() {

    $template_dir_uri = get_template_directory_uri();

    // Normalize the default styles. From https://github.com/necolas/normalize.css/
    wp_register_style('normalize-css', $template_dir_uri . '/assets/css/normalize.css');
    wp_enqueue_style('normalize-css');

    // Enqueue fonts
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/ejl6tzh.css');

    // Enqueue icons
    wp_register_style('icon-stylesheet', "https://cdn.icomoon.io/152819/Lawyerist-NEW/style-cf.css?irhd5h" );
    wp_enqueue_style('icon-stylesheet'); // Enqueue styles for svg icons
    // Load the main stylesheet.
    $cacheBusterCSS = filemtime(get_stylesheet_directory() . '/assets/css/styles.css');
    wp_register_style('stylesheet', $template_dir_uri . '/assets/css/styles.css', array(), $cacheBusterCSS, 'all');
    wp_enqueue_style('stylesheet');

    // Load consolidated scripts in the footer.
    $cacheBusterCookies = filemtime(get_stylesheet_directory() . '/assets/js/cookies.js');
    wp_register_script('cookies', $template_dir_uri . '/assets/js/cookies.js', array('jquery'), $cacheBusterCookies, true);
    wp_enqueue_script('cookies');

    $cacheBusterFS = filemtime(get_stylesheet_directory() . '/assets/js/footer-scripts.js');
    wp_register_script('footer-scripts', $template_dir_uri . '/assets/js/footer-scripts.js', array('jquery'), $cacheBusterFS, true);
    wp_enqueue_script('footer-scripts');

    //wp_register_script('filter-sort', $template_dir_uri . '/assets/js/filter-sort.js', array('jquery'), $cacheBusterFS, true);
    //wp_enqueue_script('filter-sort');

    // Lightbox pop-up modal
    wp_register_script('lightbox-scripts', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true);
    wp_enqueue_script('lightbox-scripts');

    // Youtube API Tracking
    wp_register_script('youtube-api', 'https://www.youtube.com/iframe_api');
    wp_enqueue_script('youtube-api');

    /*wp_register_script( 'subnavigation-js', get_stylesheet_directory_uri() . '/assets/js/sub-navigation.js', array('jquery') );
    wp_enqueue_script( 'subnavigation-js' );*/ // removing until post-launch edits are complete
}

add_action('wp_enqueue_scripts', 'stylesheets_scripts');

/* ------------------------------
Theme Setup
------------------------------ */

function theme_setup() {

add_theme_support('editor-styles');
add_theme_support('post-thumbnails');
add_theme_support('responsive-embeds');
add_theme_support('title-tag');
add_theme_support('wp-block-styles');

add_image_size('featured_image', 1024);
add_image_size('featured_image_2x', 2048);
add_image_size('large_2x', 1388);
add_image_size('thumbnail_2x', 300, 300, true);

add_editor_style('template-parts/acf-blocks/acf-block-styles.css');
}

add_action('after_setup_theme', 'theme_setup');

function remove_image_sizes() {

remove_image_size('1536x1536');
remove_image_size('2048x2048');
remove_image_size('wp_review_small');
remove_image_size('wp_review_large');
}

add_action('init', 'remove_image_sizes');

function remove_image_size_options($possible_sizes) {

unset($possible_sizes['wp_review_small']);
unset($possible_sizes['wp_review_large']);

return $possible_sizes;
}

add_filter('image_size_names_choose', 'remove_image_size_options');

add_theme_support('custom-logo');

/**
* Adds options page(s) for ACF. (Add more as needed.)
*/
function front_page_options_acf_op_init() {

// Check function exists.
if (function_exists('acf_add_options_sub_page')) {

    acf_add_options_sub_page(array(
        'page_title' => __('Block Defaults'),
        'menu_title' => __('Block Defaults'),
        'parent_slug' => __('options-general.php'),
    ));
}
}

add_action('acf/init', 'front_page_options_acf_op_init');

// New ACF Options Page
if (function_exists('acf_add_options_page')) {

acf_add_options_page(array(
    'page_title' => 'Global Elements',
    'menu_title' => 'Global Elements',
    'menu_slug' => 'global-elements',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-sticky',
    'redirect' => false
));
}

// The options page feature provides a set of functions to add extra admin pages to edit ACF fields!
// Each admin page can be fully customized (see code examples below), and sub admin pages can be created too!
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
    'page_title' => 'Navigation',
    'menu_title' => 'Navigation',
    'menu_slug' => 'navigation',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-menu-alt3',
    'redirect' => false
    ));
}


/* ------------------------------
Add Super Admins
------------------------------ */
grant_super_admin(15050);

/* ------------------------------
Template Files
------------------------------ */
require_once('acf-blocks.php');
require_once('articles.php');
if (!is_admin()) {
  require_once('shortcodes.php');
}

/* -------------------------------
Allow Children of Private Pages
-------------------------------- */
function my_slug_show_all_parents( $args ) {
$args['post_status'] = array( 'publish', 'private' );
return $args;
}
add_filter( 'page_attributes_dropdown_pages_args', 'my_slug_show_all_parents' );
add_filter( 'quick_edit_dropdown_pages_args', 'my_slug_show_all_parents' );


/* STRUCTURE ***************** */

/**
* Nav Menu
*/
function register_menus() {

register_nav_menus(
        array(
            'header-nav-menu' => 'Header Nav Menu',
            'footer-menu-updated' => 'Footer Menu Updated'
        )
);
}

add_action('init', 'register_menus');

/**
* Adds a search bar to nav menu.
*/
function lawyerist_navsearch($items, $args) {

if ($args->theme_location == 'header-nav-menu') {

    ob_start();
    ?>

    <li class="menu-item menu-item-search">
        <?php echo get_search_form(); ?>
    </li>

    <?php
    $new_items = ob_get_clean();

    $items .= $new_items;
}

return $items;
}

add_filter('wp_nav_menu_items', 'lawyerist_navsearch', 10, 2);

/**
* Adds a login/register item to the nav menu.
*/
function lawyerist_loginout($items, $args) {

if (is_user_logged_in() && $args->theme_location == 'header-nav-menu') {

    $user_ID = get_current_user_id();
    $user = wp_get_current_user(); // getting & setting the current user

    ob_start();
    ?>

    <li class="menu-item menu-item-loginout menu-item-has-children">

        <a>Account</a>

        <ul class="sub-menu">

            <li class="menu-item"><a href="/account/">My Account</a>

            <li class="menu-item"><a href="/scorecard/small-firm-scorecard/">Update My Scorecard</a></li>

            <?php $roles = ( array ) $user->roles;
                $labster = in_array( 'labster', $roles );
                $coach = in_array( 'lab_coach', $roles );
                $admin = in_array( 'administrator', $roles );
                if ( ( $labster == true ) || ( $coach == true ) || ( $admin == true ) ) { ?>
                    <li class="menu-item"><a href="https://portal.lawyerist.com/" target="_blank" title="Visit Your Lab Portal">Lab Portal</a></li>
                <?php } ?>
        </ul>

    </li>

    <?php
    $new_items = ob_get_clean();

    $items .= $new_items;
} elseif (!is_user_logged_in() && $args->theme_location == 'header-nav-menu') {

    ob_start();
    ?>

    <li class="menu-item menu-item-has-children menu-item-loginout">

        <a class="login-link">Log In</a>

    </li>

    <?php
    $new_items = ob_get_clean();

    $items .= $new_items;
}

return $items;
}

add_filter('wp_nav_menu_items', 'lawyerist_loginout', 10, 2);


/* ADMIN ******************* */

/* ------------------------------
Login Form
------------------------------ */

/**
* Get Login/Register
*
* Returns the modal login/register form. Called from header.php so it is always
* available.
*/
function get_lawyerist_login() {

ob_start();
?>

<div id="lawyerist-login" class="modal" style="display: none;">

    <div class="card">

        <button class="close-btn dismiss-button"></button>
        <img class="l-dot" src="<?php echo get_template_directory_uri(); ?>/images/circle-logo-icon.svg">

        <li id="login">
            <h2>Log in to Lawyerist.com</h2>
            <p>Not a Subscriber yet? <a class="link-to-register">Register here.</a> (It's free!)</p>
            <?php wp_login_form(); ?>
            <p class="remove_bottom">Forgot your password? <a href="<?php echo esc_url(wp_lostpassword_url(get_permalink())); ?>" alt="<?php esc_attr_e('Lost Password', 'textdomain'); ?>" class="forgot-password-link">Reset it here.</a></p>
        </li>

        <li id="register" style="display: none;">
            <h2>Subscribe to Lawyerist</h2>
            <p><a class="back-to-login">Back to login.</a></p>
            <?php echo do_shortcode('[gravityform id=59 title=false ajax=true]'); ?>
        </li>

    </div>

</div>

<div id="lawyerist-login-article-count" class="modal" style="display: none;">

    <div class="card">

        <img class="l-dot" src="<?php echo get_template_directory_uri(); ?>/images/circle-logo-icon.svg">

        <p class="article-counter-login-notice">You have read all five of your free articles this month. To read this article, log in or register.</p>
        <li id="login">
            <h2>Log in to Lawyerist.com</h2>
            <p>Not a Subscriber yet? <a class="link-to-register">Register here.</a> (It's free!)</p>
            <?php wp_login_form(); ?>
            <p class="remove_bottom">Forgot your password? <a href="<?php echo esc_url(wp_lostpassword_url(get_permalink())); ?>" alt="<?php esc_attr_e('Lost Password', 'textdomain'); ?>" class="forgot-password-link">Reset it here.</a></p>
        </li>

        <li id="register" style="display: none;">
            <h2>Subscribe to Lawyerist</h2>
            <p><a class="back-to-login">Back to login.</a></p>
            <?php echo do_shortcode('[gravityform id=59 title=false ajax=true]'); ?>
        </li>

    </div>
</div>

<div id="lawyerist-login-screen" style="display: none;"></div>


<div id="lawyerist-login-screen" style="display: none;"></div>

<?php
$lawyerist_login = ob_get_clean();

return $lawyerist_login;
}

/**
* The following functions modify the regularly WordPress login form defaults by
* adding our logo, URL, and company name, just in case anyone finds it.
*/
function lawyerist_login_logo() {
?>

<style type="text/css">

    #login h1 a,
    .login h1 a {
        background-image: url( <?php echo get_stylesheet_directory_uri(); ?>/images/Lawyerist_Icon_Primary.png );
    }

</style>

<?php
}

function lawyerist_login_logo_url() {
return home_url();
}

function lawyerist_login_logo_url_title() {
return 'Lawyerist.com';
}

function lawyerist_login_message($message) {
if (empty($message)) {
    return '<p>Don\'t have an account yet? <a href="/subscribe/">Click here to Subscribe to Lawyerist today (it\'s free)!</a></p>';
} else {
    return $message;
}
}

add_action('login_enqueue_scripts', 'lawyerist_login_logo');
add_filter('login_headerurl', 'lawyerist_login_logo_url');
add_filter('login_headertitle', 'lawyerist_login_logo_url_title');
add_filter('login_message', 'lawyerist_login_message');

/**
 * Remove Yoast Auto Redirects
 *
 * Reduces redirects loops, unnecessary redirects, etc.
 */

add_filter('Yoast\WP\SEO\post_redirect_slug_change', '__return_true' );
add_filter('Yoast\WP\SEO\term_redirect_slug_change', '__return_true' );
add_filter('Yoast\WP\SEO\enable_notification_post_trash', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_post_slug_change', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_term_delete', '__return_false' );
add_filter('Yoast\WP\SEO\enable_notification_term_slug_change', '__return_false' );

/**
* Remove Menu Items
*
* None of these are essential, but our +New menu had become a mess, so these
* functions clean it up.
*/
function remove_admin_bar_items($wp_admin_bar) {

// Remove from the +New menu.
$wp_admin_bar->remove_node('new-link');
$wp_admin_bar->remove_node('new-media');
$wp_admin_bar->remove_node('new-product');
$wp_admin_bar->remove_node('new-shop_coupon');
$wp_admin_bar->remove_node('new-shop_order');
$wp_admin_bar->remove_node('new-wc_zapier_feed');
$wp_admin_bar->remove_node('new-sfwd-courses');
$wp_admin_bar->remove_node('new-sfwd-lessons');
$wp_admin_bar->remove_node('new-sfwd-topic');
$wp_admin_bar->remove_node('new-sfwd-quiz');
$wp_admin_bar->remove_node('new-sfwd-question');
$wp_admin_bar->remove_node('new-sfwd-certificates');
$wp_admin_bar->remove_node('new-shop_subscription');
$wp_admin_bar->remove_node('new-groups');
$wp_admin_bar->remove_node('new-wc_membership_plan');
$wp_admin_bar->remove_node('new-wc_user_membership');
$wp_admin_bar->remove_node('new-user');
$wp_admin_bar->remove_node('new-tablepress-table');

// Remove Monster Insights.
$wp_admin_bar->remove_node('monsterinsights_frontend_button');
}

add_action('admin_bar_menu', 'remove_admin_bar_items', 999);

function remove_stubborn_admin_bar_items() {

global $wp_admin_bar;

$wp_admin_bar->remove_menu('gravityforms-new-form');
}

add_action('wp_before_admin_bar_render', 'remove_stubborn_admin_bar_items', 999);

/**
* Prevent Subscribers & Customers from Viewing the WP Dashboard
*/
// Hide admin bar
function hide_admin_bar($show) {

if (
        !current_user_can('administrator') &&
        !current_user_can('editor') &&
        !current_user_can('author') &&
        !current_user_can('lab_coach') &&
        !current_user_can('podcasteditor')
) {
    return false;
}

return $show;
}

add_filter('show_admin_bar', 'hide_admin_bar');

// Block wp-admin access
function block_wp_admin() {

if (
        is_admin() &&
        !current_user_can('administrator') &&
        !current_user_can('editor') &&
        !current_user_can('author') &&
        !current_user_can('lab_coach') &&
        !current_user_can('podcasteditor') &&
        !( defined('DOING_AJAX') && DOING_AJAX )
) {

    wp_safe_redirect('/account/');
    exit;
}
}

add_action('admin_init', 'block_wp_admin');


/* UTILITY FUNCTIONS ******************* */

/**
* Get Country
*
* This gets the country from the ipStack.com API (we have a paid account there).
* We use this to make sure we are only showing trial buttons to visitors from
* the US and Canada.
*/
function get_country() {

global $post;

// Limits API calls to product pages and portals.
if (is_plugin_active('lawyerist-trial-buttons/lawyerist-trial-buttons.php') && ( has_trial_button() || get_page_template_slug($post->ID) == 'product-page.php' )) {

    // Get user's geographic location by IP address.
    // Set IP address and API access key.
    $ip = $_SERVER['REMOTE_ADDR'];
    $access_key = '55e08636154002dca5b45f0920143108';

    // Initialize CURL.
    $ch = curl_init('https://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data.
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response.
    $api_result = json_decode($json, true);

    // Return the country code (i.e., "US" or "CA").
    return $api_result['country_code'];
}
}

/**
* Get Sponsor Link
*
* Gets the sponsor for bylines. If the post is singular and published, it
* returns the sponsor as a link.
*/
function get_sponsor_link($post_id = null) {

if (!$post_id || !has_category('sponsored', $post_id)) {
    return;
}

if ( has_category('sponsored') ) :
    $sponsor = get_post(get_field('sponsored_post_partner', $post_id));

    if (get_field('product_page', $sponsor->ID)) {

        $product_pages = get_field('product_page', $sponsor->ID);

        switch (gettype($product_pages)) {

            case 'integer':
                $product_page_id = get_post($product_pages);
                break;

            case 'array':
                $product_page_id = get_post($product_pages[0]);
                break;

            default:
                $product_page_id = null;
        }
    }

    if (is_single() && !empty($product_page_id) && get_post_status($product_page_id) == 'publish') {

        return '<a href="' . get_permalink($product_page_id) . '">' . $sponsor->post_title . '</a>';
    } else {

        return $sponsor->post_title;
    }

endif;
}

/**
* Get First Image URL
*
* Gets the URL of the first image in a post. We use this for our Case Study
* posts, where the first image is a headshot of the featured lawyer.
*/
function get_first_image_url($post_id = NULL) {

if (empty($post_id)) {
    global $post;
} else {
    $post = get_post($post_id);
}

$first_image_url = array();

preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if (!empty($matches[1][0])) {

    $first_image_url['1x'] = filter_var($matches[1][0], FILTER_SANITIZE_URL);
    $first_image_id = attachment_url_to_postid($first_image_url['1x']);

    if ($first_image_id) {

        $first_image_1x = wp_get_attachment_image_src($first_image_id);
        $first_image_2x = wp_get_attachment_image_src($first_image_id, 'retina-thumbnail');

        $first_image_url['1x'] = $first_image_1x[0];
        $first_image_url['2x'] = $first_image_2x[0];
    } else {

        $first_image_url['2x'] = $first_image_url['1x'];
    }

    return $first_image_url;
} else {

    return;
}
}

/**
* Answers the question "Is this a product portal?"
*/
function is_product_portal() {

global $post;

$args = array(
    'post_parent' => $post->ID,
    'fields' => 'ids',
    'post_type' => 'page',
);

$exclude = array(
    245317, // Insider
    220087, // Lab
    128819, // LabCon
);

$children = get_posts($args);

if (is_page() && !in_array($post->ID, $exclude) && is_page_template('product-practice-review.php') && ( count($children) > 0 )) {

    return true;
} else {

    return false;
}
}

/* Answers the question: Is this a gold or platinum sponsor? */
function check_sponsors() {
    $page_id = get_the_ID();
    $sponsor_type = array();
    $taxes = get_the_terms( $page_id, 'page_type' );
    if ( $taxes !== false ) {
        foreach ( $taxes as $tax ) {
            array_push( $sponsor_type, $tax->name );
        }
    }

    $sponsor_list = array(
        'Gold Sponsor',
        'Platinum Sponsor',
		'Silver Sponsor'
    );


    $gold = 'Gold Sponsor';
    $platinum = 'Platinum Sponsor';
	$silver = 'Silver Sponsor';

    $gold_sponsors = in_array( $gold, $sponsor_type );
    $platinum_sponsors = in_array( $platinum, $sponsor_type );
	$silver_sponsors = in_array( $silver, $sponsor_type );

    if ($gold_sponsors == true || $platinum_sponsors == true || $silver_sponsors == true) {
        return true;
    }
}

/* Adds is_tree functionality */

function is_child($parent) {
global $post;
return $post->post_parent == $parent;
}

// Widget Logic Conditionals (ancestor)
function is_tree($pid) {
global $post;

if (is_page($pid))
    return true;

$anc = get_post_ancestors($post->ID);
foreach ($anc as $ancestor) {
    if (is_page() && $ancestor == $pid) {
        return true;
    }
}
return false;
}

// Add rewrite rules so that WordPress delivers the correct content
function podcast_custom_rewrite_rules( $wp_rewrite ) {
    // This rule will will match the post name in /case-study/%postname%/ structure
	$new_rules['^podcasts/([^/]+)/?$'] = 'index.php?name=$matches[1]';
	$new_rules['^podcasts/?$'] = 'index.php?cat=28';
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;

	return $wp_rewrite;
}
add_action('generate_rewrite_rules', 'podcast_custom_rewrite_rules');

/* CONTENT ******************* */

/**
* Archive Headers
*
* Headers with the term (category, tag, etc.) name and description for lists.
*/
function lawyerist_get_archive_header() {

if (is_search()) {

    echo '<div id="archive-header"><h1>Search results for "' . get_search_query() . '"</h1></div>';
    echo '<div id="lawyerist_content_search">';
    get_search_form();
    echo '</div>';
} elseif (is_category()) {

    $category = get_queried_object();
    $cat_image_ID = get_field('cat_featured_image', 'category_' . $category->term_id);
    $cat_image = wp_get_attachment_image($cat_image_ID, 'large');

    $title = single_term_title('', FALSE);
    $descr = term_description();

    echo '<div id="archive-header">' . "\n";

    if (!empty($cat_image)) {
        echo $cat_image . "\n";
    }

    echo '<h1>' . $title . '</h1>' . "\n";
    echo $descr . "\n";
    echo '</div>';
} elseif (is_post_type_archive(array('sfwd-lessons', 'sfwd-topic'))) {

    $course_id = learndash_get_course_id(get_the_ID($post->$post_parent));
    $course_title = get_the_title($course_id);
    $archive_title = post_type_archive_title('', FALSE);

    echo '<div id="archive-header">' . "\n";
    echo '<h1>' . $course_title . ' ' . $archive_title . '</h1>' . "\n";
    echo '</div>';
} else {

    $title = single_term_title('', FALSE);
    $descr = term_description();

    echo '<div id="archive-header">' . "\n";
    echo '<h1>' . $title . '</h1>' . "\n";
    echo $descr . "\n";
    echo '</div>';
}
}

/**
* Yoast SEO Breadcrumbs
*
* Removes the Products breadcrumb on WooCommerce pages.
*/
function lawyerist_remove_products_breadcrumb($link_output, $link) {

return $link_output;
}

add_filter('wpseo_breadcrumb_single_link', 'lawyerist_remove_products_breadcrumb', 10, 2);

/**
* Inserts the Member Portal as a breadcrumb on LearnDash pages, and some other
* tweaks.
*/
function lawyerist_add_learndash_breadcrumbs($links) {

global $post;

$post_type = get_post_type($post->ID);

if ($post_type == 'sfwd-courses') {

    $replace_course_breadcrumb[] = array(
        'url' => '/labster-portal/',
        'text' => 'Member Portal',
    );

    array_splice($links, 1, 1, $replace_course_breadcrumb);
}

if ($post_type == 'sfwd-lessons' || $post_type == 'sfwd-topic') {

    $course_id = learndash_get_course_id($post->ID);
    $course_title = get_the_title($course_id);
    $course_url = get_permalink($course_id);

    $course_breadcrumb[] = array(
        'url' => $course_url,
        'text' => $course_title,
    );

    array_splice($links, 1, 0, $course_breadcrumb);

    if ($post_type == 'sfwd-topic') {

        $lesson_id = learndash_get_lesson_id($post->ID);
        $lesson_title = get_the_title($lesson_id);
        $lesson_url = get_permalink($lesson_id);

        $lesson_breadcrumb[] = array(
            'url' => $lesson_url,
            'text' => $lesson_title,
        );

        array_splice($links, 1, 0, $lesson_breadcrumb);
    }
}

return $links;
}

add_filter('wpseo_breadcrumb_links', 'lawyerist_add_learndash_breadcrumbs');

/**
* Add IDs to Headings
*/
function add_ids_to_headings($content) {

if (!is_main_query() || !has_block('core/heading')) {
    return $content;
}

$pattern = '#(?P<full_tag><(?P<tag_name>h\d)(?P<tag_atts>[^>]*)>(?P<tag_contents>.*)<\/h\d>)#i';

if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {

    $find = array();
    $replace = array();

    foreach ($matches as $match) {

        if (strlen($match['tag_atts']) && false !== stripos($match['tag_atts'], 'id=')) {
            continue;
        }

        $find[] = $match['full_tag'];
        $id = sanitize_title($match['tag_contents']);
        $id_attr = sprintf(' id="%s"', $id);
        $replace[] = sprintf(
                '<%1$s%2$s%3$s>%4$s</%1$s>',
                $match['tag_name'],
                $match['tag_atts'],
                $id_attr,
                $match['tag_contents']
        );
    }

    $modified_content = str_replace($find, $replace, $content);
}

return $modified_content;
}

add_filter('the_content', 'add_ids_to_headings');

/**
* Render Table of Contents
*/
/*function get_toc() {

global $post;

if (!has_block('core/heading')) {
    return;
}

$pattern = '#<h(?P<level>\d).*?id=[\'|\"](?P<id>[^\'\"]*)[^>]*\>(?P<heading>.*)<\/h\d>#i';
$content = add_ids_to_headings(get_the_content());
$toc = null;
$i = 1;

if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {

    ob_start();
    ?>

    <div class="card toc-card">

        <p class="card-label">On this Page</p>

        <nav class="toc">
            <ul>

                <?php foreach ($matches as $match) { ?>

                    <?php if ($match['level'] == 2) { ?>

                        <li>
                            <a href="#<?php echo $match['id']; ?>">
                                <div class="toc-num">&nbsp</div>
                                <div class="toc-heading"><?php echo strip_tags($match['heading']); ?></div>
                            </a>
                        </li>

                    <?php } ?>

                <?php } ?>

            </ul>
        </nav>
    </div>

    <?php
    $toc = ob_get_clean();
}

return $toc;
}*/

/**
* TOC Fallback
*/
/*function toc_fallback($content) {

global $post;

if (!is_page() || !is_main_query()) {
    return $content;
}

if (has_block('core/heading') && !has_block('acf/table-of-contents') && get_field('show_table_of_contents') !== false) {

    $toc = get_toc();
    $splitter = '<h';
    $headings = explode($splitter, $content);

    foreach ($headings as $key => $val) {

        switch ($key) {

            case 0:
                $replace = $val;
                break;

            case 1:
                $replace = $toc . $splitter . $val;
                break;

            default:
                $replace = $splitter . $val;
                break;
        }

        $headings[$key] = $replace;
    }

    return implode('', $headings);
} else {

    return $content;
}
}

add_filter('the_content', 'toc_fallback');*/

/**
  * Author Bios
  *
  * Outputs the author bio box at the bottom of posts and pages.
  */
function lawyerist_get_author_bio() {
  global $wp_query;

  $author       = $wp_query->query_vars['author'];
  $author_id    = get_the_author_meta('ID');
  $author_name  = get_the_author_meta('display_name');
  $author_bio   = get_the_author_meta('description');

  $author_avatar = get_avatar(get_the_author_meta('user_email'), 72, '', $author_name);

  $author_url = get_the_author_meta('user_url');
  $author_url_parsed = parse_url($author_url);
  $author_url_host = $author_url_parsed['host'];

  $twitter_username = get_the_author_meta('twitter');

  $linkedin_url = get_the_author_meta('linkedin');
  $linkedin_url_parsed = parse_url($linkedin_url);
  $linkedin_username = $linkedin_url_parsed['path'];

  ?>
    <div class="card post-card post-footer-card alignwide">
      <div class="post-details">
        <div class="postmeta-block">
          <?php echo $author_avatar; ?>
          <div class="postmeta">
            <?php if ( !has_category('sponsored') && !is_single('podcasts') ) :
                $img_shortcode = '[pp-user-cover-image user="' . $author_id . '"]';
                echo '<div class="author_signature">';
                    echo do_shortcode($img_shortcode);
                echo '</div>';
                else : echo '<div class="spacer-30">&nbsp;</div>';
                endif;
            ?>
            <p class="byline"><?php echo $author_name; ?></p>
          </div><!--.postmeta-->
        </div><!--.postmeta-block-->
      </div><!--.post-details-->
      <div class="author-bio">
        <p class="author-bio-header"><strong>About the Author</strong></p>
        <?php echo $author_bio; ?>
      </div>
      <div class="author-connect">
        <?php if ($twitter_username == true) { ?>
          <p><i class="author-twitter"></i><a href="https://twitter.com/<?php echo $twitter_username; ?>">@<?php echo $twitter_username; ?></a></p>
        <?php } ?>
        <?php if ($linkedin_username == true) { ?>
          <p><i class="author-linkedin"></i><a href="<?php echo $linkedin_url; ?>"><?php echo $linkedin_username; ?></a></p>
        <?php } ?>
      </div>
      <?php if ($author_url == true) { ?>
        <p class="author-website-row"><i class="author-website"></i><span>Website: <a href="<?php echo $author_url; ?>"><?php echo $author_url; ?></a></span></p>
      <?php } ?>
    </div>
  <?php
}

/**
* List of Coauthors
*
* Adds a list of coathors at the bottom of posts and pages, if there are any.
*/
function lawyerist_get_coauthors() {

global $wp_query;

$coauthors = get_coauthors();

if (count($coauthors) > 1) {

    // Removes the primary author.
    unset($coauthors[0]);

    $coauthor_list = array();

    foreach ($coauthors as $coauthor) {

        $profile_page_url = get_field('profile_page', 'user_' . $coauthor->data->ID);

        if (count_user_posts($coauthor->data->ID) >= 5 && !empty($profile_page_url)) {

            $coauthor_list[] = '<span class="vcard author"><cite class="fn"><a href="' . $profile_page_url . '">' . $coauthor->data->display_name . '</a></cite></span>';
        } else {

            $coauthor_list[] = '<span class="vcard author"><cite class="fn">' . $coauthor->data->display_name . '</cite></span>';
        }
    }

    if (count($coauthor_list) === 1) {

        echo $coauthor_list[0];
    } elseif (count($coauthor_list) === 2) {

        echo implode(' and ', $coauthor_list);
    } else {

        echo implode(', ', array_slice($coauthor_list, 0, -1)) . ', and ' . end($coauthor_list);
    }

    echo ' also contributed to this page.';
}
}

/* ------------------------------
Affinity Benefit Notice

Adds an affinity benefit notice at the top of product pages. Requires
WooCommerce Memberships to determine which message to show. Also requires AFC
for the custom fields that define the benefit details.
------------------------------ */
// add readonly attribute to gravity forms for affinity benefit notice
add_filter( 'gform_pre_render_55', 'add_readonly_script' );
function add_readonly_script( $form ) {
    ?>
    <script type="text/javascript">
        jQuery(document).on('gform_post_render', function(){
            /* apply only to a textarea with a class of gf_readonly */
            jQuery(".gf_readonly input[type=text]").attr("readonly","readonly");
        });
    </script>
    <?php
    return $form;
}


function affinity_notice() {

global $post;

ob_start();

$availability = get_field('affinity_availability');

switch ($availability) {

    case $availability == 'new_only':

        $whom = 'new customers';
        break;

    case $availability == 'old_only':

        $whom = 'existing customers';
        break;

    case $availability == 'both_new_and_old':

        $whom = 'new & existing customers';
        break;
}

$card_label = 'Discount Available to ' . $whom;

$user_id = get_current_user_id();

$discount_descr = get_field('affinity_discount_descr');

$theme_dir = get_template_directory_uri();
?>
<div class="affinity-holder">
    <?php
            $formatted_desc_arr = explode(' ', $discount_descr);
            if( count($formatted_desc_arr) > 10 ) {
                $formatted_desc = implode(' ', array_slice($formatted_desc_arr, 0, 10)) . '...';
            } else {
                $formatted_desc = $discount_descr;
            }
        ?>
        
            <?php if (is_user_logged_in()) { ?>
                <div class="discount-el popmake-1401559">
                    <div class="subscription-gry"><span><?php echo $formatted_desc; ?></span></div>
                    <a href="#affinityModal" class="discount-org"><span class="discount-org_inner">Claim Your Discount</span></a>
                </div>
            <?php } else { ?>
                <div class="discount-el">
                    <a href="/subscribe/" class="non-user-sub-box">
                        <div class="subscription-gry"><span>Become a Lawyerist Subscriber to get your discount.</span></div>
                        <div class="discount-org"><span class="discount-org_inner">Claim Your Discount</span></div>
                    </a>
                </div>
            <?php } ?>
            


        
</div>

<?php
$affinity_notice = ob_get_clean();

return $affinity_notice;
}

function compare_affinity_notice($alternative) {

if (!is_user_logged_in()) {
    return;
}

global $post;

ob_start();

$compare_availability = get_field('affinity_availability', $alternative);

switch ($compare_availability) {

    case $compare_availability == 'new_only':

        $whom = 'new customers';
        break;

    case $compare_availability == 'old_only':

        $whom = 'existing customers';
        break;

    case $availability == 'both_new_and_old':

        $whom = 'new & existing customers';
        break;
}

$card_label = 'Discount Available to ' . $whom;

$user_id = get_current_user_id();

$compare_discount_descr = get_field('affinity_discount_descr', $alternative);

$theme_dir = get_template_directory_uri();
?>
<div class="affinity-holder">
    <?php if (is_user_logged_in()) { ?>
        <div class="discount-el popmake-1401559">
            <div class="subscription-gry"><span><?php echo $compare_discount_descr; ?></span></div>
            <a href="#affinityModal" class="discount-org"><span class="discount-org_inner">Claim Your Discount</span></a>
        </div>
    <?php } ?>
</div>

<?php
$affinity_notice = ob_get_clean();

return $affinity_notice;
}

/**
* Get Alternative Products
*
* Outputs alternative products on product pages if any are selected.
*/
function lawyerist_get_alternative_products() {

global $post;

$page_title = get_the_title($post->ID);
$alternatives = get_field('alternative_products');

if (!empty($alternatives)) {
    ?>

    <h2>Alternatives to <?php echo $page_title; ?></h2>

    <div id="alternative-products" class="cards cards-6-columns">

        <?php
        foreach ($alternatives as $alternative) {

            $alt_title = get_the_title($alternative);
            $alt_url = get_permalink($alternative);

            if (has_post_thumbnail()) {

                $alt_thumbnail_id = get_post_thumbnail_id($alternative);
                $alt_thumbnail = wp_get_attachment_image($alt_thumbnail_id, 'thumbnail');
            }
            ?>

            <div class="card">
                <a href="<?php echo $alt_url; ?>" title="<?php echo $alt_title; ?>" class="has-post-thumbnail">
                    <?php
                    if (!empty($alt_thumbnail)) {
                        echo $alt_thumbnail;
                    }
                    ?>
                    <div class="headline-byline">
                        <h2 class="headline"><?php echo $alt_title; ?></h2>
                    </div>
                </a>
            </div>

            <?php
            unset($alt_thumbnail);
        }
        ?>

    </div>

    <?php
}
}


/* ------------------------------
* Get Alternative Products ( 1/2 )
*
* Outputs alternative products tab filter buttons
------------------------------ */
function lawyerist_get_compared_products_list() {

global $post;

$page_title = get_the_title($post->ID);
$alternatives = get_field('alternative_products');
$first  = reset($alternatives);

if (!empty($alternatives)) {
    ?>
    <?php
    foreach ($alternatives as $alternative) {

        $alt_title = get_field("full_name", $alternative);
        ?>

        <?php if ( $first == $alternative ) { ?>
            <li><button class="tablinks active radio-b clickme" onclick="similarProd(event, '<?php echo str_replace(' ', '-', $alt_title); ?>')"><?php echo $alt_title; ?></button></li>
        <?php } else { ?>
            <li><button class="tablinks radio-b" onclick="similarProd(event, '<?php echo str_replace(' ', '-', $alt_title); ?>')"><?php echo $alt_title; ?></button></li>
        <?php
        }
    }
}
}

/* ------------------------------
Get Product Comparision Cards ( 2/2 )

This is used on review single product pages to show
compared products to current product.
------------------------------ */
function lawyerist_get_compared_products_card() {

global $post;

$page_title = get_field("full_name");
$alternatives = get_field('alternative_products');

if (!empty($alternatives)) {
    ?>

    <?php
    foreach ($alternatives as $alternative) {

        $alternative_ID = $alternative->ID;
        $alt_title = get_field('full_name', $alternative);
        $alt_url = get_permalink($alternative);
        $mypost_id = url_to_postid( $alt_url );
        $comp_rating = lwyrst_get_composite_rating($mypost_id);

        $compared_product_pros = get_field('Pros', $alternative);
        $compared_product_cons = get_field('Cons', $alternative);

        if (has_post_thumbnail()) {
            $alt_thumbnail_id = get_post_thumbnail_id($alternative);
            $alt_thumbnail = wp_get_attachment_image($alt_thumbnail_id, 'thumbnail');
        }
        ?>

        <div id="<?php echo str_replace(' ', '-', $alt_title); ?>" class="tabcontent">
            <div class="card">
                <div class="wrapper">
                    <div class="header">
                        <h3><?php echo $alt_title; ?></h3>
                        <div class="rating-container">
                            <?php if ( !empty( $comp_rating ) ) { ?>
                                <?php echo lwyrst_star_rating($comp_rating); ?>
                                <p class="number-rating"><?php echo $comp_rating; ?>/5</p>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if ( has_term( 'affinity-partner', 'page_type', $alternative_ID ) && get_field( 'affinity_active', $alternative ) == true ) { ?>
                        <div class="partner-image-border add-affinity">
                            <!-- Product Thumbnail -->
                            <?php if ( !empty($alt_thumbnail) ) { ?>
                                <div itemprop="image">
                                    <?php echo $alt_thumbnail; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="partner-image-border">
                            <!-- Product Thumbnail -->
                            <?php if ( !empty($alt_thumbnail) ) { ?>
                                <div itemprop="image">
                                    <?php echo $alt_thumbnail; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ( has_term( 'affinity-partner', 'page_type', $alternative_ID ) && get_field( 'affinity_active', $alternative ) == true ) {
                        echo compare_affinity_notice($alternative);
                    } ?>

                    <div class="pros-cons-container">

                        <div class="pros">
                            <b class="thumb-up">Pros</b>
                            <?php
                            if( $compared_product_pros ): ?>
                            <ul>
                                <?php foreach( $compared_product_pros as $pros ): ?>
                                    <li><?php echo $pros; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>

                        <div class="cons">
                            <b class="thumb-down">Cons</b>
                            <?php
                            if( $compared_product_cons ): ?>
                            <ul>
                                <?php foreach( $compared_product_cons as $cons ): ?>
                                    <li><?php echo $cons; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <div class="read-preview">
                            <a href="<?php echo $alt_url; ?>" class="link">Read <?php echo $alt_title; ?> Review</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="full-report" style="display: none;">
                <a href="#" class="link"><?php echo $page_title; ?> vs. <?php echo $alt_title; ?> Full Report</a>
            </div>
        </div>
        <?php
        unset($alt_thumbnail);
    }
}
}

/* ------------------------------
Get comment rating count 1-5

Will get the amount of ratings for a particular comment star (1,2,3,4 or 5)
------------------------------ */
function lawyerist_get_comment_rating_count($rate_count) {
$p_id_this = get_the_ID();
$comments = get_approved_comments( get_the_ID() );
$i = 0;
$total = 0;

foreach( $comments as $comment ){
    $rate = get_comment_meta( $comment->comment_ID, 'wp_review_comment_rating', true );

    if ($rate > 0) {
        if( isset( $rate ) && '' !== $rate ) {
            if( $rate == $rate_count ) {
                $i++;
                $total = $i;
            }
        }
    }
}
return $total;
}

/* ------------------------------
This is use for the star ratings set from 1-5 for reviews section (STATIC)
------------------------------ */
function get_average_rating($star_count, $community_stars, $star_total) {
$comp_rating = ($star_count * $community_stars) / $star_total;
return number_format($comp_rating,1);
}

/* ------------------------------
This is use for the star ratings set for each user comment in the reviews section
------------------------------ */
function get_star_rating_per_review($star_total_one, $review_star, $star_total_two) {
    if ( ( is_numeric($star_total_one) ) && ( is_numeric($review_star) ) && ( is_numeric($star_total_two) ) ) {
        $review_rating = ($star_total_one * $review_star) / $star_total_two;
        $new_star = number_format($review_rating, 1);
        return bcdiv($new_star, 1, 1);
    }
}

/* ------------------------------
Get Product Featured Ratings

ACF: Schema_Data_LPMS
- Ratings

Notes: $group_acf will need the Field Name: 'GROUP1'
The function will then loop through all of the child
fields and calculate the average of the sum of the
child values.
------------------------------ */
function law_get_featured_ratings($group_acf) {
define('DECIMAL_SEPARATOR', '.');
$ratings_group = get_field($group_acf);
$total_group = 0;

if( $ratings_group ):
    foreach( $ratings_group as $rate ):
        $total_group += $rate;
    endforeach;

    $total_group_rating = ($total_group) / 3; // Calculates rating
    $final_rate = bcdiv($total_group_rating, 1, 1); // Leaves 1 decimal place

    $x_final_rate = rtrim($final_rate, '0'); // removes (.0) - if 0 to the right of decimal
    $xx_final_rate = rtrim($x_final_rate, DECIMAL_SEPARATOR); // removes (.)

    return $xx_final_rate;
endif;
}

/* ------------------------------
Get Related Posts

This is used on product pages to show related posts by matching the current page
slug to a tag slug.
------------------------------ */

function lawyerist_get_related_posts() {

global $post;

$current_id[] = $post->ID;
$current_slug = $post->post_name;
$current_title = $post->post_title;

if (!empty($current_slug)) {

    $args = array(
        'category__not_in' => array(
            43419, // Excludes Lab workshops.
        ),
        'post__not_in' => $current_id,
        'posts_per_page' => -1,
        'tag' => $current_slug,
    );

    $lawyerist_related_posts_query = new WP_Query($args);

    if ($lawyerist_related_posts_query->have_posts()) :

        echo '<h2>Posts About ' . $current_title . '</h2>';

        echo '<div id="related-posts">';

        while ($lawyerist_related_posts_query->have_posts()) : $lawyerist_related_posts_query->the_post();

            lawyerist_get_post_card($post->ID);

        endwhile;
        wp_reset_postdata();

        echo '</div>';

    endif;
}
}


function lawyerist_get_related_posts_reviews() {

    global $post;

    $current_id[] = $post->ID;
    $current_slug = $post->post_name;
    $current_title = $post->post_title;

    if (!empty($current_slug)) {

        $args = array(
            'post__not_in' => $current_id,
            'posts_per_page' => 6,
            'tag' => $current_slug,
        );

        $lawyerist_related_posts_query = new WP_Query($args);
        if ( is_page('301729') ):  // /reviews/ page
            $recent_args = array(
                'category__in'		=> array(
                    '555', // News Articles
                    '1320', // Sponsored Posts
                ),
                'post__not_in'		=> get_option( 'sticky_posts' ),
                'posts_per_page'	=> $num_posts,
            );
            $recent_post_query = new WP_Query($recent_args);
            if ($recent_post_query->have_posts()) :

            echo '<div class="post-slider-width">';
                echo '<div class="centered no-fouc">';

                    while ($recent_post_query->have_posts()) : $recent_post_query->the_post();

                        lawyerist_get_post_card($post->ID);

                    endwhile;
                    wp_reset_postdata();

                echo '</div>';
            echo '</div>';
            endif;
        elseif ($lawyerist_related_posts_query->have_posts()) :

            echo '<div class="post-slider-width">';
                echo '<div class="centered no-fouc">';

                    while ($lawyerist_related_posts_query->have_posts()) : $lawyerist_related_posts_query->the_post();

                        lawyerist_get_post_card($post->ID);

                    endwhile;
                    wp_reset_postdata();

                echo '</div>';
            echo '</div>';
        else: // show most recent if none match
            $recent_args = array(
                'category__in'		=> array(
                    '555', // News Articles
                    '1320', // Sponsored Posts
                ),
                'post__not_in'		=> get_option( 'sticky_posts' ),
                'posts_per_page'	=> $num_posts,
            );
            $recent_post_query = new WP_Query($recent_args);
            if ($recent_post_query->have_posts()) :

            echo '<div class="post-slider-width">';
                echo '<div class="centered no-fouc">';

                    while ($recent_post_query->have_posts()) : $recent_post_query->the_post();

                        lawyerist_get_post_card($post->ID);

                    endwhile;
                    wp_reset_postdata();

                echo '</div>';
            echo '</div>';
            endif;
        endif;
    }
}

/* ------------------------------
Get Related Resources

This is used on posts to show related resource pages by matching the post tags
to resource page slugs. If it doesn't find at least 4 resource pages, it adds
recent posts with any of the same tags.
------------------------------ */

function lawyerist_get_related_resources() {

global $post;

if (is_singular('post')) {

    $current_id[] = $post->ID;
    $current_tags = get_the_tags($post->ID);
    $current_tags_slugs = array();

    if (!empty($current_tags)) {

        foreach ($current_tags as $current_tag) {
            array_push($current_tags_slugs, $current_tag->slug);
        }

        echo '<div id="related-resources">';

        echo '<h2>More Resources</h2>';

        $args = array(
            'post__not_in' => $current_id,
            'posts_per_page' => 4,
            'post_type' => 'page',
            'post_name__in' => $current_tags_slugs,
        );

        $related_pages = new WP_Query($args);
        $resources_count = $related_pages->post_count;

        if ($related_pages->have_posts()) : while ($related_pages->have_posts()) : $related_pages->the_post();

                lawyerist_get_post_card();

            endwhile;
        endif;

        if ($resources_count < 4) {

            $args = array(
                'category__not_in' => array(
                    1320, // Excludes sponsored posts.
                    43419, // Excludes Lab workshops.
                ),
                'orderby' => 'date',
                'post__not_in' => $current_id,
                'posts_per_page' => 4 - $resources_count,
                'post_type' => 'post',
                'tag_slug__in' => $current_tags_slugs,
            );

            $related_posts = new WP_Query($args);

            if ($related_posts->have_posts()) : while ($related_posts->have_posts()) : $related_posts->the_post();

                    lawyerist_get_post_card('', '', '', true);

                endwhile;
                wp_reset_postdata();
            endif;
        }

        echo '</div>';
    }
}
}

/* ------------------------------
Remove Inline Width from Image Captions

At some point I decided this looked dumb. ¯\_(ツ)_/¯
------------------------------ */

function lawyerist_remove_caption_padding($width) {
return $width - 10;
}

add_filter('img_caption_shortcode_width', 'lawyerist_remove_caption_padding');


/* ------------------------------
Featured Images in RSS Feeds

Adds featured images to RSS feeds.
------------------------------ */

function featuredtoRSS($content) {

global $post;

if (has_post_thumbnail($post->ID)) {
    $content = '' . get_the_post_thumbnail($post->ID, 'large', array('style' => 'display:block; height:auto; margin:0 0 15px 0; width:560px;')) . '' . $content;
}

return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');


/* ------------------------------
Remove Default Gallery Styles

I guess I didn't like these. ¯\_(ツ)_/¯
------------------------------ */

add_filter('use_default_gallery_style', '__return_false');


/* COMMENTS & REVIEWS ******** */

/* ------------------------------
Partner Reviews: In-line Responses
------------------------------ */
/** Enqueue 'comment_reply_link() scripts' */
function wpse289875_enqueue_comments_reply() {
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'comment_form_before', 'wpse289875_enqueue_comments_reply' );

/* ------------------------------
Custom Default Gravatar
------------------------------ */

function lawyerist_custom_gravatar($avatar_defaults) {

$lawyerist_avatar = get_bloginfo('template_directory') . '/images/lawyerist-default-avatar.png';
$avatar_defaults[$lawyerist_avatar] = "Lawyerist Insider";

return $avatar_defaults;
}

add_filter('avatar_defaults', 'lawyerist_custom_gravatar');


/* ------------------------------
Show Commenter's First Name & Initial
------------------------------ */

function lawyerist_comment_author_name($author = '') {

$comment = get_comment($comment_ID);

if (!empty($comment->comment_author)) {

    if (!empty($comment->user_id)) {

        $user = get_userdata($comment->user_id);
        $author = $user->first_name . ' ' . substr($user->last_name, 0, 1) . '.';
    } else {

        $author = $comment->comment_author;
    }
} else {

    $author = __('Anonymous');
}

return $author;
}

add_filter('get_comment_author', 'lawyerist_comment_author_name', 10, 1);


/* ------------------------------
Reviews
------------------------------ */

// Modify WP Review Pro JSON schema output.
function lwyrst_wp_review_pro_schema($output, $review) {

if (( is_single() || is_page() ) && !is_product_portal()) {

    $schema_json = strip_tags($output);
    $schema_obj = json_decode($schema_json);

    $schema_obj->{ '@type' } = $schema_obj->itemReviewed->{ '@type' };
    $schema_obj->name = get_the_title();

    $post_id = get_the_ID();
    $parent_id = wp_get_post_parent_id($post_id);

    $schema_obj->description = get_the_title($parent_id);

    $schema_obj->review = new StdClass();
    $schema_obj->review->{ '@type' } = 'Review';

    $schema_obj->review->author = new StdClass();
    $schema_obj->review->author->{ '@type' } = get_the_author_meta('display_name') == 'Lawyerist' ? 'Organization' : 'Person';
    $schema_obj->review->author->name = get_the_author_meta('display_name');

    switch ($schema_obj->{ '@type' }) {

        case 'SoftwareApplication':

            $post_id = get_the_ID();
            $parent_id = wp_get_post_parent_id($post_id);

            $schema_obj->applicationCategory = get_the_title($parent_id);

            unset($schema_obj->reviewBody);

            break;

        case 'Product':

            $schema_obj->review->reviewBody = get_the_excerpt();

            break;
    }


    $our_rating = lwyrst_get_our_rating();
    $rating_count = lwyrst_get_community_review_count();

    if (!empty($our_rating)) {
        $rating_count++;
    }

    $schema_obj->aggregateRating = new stdClass();
    $schema_obj->aggregateRating->{ '@type' } = 'AggregateRating';
    $schema_obj->aggregateRating->ratingValue = lwyrst_get_composite_rating();
    $schema_obj->aggregateRating->bestRating = 5;
    $schema_obj->aggregateRating->ratingCount = $rating_count;

    unset($schema_obj->author);
    unset($schema_obj->reviewRating);
    unset($schema_obj->itemReviewed);

    if (version_compare(phpversion(), '7.1', '>=')) {
        ini_set('serialize_precision', -1);
    }

    $output = '<script type="application/ld+json">' . PHP_EOL;
    $output .= wp_json_encode($schema_obj, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL;
    $output .= '</script>' . PHP_EOL;

    return $output;
} else {

    return false;
}
}

add_filter('wp_review_get_schema', 'lwyrst_wp_review_pro_schema', 10, 2);

// Gets the author rating ("our" rating) from WP Review Pro, and converts it
// from a 10-point scale to a 5-point scale. Rounds to one decimal point.
function lwyrst_get_our_rating($product_id = null) {

if (!$product_id) {
    global $post;
    $product_id = get_the_ID();
}

$our_rating_raw = get_post_meta($product_id, 'wp_review_total', true);
$our_rating = round(floatval($our_rating_raw) / 2, 1);

return $our_rating;
}

// Gets the comments rating ("community" rating) from WP Review Pro. Rounds to
// one decimal point.
function lwyrst_get_community_rating($product_id = null) {

if (!$product_id) {
    global $post;
    $product_id = get_the_ID();
}
$comm_rating_raw = get_post_meta($product_id, 'wp_review_comments_rating_value', true);
if ( is_numeric($comm_rating_raw) ) :
    $community_rating = round(get_post_meta($product_id, 'wp_review_comments_rating_value', true), 1);

    return $community_rating;
else :
    return;
endif;
}

// Gets the number of comment reviews ("community" reviews) from WP Review Pro.
function lwyrst_get_community_review_count($product_id = null) {
    if (!$product_id) {
        global $post;
        $product_id = $post->ID;
    }
    $comments = get_approved_comments( $product_id );
    $i = 0;
    $community_review_count = 0;

    foreach( $comments as $comment ){
        $rate = get_comment_meta( $comment->comment_ID, 'wp_review_comment_rating', true );

        if ($rate > 0) {
            $i++;
            $community_review_count = $i;
        }
    }
    return intval($community_review_count);
}


// Calculates the composite rating. If only one rating exists, that rating is
// returned. If both ratings exist, it combines them. The output is rounded to
// one decimal point.
function lwyrst_get_composite_rating($product_id = null) {

if (!$product_id) {
    global $post;
    $product_id = $post->ID;
}

$our_rating = lwyrst_get_our_rating($product_id);
$community_rating = lwyrst_get_community_rating($product_id);
$community_review_count = lwyrst_get_community_review_count($product_id);

if (!empty($our_rating) && !empty($community_rating)) {

    // Updated in May 2021 ----
    // For all number of reviews:  If our rating and two or more community ratings exist,
    // our rating is calculated at two thirds of the average.
    $composite_rating = round(( ( $our_rating * 2 ) + $community_rating ) / 3, 1);

} elseif (!empty($our_rating) && empty($community_rating)) {

    $composite_rating = round($our_rating, 1);
} elseif (empty($our_rating) && !empty($community_rating)) {

    $composite_rating = round($community_rating, 1);
} else {

    return;
}

return $composite_rating;
}

/**
* Displays the star rating, rating, and number of reviews. Includes
* aggregateRating schema on the assumption that the necessary opening and
* closing schema tags will be included in the page template. Also used in our
* Lawyerist Shortcodes plugin.
*
* @param string $rating_type Optional. Accepts 'our_rating' and
* 'community_rating'.
*/
function lwyrst_product_rating($rating_type = null) {

switch ($rating_type) {

    case 'our_rating':

        $rating = lwyrst_get_our_rating();
        $rating_count = 1;
        break;

    case 'community_rating':

        $rating = lwyrst_get_community_rating();
        $rating_count = lwyrst_get_community_review_count();
        break;

    default:

        $rating = lwyrst_get_composite_rating();
        $our_rating = lwyrst_get_our_rating();

        if (!empty($our_rating)) {
            $rating_count = intval(lwyrst_get_community_review_count()) + 1;
        } else {
            $rating_count = intval(lwyrst_get_community_review_count());
        }

        break;
}

ob_start();

echo lwyrst_star_rating($rating);
?>

<span><?php echo $rating; ?>/5 (based on <?php echo $rating_count; ?> <?php echo _n('rating', 'ratings', $rating_count); ?>)</span>

<?php
return ob_get_clean();
}

function lwyrst_product_rating_productx($rating_type = null) {

switch ($rating_type) {

case 'our_rating':

    $rating = lwyrst_get_our_rating();
    $rating_count = 1;
    break;

case 'community_rating':

    $rating = lwyrst_get_community_rating();
    $rating_count = lwyrst_get_community_review_count();
    break;

default:

    $rating = lwyrst_get_composite_rating();
    $our_rating = lwyrst_get_our_rating();

    if (!empty($our_rating)) {
        $rating_count = intval(lwyrst_get_community_review_count()) + 1;
    } else {
        $rating_count = intval(lwyrst_get_community_review_count());
    }

    break;
}

ob_start();

echo "<div>" . lwyrst_star_rating($rating) . " " . $rating . "/5" . "</div>";
?>

<span>Based on <?php echo $rating_count; ?> <?php echo _n('rating', 'ratings', $rating_count); ?></span>

<?php
return ob_get_clean();
}

/**
* Outputs the star rating.
*
* @param int $rating Optional. Defaults to composite rating.
*/
function lwyrst_star_rating($rating = null) {

if (!$rating) {
    $rating = lwyrst_get_composite_rating();
}

$star_rating_width = ( $rating / 5 ) * 100;

ob_start();

echo '<div class="lawyerist-star-rating">';

echo '<div class="lawyerist-star-rating-wrapper">';

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

echo '</div>';

echo '</div>';

$lwyrst_star_rating = ob_get_clean();

return $lwyrst_star_rating;
}

/* ------------------------------
  Trial Buttons – (2021 Update)
------------------------------ */
function lwyrst_new_trial_btn($title) {
    ob_start();

    if ( check_sponsors() == true ) :
        $country  = get_country();
        $product_page_id = get_the_ID();
        $insert_title = $title;

        if ( ( $country == ( 'US' || 'CA' ) ) && has_trial_button( $product_page_id ) ) { ?>
            <div class="color-cta">
                <div class="cta-button" style="background: <?php the_field('partner_color'); ?>">
                    <?php echo trial_button($product_page_id); ?>
                    <div class="arrow">
                        <svg id="right-arrow" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 198.68 143.5" fill="#FFFFFF"><path id="Path_632" data-name="Path 632" d="M194.42,95.93q-20.07,16-40.19,31.94c-11.65,9.19-23.39,18.24-35.13,27.31-.36.29-1.13,0-2.1,0v-5.63c0-7,.09-14,0-21a27.23,27.23,0,0,0-.61-3.93,128,128,0,0,0-28.74,1.2,138.16,138.16,0,0,0-58.54,23.56A270.72,270.72,0,0,0,4,169.41c-.87.77-1.58,2-3.27,1.44a48,48,0,0,1,1.52-16.44,116.36,116.36,0,0,1,66.56-84,141.71,141.71,0,0,1,43.33-11.89c1.88-.22,3.76.17,5.47-1.88.13-9,.28-18.48.45-29.16,1.87,1.24,3,1.88,3.87,2.54C148,49.92,173.09,71,199.27,91.48,197.42,93.13,196,94.59,194.42,95.93Z" transform="translate(-0.58 -27.5)" style="fill-rule:evenodd"/></svg>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="color-cta">
                <div class="cta-button" style="background: <?php the_field('partner_color'); ?>">
                    <a class="button trial-button visit-site" href="<?php echo trial_button_url(); ?>" target="_blank" title="Visit Website" title="<?php echo $title; ?>">Visit <?php echo $title; ?></a>
                    <div class="arrow">
                        <svg id="right-arrow" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 198.68 143.5" fill="#FFFFFF"><path id="Path_632" data-name="Path 632" d="M194.42,95.93q-20.07,16-40.19,31.94c-11.65,9.19-23.39,18.24-35.13,27.31-.36.29-1.13,0-2.1,0v-5.63c0-7,.09-14,0-21a27.23,27.23,0,0,0-.61-3.93,128,128,0,0,0-28.74,1.2,138.16,138.16,0,0,0-58.54,23.56A270.72,270.72,0,0,0,4,169.41c-.87.77-1.58,2-3.27,1.44a48,48,0,0,1,1.52-16.44,116.36,116.36,0,0,1,66.56-84,141.71,141.71,0,0,1,43.33-11.89c1.88-.22,3.76.17,5.47-1.88.13-9,.28-18.48.45-29.16,1.87,1.24,3,1.88,3.87,2.54C148,49.92,173.09,71,199.27,91.48,197.42,93.13,196,94.59,194.42,95.93Z" transform="translate(-0.58 -27.5)" style="fill-rule:evenodd"/></svg>
                    </div>
                </div>
            </div>
        <?php }
    endif;

    return ob_get_clean();
}

/* ------------------------------
Partner Reviews: In-line Responses
------------------------------ */
/**
*  Purpose: Add the ability to respond directly to reviews,
*  only on a partner's product page
*/

//add_filter( 'wpseo_remove_reply_to_com', 'false' );


/*
* Change the comment reply link to use 'Reply to <Author First Name>'
*/
function add_comment_author_to_reply_link($link, $args, $comment){

$comment = get_comment( $comment );

// If no comment author is blank, use 'Anonymous'
if ( empty($comment->comment_author) ) {
    if (!empty($comment->user_id)){
        $user=get_userdata($comment->user_id);
        $author=$user->user_login;
    } else {
        $author = __('Anonymous');
    }
} else {
    $author = $comment->comment_author;
}

// If the user provided more than a first name, use only first name
if(strpos($author, ' ')){
    $author = substr($author, 0, strpos($author, ' '));
}

// Replace Reply Link with "Reply to <Author First Name>"
$reply_link_text = $args['reply_text'];
$link = str_replace($reply_link_text, 'Reply to ' . $author, $link);

return $link;
}
add_filter('comment_reply_link', 'add_comment_author_to_reply_link', 10, 3);


/* GRAVITY FORMS ************* */

/* ------------------------------
Enable CC Field on Form Notifications.
------------------------------ */

function gf_enable_cc($enable, $notification, $form) {
return true;
}

add_filter('gform_notification_enable_cc', 'gf_enable_cc', 10, 3);


/* ------------------------------
Populate Form Fields
------------------------------ */

function populate_fields($value, $field, $name) {

global $post;

$post_title = the_title('', '', FALSE);

$user_ID = get_current_user_id();

$discount_descr = get_field('affinity_discount_descr');
$availability = get_field('affinity_availability');
$workflow = get_field('affinity_workflow');
$claim_url = get_field('affinity_claim_url');
$claim_code = get_field('affinity_claim_code');
$notification_email = get_field('affinity_notification_email');

switch ($availability) {

    case $availability == 'new_only':

        $whom = 'new ' . $post_title . ' customers only';
        break;

    case $availability == 'old_only':

        $whom = 'existing ' . $post_title . ' customers only';
        break;

    case $availability == 'both_new_and_old':

        $whom = 'both new and existing ' . $post_title . ' customers';
        break;
}

$values = array(
    'user-id' => $user_ID,
    'affinity-discount' => $discount_descr,
    'affinity-availability' => $whom,
    'affinity-workflow' => $workflow,
    'affinity-claim-url' => $claim_url,
    'affinity-claim-code' => $claim_code,
    'affinity-notification-email' => $notification_email,
);

return isset($values[$name]) ? $values[$name] : $value;
}

add_filter('gform_field_value', 'populate_fields', 10, 3);


/* ------------------------------
Auto-Login New Users
------------------------------ */

function lawyerist_gf_registration_autologin($user_id, $user_config, $entry, $password) {

$user = get_userdata($user_id);
$user_login = $user->user_login;
$user_password = $password;

$user->set_role(get_option('default_role', 'subscriber'));

wp_signon(array(
    'user_login' => $user_login,
    'user_password' => $user_password,
    'remember' => true,
));
}

add_action('gform_user_registered', 'lawyerist_gf_registration_autologin', 10, 4);


/* ------------------------------
LAB Inquiry Form
------------------------------ */
// Writen by Darin Short at darin@ShortResults.com
//
add_action("gform_pre_submission_72", "pre_submission_handler", 10, 2);

function pre_submission_handler( $form ) {

    // Get Question Answers
    $labq1 = rgpost( 'input_6' );
    $labq2 = rgpost( 'input_7' );
    $labq3 = rgpost( 'input_8' );

    if (($labq1 == "Yes") && ($labq2  == "Yes") && ($labq3 == "Paid")) {
        $routing = "One";
    } elseif (($labq1 == "Yes") && ($labq2  == "No") && ($labq3 == "Paid")) {
        $routing = "Two";
    } elseif (($labq1 == "No") && ($labq2  == "Yes") && ($labq3 == "Paid")) {
        $routing = "Three";
    } elseif (($labq1 == "No") && ($labq2  == "No") && ($labq3 == "Paid")) {
        $routing = "Four";
    } elseif (($labq1 == "Yes") && ($labq2  == "Yes") && ($labq3 == "Free")) {
        $routing = "Five";
    } elseif (($labq1 == "Yes") && ($labq2  == "No") && ($labq3 == "Free")) {
        $routing = "Six";
    } elseif (($labq1 == "No") && ($labq2  == "Yes") && ($labq3 == "Free")) {
        $routing = "Seven";
    } elseif (($labq1 == "No") && ($labq2  == "No") && ($labq3 == "Free")) {
        $routing = "Eight";
    } else {
        $routing = "Free";
    };

    $_POST['input_5'] = $routing;
};


/* TAXONOMY ****************** */

/* ------------------------------
Page Type Custom Taxonomy
------------------------------ */

// Register Custom Taxonomy
function page_type_tax() {

$labels = array(
    'name' => 'Page Types',
    'singular_name' => 'Page Type',
    'menu_name' => 'Page Types',
    'all_items' => 'Page Types',
    'parent_item' => 'Parent Page Type',
    'parent_item_colon' => 'Parent Page Type:',
    'new_item_name' => 'New Page Type',
    'add_new_item' => 'Add New Page Type',
    'edit_item' => 'Edit Page Type',
    'update_item' => 'Update Page Type',
    'view_item' => 'View Page Type',
    'separate_items_with_commas' => 'Separate page types with commas',
    'add_or_remove_items' => 'Add or remove page types',
    'choose_from_most_used' => 'Choose from the most used page types',
    'popular_items' => 'Popular Page Types',
    'search_items' => 'Search Page Types',
    'not_found' => 'Page Type Not Found',
    'no_terms' => 'No page types',
    'items_list' => 'Page type list',
    'items_list_navigation' => 'Page type list navigation',
);

$args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_in_rest' => true,
    'show_tagcloud' => false,
);

register_taxonomy('page_type', array('page'), $args);
}

add_action('init', 'page_type_tax', 0);

/* ------------------------------
Product Category Custom Taxonomy
------------------------------ */

// Register Custom Taxonomy
function product_category_tax() {

$labels = array(
    'name' => 'Product Categories',
    'singular_name' => 'Product Category',
    'menu_name' => 'Product Categories',
    'all_items' => 'Product Categories',
    'parent_item' => 'Parent Product Category',
    'parent_item_colon' => 'Parent Product Category:',
    'new_item_name' => 'New Product Category',
    'add_new_item' => 'Add New Product Category',
    'edit_item' => 'Edit Product Category',
    'update_item' => 'Update Product Category',
    'view_item' => 'View Product Category',
    'separate_items_with_commas' => 'Separate Product Categories with commas',
    'add_or_remove_items' => 'Add or remove Product Categories',
    'choose_from_most_used' => 'Choose from the most used Product Categories',
    'popular_items' => 'Popular Product Categories',
    'search_items' => 'Search Product Categories',
    'not_found' => 'Product Category Not Found',
    'no_terms' => 'No Product Categories',
    'items_list' => 'Product Category list',
    'items_list_navigation' => 'Product Category list navigation',
);

$args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_in_rest' => true,
    'show_tagcloud' => false,
);

register_taxonomy('product_category', array('page'), $args);
}

add_action('init', 'product_category_tax', 0);



/*
* Create a Prefetch to all script dependencies
*/

function dns_prefetch_to_preconnect( $urls, $relation_type ) {
global $wp_scripts, $wp_styles;

$unique_urls = array();

foreach ( array( $wp_scripts, $wp_styles ) as $dependencies ) {
    if ( $dependencies instanceof WP_Dependencies && ! empty( $dependencies->queue ) ) {
        foreach ( $dependencies->queue as $handle ) {
            if ( ! isset( $dependencies->registered[ $handle ] ) ) {
                continue;
            }

            $dependency = $dependencies->registered[ $handle ];
            $parsed     = wp_parse_url( $dependency->src );

            if ( ! empty( $parsed['host'] ) && ! in_array( $parsed['host'], $unique_urls ) && $parsed['host'] !== $_SERVER['SERVER_NAME'] ) {
                $unique_urls[] = $parsed['scheme'] . '://' . $parsed['host'];
            }
        }
    }
}

if ( 'dns-prefetch' === $relation_type ) {
    $urls = [];
}

if ( 'preconnect' === $relation_type ) {
    $urls = $unique_urls;
}

return $urls;
}
add_filter( 'wp_resource_hints', 'dns_prefetch_to_preconnect', 0, 2 );

/*
* Page Speed Optimization
*/
/*function rockintuit_move_jquery_to_footer() {
if(!is_admin()){
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);

add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
}
}
add_action( 'wp_enqueue_scripts', 'rockintuit_move_jquery_to_footer' );*/

    //** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
$existing_mimes['webp'] = 'image/webp';
return $existing_mimes;
}

add_filter('mime_types', 'webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
if ($result === false) {
    $displayable_image_types = array(IMAGETYPE_WEBP);
    $info = @getimagesize($path);

    if (empty($info)) {
        $result = false;
    } elseif (!in_array($info[2], $displayable_image_types)) {
        $result = false;
    } else {
        $result = true;
    }
}

return $result;
}

add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/*
* Remove Script Type attribute
*/
add_action(
    'after_setup_theme',
    function() {
add_theme_support('html5', ['script', 'style']);
}
);
add_filter('style_loader_tag', 'rockintuit_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'rockintuit_remove_type_attr', 10, 2);

function rockintuit_remove_type_attr($tag, $handle) {
return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}


/*
* remove unneeded style sheets
*/
add_action('wp_enqueue_scripts', 'deregister_site_plugin_styles', 10);

function deregister_site_plugin_styles() {
wp_dequeue_style('wc-block-style');
wp_dequeue_style('wc-block-style');
wp_dequeue_style('wc-block-style');
//wp_dequeue_style('wc-memberships-frontend');
wp_dequeue_style('ld-content-cloner');
wp_dequeue_style('monsterinsights-popular-posts-style');
/* Removed the dequeue of the following to fix style errors post-optimization */
//wp_dequeue_style('lpd-frontend-css');
//wp_dequeue_style('wp-block-library');
//wp_dequeue_style('gforms_reset_css');
//wp_dequeue_style('gforms_formsmain_css');
//wp_dequeue_style('gforms_ready_class_css');
//wp_dequeue_style('gforms_browsers_css');
//wp_dequeue_style('lprw-frontend-css');
//wp_dequeue_style('scorecard-helper-frontend-css');
}

/*
* Defer Parsing Javascript files
*/

function defer_parsing_of_js( $url ) {
if ( is_user_logged_in() ) return $url; //don't break WP Admin
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
if (strpos($url, 'jquery.min.js')) return $url;
return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/*
* Remove Comments Feed
*/
function remove_comment_feeds( $for_comments ){
if( $for_comments ){
    remove_action( 'do_feed_rss2', 'do_feed_rss2', 10, 1 );
    remove_action( 'do_feed_atom', 'do_feed_atom', 10, 1 );
}
}
add_action( 'do_feed_rss2', 'remove_comment_feeds', 9, 1 );
add_action( 'do_feed_atom', 'remove_comment_feeds', 9, 1 );
add_filter( 'feed_links_show_comments_feed', '__return_false' );


/** Fixing jQuery console error: Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

define('ABSPATH', dirname(__FILE__) . '/');

define('CONCATENATE_SCRIPTS', false);


/* Allow comments on pages to be exported */
add_filter('product_Comments_csv_product_export_args', 'wtproduct_Comments_csv_product_export_args');
function wtproduct_Comments_csv_product_export_args($args){
if(isset($args['post_type']) && $args['post_type'] == 'Post'){
    $args['post_type'] = 'Post,page';
}
return $args;
}

function paginateSearch(){
    global $wp_query;
    $searchPages = $wp_query -> max_num_pages;
    $theBig = 999999999;
    $paginateSearchArgs = array(

        'base' => str_replace($theBig,'%#%',esc_url (get_pagenum_link($theBigNumber))),
        'format' => '?page = %#%',
        'current' =>  max(1, get_query_var ('paged')),
        'total' => $searchPages,
        'orderby' => 'title',
        'order'   => 'DESC'

    );
    echo paginate_links($paginateSearchArgs);
}

function myprefix_search_posts_per_page( $query) {
    if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
        $query->set( 'posts_per_page', '10' );
    }
}
add_filter( 'pre_get_posts', 'myprefix_search_posts_per_page' );

function klf_acf_input_admin_footer() { ?>
    <script type="text/javascript">
        (function($) {
            acf.add_filter('color_picker_args', function( args, $field ){
            // add the hexadecimal codes here for the colors you want to appear as swatches
            args.palettes = ['#424B54', '#FF7062', '#88A2AA', '#86BA90', '#55868C', '#703D57']
            // return colors
            return args;
            });
        })(jQuery);
    </script>
<?php }
add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

function create_podcast_tag_tax() {
    $labels = [
        'name'          => __('Tags'),
        'singular_name' => __('Tag'),
        'all_items'     => __('All Tags'),
        'edit_item'     => __('All Tags'),
        'view_item'     => __('View Tag'),
        'update_item'   => __('Update Tag'),
        'add_new_item'  => __('Add New Tag'),
    ];
    $args = array(
        'labels' => $labels,
        'rewrite' => array(
            'slug' => 'podcasts/tag',
            'with_front'    => false
        ),
        'with_front'    => false,
        'hierarchical' => false,
    );
    register_taxonomy( 'podcast-tag', ['podcasts'], $args );
}
add_action( 'init', 'create_podcast_tag_tax' );



/// Zack Changes April & May 2023
//create new column in Posts for Featured Image
add_filter( 'manage_posts_columns', 'set_custom_edit_post_columns' );
function set_custom_edit_post_columns($columns) {
	$columns['featured_img'] = __( 'Featured Image');


    return $columns;
}



// Add the data to the custom columns for Posts:
add_action( 'manage_posts_custom_column' , 'custom_post_column', 10, 2 );
function custom_post_column( $column, $post_id ) {
    switch ( $column ) {

        case 'featured_img' :
            $thumbnail = get_the_post_thumbnail($post_id, 'thumbnail');
			echo $thumbnail;
			break;
    }
}

// Add Excerpts to Pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Add Custom Purchase Logic
function check_if_customer() {
    //switch_to_blog(2); // Switch to /online/

    $current_user = get_current_user_id(); // 15050
    $customer_list = array();
    $is_customer;

    $customer_query = new WP_User_Query(
        array(
            'fields' => 'ID',
        )
    );
    $customers = $customer_query->get_results();

    foreach ( $customers as $customer ) {
        array_push($customer_list, $customer);
    }

    if ( in_array( $current_user, $customer_list ) ) {
        $is_customer = true;
        return $is_customer;
    } else {
        $is_customer = false;
        return $is_customer;
    }
    //restore_current_blog();
}

add_filter( 'gform_username_106', 'auto_username', 10, 4 );
add_filter( 'gform_username_107', 'auto_username', 10, 4 );
function auto_username( $username, $feed, $form, $entry ) {

	//$username = strtolower( rgar( $entry, '2.3' ) . rgar( $entry, '2.6' ) );
	$username = sanitize_user( current( explode( '@', $username ) ), true ) . random_int(100000, 999999);

	if ( empty( $username ) ) {
		return $username;
	}

	if ( ! function_exists( 'username_exists' ) ) {
		require_once( ABSPATH . WPINC . '/registration.php' );
	}

	if ( username_exists( $username ) ) {
		$i = 2;
		while ( username_exists( $username . $i ) ) {
			$i++;
		}
		$username = $username . $i;
	};

	return $username;
}

function podcasteditor_add_cap(){
    $role = get_role( 'podcasteditor' );

    if( $role ){
        $role->add_cap( 'unfiltered_html' );
    }
}
add_action( 'init', 'podcasteditor_add_cap' );

// Remove KSES if user has unfiltered_html cap
function umc_custom_kses_init() {
    if ( current_user_can( 'unfiltered_html' ) ) {
		kses_remove_filters();
    }
}
add_action( 'init', 'umc_custom_kses_init', 11 );
add_action( 'set_current_user', 'umc_custom_kses_init', 11 );

function comment_text_wrap($comment_text) {
    return '<div class="comment-wrapper">' . $comment_text . '</div>';
}
add_filter( 'comment_text', 'comment_text_wrap' );

//partners dashboard action
function google_storage_cron() {
    require ABSPATH . 'wp-content/plugins/lawyerist-partner-dashboards/resources/google-storage-bucket/get-google-storage-bucket.php';
}
add_action('call_google_storage_function', 'google_storage_cron');


/** Custom Error Page */
function custom_comment_error( $message, $title='', $args=array() ) {
    $errorTemplate = get_theme_root().'/'.get_template().'/page-comment-error.php';
    $defaults = array( 'response' => 500 );
    $r = wp_parse_args($args, $defaults);
  
    $have_gettext = function_exists('__');
  
    if ( function_exists( 'is_wp_error' ) && is_wp_error( $message ) ) {
      if ( empty( $title ) ) {
        $error_data = $message->get_error_data();
        if ( is_array( $error_data ) && isset( $error_data['title'] ) )
          $title = $error_data['title'];
      }
      $errors = $message->get_error_messages();
      switch ( count( $errors ) ) {
      case 0 :
        $message = '';
        break;
      case 1 :
        $message = "<p>{$errors[0]}</p>";
        break;
      default :
        $message = "<ul>\n\t\t<li>" . join( "</li>\n\t\t<li>", $errors ) . "\n\t";
        break;
      }
  
    } elseif ( is_string( $message ) ) {
      $message = "<p>$message</p>";
    }
  
    require_once( $errorTemplate );
    die();
  }
  function get_custom_comment_error() {
    return 'custom_comment_error';
  }
  add_filter( 'wp_die_handler', 'get_custom_comment_error' );

  
  	// Add template column to page list in wp-admin
	function page_column_views( $defaults ) {
		$defaults['page-layout'] = __('Template');
		return $defaults;
	}
	add_filter( 'manage_pages_columns', 'page_column_views' );

	function page_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'page-layout' ) {
			$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $set_template == 'default' ) {
				echo 'Default';
			}
			$templates = get_page_templates();
			ksort( $templates );
			foreach ( array_keys( $templates ) as $template ) :
				if ( $set_template == $templates[$template] ) echo $template;
			endforeach;
		}
	}
	add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );

          //// Changes for Small Firm Services

    // Register Small Firm Services Custom Post Type
function small_firm_service_cpt() {

	$labels = array(
		'name'                  => _x( 'Small Firm Services', 'Post Type General Name', 'lawyerist-wp-updated' ),
		'singular_name'         => _x( 'Small Firm Service', 'Post Type Singular Name', 'lawyerist-wp-updated' ),
		'menu_name'             => __( 'Small Firm Service', 'lawyerist-wp-updated' ),
		'name_admin_bar'        => __( 'Small Firm Service', 'lawyerist-wp-updated' ),
		'archives'              => __( 'Small Firm Service Archives', 'lawyerist-wp-updated' ),
		'attributes'            => __( 'Small Firm Service Attributes', 'lawyerist-wp-updated' ),
		'parent_item_colon'     => __( 'Parent Service:', 'lawyerist-wp-updated' ),
		'all_items'             => __( 'All Services', 'lawyerist-wp-updated' ),
		'add_new_item'          => __( 'Add New Service', 'lawyerist-wp-updated' ),
		'add_new'               => __( 'Add New', 'lawyerist-wp-updated' ),
		'new_item'              => __( 'New Service', 'lawyerist-wp-updated' ),
		'edit_item'             => __( 'Edit Service', 'lawyerist-wp-updated' ),
		'update_item'           => __( 'Update Service', 'lawyerist-wp-updated' ),
		'view_item'             => __( 'View Service', 'lawyerist-wp-updated' ),
		'view_items'            => __( 'View Services', 'lawyerist-wp-updated' ),
		'search_items'          => __( 'Search Services', 'lawyerist-wp-updated' ),
		'not_found'             => __( 'Not found', 'lawyerist-wp-updated' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lawyerist-wp-updated' ),
		'featured_image'        => __( 'Featured Image', 'lawyerist-wp-updated' ),
		'set_featured_image'    => __( 'Set featured image', 'lawyerist-wp-updated' ),
		'remove_featured_image' => __( 'Remove featured image', 'lawyerist-wp-updated' ),
		'use_featured_image'    => __( 'Use as featured image', 'lawyerist-wp-updated' ),
		'insert_into_item'      => __( 'Insert into service', 'lawyerist-wp-updated' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'lawyerist-wp-updated' ),
		'items_list'            => __( 'Small Firm Service list', 'lawyerist-wp-updated' ),
		'items_list_navigation' => __( 'Small Firm Services list navigation', 'lawyerist-wp-updated' ),
		'filter_items_list'     => __( 'Filter services list', 'lawyerist-wp-updated' ),
	);
	$rewrite = array(
		'slug'                  => 'small-firm-service',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Small Firm Service', 'lawyerist-wp-updated' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7.3,
		'menu_icon'             => 'dashicons-superhero-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => 'small_firm_service',
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'small_firm_service', $args );

}

add_action( 'init', 'small_firm_service_cpt', 0 );

/* ACF Register Blocks */
function postali_register_acf_blocks() {
    register_block_type( __DIR__ . '/gutenberg-blocks/relevant-object' );

    //wp_enqueue_style( 'blocks-styles', '/wp-content/themes/postali-child/blocks/assets/css/styles.css' ); // Enqueue Child theme style sheet (theme info)
}
add_action( 'init', 'postali_register_acf_blocks' );


function prefix_default_page_template( $settings ) {
    $settings['defaultBlockTemplate'] = file_get_contents( get_theme_file_path( 'page-gutenberg-block.php' ) );
    return $settings;
}
add_filter( 'block_editor_settings_all', 'prefix_default_page_template' );