<?php
add_action('init', 'lemvigh_muller_scheduler_init');

function lemvigh_muller_scheduler_init() {
    if (!wp_next_scheduled('lemvigh_muller_sync_daily')) {
        wp_schedule_event(strtotime('00:30:00'), 'daily', 'lemvigh_muller_sync_daily');
    }
    add_action('lemvigh_muller_sync_daily', 'lemvigh_muller_sync_products');
}

function lemvigh_muller_sync_products() {
    $api_client = Lemvigh_Muller_API_Client::get_instance();
    $api_data = $api_client->fetch_data();
    if ($api_data) {
        lemvigh_muller_update_products($api_data);
    }
}