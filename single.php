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

<section class="section ip-white-smoke-bg single-news-details">
  <div class="grid-container">
    <div class="grid-x grid-margin-y grid-padding-x">
      <div class="cell">
        <?php
        $post_categories = wp_get_post_categories( $id );
        $cats = array();
        ?>

        <div class="spacer tiny"></div>

        <h3 class="ip-pink">
          <?php foreach ($post_categories as $c) :

            $cat = get_category( $c ); ?>

            <?= $cat->name.'&nbsp;'; ?>

          <?php endforeach; ?>

        </h3>

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
        <time><i class="icon icon-eye ip-pink"></i> <?= getPostViews($id); ?></time>
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
    <div class="grid-x grid-margin-y">
      <div class="cell">
        <h4 class="ip-pink">
          Comments: (<?= get_comments_number($id); ?>):
        </h4>
        <?php $comments = get_comments( array( 'post_id' => $id ) ); ?>
      </div>

      <div class="cell">
        <div class="grid-x grid-padding-x comment-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows": true, "autoplay": true, "autoplaySpeed": 5000 , "infinite": true, "variableWidth": false}'>

          <?php foreach ($comments as $comment): ?>

            <div class="cell comment">
              <p><?= comment_date('jS-m-Y', $comment); ?></p>
              <p><strong><?= $comment->comment_content; ?></strong></p>
              <p class="ip-teal"><?= $comment->comment_author; ?></p>
            </div>

          <?php endforeach; ?>

        </div>
      </div>

      <div class="cell comment-form">
        <?php comments_template('/comments-form.php'); ?>
      </div>
    </div>
  </div>
</article>

<?php if ( have_rows('sections', $id) ): ?>

  <?php while ( have_rows('sections', $id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>


<?php get_footer(); ?>
