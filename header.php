<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>

  <?php
  if (!has_blank_flag( 'use_wp_favicon' )) {
    visix_partial( 'favicon', ['color' => '#fafafa'] );
  }
  ?>

  <?php $gtmId = get_field( 'gtm', 'analytics' ); ?>
  <?php if ($gtmId) : ?>
    <?php visix_partial( 'gtm-head', ['id' => $gtmId] ); ?>
  <?php endif; ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132362113-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-132362113-1');
  </script>


<?php visix_partial( 'iubenda' ); ?>
</head>

<body <?php body_class(); ?>>
  <?php if ($gtmId) : ?>
    <?php visix_partial( 'gtm-body' ); ?>
  <?php endif; ?>

  <?php do_action('visix_header'); ?>
