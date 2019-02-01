<?php
/**
* Pretty prints variable with the title provided
*/
function pp($var, $title = false) {
  echo "<pre style='font-size:12px;'>";
  if ($title) {
    echo "<strong>" . $title . "</strong></br><hr>";
  }
  print_r($var);
  echo "</pre>";
}

function add_file_types_to_uploads($file_types) {
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_action( 'wp_head', 'n8f_add_ios_phone_number_blocker_to_meta');
function n8f_add_ios_phone_number_blocker_to_meta() {
  echo '<meta name="format-detection" content="telephone=no">';
}

function get_pages_by_post_type($post_type) {
  $args = array(
    'post_type' => $post_type,
    'post_status'  => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'fields' => 'ids',
    'showposts' => 3,
  );

  $query = new WP_Query($args);

  return $query->posts;
}

function get_page_id_by_title($title){
  $page = get_page_by_title($title);
  return $page->ID;
}


get_page_id_by_title('how are you');

function get_all_child_pages($page_title){
  $page_id = $page_title;

  $args = array(
    'post_parent' => $page_id,
    'post_status' => 'publish',
    'fields' => 'ids',
    'post_type' => 'page'
  );

  $children = get_children($args);

  return $children;
}

function readmore($fullText){
  if(@strpos($fullText, '<!--more-->')){
    $morePos  = strpos($fullText, '<!--more-->');
    $fullText = preg_replace('/<!--(.|\s)*?-->/', '', $fullText);
    print substr($fullText,0,$morePos);
    print "<div class=\"read-more-content hide\">". substr($fullText,$morePos,-1) . "</div>";
    print "<a class=\"button clear orange read-more\">Read More</a>";
  } else {
    print $fullText;
  }
}

function modify_post_mime_types( $post_mime_types ) {
  $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
  return $post_mime_types;
}
add_filter( 'post_mime_types', 'modify_post_mime_types' );


// function to display number of posts.
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

// function to count views.
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

$type = 'resources';
if (isset($_GET['post_type'])) {
  $type = $_GET['post_type'];
}
// Add it to a column in WP-Admin
if(is_admin() && 'resources' == $type) {
  add_filter('manage_posts_columns', 'posts_column_views');
  add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
}

function posts_column_views($defaults){
  $defaults['post_views'] = __('Views');
  return $defaults;
}
function posts_custom_column_views($column_name, $id){
  if($column_name === 'post_views'){
    echo getPostViews(get_the_ID());
  }
}

// functions to add a class to search terms on search results page
function search_title_highlight() {
  $title = get_the_title();
  $keys = implode('|', explode(' ', get_search_query()));
  $title = preg_replace('/(' . $keys .')/iu', '<mark>\0</mark>', $title);

  echo $title;
}

function search_excerpt_highlight() {
    $excerpt = the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<mark>\0</mark>', $excerpt);

    echo $excerpt;
}


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
