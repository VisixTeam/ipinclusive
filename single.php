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

<section class="section ip-white-smoke-bg">
  <div class="grid-container">
    <div class="grid-x grid-margin-y grid-padding-x">
      <div class="cell">
        <?php $related_comunity = get_field('related_community', $id); ?>

        <div class="spacer tiny"></div>

        <?php if(is_array($related_comunity)): ?>

          <h5 class="ip-pink">
            <?php foreach ($related_comunity as $related_comunity_index =>  $comunity) : ?>

              <?= get_the_title($comunity).'&nbsp;'; ?>

            <?php endforeach; ?>

          </h5>
        <?php else: ?>

          <h5 class="ip-pink"><?= get_the_title($related_comunity); ?></h5>

        <?php endif; ?>

      </div>
      <div class="cell small-4">
        <?php
          global $post;
          $author_id=$post->post_author;
         ?>
        <time><i class="icon icon-account-o ip-pink"></i> <?= ucwords(get_the_author_meta( 'user_nicename' , $author_id )); ?></time>
      </div>

      <div class="cell small-4">
        <time><i class="icon icon-comment ip-pink"></i> <?= get_comments_number($id); ?></time>
      </div>

      <div class="cell small-4">
        <time><i class="icon icon-thumb-up ip-pink"></i> <?= getPostViews($id); ?></time>
      </div>
    </div>
  </div>
</section>

<article class="section main-article">
  <div class="grid-container">
    <div class="grid-x">
      <?= $content; ?>
    </div>
    <div class="spacer tiny"></div>
    <div class="grid-x">
      <h4 class="ip-pink">
        Comments: (<?= get_comments_number($id); ?>):
      </h4>
    </div>
  </div>
</article>

<?php if ( have_rows('sections', $id) ): ?>

  <?php while ( have_rows('sections', $id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>


<?php get_footer(); ?>
