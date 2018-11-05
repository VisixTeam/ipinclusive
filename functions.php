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
function blank_child_asset_version() {
  return '1.0.0';
}
add_filter('visix_alter_child_asset_version', 'blank_child_asset_version', 10, 0);

/**
* Adds admin ajax to script vars
*/
function blank_script_vars($script_vars = array()) {
  $script_vars['ajax_url'] = admin_url('admin-ajax.php');
  return $script_vars;
}
add_filter('visix_alter_script_vars', 'blank_script_vars', 10, 1);
