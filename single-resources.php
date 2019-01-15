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


<section class="section ip-white-bg">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell">
        <?= $content; ?>
      </div>

      <div class="cell">
        <?php $download = get_field('download', $id) ?>
        <h5><a class="button clear pink" target="_blank" href="<?= $download['url']; ?>">Download <i class="icon icon-download ip-pink"></i></a></h5>
      </div>
    </div>
  </div>
</section>


<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>

<?php get_footer(); ?>
