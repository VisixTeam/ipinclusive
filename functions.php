<?php

// when our parent theme has loaded
add_action('visix_base_loaded', function () {

    /**
     * include Visix plugins
     */
    visix_init_plugins(['woocommerce', 'forms']);

});

/**
 * Sets child asset version
 */
add_filter('visix_alter_child_asset_version', function () {
  return '1.0.0';
}, 10, 0);

/**
* Adds admin ajax to script vars
*/
add_filter('visix_alter_script_vars', function ($script_vars = array()) {
  $script_vars['ajax_url'] = admin_url('admin-ajax.php');
  $current_url = home_url($_SERVER['REQUEST_URI']);
  $script_vars['current_url'] = explode('?',$current_url)[0];
  $script_vars['current_url_depaged'] = explode('/page', $script_vars['current_url'])[0];
  return $script_vars;
}, 10, 1);

add_theme_support( 'post-thumbnails' );

if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'General Information',
		'menu_title' 	=> 'General Information',
		'menu_slug' 	=> 'general-information',
	'icon_url'      => 'dashicons-format-aside',
	));
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

include 'functions/post_types.php';
