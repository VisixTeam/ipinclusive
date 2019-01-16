<?php

function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0";
  }
  return $count;
}

function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Register post form with options
 *
 * @param array		$post_data	$_GET or $_POST array of request
 * @param array 	$args				WP_Query args
 *
 * @return array 	Specific args for post form
 */
add_filter('visix_register_post_forms', function ($post_forms) {

	$post_forms['news'] = [
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
add_filter('visix_post_forms_args_news', function ($args, $post_data) {

	// E.g. query by category
  if(isset($post_data['cat']) && $post_data['cat'] ) {
    $args['cat'] = $post_data['cat'];
  }

  return $args;

}, 1, 10);

/**
 * Generate posts html
 *
 * @param array $post_ids	List of post ids from query
 *
 * @param array List of html for each post
 */
add_filter('visix_post_forms_posts_html_news', function ($posts_html, $post_ids) {

	foreach ($post_ids as $post_id) {

    $posts_html[] =  visix_partial('listings/article', ['post_id' => $post_id], false, false);

	}

	return $posts_html;

}, 1, 10);

/**
 * Return list of article category objects
 */
function get_post_categories($args = []) {
  $cat = [];
  $cat_objs = get_categories($args);

  foreach($cat_objs as $cat_obj) {
    $cat[] = [
      'term_id' => $cat_obj->term_id,
      'title' => $cat_obj->name,
    ];
  }

  return $cat;
}
