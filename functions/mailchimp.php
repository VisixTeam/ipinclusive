<?php

function rudr_mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
  if( $request_type == 'GET' )
  $url .= '?' . http_build_query($data);

  $mch = curl_init();
  $headers = array(
    'Content-Type: application/json',
    'Authorization: Basic '.base64_encode( 'user:'. $api_key )
  );
  curl_setopt($mch, CURLOPT_URL, $url );
  curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
  //curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
  curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
  curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
  curl_setopt($mch, CURLOPT_TIMEOUT, 10);
  curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection

  if( $request_type != 'GET' ) {
    curl_setopt($mch, CURLOPT_POST, true);
    curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
  }

  return curl_exec($mch);
}


$api_key = '9c7506fe6cbc5fe7c98ebc644a620f8a-us17';

// Query String Perameters are here
// for more reference please vizit http://developer.mailchimp.com/documentation/mailchimp/reference/lists/
$data = array(
  'fields' => array('segments'), // total_items, _links
  // 'email' => 'ipinclusivedata@gmail.com',
  'count' => 1, // the number of lists to return, default - all
);

$url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
$result = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $api_key, $data) );
pp( $result->lists[0]->_links);

// function get_mailchimp_count() {
//
//   $api_key = '9c7506fe6cbc5fe7c98ebc644a620f8a-us17';
//
//   // Query String Perameters are here
//   // for more reference please vizit http://developer.mailchimp.com/documentation/mailchimp/reference/lists/
//   $data = array(
//     'fields' => array('lists'), // total_items, _links
//     'email' => 'ipinclusivedata@gmail.com',
//     'count' => 1, // the number of lists to return, default - all
//   );
//
//   $url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
//   $result = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $api_key, $data) );
//   pp( $result);
//
//   if( !empty($result->lists) ) {
//
//     return $result->lists[0]->stats->member_count;
//
//   }
//   return 0;
// }
//
// /**
// * Get form posts callback
// */
// function get_mailchimp_count_callback() {
//   // Handle request then generate response using WP_Ajax_Response
//   ob_clean(); // Clean debug messages if debug turned on
//
//   $post_data = $_POST;
//
//   $res = json_encode(
//     (object) [
//       'mailchimp_count'  => get_mailchimp_count(),
//     ]
//   );
//
//   wp_send_json_success($res);
//
//   // Stop execution after being ran
//   wp_die();
// }
// add_action('wp_ajax_get_mailchimp_count', 'get_mailchimp_count_callback');
// add_action('wp_ajax_nopriv_get_mailchimp_count', 'get_mailchimp_count_callback');
