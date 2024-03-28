<?php
function lemvigh_muller_update_products($api_data) {
    foreach ($api_data as $product) {
        $product_id = $product['product_id'];
        $new_stock_quantity = $product['stock_quantity'];
        $new_price = $product['price'];

        update_post_meta($product_id, '_stock', $new_stock_quantity);
        update_post_meta($product_id, '_stock_status', 'instock');
        update_post_meta($product_id, '_regular_price', $new_price);
        update_post_meta($product_id, '_price', $new_price);
        update_post_meta($product_id, 'lemvigh_muller_last_sync', current_time('mysql'));
    }
}