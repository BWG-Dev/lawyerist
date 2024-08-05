<?php

/*
Plugin Name: Lawyerist Product Recommendation Wizard
Plugin URI: https://lawyerist.com/product-recommendations-admin
Description: Recommendation Wizard for Product Portals
Author: Elizabeth Paparone
Version: 0.1.0
Author URI: https://www.postali.com for https://lawyerist.com
*/

if ( !defined( 'ABSPATH' ) ) exit;

/**
* Constants
*/
//define( 'lprw_PLUGIN_VERSION', '0.1.0' );
//define( 'lprw_PAGE_SLUG', 'partner-dashboard' );


/**
* Load  plugin files.
*/

if ( !is_admin() ) {

	require_once( plugin_dir_path( __FILE__ ) . 'frontend/lprw-functions.php' );

	function lprw_frontend_scripts() {
		wp_register_style( 'lprw-styles', plugins_url( 'frontend/assets/css/styles.css', __FILE__ ) );
		wp_enqueue_style( 'lprw-styles' );
		wp_register_script('lprw-scripts', plugins_url( 'frontend/assets/js/frontend.js', __FILE__ ), array('jquery'), true);
		wp_enqueue_script('lprw-scripts');
		// Enqueue icons
    	wp_enqueue_style('lprw-icon-styles', 'https://d1azc1qln24ryf.cloudfront.net/152819/Lawyerist-NEW/style-cf.css?irhd5h'); // Enqueue styles for svg icons
	}

	add_action( 'wp_enqueue_scripts', 'lprw_frontend_scripts' );


	add_filter( 'gform_progress_bar', 'my_custom_function', 10, 3 );
	function my_custom_function( $progress_bar, $form, $confirmation_message ) {
		//if you are using the filter gform_progressbar_start_at_zero, adjust the page number as needed
		$current_page = GFFormDisplay::get_current_page( $form['id'] );
		$page_count = GFFormDisplay::get_max_page_number( $form );
		$progress_bar = str_replace( 'Step ' . $current_page . ' of ' . $page_count, "<span class='progress'>" . $current_page . '<span class="red">/</span>' . '<span class="red">' . $page_count . "</span></span>", $progress_bar );
		return $progress_bar;
	}

	// Enable shortcodes within gravity forms
	add_filter( 'gform_get_form_filter', 'shortcode_unautop', 11 );
	add_filter( 'gform_get_form_filter', 'do_shortcode', 11 );

	// Add custom pagination buttons
	add_filter( 'gform_previous_button', 'my_previous_button_markup', 10, 2 );
	function my_previous_button_markup( $previous_button, $form ) {
	
		$previous_button = '<span class="left-arrow-button">' . $previous_button . '</span>';
	
		return $previous_button;
	}

	// Shorten excerpt
	add_filter( 'excerpt_length', function($length) {
		return 20;
	} );
}

