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

function remove_menu_items(){
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menu_items', 999 );

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

function get_all_child_pages(){
  $page_id = get_page_id_by_title('About');

  $args = array(
    'post_parent' => $page_id,
    'post_status' => 'publish',
    'post_type' => 'page'
  );

  $children = get_children($args);

  return $children;
}
