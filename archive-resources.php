<?php get_header(); ?>

<?php $post_id = (is_home() ? get_option('page_for_posts') : get_the_ID());?>

<?php visix_partial('modules/banner', array('communities_title' => 'Resources', 'communities_background_image' => '/wp-content/uploads/2019/01/banner-example.jpg')); ?>

<?php get_footer(); ?>
