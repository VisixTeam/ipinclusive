<?php
function my_login_logo_one() { ?>
  <style type="text/css">
  body.login div#login h1 a {
    background-image: url('<?= site_url('/wp-content/uploads/2019/01/ip-logo.svg'); ?>');
    background-size: contain;
    width: 100%;
    background-repeat: no-repeat;
    background-position: center;
    padding-bottom: 30px;
  }
  </style>
  <?php

} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );


/**
* Predefine the colour grid with custom colour wp content editor
**/
function my_mce4_options($init) {

  $custom_colours = '
  "9E3D90", "Pink",
  "0077A1", "Blue",
  "F49B25", "Orange",
  "7FA025", "Green",
  "FFFFFF", "White",
  "555555", "Gray",
  ';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$custom_colours.']';

  // change the number of rows in the grid if the number of colors changes
  // 8 swatches per row
  $init['textcolor_rows'] = 1;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');
