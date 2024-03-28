<?php

// function lemvigh_muller_fetch_data() {

//     $api_url = 'https://example.com/api/products';
//     $api_key = 'YOUR_API_KEY';
    
//     $response = wp_remote_get($api_url, array(
//         'headers' => array(
//             'Authorization' => 'Bearer ' . $api_key,
//         ),
//     ));

//     // Check if the request was successful
//     if (is_wp_error($response)) {
//         return false;
//     }

  
//     $api_data = json_decode(wp_remote_retrieve_body($response), true);

//     if (!$api_data || empty($api_data['products'])) {
//         return false;
//     }

//     return $api_data['products'];
// }


class Lemvigh_Muller_API_Client {
    private static $instance = null;

    private function __construct() {}

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function fetch_data() {
        $wsdl_url = 'https://smartclient.lemu.dk/LMGetPrice.asmx?wsdl';
        $soap_options = array('cache_wsdl' => WSDL_CACHE_NONE, 'trace' => true, 'exceptions' => true);
        $headers = array('Username' => 'schools', 'Password' => 'schools');

        try {
            $client = new SoapClient($wsdl_url, $soap_options);
            $response = $client->__soapCall('GetExtendedPrice', array($headers));
            return $response;
        } catch (SoapFault $e) {
            error_log('SOAP Error: ' . $e->getMessage());
            return false;
        }
    }
}