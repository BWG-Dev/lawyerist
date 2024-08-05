<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Default greeting and logout link removed.

if ( is_plugin_active( 'scorecard-helper/scorecard-helper.php' ) ) {

	// Outputes the Scorecard Report Card widget.

	$logout_link = '<a href="'. esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) . '">Log Out</a>';

	$current_user = wp_get_current_user();

	?>

<!--	<div id="small-firm-dashboard-container">
		<p id="dashboard-title"><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>'s Small Firm Dashboard</p>
		<div id="small-firm-dashboard">
			<?php
			//echo scorecard_results_graph();

			/*if ( wc_customer_bought_product( '', get_current_user_id(), 321206 ) ) {
				echo financial_scorecard_graph();
			}*/

			?>
		</div>
	</div>
-->
	<?php 

}

	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	//echo do_shortcode('[profilepress-my-account]');

	?>
	



<!-- Start Downloads-->
<?php
$downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<h2>Downloads</h2>
<?php if ( $has_downloads ) : ?>
	<?php do_action( 'woocommerce_before_available_downloads' ); ?>

	<?php do_action( 'woocommerce_available_downloads', $downloads ); ?>

	<?php do_action( 'woocommerce_after_available_downloads' ); ?>

<?php else : ?>

	<?php

	$wp_button_class = wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '';
	wc_print_notice( esc_html__( 'No downloads available yet.', 'woocommerce' ) . ' <a class="button wc-forward' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment 
	?>

<?php endif; ?>

<!-- Start Courses -->
<h2>Courses</h2>
<?php 

$user_id = get_current_user_id();

    $orders_args = [
        'status'    => 'any',
        'customer_id' => $user_id,
        'status' => array_keys( wc_get_is_paid_statuses() )        
    ];
    $orders = wc_get_orders($orders_args);
    
    if($orders) {
        $product_ids = [];
        foreach($orders as $order) {
            $order_id = $order->get_id();
            $order = wc_get_order($order_id);
            //echo $order_id . '<br>';
            $items = $order->get_items();
            
            //$items = $order_id->get_items();

            foreach( $items as $item) {
                $product_id = $item->get_product_id();
                
                $terms = get_the_terms( $product_id, 'product_cat' );
                foreach ($terms as $term) {
                    $product_cat_id = $term->term_id;
                    if( $product_cat_id == 49817 ) {
                        array_push($product_ids, ['order_id' => $order_id,'prod_id' => $product_id] );
                    }
                }
            }
        }
        
        if( $product_ids ) :?> 
        
        <section class="woocommerce-order-downloads">
            <table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
            <thead>
                <tr>
                    <th class="download-product"><span class="nobr">Product</span></th>
                    <th class="download-file"><span class="nobr">Actions</span></th>
                </tr>
            </thead>
            <tbody>

            <?php foreach( $product_ids as $product_id ) : ?>
                <tr>
                    <td class="courses-product">
                        <a href="/online/account/view-order/<?php echo esc_html($product_id['order_id']) ?>/"><?php echo get_the_title( $product_id['prod_id']); ?></a>
                    </td>
                    <td class="courses-view">
                        <a class="woocommerce-button button view" href="/online/account/view-order/<?php echo esc_html($product_id['order_id']) ?>/">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </section>
        
        <?php else : ?>
            <p>No courses available yet.</p>
        <?php 
        endif;

     } else {
        ?>
        <p>No courses available yet.</p>
        <?php
    }
?>










	
	<?php
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
