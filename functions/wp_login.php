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
