<?php

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

<?php

}
