<?php
/**
 * Template Name: Account Dashboard
 */
get_header();

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div id="column_container">

	<div id="content_column">

		<?php

		// Default greeting and logout link removed.
	?>
	<h1><?php the_title();?></h1>
	<?php

	the_content();
	if ( is_plugin_active( 'scorecard-helper/scorecard-helper.php' ) ) {

	// Outputes the Scorecard Report Card widget.

	//$logout_link = '<a href="'. esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) . '">Log Out</a>';

	$current_user = wp_get_current_user();

	?>

	<div id="small-firm-dashboard-container">
		<p id="dashboard-title"><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>'s Small Firm Dashboard</p>
		<div id="small-firm-dashboard">
			<?php
			echo scorecard_results_graph();

			//if ( wc_customer_bought_product( '', get_current_user_id(), 321206 ) ) {
				echo financial_scorecard_graph();
			//}

			?>
		</div>
	</div>

	<?php 

}

		?>

	</div><!-- end #content_column -->

</div><!--end #column_container-->

<?php get_footer(); ?>
