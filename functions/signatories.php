<?php
/**
* Get all Signatories by search query
**/

function get_signatories($query = null) {
  $args = array(
    'post_type' => 'signatories',
    'post_status' => 'publish',
    'showposts' => -1,
    'fields' => 'ids',
  );

  if($query !== null) {
    $args['s'] = $query;
  }

  return (new WP_Query($args))->posts;
}


/**
 * Register post form with options
 *
 * @param array		$post_data	$_GET or $_POST array of request
 * @param array 	$args				WP_Query args
 *
 * @return array 	Specific args for post form
 */
add_filter('visix_register_post_forms', function ($post_forms) {

	$post_forms['signatories'] = [
		'submit_type' 		=> 'on-change',	// on-submit / on-change
		'pagination_type' => 'load-more'	// load-more / page-numbers
	];

	return $post_forms;

}, 1, 10);

/**
 * Change post form args
 *
 * @param array		$post_data	$_GET or $_POST array of request
 * @param array 	$args				WP_Query args
 *
 * @return array 	Specific args for post form
 */
add_filter('visix_post_forms_args_signatories', function ($args, $post_data) {

	// E.g. query by category
  $args['post_type'] = 'signatories';
  $args['post_per_page'] = 6;
  $args['s'] = $post_data['query'];
  return $args;

}, 1, 10);

/**
 * Generate posts html
 *
 * @param array $post_ids	List of post ids from query
 *
 * @param array List of html for each post
 */
add_filter('visix_post_forms_posts_html_signatories', function ($posts_html, $post_ids) {

	foreach ($post_ids as $post_id) {
    $posts_html[] =  visix_partial('listings/signatories', ['post_id' => $post_id], false, false);
	}
	return $posts_html;


	return $posts_html;

}, 1, 10);

/**
 * Generate empty posts html message
 *
 * @param array $post_ids	List of post ids from query
 *
 * @return String HTML of no posts found
 */
add_filter('visix_post_forms_posts_empty_html_signatories', function () {

	return sprintf('
  <div class="cell text-center">
    <div class="spacer"></div>
      <h3>No Signatories found</h3>
    <div class="spacer"></div>
  </div>
  ');

}, 1, 10);
