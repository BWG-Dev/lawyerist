<?php

/*
Plugin Name: Lawyerist Labster Portal
Plugin URI: https://lawyerist.com/labster-portal-admin
Description: Helper plugin for Labster Portal
Author: Elizabeth Paparone
Version: 0.1.0
Author URI: https://www.postali.com for https://lawyerist.com
*/

if ( !defined( 'ABSPATH' ) ) exit;
flush_rewrite_rules( false );

/**
* Load  plugin files.
*/

//require_once dirname( __FILE__ ) . '/includes/labsters-cpt.php'; // Custom Post Type Case Results

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

if ( !is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'portal/lab-shortcode.php' );
}

function lab_portal_frontend_scripts() {

		wp_enqueue_style( 'styles', plugins_url( 'portal/assets/css/styles.css', __FILE__ ) );
		wp_enqueue_style( 'css-circular-prog-bar', plugins_url( 'portal/assets/css/css-circular-prog-bar.css', __FILE__ ) );
		wp_register_script('scripts', plugins_url( 'portal/assets/js/frontend.js', __FILE__ ), array('jquery'), null, true);
		wp_enqueue_script('scripts');
		// Enqueue icons
    	wp_enqueue_style('icon-styles', 'https://s3.amazonaws.com/icomoon.io/152819/Lawyerist/style.css?wc8bvc'); // Enqueue styles for svg icons
	}

add_action( 'wp_enqueue_scripts', 'lab_portal_frontend_scripts' );


if ( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/lab-admin.php' );
}

function lab_portal_admin_scripts() {

		wp_enqueue_style( 'styles', plugins_url( 'admin/assets/css/styles.css', __FILE__ ) );
		wp_register_script('scripts', plugins_url( 'admin/assets/js/admin.js', __FILE__ ), array('jquery'), null, true);
		wp_enqueue_script('scripts');
		// Enqueue icons
    	wp_enqueue_style('icon-styles', 'https://s3.amazonaws.com/icomoon.io/152819/Lawyerist/style.css?wc8bvc'); // Enqueue styles for svg icons
	}

add_action( 'admin_enqueue_scripts', 'lab_portal_admin_scripts' );