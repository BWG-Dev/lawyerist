<?php
/**
 * Labsters - Custom Post Type
 *
 * @package Lawyerist Labster Portal - Updated
 * @author Elizabeth Paparone
 */

function register_labsters() {

// set up labels
    $labels = array(
        'name' => 'Labsters',
        'singular_name' => 'Labster',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Labster',
        'edit_item' => 'Edit Labster',
        'new_item' => 'New Labster',
        'all_items' => 'All Labsters',
        'view_item' => 'View Labsters',
        'search_items' => 'Search Labsters',
        'not_found' =>  'No Labsters Found',
        'not_found_in_trash' => 'No Labsters found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Labsters',

    );
    //The icon in Base64 format
    $icon_base64 = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI1LjIuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNOS44MywyLjhjMC4yMSwwLDAuMzktMC4xNywwLjM5LTAuMzljMC0wLjIxLTAuMTctMC4zOS0wLjM5LTAuMzlTOS40NCwyLjIsOS40NCwyLjQyQzkuNDQsMi42Myw5LjYxLDIuOCw5LjgzLDIuOHoiLz4KCTxwYXRoIGQ9Ik0xMC45OCwxLjQ5YzAuMzYsMCwwLjY1LTAuMjksMC42NS0wLjY1cy0wLjI5LTAuNjUtMC42NS0wLjY1Yy0wLjM2LDAtMC42NSwwLjI5LTAuNjUsMC42NVMxMC42MiwxLjQ5LDEwLjk4LDEuNDl6Ii8+Cgk8cG9seWdvbiBwb2ludHM9IjguMDEsMTIuMjkgMTMuODcsNC41IDQuODUsNC40OSA4LjA2LDcuMjggCSIvPgoJPHBhdGggZD0iTTgsMTcuNjFjMCwxLjI1LDEuMDIsMi4yNiwyLjI2LDIuMjZjMS4yNSwwLDIuMjYtMS4wMiwyLjI2LTIuMjZWOC4xNkw4LDE0LjEzVjE3LjYxeiBNMTEuOTEsMTcuNjEKCQljMCwwLjU2LTAuMjgsMS4wNi0wLjcxLDEuMzV2LTguMDNMMTEuOTEsMTBWMTcuNjF6IE04LjYyLDE0LjMzbDEuNDktMS45NnY2Ljg4Yy0wLjg0LTAuMDgtMS40OS0wLjc4LTEuNDktMS42NFYxNC4zM3oiLz4KPC9nPgo8L3N2Zz4K';
    $icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;
    
    //register post type
    register_post_type( 'labsters', array(
        'labels' => $labels,
        'menu_icon' => $icon_data_uri,
        'rewrite' => array( 'slug' => 'labsters', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 24,
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
add_action( 'init', 'register_labsters', 0 );