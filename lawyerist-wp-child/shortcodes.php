<?php

/* INDEX

- Pullquotes
  - removed
- Pullouts
  - removed
- Testimonials
  - removed
- Acf-testimonials
  - removed
- Acf-featured-video
  - removed
- Feature Charts
  - removed
- Vendor Recommender Results
  - removed
- List Child Pages
  - removed 
- List Featured Products
  - removed
- List All Products
  - removed
- List Affinity Partners
  - removed
- Get Portal Card
  - removed
- Gravity Forms Conirmation Message Shortcodes
  - Get Affinity Confirmation Message
  - Get Scorecard Grade
  - removed
- List Contributors
  - removed
- List Users
  -updated
- Praise Cards
– Knowledge Base
  - removed

*/

/*------------------------------
List Users
------------------------------*/

function list_lab_users_shortcode( $atts ) {

  $atts = shortcode_atts( array(
    'membership'  => null,
    'product'     => null,
  ), $atts );

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

  if ( $atts[ 'product' ] ) {

    $product_id = intval( $atts[ 'product' ] );
    
    //Sam's Function
    $args = array(
      'fields'  => 'ID',
      'role'    => 'customer',
    );
    
    $customer_query = new WP_User_Query( $args );
    $customers      = $customer_query->get_results();

    if ( !empty( $customers ) ) {

      foreach ( $customers as $customer ) {
        
      if ( wc_customer_bought_product( '', $customer, $product_id ) ) {

          $customer_data = get_userdata( $customer );

          array_push( $users, array(
            'user_id'       => $customer,
            'email'				  => $customer_data->user_email,
            'first_name'    => $customer_data->first_name,
            'last_name'     => $customer_data->last_name,
            'practice_area' => get_field( 'primary_practice_area', 'user_' . $customer ),
            'firm_name'     => get_field( 'firm_name', 'user_' . $customer ),
            'city'          => get_field( 'firm_city', 'user_' . $customer ) ? get_field( 'firm_city', 'user_' . $customer ) : get_user_meta( $customer, 'billing_city', true ),
            'state'         => get_field( 'firm_state', 'user_' . $customer ) ? get_field( 'firm_state', 'user_' . $customer ) : get_user_meta( $customer, 'billing_state', true ),
          ) );
        }

      }

    }

  }

  

  if ( !empty( $users ) ) {

    usort( $users, function( $a, $b ) {
      return $a[ 'last_name' ] <=> $b[ 'last_name' ];
    });

    
    ob_start();
      ?>
      <ul class="user-list">

        <?php foreach ( $users as $user ) { 
          $user_img = get_avatar_url( $user[ 'email' ], 100 );
          ?>
          
          <li>
            <span class="avatar-img" style="background-image: url('<?php echo get_avatar_url( $user['email'] ); ?>');">&nbsp;</span>
            <span class="name"><?php echo $user[ 'first_name' ] . ' ' . $user[ 'last_name' ]; ?></span><br />
            <?php if ( $user[ 'practice_area' ] ) { ?><span class="practice-area"><?php echo $user[ 'practice_area' ]; ?></span><br /><?php } ?>
            <?php if ( $user[ 'firm_name' ] ) { ?><span class="firm-name"><?php echo $user[ 'firm_name' ]; ?></span><br /><?php } ?>
            <?php if ( $user[ 'city' ] && $user[ 'state' ] ) { ?><span class="address"><?php echo $user[ 'city' ]  . ', ' . $user[ 'state' ]; ?></span><br /><?php } ?>
            <span class="email"><?php echo $user[ 'email' ]; ?></span>
          </li>

        <?php } ?>

      </ul>

      <?php

    return ob_get_clean();

  } else {

    return '<p>No users found!</p>';

  }

}

add_shortcode( 'list-lab-users', 'list_lab_users_shortcode' );



/*------------------------------
Praise Cards
------------------------------*/

function praise_cards_shortcode() {

  ob_start();

  if ( comments_open() ) { comments_template( '/praise-cards.php' ); }

  return ob_get_clean();

}

add_shortcode( 'praise-cards', 'praise_cards_shortcode' );

