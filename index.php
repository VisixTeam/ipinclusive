<?php get_header(); ?>
<?php $post_id = (is_home() ? get_option('page_for_posts') : get_the_ID());?>

<?php $hero = get_field('hero_banner', $post_id); ?>

<?php visix_partial('modules/banner', $hero['hero']); ?>

<?php
$recommended = (isset($_GET['recommended']) ? $_GET['recommended'] : null);
$news_cat_id = (isset($_GET['news_cat_id']) ? $_GET['news_cat_id'] : null);
$news_tag_id = (isset($_GET['news_tag_id']) ? $_GET['news_tag_id'] : null);
?>

<section class="section ip-white-smoke-bg filtering news-filter">
  <div class="grid-container">
    <form class="posts-form" data-post-form-id="news" data-post-container="#news" data-post-pagination="#news-pagination" data-post-loading="#news-loading">
      <div class="grid-x grid-margin-y grid-padding-x medium-up-3">

        <input type="hidden" name="page" value="<?= (isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1) ?>">

        <noscript>
          <div class="text-center">
            <input type="submit" value="Update" class="button">
          </div>
        </noscript>


        <div class="cell">
          <?php visix_partial( 'inputs/field', [
            'field' => [
              'name' => 'news_cat_id',
              'id' => 'news_cat_id',
              'type' => 'select',
              'allow_null' => true,
              'placeholder' => 'Filter by categories',
              'choices' => terms_to_choices(get_all_news_cat('category')),
            ]
          ], VISIX_PLUGIN_FORMS_NAME ); ?>
        </div>
        <div class="cell">
          <?php visix_partial( 'inputs/field', [
            'field' => [
              'name' => 'recommended',
              'type' => 'select',
              'allow_null' => true,
              'placeholder' => 'View by recommended:',
              'choices' => [
                '1' => 'Most viewed',
                '2' => 'Most recent'
              ]
            ]
          ], VISIX_PLUGIN_FORMS_NAME ); ?>
        </div>
        <div class="cell">
          <?php visix_partial( 'inputs/field', [
            'field' => [
              'name' => 'news_tag_id',
              'type' => 'select',
              'allow_null' => true,
              'placeholder' => 'Filter By Tags:',
              'choices' => tags_to_choices(get_all_news_tags()),
            ]
          ], VISIX_PLUGIN_FORMS_NAME ); ?>
        </div>
      </div>
    </form>
  </div>
</section>



<section class="section news ip-white-bg">
  <div class="grid-container">
    <div id="news" class="posts-container grid-x grid-padding-x grid-padding-y">
      <?php $form_posts = get_init_page_form_posts('news', $_GET); ?>
    </div>

    <div class="grid-x grid-margin-y">
      <div class="cell">
        <div id="news-loading" class="posts-loading text-center">
          <i class="icon loading icon-spinner icon-rotate-right ip-orange"></i>
        </div>
      </div>
      <div class="cell">
        <!-- Pagination -->
        <div id="news-pagination" class="posts-pagination <?= $form_posts['more_pages'] ? 'active' : ''; ?> text-center">
          <a class="button clear orange" href="<?= get_page_form_next_page_link(); ?>">Load More <i class="icon icon-long-arrow-down"></i></a>
        </div>
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
