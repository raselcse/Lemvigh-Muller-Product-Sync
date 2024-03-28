<?php
/**
 * Plugin Name: Lemvigh-Muller Product Sync
 * Description: Syncs product stock and prices from Lemvigh-Muller API to WooCommerce.
 */

// Include necessary files

require_once plugin_dir_path(__FILE__) . 'includes/api-client.php';
require_once plugin_dir_path(__FILE__) . 'includes/scheduler.php';
require_once plugin_dir_path(__FILE__) . 'includes/updater.php';
$api_client = Lemvigh_Muller_API_Client::get_instance();
$api_data = $api_client->fetch_data();
var_dump($api_data);