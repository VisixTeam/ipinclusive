<?php get_header(); ?>

<?php
  $post_id = (is_home() ? get_option('page_for_posts') : get_the_ID());

  $id = get_the_ID();
  $content_post = get_post($id);
  $content = $content_post->post_content;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
?>

<?php $image = get_the_post_thumbnail_url($id); ?>

<?php visix_partial('modules/banner', ['custom_title' => get_the_title($id), 'communities_background_image' => $image]); ?>


<?php $community = get_field('community'); ?>

<section class="section members" style="background-color: <?= $community['colour']; ?>;">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell medium-9">
        <span style="color: <?= $community['colour']; ?>"><?= getPostViews($id); ?> </span> Members
      </div>
      <div class="cell medium-3">
        <a href="<?= site_url('stay-in-touch'); ?>" target="_blank" class="button hollow white">Join this community</a>
      </div>
    </div>
  </div>
</section>

<section class="section ip-white-smoke-bg">
  <div class="grid-container">
    <div class="grid-x">
      <?= $content; ?>
    </div>
  </div>
</section>

<?php if ( have_rows('sections', $id) ): ?>

  <?php while ( have_rows('sections', $id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>

<?php get_footer(); ?>
