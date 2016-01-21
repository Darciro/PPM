<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ppm_Inscricao
 * @subpackage Ppm_Inscricao/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ppm_Inscricao
 * @subpackage Ppm_Inscricao/includes
 * @author     Your Name <email@example.com>
 */
class Ppm_Inscricao_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{

		// Create a shortcode
		//[ppm_subscription]
		//function ppm_subscription_shortcode( $atts ){
		//	return "foo and bar";
		//}
		//add_shortcode( 'ppm_subscription', 'ppm_subscription_shortcode' );

		// Create a subscribe page
		$subscribe_page_title = 'Inscrição';
		$subscribe_page_content = '[ppm_subscription]';
		$subscribe_page_template = 'inscricao-template.php';

		$page_subscribe_check = get_page_by_title($subscribe_page_title);
		$subscribe_page = array(
			'post_type' => 'page',
			'post_title' => $subscribe_page_title,
			'post_content' => $subscribe_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
		);
		if (!isset($page_subscribe_check->ID)) {
			$subscribe_page_id = wp_insert_post($subscribe_page);
			//if(!empty($subscribe_page_template)){
			//        update_post_meta($subscribe_page_id, '_wp_page_template', $subscribe_page_template);
			//}
		}

		// Create a subscriptions page
		$subscriptions_page_title = 'Acompanhar Inscrição';
		$subscriptions_page_content = '[ppm_performed_subscriptions]';
		// $subscriptions_page_template = 'inscricao-template.php';

		$page_subscriptions_check = get_page_by_title($subscriptions_page_title);
		$subscriptions_page = array(
			'post_type' => 'page',
			'post_title' => $subscriptions_page_title,
			'post_content' => $subscriptions_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
		);
		if (!isset($page_subscriptions_check->ID)) {
			$subscriptions_page_id = wp_insert_post($subscriptions_page);
		}

		// $ppm_db = $wpdb->prefix . 'ppm_votation';

		// function to create the DB / Options / Defaults
		// function ppm_votation_table() {
			global $wpdb;
			$charset_collate = $wpdb->get_charset_collate();
			// global $ppm_db;
			$table_name = $wpdb->prefix . 'ppm_votation';

			// create the ECPT metabox database table
			if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
				$sql = "CREATE TABLE $table_name (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					user_id mediumint(9) NOT NULL,
					time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					choices longtext NOT NULL,
					UNIQUE KEY id (id)
				) $charset_collate;";
				require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($sql);
			}

		// }
		// run the install scripts upon plugin activation
		// register_activation_hook(__FILE__,'ppm_votation_table');
	}

}
