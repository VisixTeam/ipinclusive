<?php

function get_all_news_cat($tax) {
  return get_categories(array(
    'orderby' => 'name',
    'taxonomy' => $tax,
  ));
}

function get_all_news_tags(){
  return get_tags(array(
    'orderby' => 'name',
    'post_type' => 'post'
  ));
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

  $args['post_type'] = 'post';

  if(isset($post_data['news_cat_id']) && $post_data['news_cat_id'] ) {
    $args['cat'] = $post_data['news_cat_id'];
  }

  if(isset($post_data['news_tag_id']) && $post_data['news_tag_id'] ) {
    $args['tag_id'] = $post_data['news_tag_id'];
  }

  if ($post_data['recommended'] == '1') {
    $args['orderby'] = 'meta_value_num';

    $args['meta_query'] = array(
      array(
        'key' => 'post_views_count',
        'value' => 0,
        'compare' => '>'
      )
    );
  } elseif($post_data['recommended'] == '2') {
    $args['orderby'] = 'publish_date';
    $args['order'] = 'DESC';
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
  <h3>No post found</h3>
  <div class="spacer"></div>
  </div>
  ');

}, 1, 10);

// Registering custom post status
function wpb_custom_post_status(){
  register_post_status('archived', array(
    'label'                     => _x( 'Archive', 'post' ),
    'public'                    => false,
    'exclude_from_search'       => false,
    'show_in_admin_all_list'    => true,
    'show_in_admin_status_list' => true,
    'label_count'               => _n_noop( 'Archive <span class="count">(%s)</span>', 'Archive <span class="count">(%s)</span>' ),
  ) );
}
add_action( 'init', 'wpb_custom_post_status' );

// Using jQuery to add it to post status dropdown
add_action('admin_footer-post.php', 'wpb_append_post_status_list');
function wpb_append_post_status_list(){
  global $post;
  $complete = '';
  $label = '';
  if($post->post_type == 'post'){
    if($post->post_status == 'archived'){
      $complete = ' selected="selected"';
      $label = '<span id="post-status-display"> Archive</span>';
    }
    echo '
    <script>
    jQuery(document).ready(function($){
      $("select#post_status").append("<option value=\"archived\" '.$complete.'>Archive</option>");
      $(".misc-pub-section label").append("'.$label.'");
    });
    </script>
    ';
  }
}


//allows you to add your custom post status into quick edit dropdown.
add_action('admin_footer-edit.php','rudr_status_into_inline_edit');

function rudr_status_into_inline_edit() { // ultra-simple example
	echo "<script>
	jQuery(document).ready( function() {
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"archived\">Archive</option>' );
	});
	</script>";
}

function rudr_display_status_label( $statuses ) {
	global $post; // we need it to check current post status
	if( get_query_var( 'post_status' ) != 'archived' ){ // not for pages with all posts of this status
		if( $post->post_status == 'archived' ){ // если статус поста - Архив
			return array('Archive'); // returning our status label
		}
	}
	return $statuses; // returning the array with default statuses
}
add_filter( 'display_post_states', 'rudr_display_status_label' );

add_action('future_to_publish', 'set_status_online_wpse_95701');
function set_status_online_wpse_95701( $post ) {
  if ( $post && $post->post_type==="post"){
    $post->post_status="archived"; // change the post_status
    wp_update_post( $post );
  }
}

add_action('init','my_hourly_event');
function my_hourly_event() {
	$the_query = get_posts('post_type=post');
	foreach($the_query as $single_post) {
		$id = $single_post->ID;
		$ad_close_date = get_field('schedule_archive', $id, false);

    if($ad_close_date != ''){
			$today = date("Y-m-d H:i:s");
			if($ad_close_date < $today){
				$update_post = array(
				'ID' 			=> $id,
				'post_status'	=>	'archived',
				'post_type'	=>	'post');
				wp_update_post($update_post);
			}
		}
	}
}
