<?php
/*
 * Plugin Name: Lawyerist Trial Buttons
 * Version: 1.2.0
 * Description: Add custom buttons for tracked links to trials per page/post.
 * Author: Bicycle Theory
 * Author URI: https://bicycletheory.com/
 * Requires at least: 4.9
 * Tested up to: 5.2.1
 *
 * Text Domain: lawyerist-trial-buttons
 * Domain Path: /lang/
 * License: This plugin contains copyrighted software and is only to be used for lawyerist.com.
 *
 * @package WordPress
 * @author Jeremy Burgeson
 * @since 0.1.0
 */

/**
 * Prevent direct access to plugin file.
 */
if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Constants
 */
define( 'TRIAL_BUTTONS_PLUGIN_VERSION', '1.2.0' );
define( 'REST_AUTH_TOKEN', 'nWXVN)|sXiV(UB2b8CCZ5{-^bQqxOH9K,~UFK41H+{37lV`}vV2*EIjdF4}k/?kI' );


/**
 * Check to see if a post/page has a trial button.
 *
 * @param null|WP_post $post The post for which to check. Will use current global post if one isn't passed in.
 * @param int $allow_beyond_limit An amount of clicks which we would allow to exceed the limit, default 0. Could be used
 *          to allow processing of some clicks beyond limit in the case of concurrent users loading last available
 *          button and more than one click happens.
 *
 * @return bool True if there is a valid trial button to post
 * @throws Exception
 */
function has_trial_button( $post = null, $allow_beyond_limit = 0 ) {
	// use global post if one wasn't provided
	if ( ! is_a( $post, 'WP_Post' ) ) {
		global $post;
	}

	$active = get_field( 'tb_active', $post );

	if ( ! $active ) {
		// not active at all
		return false;
	}

	$limit_clicks = get_field( 'tb_limit_clicks', $post );

	if ( ! $limit_clicks ) {
		// active and no limit to clicks
		return true;
	}

	// check if current period's clicks are within the limit
	$limited_to = get_field( 'tb_limited_to', $post );
	$current_clicks = trial_button_click_count( $post );

	return $current_clicks < ( $limited_to + $allow_beyond_limit );
}


/**
 * Generate markup for a trial button, which will link to the current page but with a parameter that gets picked up and handled.
 *
 * @param null|WP_Post $post The post for which to generate a button. Will use current global post if one isn't passed in.
 *
 * @return string Markup for the trial button if there is one, else an empty string.
 * @throws Exception
 */
function trial_button( $post = null ) {
	// use global post if one wasn't provided
	if ( ! is_a( $post, 'WP_Post' ) ) {
		global $post;
	}

	if ( ! has_trial_button( $post ) ) {
		// no trial button, so bail
		return '';
	}

	// global options
	$open_links_in_new_tab = get_field( 'tb_open_links_in_new_tab', 'option' );

	$text = trial_button_text( $post );

	//return '<a href="' . get_permalink( $post ) . '?lawyerist_tb=' . $post->ID . '"' . ( $open_links_in_new_tab ? ' target="_blank"' : '' ) . ' class="button trial-button visit-site" rel="sponsored">' . $text . '</a>';

	return '<a href="' . get_field('tb_url', $post) . '?lawyerist_tb=' . $post->ID . '"' . ( $open_links_in_new_tab ? ' target="_blank"' : '' ) . ' class="button trial-button visit-site" rel="sponsored">' . $text . '</a>';
}



/**
 * Generate the text for a trial button, which gets the specific button text for a post or uses the default.
 *
 * @param null|WP_Post $post The post for which to generate a button. Will use current global post if one isn't passed in.
 *
 * @return string Text for the trial button.
 */
function trial_button_text( $post = null ) {
	// use global post if one wasn't provided
	if ( ! is_a( $post, 'WP_Post' ) ) {
		global $post;
	}

	// global options
	$default_text = get_field( 'tb_default_text', 'option' );

	// options for the post
	$text = get_field( 'tb_text', $post );

	if ( ! $text ) {
		// use default text
		$text = $default_text ? $default_text : 'Learn More';
	}

	return $text;
}


/**
 * Generate the URL for a trial button.
 *
 * @param null|WP_Post $post The post for which to generate a button. Will use current global post if one isn't passed in.
 *
 * @return string URL for the trial button if there is one, else an empty string.
 * @throws Exception
 */
function trial_button_url( $post = null ) {
	// use global post if one wasn't provided
	if ( ! is_a( $post, 'WP_Post' ) ) {
		global $post;
	}

	if ( ! has_trial_button( $post ) ) {
		// no trial button, so bail
		return '';
	}

	// options for the post
	$url = get_field( 'tb_url', $post );

	// add utm if it exists as a global option and isn't already part of the url (which would override global utm)
	$utm = trial_button_utm();
	if ( $utm && ! ( strpos( $url, 'utm_source') || strpos( $url, 'utm_medium') ) ) {
		// append a question mark or ampersand based on whether there is already a question mark (e.g. there is at least one url param already)
		$url .= strpos( $url, '?' ) ? '&' : '?';
		$url .= $utm;
	}

	return $url;
}



/**
 * Generate the UTM parameters for a trial button URL.
 *
 * @return string URL for the UTM parameters if used, else an empty string.
 */
function trial_button_utm() {
	// global options
	$add_utm = get_field( 'tb_add_utm', 'option' );
	$utm_source = get_field( 'tb_utm_source', 'option' );
	$utm_medium = get_field( 'tb_utm_medium', 'option' );

	$utm = '';
	if ( $add_utm ) {
		$utm = 'utm_source=' . $utm_source . '&utm_medium=' . $utm_medium;
	}

	return $utm;
}


/**
 * Get number of clicks for a post in a pre-defined time period, defaults to current month.
 *
 * @param null|WP_Post $post The post for which to generate a button. Will use current global post if one isn't passed in.
 * @param null|string $period Which time period to get click count for. Options: current (default: this month), last (last month), all.
 * @param bool $unique_ip If true, count clicks from unique IP address only.
 *
 * @return null|string The count of clicks.
 * @throws Exception
 */
function trial_button_click_count( $post = null, $period = null, $unique_ip = true ) {
	// make sure we have a post object
	if ( is_int( $post ) ) {
		// make post object from numeric ID provided
		$post = get_post( $post );
	} else if ( ! is_a( $post, 'WP_Post' ) ) {
		// use global post since one wasn't provided
		global $post;
	}

	global $wpdb;

	// set what we're counting
	$select_count_of = 'DISTINCT `ip`'; // will get total clicks from unique IP addresses
	if ( ! $unique_ip ) {
		$select_count_of = '`id`'; // will get total clicks, no matter the IP address
	}

	// build sql to get count for current post ID. we'll append time constraints after, based on period.
	$sql = 'SELECT COUNT(' . $select_count_of . ') AS `clicks` 
			FROM `' . $wpdb->prefix . 'trial_button_clicks`
			WHERE `post_id` = ' . $post->ID;

	switch ( $period) {
		case 'all':
			// no need to do anything with 'where' clause
			break;

		case 'last_year':
			$start_obj = new DateTime( 'first day of January last year 00:00:00', new DateTimeZone( 'America/Chicago' ) );
			$start = $start_obj->format( 'Y-m-d H:i:s' );
			$end_obj = new DateTime( 'last day of December last year 23:59:59', new DateTimeZone( 'America/Chicago' ) );
			$end = $end_obj->format( 'Y-m-d H:i:s' );
			$sql .= ' AND `time` >= "' . $start . '"
						AND `time` <= "' . $end . '"';
			break;

		case 'this_year':
			$start_obj = new DateTime( 'first day of January this year 00:00:00', new DateTimeZone( 'America/Chicago' ) );
			$start = $start_obj->format( 'Y-m-d H:i:s' );
			$end_obj = new DateTime( 'last day of December this year 23:59:59', new DateTimeZone( 'America/Chicago' ) );
			$end = $end_obj->format( 'Y-m-d H:i:s' );
			$sql .= ' AND `time` >= "' . $start . '"
						AND `time` <= "' . $end . '"';
			break;

		case 'last':
		case 'last_month':
			// last period is last month
			$start_obj = new DateTime( 'first day of last month 00:00:00', new DateTimeZone( 'America/Chicago' ) );
			$start = $start_obj->format( 'Y-m-d H:i:s' );
			$end_obj = new DateTime( 'last day of last month 23:59:59', new DateTimeZone( 'America/Chicago' ) );
			$end = $end_obj->format( 'Y-m-d H:i:s' );
			$sql .= ' AND `time` >= "' . $start . '"
						AND `time` <= "' . $end . '"';
			break;

		case 'current':
		case 'this_month':
		default:
			// current period is this month
			$start_obj = new DateTime( 'first day of this month 00:00:00', new DateTimeZone( 'America/Chicago' ) );
			$start = $start_obj->format( 'Y-m-d H:i:s' );
			$end_obj = new DateTime( 'last day of this month 23:59:59', new DateTimeZone( 'America/Chicago' ) );
			$end = $end_obj->format( 'Y-m-d H:i:s' );
			$sql .= ' AND `time` >= "' . $start . '"
						AND `time` <= "' . $end . '"';
	}

	return $wpdb->get_var( $sql );
}


/**
 * Output a trial button via shortcode.
 *
 * @param array $attrs Array of parameters used in the shortcode.
 *
 * @return string Markup to be output by shortcode.
 * @throws Exception
 */
function trial_button_shortcode( $attrs = array() ) {
	$id = null;
	// check for an explicit post ID to use
	if ( isset( $attrs['id'] ) && is_numeric( $attrs['id'] ) ) {
		$id = $attrs['id'];
	}

	if ( $id ) {
		// use an explicit post
		$post = get_post( $id );
		$html = trial_button( $post );
	} else {
		$html = trial_button();
	}

	if ( $html ) {
		return PHP_EOL . $html . PHP_EOL;
	}
}
add_shortcode( 'trial_button', 'trial_button_shortcode' );



/**
 * Check for a trial button URL request parameter and if it exists, track the click and send the user to the appropriate URL.
 * This runs on init.
 */
function process_trial_button_request() {
	// only run on front and and if the trial button parameter is in the request
	if ( ! is_admin() && isset( $_REQUEST['lawyerist_tb'] ) && is_numeric( $_REQUEST['lawyerist_tb'] ) ) {

		// get post and make sure it's valid
		$id = $_REQUEST['lawyerist_tb'];
		$post = get_post( $id );

		// also make sure that the button is valid (including having clicks remain)
		// note: could use $allow_beyond_limit param to has_trial_button() if allowing concurrent users to click through last button.
		if ( ! is_a( $post, 'WP_Post' ) || ! has_trial_button( $post ) ) {
			wp_die( 'Sorry, this destination is invalid.' );
		}

		// get button details
		$text = trial_button_text( $post );
		$url = trial_button_url( $post );

		// track the click
		global $wpdb;
		$table_name = $wpdb->prefix . 'trial_button_clicks';

		$wpdb->insert(
			$table_name,
			array(
				'post_id' => $id,
				'time' => current_time( 'mysql' ),
				'button_text' => $text,
				'button_url' => $url,
				'ip' => $_SERVER['REMOTE_ADDR'],
			)
		);

		// send user to the trial button destination
		header('Location: ' . $url );
		exit();
	}
}
add_action( 'init', 'process_trial_button_request' );



/**
 * Actions to take upon plugin installation or upgrade. Creates database table for click tracking, sets plugin version to options.
 */
function trial_buttons_install() {
	global $wpdb;

	// set table name and charset
	$table_name = $wpdb->prefix . 'trial_button_clicks';
	$charset_collate = $wpdb->get_charset_collate();

	// define custom database table for trial button clicks
	$sql = "CREATE TABLE $table_name (
	  id bigint(20) NOT NULL AUTO_INCREMENT,
	  post_id bigint(20) NOT NULL,
	  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  button_text varchar(200) NOT NULL,
	  button_url varchar(2000) DEFAULT '' NOT NULL,
	  ip varchar(15) NOT NULL,
	  PRIMARY KEY  (id)
	) $charset_collate;";

	// include upgrade code from core and run database update
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	// save plugin version to options
	update_option( 'trial_buttons_version', TRIAL_BUTTONS_PLUGIN_VERSION );
}
register_activation_hook( __FILE__, 'trial_buttons_install' );



/**
 * Check if version in options matches current and take action if not.
 */
function trial_buttons_requirements_check() {
	// if plugin version is different, run the install script
	if ( get_site_option( 'trial_buttons_version' ) != TRIAL_BUTTONS_PLUGIN_VERSION ) {
		trial_buttons_install();
	}
	
	// check to make sure we have ACF
	if ( ! function_exists( 'get_field' ) ) {
		wp_die( 'The Lawyerist Trial Buttons plugin requires the Advanced Custom Fields plugin but it does not appear to be installed or activated.' );
	}
}
add_action( 'plugins_loaded', 'trial_buttons_requirements_check' );



/**
 * Add our custom JS and CSS, which is run on admin_enqueue_scripts.
 */
function trial_button_scripts() {
	// include js
	wp_enqueue_script(
		'trial_buttons',
		trailingslashit( plugin_dir_url( __FILE__ ) ) . 'lawyerist-trial-buttons.js',
		array( 'jquery' ),
		TRIAL_BUTTONS_PLUGIN_VERSION,
		true
	);

	// include css
	wp_enqueue_style(
		'trial_buttons',
		trailingslashit( plugin_dir_url( __FILE__ ) ) . 'lawyerist-trial-buttons.css',
		array(),
		TRIAL_BUTTONS_PLUGIN_VERSION
	);

	// ajax data
	$utm = trial_button_utm();
	wp_localize_script( 'trial_buttons', 'trial_buttons_data', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'trial_buttons_nonce' ),
		'post_id' => isset( $_REQUEST['post'] ) ? $_REQUEST['post'] : '',
		'default_text' => get_field( 'tb_default_text', 'option' ),
		'utm' => ( $utm ? 'Unless overridden here, URL will automatically include: ' . $utm : '' ),
	) );
}
add_action( 'admin_enqueue_scripts', 'trial_button_scripts' );



/**
 * Assemble click statistics for a trial button, called via ajax.
 */
function trial_button_click_stats() {
	// verify request
	check_ajax_referer( 'trial_buttons_nonce', 'nonce' );

	$html = '';
	$sep = ' &nbsp;&middot;&nbsp; ';

	// assemble stats
	if ( isset( $_REQUEST['post_id'] ) && is_numeric( $_REQUEST['post_id'] ) ) {
		$post = get_post( $_REQUEST['post_id'] );
		$html .= 'This Month: ' . trial_button_click_count( $post )
				. $sep . 'Last Month: ' . trial_button_click_count( $post, 'last' )
				. $sep . 'All Time: ' . trial_button_click_count( $post, 'all' );
	} else {
		$html .= 'Error: no valid post ID in request!';
	}

	echo $html;
	wp_die();
}
add_action( 'wp_ajax_trial_button_click_stats', 'trial_button_click_stats' );



/**
 * Assemble report for all trial buttons, called via ajax.
 */
function trial_button_click_report() {
	// verify request
	check_ajax_referer( 'trial_buttons_nonce', 'nonce' );

	$html = '';

	// query for all posts with a trial button URL (which should cover every post that has ever had one, even if inactive or no clicks)
	$args = array(
		'post_type' => 'any',
		'post_status' => 'any',
		'nopaging' => true,
		'orderby' => 'title',
		'order' => 'ASC',
		'meta_key' => 'tb_url',
		'meta_compare' => '!=',
		'meta_value' => '',
	);

	// add keyword filter
	$filter = ( isset( $_REQUEST['filter'] ) && $_REQUEST['filter'] ) ? urldecode( $_REQUEST['filter'] ) : '';
	if ( $filter ) {
		$args['s'] = $filter;
	}

	// run query but use our filter to make search be on title only, not body like default search
	add_filter( 'posts_search', 'trial_buttons_search_by_title', 10, 2 );
	$wp_query = new WP_Query( $args );
	remove_filter( 'posts_search', 'trial_buttons_search_by_title', 500 );

	$count = count( $wp_query->posts );
	if ( $count > 0 ) {

		// define table columns
		$cols = array(
			'Title',
			'Type',
			'Active',
			'Text',
			'Limit',
			'Curr',
			'Prev',
			'All',
		);

		// init unique click totals (one per IP address)
		// init non-unique click totals (counts multiple from the same IP address)
		$totals_unique = $totals_non_unique = array(
			'Curr' => 0,
			'Prev' => 0,
			'All' => 0,
		);

		// determine sort parameters from request
		$sort = ( isset( $_REQUEST['sort'] ) && in_array( $_REQUEST['sort'], $cols ) ) ? urldecode( $_REQUEST['sort'] ) : 'Title';
		$sort_dir = ( isset( $_REQUEST['sort_dir'] ) && $_REQUEST['sort_dir'] == 'desc' ) ? SORT_DESC : SORT_ASC;

		// start table and build header
		$html .= '<table><thead><tr>';
		foreach ( $cols as $col ) {
			// classes for sort and direction that get added to col slug when sorted by this column
			$sort_class = $sort == $col ? ' sort ' . ( $sort_dir == SORT_DESC ? 'desc' : 'asc' ) : '';

			$html .= '<th class="' . sanitize_title( $col ) . $sort_class . '"><span data-sort="' . $col . '">' . $col . '</span></th>';
		}
		$html .= '</tr></thead>';

		// process each post into an array with data we need and that we can sort; also total up clicks
		$posts = array();
		foreach ( $wp_query->posts as $post ) {
			$post_to_sort = array(
				'id' => $post->ID,
			);
			$limit = get_field( 'tb_limit_clicks', $post ) ? get_field( 'tb_limited_to', $post ) : '';

			foreach ( $cols as $col ) {
				switch ( $col ) {
					case 'Title':
						$post_to_sort[$col] = $post->post_title;
						break;

					case 'Type':
						$post_to_sort[$col] = ucwords( $post->post_type );
						break;

					case 'Active':
						$post_to_sort[$col] = has_trial_button( $post ) ? 'Yes' : 'No';
						break;

					case 'Text':
						$post_to_sort[$col] = trial_button_text( $post );
						break;

					case 'Limit':
						$post_to_sort[$col] = $limit ? $limit : '&infin;';
						break;

					case 'Curr':
						$clicks = trial_button_click_count( $post );
						$totals_unique[$col] += $clicks;
						$post_to_sort[$col] = $clicks;
						break;

					case 'Prev':
						$clicks = trial_button_click_count( $post, 'last' );
						$totals_unique[$col] += $clicks;
						$post_to_sort[$col] = $clicks;
						break;

					case 'All':
						$clicks = trial_button_click_count( $post, 'all' );
						$totals_unique[$col] += $clicks;
						$post_to_sort[$col] = $clicks;
						break;
				}
			}

			$posts[] = $post_to_sort;
		}

		// sort the array of posts. start by getting lists of columns
		foreach ( $posts as $key => $post ) {
			foreach ( $cols as $col ) {
				$$col[$key] = $post[$col];
			}
		}
		if ( $sort == 'Title' ) {
			array_multisort($$sort, $sort_dir, $posts);
		} else {
			// use title as secondary sort for anything other than title as primary sort
			array_multisort($$sort, $sort_dir, $Title, SORT_ASC, $posts);
		}


		// process each post in the sorted array to assemble markup
		foreach ( $posts as $post ) {
			$html .= '<tr>';

			foreach ( $cols as $col ) {
				$html .= '<td class="' . sanitize_title( $col ) . '">';

				switch ( $col ) {
					case 'Title':
						$sep = '&nbsp;&nbsp;&middot;&nbsp;&nbsp;';
						$html .= $post[$col]
						         . '<br><a href="' . get_edit_post_link( $post['id'] ) . '">Edit</a>'
						         . $sep . '<a href="' . get_permalink( $post['id'] ) . '" target="_blank">View</a>';
						break;

					case 'Active':
						$html .= $post[$col] == 'Yes' ? '<span class="ok">Yes</span>' : 'No';
						break;

					case 'Curr':
					case 'Prev':
					case 'All':
						$period = '';
						$class = '';
						if ( $col == 'Curr' ) {
							$period = 'current';
							// use a class to indicate under/over limit
							$class = ' class="ok"';
							if ( is_numeric( $post['Limit'] ) && $post[$col] >= $post['Limit'] ) {
								$class = ' class="warn"';
							}
						} else if ( $col == 'Prev' ) {
							$period = 'last';
						} else if ( $col == 'All' ) {
							$period = 'all';
						}
						$html .= '<span' . $class . '>' . $post[$col] . ' unique</span>';
						// get non-unique clicks (total regardless of IP address) and add to output
						$clicks_non_unique = trial_button_click_count( $post['id'], $period, false );
						$html .= '<br><span class="minor">' . $clicks_non_unique . ' total</span>';
						// add non-unique clicks to totals
						$totals_non_unique[$col] += $clicks_non_unique;
						break;

					case 'Limit':
					case 'Text':
					case 'Type':
					default:
						$html .= $post[$col];
						break;
				}

				$html .= '</td>';
			}

			$html .= '</tr>';
		}

		// add totals and close table
		$html .= '<tr class="totals">'
		         . '<td class="title">Total Results: ' . $count . '</td>'
		         . '<td colspan="' . ( count( $cols ) - 4 ) . '" class="type">Total Clicks:</td>'
		         . '<td class="curr">'
	                . $totals_unique['Curr'] . ' unique'
	                . '<br><span class="minor">' . $totals_non_unique['Curr'] . ' total</span>'
		         . '</td>'
		         . '<td class="prev">'
	                . $totals_unique['Prev'] . ' unique'
		            . '<br><span class="minor">' . $totals_non_unique['Prev'] . ' total</span>'
		         . '</td>'
		         . '<td class="all">'
	                . $totals_unique['All'] . ' unique'
			        . '<br><span class="minor">' . $totals_non_unique['All'] . ' total</span>'
		         . '</td>'
		         . '</tr></table>';

		// add note about unique clicks
		$html .= '<p class="msg">"Unique" clicks are those from different IP addresses, whereas a larger corresponding "total" includes multiple clicks from the same IP address.</p>';

	} else {
		$html .= '<p class="msg no-results">No results found.</p>';
	}

	echo $html;
	wp_die();
}
add_action( 'wp_ajax_trial_button_click_report', 'trial_button_click_report' );



/**
 * Method to alter WP_Query search parameters to be title only, used via posts_search hook in click report.
 *
 * @param $search string Search SQL for where clause.
 * @param $wp_query WP_Query The query object to operate on.
 *
 * @return array|string Modified search.
 */
function trial_buttons_search_by_title( $search, $wp_query ) {
	if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
		global $wpdb;

		$q = $wp_query->query_vars;
		$n = ! empty( $q['exact'] ) ? '' : '%';

		$search = array();

		foreach ( ( array ) $q['search_terms'] as $term )
			$search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

		if ( ! is_user_logged_in() )
			$search[] = "$wpdb->posts.post_password = ''";

		$search = ' AND ' . implode( ' AND ', $search );
	}

	return $search;
}



/**
 * Assign the edit_trial_buttons capability to the Editor role.
 */
function trial_button_cap() {
	$role = get_role( 'editor' );
	$role->add_cap( 'edit_trial_buttons' );
	
	$role = get_role( 'administrator' );
	$role->add_cap( 'edit_trial_buttons' );
}
add_action( 'init', 'trial_button_cap' );



/**
 * Add ACF options page for Trial Buttons.
 */
function trial_buttons_options_page() {

	// options page
	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_sub_page( array(
			'page_title'  => 'Trial Buttons Options',
			'menu_title'  => 'Trial Buttons',
			'menu_slug' => 'trial-buttons',
			'capability' => 'edit_trial_buttons',
			'parent_slug' => 'tools.php',
			'update_button' => 'Save Trial Buttons Options',
			'updated_message' => 'Trial Buttons options have been saved successfully.',
		) );

	}

}
add_action( 'init', 'trial_buttons_options_page' );



/**
 * Customize ACF path.
 *
 * @param $path
 *
 * @return string
 */
function bt_acf_settings_path( $path ) {
	$path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'acf/';
	return $path;
}
// DISABLED SO WE CAN USE INDEPENDENT ACF add_filter( 'acf/settings/path', 'bt_acf_settings_path' );



/**
 * Customize ACF dir.
 *
 * @param $dir
 *
 * @return string
 */
function bt_acf_settings_dir( $dir ) {
	$dir = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'acf/';
	return $dir;
}
// DISABLED SO WE CAN USE INDEPENDENT ACF add_filter( 'acf/settings/dir', 'bt_acf_settings_dir' );



/**
 * Save ACF fields in JSON format here within plugin directory.
 *
 * @param $path string The original path passed through the filter.
 *
 * @return string Path to location where JSON files will be stored
 */
function bt_acf_json_save_point( $path ) {
	$path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'acf-json';
	return $path;
}
// DISABLED SO WE CAN USE INDEPENDENT ACF add_filter('acf/settings/save_json', 'bt_acf_json_save_point' );



/**
 * Load ACF fields in JSON format here within plugin directory.
 *
 * @param $paths array The original paths passed through the filter.
 *
 * @return array Paths to locations where JSON files will be stored
 */
function bt_acf_json_load_point( $paths ) {
	$paths[] = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'acf-json';
	return $paths;
}
// DISABLED SO WE CAN USE INDEPENDENT ACF add_filter('acf/settings/load_json', 'bt_acf_json_load_point' );



/**
 * Hide ACF from admin menu.
 */
// DISABLED SO WE CAN USE INDEPENDENT ACF add_filter( 'acf/settings/show_admin', '__return_false' );



/**
 * Include ACF.
 */
// DISABLED SO WE CAN USE INDEPENDENT ACF include_once( 'acf/acf.php' );



/**
 * Register a route for the REST API for exporting monthly click data (INCOMPLETE).
 * An ID can be appended to the route end to get data for one specific trial button.
 */
add_action( 'rest_api_init', function () {
	register_rest_route( 'lawyerist-trial-buttons/v1', '/monthly-clicks(?:/(?P<id>\d+))?', array(
		'methods' => 'GET',
		'callback' => 'trial_button_click_export_monthly',
		'args' => array(
			'id' => array(
				'default'=> 0,
				'validate_callback' => 'is_numeric',
				'sanitize_callback' => 'absint',
			),
		),
		'permission_callback' => function ( WP_REST_Request $request ) {
			return $request->get_header( 'x_request_signature' ) == REST_AUTH_TOKEN;
		},
	) );
} );


/**
 * Start of a method to generate monthly click data for trial buttons. Currently only gets a grand total per trial button.
 *
 * @param WP_REST_Request $request
 *
 * @return array|WP_Error
 * @throws Exception
 */
function trial_button_click_export_monthly( WP_REST_Request $request ) {
	// query for posts of any type with a trial button (via url set in meta)
	$args = array(
		'post_type' => 'any',
		'post_status' => 'any',
		'nopaging' => true,
		'orderby' => 'title',
		'order' => 'ASC',
		'meta_key' => 'tb_url',
		'meta_compare' => '!=',
		'meta_value' => '',
	);

	// specific post
	if ( $request['id'] ) {
		$args['p'] = $request['id'];
	}

	$query = new WP_Query( $args );

	if ( ! count( $query->posts ) ) {
		return new WP_Error( 'no_post', 'Invalid post ID requested', array( 'status' => 404 ) );
	}

	// init data to be returned
	$data = array();

	/**
	 * @todo (If we continue down this path) define an array of months which we can loop to get click count for each.
	 *
	$months =
	 */

	foreach ( $query->posts as $post ) {
		$data[$post->post_title] = array(
			'all' => trial_button_click_count( $post, 'all' ),
		);
	}

	/**
	 * TBD: If we end up making a CSV after all, we can set headers this way:
	$response = new WP_REST_Response( $data );
	$response->header( ... );
	 */

	return $data;
}



/**
 * Register a route for the REST API for exporting raw click data.
 * An ID can be appended to the route end to get data for one specific trial button.
 */
add_action( 'rest_api_init', function () {
	register_rest_route( 'lawyerist-trial-buttons/v1', '/clicks(?:/(?P<id>\d+))?', array(
		'methods' => 'GET',
		'callback' => 'trial_button_click_export',
		'args' => array(
			'id' => array(
				'default'=> 0,
				'validate_callback' => 'is_numeric',
				'sanitize_callback' => 'absint',
			),
		),
		'permission_callback' => function ( WP_REST_Request $request ) {
			return $request->get_header( 'x_request_signature' ) == REST_AUTH_TOKEN;
		},
	) );
} );


/**
 * Start of a method to generate raw click data for trial buttons for export.
 *
 * @param WP_REST_Request $request
 *
 * @return stdClass|WP_Error
 * @throws Exception
 */
function trial_button_click_export( WP_REST_Request $request ) {
	global $wpdb;

	// build sql to get all clicks with post data joined in.
	$specific_post_where = '';
	if ( $request['id'] ) {
		$specific_post_where = ' AND tb.post_id = ' . absint( $request['id'] ) . ' '; // API sanitizes the requested id but just in case...
	}

	// format a date string for when to get data from
	// $since = null;
	$since = date( 'Y-m-d 00:00:00', strtotime( '-18 months' ) );
	$since_where = '';
	if ( $since ) {
		$since_where = ' AND tb.time >= "' . $since . '" ';
	}

	// SELECT tb.*, p.post_title
	// SELECT tb.id, tb.post_id, p.post_title, tb.time
	// SELECT tb.id, tb.post_id, p.post_title, tb.time, tb.ip
	$sql = 'SELECT tb.id, tb.post_id, p.post_title, 
				DATE_FORMAT(tb.time, "%Y-%m-%d") as `date`, 
				DATE_FORMAT(tb.time, "%H:%i:%s") as `time`, 
				tb.ip
			FROM ' . $wpdb->prefix . 'trial_button_clicks tb
				JOIN ' . $wpdb->prefix . 'posts p
					ON p.ID = tb.post_id
			WHERE p.post_type IN ("page","post","product","product_variation")
				AND p.post_status NOT IN ("auto-draft","inherit","trash")
				' . $since_where . '
				' . $specific_post_where . '
			ORDER BY tb.id';

	/**
	 * TBD: add request parameter for date range or records-since?
	 */

	/**
	 * TBD: If we end up making a CSV after all, we can set headers this way:
	$response = new WP_REST_Response( $data );
	$response->header( ... );
	 */

	$data = new stdClass();
	$data->data = $wpdb->get_results( $sql, OBJECT_K );

	return $data;
}
