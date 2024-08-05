<?php  function unhook_parent_style() {

    wp_dequeue_style( 'stylesheet' );
    wp_deregister_style( 'stylesheet' );

    wp_dequeue_script( 'footer-scripts' );
    wp_deregister_script( 'footer-scripts' );

}
add_action( 'wp_enqueue_scripts', 'unhook_parent_style', 20 );

function child_stylesheets_scripts() {
    
    $stylesheet_dir_uri = get_stylesheet_directory_uri();

    // Normalize the default styles. From https://github.com/necolas/normalize.css/
    wp_register_style('child-normalize-css', $stylesheet_dir_uri . '/assets/css/normalize.css');
    wp_enqueue_style('child-normalize-css');

    // Enqueue fonts
    wp_enqueue_style('child-adobe-fonts', 'https://use.typekit.net/ejl6tzh.css');

    // Enqueue icons
    wp_register_style('child-icon-stylesheet', "https://cdn.icomoon.io/152819/Lawyerist-NEW/style-cf.css?irhd5h" );
    wp_enqueue_style('child-icon-stylesheet'); // Enqueue styles for svg icons
    
    // Load the main stylesheet.
    wp_register_style('child-stylesheet', $stylesheet_dir_uri . '/assets/css/styles.css', array(), 'all');
    wp_enqueue_style('child-stylesheet');
    
    wp_enqueue_style( 'css-circular-prog-bar', $stylesheet_dir_uri .  '/assets/css/css-circular-prog-bar.css', array(), 'all');

    // Load consolidated scripts in the footer.
    wp_register_script('child-cookies', $stylesheet_dir_uri . '/assets/js/cookies.js', array('jquery'), true);
    wp_enqueue_script('child-cookies');

    wp_register_script('child-scripts', $stylesheet_dir_uri . '/assets/js/dashboard-scripts.js', array('jquery'), true);
    wp_enqueue_script('child-scripts');
}

add_action('wp_enqueue_scripts', 'child_stylesheets_scripts');

/* ------------------------------
  Lab Dashboard
  ------------------------------ */
    require_once dirname( __FILE__ ) . '/includes/labsters-cpt.php'; // Custom Post Type Case Results

    // New ACF Options Page
    add_action('acf/init', 'my_acf_op_lab');

    function my_acf_op_lab() {

        $parent = 'lab-dashboard';

        acf_add_options_sub_page(array(
            'page_title' => 'Edit Lab Dashboard',
            'menu_title' => 'Edit',
            'menu_slug' => 'edit-lab-fields',
            'parent_slug' => $parent
        ));
    }

    /**
     * Register a custom menu page.
     */
    function wpdocs_register_lab_db_menu_page(){
        //The icon in Base64 format
        $icon_base64 = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI1LjIuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNOS44MywyLjhjMC4yMSwwLDAuMzktMC4xNywwLjM5LTAuMzljMC0wLjIxLTAuMTctMC4zOS0wLjM5LTAuMzlTOS40NCwyLjIsOS40NCwyLjQyQzkuNDQsMi42Myw5LjYxLDIuOCw5LjgzLDIuOHoiLz4KCTxwYXRoIGQ9Ik0xMC45OCwxLjQ5YzAuMzYsMCwwLjY1LTAuMjksMC42NS0wLjY1cy0wLjI5LTAuNjUtMC42NS0wLjY1Yy0wLjM2LDAtMC42NSwwLjI5LTAuNjUsMC42NVMxMC42MiwxLjQ5LDEwLjk4LDEuNDl6Ii8+Cgk8cG9seWdvbiBwb2ludHM9IjguMDEsMTIuMjkgMTMuODcsNC41IDQuODUsNC40OSA4LjA2LDcuMjggCSIvPgoJPHBhdGggZD0iTTgsMTcuNjFjMCwxLjI1LDEuMDIsMi4yNiwyLjI2LDIuMjZjMS4yNSwwLDIuMjYtMS4wMiwyLjI2LTIuMjZWOC4xNkw4LDE0LjEzVjE3LjYxeiBNMTEuOTEsMTcuNjEKCQljMCwwLjU2LTAuMjgsMS4wNi0wLjcxLDEuMzV2LTguMDNMMTEuOTEsMTBWMTcuNjF6IE04LjYyLDE0LjMzbDEuNDktMS45NnY2Ljg4Yy0wLjg0LTAuMDgtMS40OS0wLjc4LTEuNDktMS42NFYxNC4zM3oiLz4KPC9nPgo8L3N2Zz4K';
        $icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;

        global $lab_portal_admin;
        $lab_portal_admin = add_menu_page( 
            __( 'Lab Dashboard', 'lab-dashboard' ),
            'Lab Dashboard',
            'manage_options',
            'lab-dashboard',
            'my_admin_page_contents',
            $icon_data_uri,
            23
        ); 

    function create_labsters() {
        $atts = array(
            'membership'  => 223685,
            'product'  => null,

        );

        $users = array();

        if ( $atts[ 'membership' ] ) {

            $args = array(
            'post_type'				=> 'wc_user_membership',
            'post_status'			=> 'wcm-active',
            'post_parent'			=> $atts[ 'membership' ],
            'posts_per_page'	=> -1,
            );

            $user_query = new WP_Query( $args );

            if ( $user_query->have_posts() ) :

            while ( $user_query->have_posts() ) : $user_query->the_post();

                $member_id = get_the_author_meta( 'ID' );

                array_push( $users, array(
                'user_id'       => $member_id,
                'email'			    => get_the_author_meta( 'user_email' ),
                'first_name'    => get_the_author_meta( 'user_firstname' ),
                'last_name'     => get_the_author_meta( 'user_lastname' ),
                'practice_area' => get_field( 'primary_practice_area', 'user_' . $member_id ),
                'firm_name'     => get_field( 'firm_name', 'user_' . $member_id ),
                'city'          => get_field( 'firm_city', 'user_' . $member_id ) ? get_field( 'firm_city', 'user_' . $member_id ) : get_user_meta( $member_id, 'billing_city', true ),
                'state'         => get_field( 'firm_state', 'user_' . $member_id ) ? get_field( 'firm_state', 'user_' . $member_id ) : get_user_meta( $member_id, 'billing_state', true ),
                ) );

            endwhile; wp_reset_postdata();
            endif;

        } 

        $post_list = array();
        
        $post_args = array(
            'post_type'		    => 'labsters',
            'post_status'       =>  'publish',
            'posts_per_page'	=>  -1,
        );

        $post_query = new WP_Query( $post_args );

        if ( $post_query->have_posts() ) :
            while ( $post_query->have_posts() ) : $post_query->the_post();
                $post_id = get_the_id();
                $post_title = get_the_title();

                /*array_push( $post_list, array(
                    'post_id'       => $post_id,
                    'title'			=> $post_title,
                ) );*/
                array_push( $post_list, $post_title );
            endwhile;
        endif;

        foreach ($users as $user) {
            if( !empty( $user[ 'last_name' ] || $user[ 'first_name' ] ) ) {
                $fullname = $user[ 'first_name' ] . ' ' . $user[ 'last_name' ];
                $compare = in_array( $fullname, $post_list, true );
            }

            /*$test_fix = '“Lawyerist Lab” Plan Test User';
            $compare_test = ($fullname == $test_fix);
            var_dump($test_fix);
            var_dump($compare_test);
            if ( $fullname !== $test_fix || $fullname == $test_fix ) {
                $compare === true;
            }*/
            
            if ( $compare === false ) {
                $new = array(
                    'post_title' => $fullname,
                    'post_content' => $user['email'],
                    'post_status' => 'publish',
                    'post_type' => 'labsters'
                );

                $post_id = wp_insert_post( $new );
            }
        }
    }
    create_labsters();
    }
    add_action( 'admin_menu', 'wpdocs_register_lab_db_menu_page' );

    function my_admin_page_contents() { ?> 

        <div class="lp-admin-wrapper">
            <h1> <?php esc_html_e( 'Lab Dashboard', 'my_plugin_text_domain' ); ?> </h1>

            <h2>Navigating the Lab Dashboard:</h2>
            <p>Please refer to this walkthrough as needed – <a href="https://www.loom.com/share/1a55b923063c4bbda0eb2fad8ce1ca91">Lab Dashboard Walkthrough</a></p>

            <h2>Editing the Lab Dashboard:</h2>
            <strong>Editing Content:</strong>
            <ul>
                <li>Go to the "Edit" sub-menu</li>
                <li>Use the page to edit the appearance of tasks on the front and back-end of the site</li> 
            </ul>
            <strong>Editing Forms:</strong>
            <ul>
                <li>Content: Navigate to the Gravity Forms menu and the appropriate form to edit as needed. Note: do not delete any existing fields</li>
                <li>Notifications: Follow the instructions here – <a href="https://www.loom.com/share/92368556271443308d178f3e653d8f0e">Lab DB Submission Notifications</a></li>
                <li>Workflow: Please content Development for any Workflow-related requests</li>
            </ul>
        </div>
        
        <script>
            ( function( $ ) {
                /* Accordions */
                // Clicking on the accordion header title
                $(".accordions").on("click", ".accordions_title", function() {
                // will (slide) toggle the related panel.
                $(this).toggleClass("active").next().slideToggle();
                });

                /* Show Status Buttons */
                $(".unlock-button").on("change", ".switch", function() {
                    $(this).parents(".unlock-button").next().toggleClass('hidden');
                });

            })( jQuery );
        </script>
    <?php

}

/* ------------------------------
  Template Files
  ------------------------------ */

if (!is_admin()) {

    require_once( 'shortcodes.php' );
}

function dashboard_loginout($items, $args) {

    if (!function_exists('wc_memberships')) {
        return;
    }

    if ( $args->theme_location == 'header-nav-menu') {

        $user = wp_get_current_user();
        $user_ID = $user->ID;
        $roles = ( array ) $user->roles;    

        ob_start();
        ?>
        <li class="menu-item menu-item-account"><a href="/online/store/">Store</a></li>

        <li class="menu-item menu-item-account"><a href="/online/cart/">Cart</a></li>

        <li class="menu-item menu-item-account"><a href="/online/account/">Account</a></li>

        <?php $new_items = ob_get_clean();

        $items .= $new_items;
    } 
    return $items;
}

add_filter('wp_nav_menu_items', 'dashboard_loginout', 10, 2);

function dashboard_goback($items, $args) {

    if ( $args->theme_location == 'header-nav-menu') {

        $user_ID = get_current_user_id();

        ob_start();
        ?>
        <?php if ( is_user_logged_in() ): ?>
            <li class="menu-item menu-item-logout">

                <a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a>

            </li>
        <?php endif; ?>
        <li class="menu-item menu-item-goback">

            <a href="https://lawyerist.com" title="Back to Lawyerist.com" target="_blank">Back to Lawyerist.com</a>

        </li>
        <?php 
        $new_items = ob_get_clean();

        $items .= $new_items;
    } 
    return $items;
}

add_filter('wp_nav_menu_items', 'dashboard_goback', 10, 2);


/* ADMIN ******************* */

/* ------------------------------
  Remove Lab Workshops from Sitemap

  We don't want Google to index them becuase they are restricted to Lab members
  and there is no unrestricted content on the pages for Google to index.
  ------------------------------ */

/*function remove_workshops_from_sitemap($excluded_posts_ids) {

    $args = array(
        'fields' => 'ids',
        'post_type' => 'post',
        'category_name' => 'lab-workshops',
        'posts_per_page' => -1,
    );

    return array_merge($excluded_posts_ids, get_posts($args));
}

add_filter('wpseo_exclude_from_sitemap_by_post_ids', 'remove_workshops_from_sitemap');*/


/* ------------------------------
  Remove Lab Workshops from RSS Feed

  See above.
  ------------------------------ */

function remove_workshops_from_feed($query) {

    if ($query->is_feed()) {
        $query->set('post_type', 'post');
        $query->set('cat', '-43419');
    }

    return $query;
}

add_filter('pre_get_posts', 'remove_workshops_from_feed');


/* ------------------------------
  Labster Tech Pre-populate form
  ------------------------------ */
//Gets information from Google Sheet: Legal Tech Data (https://docs.google.com/spreadsheets/d/1tb8LzpMp0gKzBJGrEWm34qHS3UNlGqmP_RIAqTNPE9k/edit#gid=1348890195)
//Grabs information from First sheet and imports into options within Gravity Form #75
$location_form_id = '75';
add_filter( 'gform_pre_render_'.$location_form_id, 'populate_posts' );
add_filter( 'gform_pre_validation_'.$location_form_id, 'populate_posts' );
add_filter( 'gform_pre_submission_filter_'.$location_form_id, 'populate_posts' );
add_filter( 'gform_admin_pre_render_'.$location_form_id, 'populate_posts' );


function populate_posts( $form ) {
    $gSheet_form_ID = '1tb8LzpMp0gKzBJGrEWm34qHS3UNlGqmP_RIAqTNPE9k';
	$options = array(
		'LPMS' => array('$field_ID' => '2', '$column_name' => 'lpms', '$placeholder' => 'Select an LPMS', '$list_number' => '2'),
		'CRM' => array('$field_ID' => '4', '$column_name' => 'crm', '$placeholder' => 'Select a CRM', '$list_number' => '2'),
		'ClientPortals' => array('$field_ID' => '26', '$column_name' => 'clientportals', '$placeholder' => 'Select a Client Portal', '$list_number' => '2'),
		'ProjectManager' => array('$field_ID' => '17', '$column_name' => 'projectmgmt', '$placeholder' => 'Select a Project Manager', '$list_number' => '2'),
		'Scheduler' => array('$field_ID' => '15', '$column_name' => 'scheduling', '$placeholder' => 'Select a Scheduling App', '$list_number' => '2'),
		'DocumentManagement' => array('$field_ID' => '27', '$column_name' => 'docmgmt', '$placeholder' => 'Select a Document Manager', '$list_number' => '2'),
		'DocumentAssembly' => array('$field_ID' => '28', '$column_name' => 'documentassembly', '$placeholder' => 'Select a Document Creator', '$list_number' => '2'),
		'eSign' => array('$field_ID' => '19', '$column_name' => 'esign', '$placeholder' => 'Select an eSign App', '$list_number' => '2'),
		'EmailServer' => array('$field_ID' => '29', '$column_name' => 'emailserver', '$placeholder' => 'Select an Email Server', '$list_number' => '2'),
		'TimekeepingBilling' => array('$field_ID' => '10', '$column_name' => 'timekeepingbilling', '$placeholder' => 'Select Timekeeping & Billing Software', '$list_number' => '2'),
		'Accounting' => array('$field_ID' => '9', '$column_name' => 'accounting', '$placeholder' => 'Select Accounting Software', '$list_number' => '2'),
		'InterOfficeCom' => array('$field_ID' => '30', '$column_name' => 'interofficecom', '$placeholder' => 'Select an Inter-office Communication App', '$list_number' => '2'),
		'PhoneProvider' => array('$field_ID' => '21', '$column_name' => 'phones', '$placeholder' => 'Select a Phone Provider', '$list_number' => '2'),
		'VideoConference' => array('$field_ID' => '31', '$column_name' => 'videoconference', '$placeholder' => 'Select a Video Conference Provider', '$list_number' => '2'),
		'VirtualAssistant' => array('$field_ID' => '32', '$column_name' => 'virtualassistant', '$placeholder' => 'Select a Virtual Assistant', '$list_number' => '2'),
		'CreditCard' => array('$field_ID' => '24', '$column_name' => 'creditcardprocessor', '$placeholder' => 'Select a Credit Card Processor', '$list_number' => '2')
	);
	
	foreach($options as $option){
	//get data
    $url = 'https://spreadsheets.google.com/feeds/list/'.$gSheet_form_ID.'/'.$option['$list_number'].'/public/values?alt=json';
    $file = file_get_contents($url);
    $json = json_decode($file);
    $rows = $json->{'feed'}->{'entry'};

		//get all the same from sheet
		$names = array(); //store names in this array
		foreach($rows as $row) {
			$name = $row->{'gsx$'.$option['$column_name']}->{'$t'};
			array_push($names, $name); //push data
		}

		//Go through each form fields
		foreach ( $form['fields'] as $field ) {
			//check if field type is a select dropdown and id is correct
			if ( $field->type == 'select' && $field->id == $option['$field_ID']) {
				//add name and value to the option
				foreach($names as $single_name){
					$choices[] = array('text' => $single_name, 'value' => $single_name );
				}
				//Add a place holder
				$field->$option['$placeholder'];
				//Add the new names to the form choices
				$field->choices = $choices;
				//echo '<pre>'; print_r($choices); echo '</pre>';
				// Print out the contents of the array (troubleshooting only)
				unset($choices);

			}
		}
	}

    return $form; //return form
}

/* ------------------------------
  Labster Tech Audit Dropdown List Form 76
  ------------------------------ */
//from https://docs.gravityforms.com/gform_column_input/#examples
//creates dropdown selection in Current Technology List
add_filter( 'gform_column_input_76_1_4', 'set_column', 10, 5 );
function set_column( $input_info, $field, $column, $value, $form_id ) {
    return array( 'type' => 'select', 'choices' => 'Keep,Review,Discard' );
}

//creates dropdown selection in Future Technology List
add_filter( 'gform_column_input_76_3_4', 'set_column_2', 10, 5 );
function set_column_2( $input_info, $field, $column, $value, $form_id ) {
    return array( 'type' => 'select', 'choices' => 'Urgent,Need,Want' );
}

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
function get_lawyerist_login_db() {

    ob_start();
    ?>

    <div id="lawyerist-login" class="modal" style="display: none;">

        <div class="card">

            <button class="close-btn dismiss-button"></button>
            <img class="l-dot" src="<?php echo get_template_directory_uri(); ?>/images/circle-logo-icon.svg">

            <li id="login">
                <h2>Log in to Lawyerist.com</h2>
                <p>Not an Insider yet? <a class="link-to-register">Register here.</a> (It's free!)</p>
                <?php wp_login_form(); ?>
                <p class="remove_bottom">Forgot your password? <a href="<?php echo esc_url(wp_lostpassword_url(get_permalink())); ?>" alt="<?php esc_attr_e('Lost Password', 'textdomain'); ?>" class="forgot-password-link">Reset it here.</a></p>
            </li>

            <li id="register" style="display: none;">
                <h2>Join Lawyerist Insider</h2>
                <p><a class="back-to-login">Back to login.</a></p>
                <?php echo do_shortcode('[gravityform id=59 title=false ajax=true]'); ?>
            </li>

        </div>

    </div>

    <!--<div id="lawyerist-login-screen" style="display: none;"></div> -->

    <?php
    $lawyerist_login = ob_get_clean();

    return $lawyerist_login;
}

/**
 * The following functions modify the regularly WordPress login form defaults by
 * adding our logo, URL, and company name, just in case anyone finds it.
 */
function lawyerist_login_logo_db() {
    ?>

    <style type="text/css">

        #login h1 a,
        .login h1 a {
            background-image: url( <?php echo get_stylesheet_directory_uri(); ?>/images/Lawyerist_Icon_Primary.png );
        }

    </style>

    <?php
}

function lawyerist_login_logo_url_db() {
    return home_url();
}

function lawyerist_login_logo_url_title_db() {
    return 'dashboard.lawyerist.com';
}

function lawyerist_login_message_db($message) {
    if (empty($message)) {
        return '<p>Don\'t have an account yet? <a href="https://lawyerist.com/community/insider/">Click here to join the Lawyerist Insider today (it\'s free)!</a></p>';
    } else {
        return $message;
    }
}

add_action('login_enqueue_scripts', 'lawyerist_login_logo_db');
add_filter('login_headerurl', 'lawyerist_login_logo_url_db');
add_filter('login_headertitle', 'lawyerist_login_logo_url_title_db');
add_filter('login_message', 'lawyerist_login_message_db');


/* WOOCOMMERCE *************** */

/* ------------------------------
  WooCommerce Setup
  ------------------------------ */

/* Declare WooCommerce support. */

function lawyerist_woocommerce_support() {
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'lawyerist_woocommerce_support');


/* Apply a new credit card to all subscriptions by default. */
add_filter('wcs_update_all_subscriptions_payment_method_checked', '__return_true');


/* ------------------------------
  Check to See if Page is Really a WooCommerce Page
  ------------------------------ */

function is_really_a_woocommerce_page() {

    if (function_exists('is_woocommerce') && is_woocommerce()) {
        return true;
    }

    $woocommerce_keys = array(
        'woocommerce_shop_page_id',
        'woocommerce_terms_page_id',
        'woocommerce_cart_page_id',
        'woocommerce_checkout_page_id',
        'woocommerce_pay_page_id',
        'woocommerce_thanks_page_id',
        'woocommerce_myaccount_page_id',
        'woocommerce_edit_address_page_id',
        'woocommerce_view_order_page_id',
        'woocommerce_change_password_page_id',
        'woocommerce_logout_page_id',
        'woocommerce_lost_password_page_id'
    );

    foreach ($woocommerce_keys as $wc_page_id) {

        if (get_the_ID() == get_option($wc_page_id, 0)) {
            return true;
        }
    }

    return false;
}

/* ------------------------------
  Checkout Fields
  ------------------------------ */

function lawyerist_checkout_fields($fields) {

    // Disables all billing fields except the name, email address, and country.
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_phone']);

    // Disables the order comments/notes field.
    unset($fields['order']['order_comments']);

    // Changes field labels.
    $fields['billing']['billing_postcode']['label'] = 'Zip code';

    // Adds our demographic questions.
    $fields['order']['firm_size'] = array(
        'label' => __('What is the size of your firm?', 'woocommerce'),
        'type' => 'select',
        'options' => array(
            '' => 'Select one.',
            'Solo practice' => 'Solo practice',
            'Small firm (2–15 lawyers)' => 'Small firm (2–15 lawyers)',
            'Medium or large firm (16+ lawyers)' => 'Medium or large firm (16+ lawyers)',
            'I don\'t work at a law firm' => 'I don\'t work at a law firm',
        ),
        'placeholder' => _x('Select one.', 'placeholder', 'woocommerce'),
        'required' => true,
        'class' => array('form-row', 'form-row-wide', 'survey_question'),
        'clear' => true,
    );

    $fields['order']['firm_role'] = array(
        'label' => __('What is your role at your firm?', 'woocommerce'),
        'type' => 'select',
        'options' => array(
            '' => 'Select one.',
            'Owner/partner' => 'Owner/partner',
            'Lawyer' => 'Lawyer',
            'Staff' => 'Staff',
            'Vendor (web designer, consultant, etc.)' => 'Vendor (web designer, consultant, etc.)',
            'I don\'t work at a law firm' => 'I don\'t work at a law firm',
        ),
        'placeholder' => _x('Select one.', 'placeholder', 'woocommerce'),
        'required' => true,
        'class' => array('form-row', 'form-row-wide', 'survey_question'),
        'clear' => true,
    );

    $fields['order']['practice_area'] = array(
        'label' => __('What type of law do you practice?', 'woocommerce'),
        'type' => 'select',
        'options' => array(
            '' => 'Select your primary practice area.',
            'Civil litigation (non-PI)' => 'Civil litigation (non-PI)',
            'Corporate' => 'Corporate',
            'Criminal' => 'Criminal',
            'Estate planning, probate, or elder' => 'Estate planning, probate, or elder',
            'Family' => 'Family',
            'General practice' => 'General practice',
            'Personal injury' => 'Personal injury',
            'Real estate' => 'Real estate',
            'Other' => 'Other',
            'I don\'t work in law' => 'I don\'t work in law',
        ),
        'placeholder' => _x('Select your primary practice area.', 'placeholder', 'woocommerce'),
        'required' => true,
        'class' => array('form-row', 'form-row-wide', 'survey_question'),
        'clear' => true,
    );

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'lawyerist_checkout_fields');


/* Update the Order Meta */

function lawyerist_checkout_fields_update_order_meta($order_id) {

    if (!empty($_POST['firm_size'])) {
        update_post_meta($order_id, 'firm_size', sanitize_text_field($_POST['firm_size']));
    }

    if (!empty($_POST['firm_role'])) {
        update_post_meta($order_id, 'firm_role', sanitize_text_field($_POST['firm_role']));
    }

    if (!empty($_POST['practice_area'])) {
        update_post_meta($order_id, 'practice_area', sanitize_text_field($_POST['practice_area']));
    }
}

add_action('woocommerce_checkout_update_order_meta', 'lawyerist_checkout_fields_update_order_meta');


/* ------------------------------
  Display Price of Free Products As "Free!" Not "$0.00".
  ------------------------------ */

function lawyerist_wc_free_products($price, $product) {

    global $woocommerce;

    if ($product->get_price() == 0) {

        $reg_price = $product->get_regular_price();

        return '<del>$' . $reg_price . '</del> Free!';
    } elseif ($product->get_price() == 0) {

        return 'Free!';
    } else {

        return $price;
    }
}

add_filter('woocommerce_get_price_html', 'lawyerist_wc_free_products', 10, 2);


/* ------------------------------
  Remove My Account Navigation Items
  ------------------------------ */

  function lawyerist_remove_my_account_links($menu_links) {
    // unset( $menu_links[ 'dashboard' ] );
    //unset($menu_links['downloads']);
    // unset( $menu_links[ 'payment-methods' ] );
    // unset( $menu_links[ 'edit-account' ] );
    // unset( $menu_links[ 'customer-logout' ] );

    unset( $menu_links[ 'orders' ] );
    unset($menu_links['subscriptions']);
    unset($menu_links['edit-address']);
    unset($menu_links['payment-methods']);
    unset($menu_links['edit-account']);
    unset($menu_links['customer-logout']);
    
    //temporarily removing downloads/courses
    unset($menu_links['downloads']);
    unset($menu_links['courses']);
    // $menu_links['downloads'] = 'Downloads';
    // $menu_links['courses'] = 'Courses';
    $menu_links['scorecard'] = 'Small Firm Scorecard';
    $menu_links['orders'] = 'Orders';
    $menu_links['payment-methods'] = 'Payment Methods';
    $menu_links['edit-account'] = 'Account Details';
    $menu_links['customer-logout'] = 'Log Out';

    /* This method doesn't work for removing the "Memberships" link, so we do that
      by removing the endpoint in WooCommerce > Settings > Advanced. */
    return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'lawyerist_remove_my_account_links');

/* ------------------------------
  Adjust account menu links
  ------------------------------ */
function lawyerist_filter_scorecard_link( $url, $endpoint, $value, $permalink ) {
    if( $endpoint === 'scorecard' ) {
        $url = '/scorecard/';
    }

    if( $endpoint === 'courses' ) {
        $url = '/online/account/downloads/';
    }
   return $url;
}
add_filter('woocommerce_get_endpoint_url', 'lawyerist_filter_scorecard_link', 10, 4);


/* ------------------------------
  Remove Membership & Subscription Details from WC Order & Thank-You Pages
  ------------------------------ */

add_filter('woocommerce_memberships_thank_you_message', '__return_empty_string');

remove_action('woocommerce_thankyou', 'WC_Subscriptions_Order::subscription_thank_you');
remove_action('woocommerce_order_details_after_order_table', 'WC_Subscriptions_Order::add_subscriptions_to_view_order_templates', 10, 1);


/* LEARNDASH ***************** */

/* ------------------------------
  Disable Comments on LearnDash Pages
  ------------------------------ */

function ld_disable_comments() {

    remove_post_type_support('sfwd-courses', 'comments');
    remove_post_type_support('sfwd-lessons', 'comments');
    remove_post_type_support('sfwd-topic', 'comments');
    remove_post_type_support('sfwd-quiz', 'comments');
    remove_post_type_support('sfwd-essays', 'comments');
}

add_filter('init', 'ld_disable_comments');

/*
 * Google Storage CRONJob | Fetch JSON file and Store
 */

/*function my_cronjob_action_gb () {
	// code to execute on cron run
	require ABSPATH . 'wp-content/plugins/lawyerist-partner-dashboards/resources/google-storage-bucket/get-google-storage-bucket.php';
} add_action('my_cronjob_action_gb', 'my_cronjob_action_gb');*/


/**
 * Inserts the Member Portal as a breadcrumb on LearnDash pages, and some other
 * tweaks.
 */
/*function lawyerist_add_learndash_breadcrumbs($links) {

    global $post;

    $post_type = get_post_type($post->ID);

    if ($post_type == 'sfwd-courses') {

        $replace_course_breadcrumb[] = array(
            'url' => 'https://lawyerist.com/labster-portal/',
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

add_filter('wpseo_breadcrumb_links', 'lawyerist_add_learndash_breadcrumbs');*/

function register_tech() {

// set up labels
    $labels = array(
        'name' => 'Tech Products',
        'singular_name' => 'Tech Product',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Tech Product',
        'edit_item' => 'Edit Tech Product',
        'new_item' => 'New ',
        'all_items' => 'All Tech Products',
        'view_item' => 'View Tech Products',
        'search_items' => 'Search Tech Products',
        'not_found' =>  'No Tech Products Found',
        'not_found_in_trash' => 'No Tech Products found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Tech Products',

    );

    //register post type
    register_post_type( 'tech', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-desktop',
        'rewrite' => array( 'slug' => 'legal-tech', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 30,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest' => true,
        )
    );

}
add_action( 'init', 'register_tech', 0 );

// Add Custom Purchase Logic
/*function check_if_customer() {
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
    wp_reset_postdata();
}*/


// Add field
function action_woocommerce_edit_account_form_start() {
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="image"><?php esc_html_e( 'Profile Picture', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input type="file" class="woocommerce-Input" name="image" id="user-profile-pic" accept="image/x-png,image/gif,image/jpeg">
    </p>
    <?php
}
add_action( 'woocommerce_edit_account_form_start', 'action_woocommerce_edit_account_form_start' );

// Validate
function action_woocommerce_save_account_details_errors( $args ){
    if ( isset($_POST['image']) && empty($_POST['image']) ) {
        $args->add( 'image_error', __( 'Please provide a valid image', 'woocommerce' ) );
    }
}
add_action( 'woocommerce_save_account_details_errors','action_woocommerce_save_account_details_errors', 10, 1 );

// Save
function action_woocommerce_save_account_details( $user_id ) {  
    if ( isset( $_FILES['image'] ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        $attachment_id = media_handle_upload( 'image', 0 );
        if ( is_wp_error( $attachment_id ) ) {
            update_user_meta( $user_id, 'image', $_FILES['image'] . ": " . $attachment_id->get_error_message() );
        } else {
            update_user_meta( $user_id, 'image', $attachment_id );
        }
   }
}
add_action( 'woocommerce_save_account_details', 'action_woocommerce_save_account_details', 10, 1 );

// Add enctype to form to allow image upload
function action_woocommerce_edit_account_form_tag() {
    echo 'enctype="multipart/form-data"';
} 
add_action( 'woocommerce_edit_account_form_tag', 'action_woocommerce_edit_account_form_tag' );