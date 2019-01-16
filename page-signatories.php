<?php /* Template Name: Signatories */ ?>

<?php get_header(); ?>

<?php $hero = get_field('hero_banner'); ?>

<?php visix_partial('modules/banner', $hero['hero']); ?>

<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>

<?php
$query = (isset($_GET['query']) ? $_GET['query'] : null);
?>

<section class="section filtering signatories-filtering ip-white-bg">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell medium-3">
        <h2 class="ip-teal">Signatories</h2>
      </div>
      <div class="cell medium-9">
        <form class="posts-form" data-post-form-id="signatories" data-post-container="#signatories" data-post-pagination="#signatories-pagination" data-post-loading="#signatories-loading">

          <div class="grid-x grid-margin-y grid-padding-x align-middle">
            <div class="cell small-4 medium-6 large-2">
              <p class="ip-green">Search:</p>
            </div>
            <div class="cell small-8 medium-6 large-10">
              <?php visix_partial( 'inputs/field', [
                'field' => [
                  'name' => 'query',
                  'id' => 'query',
                  'type' => 'search',
                  'allow_null' => true,
                ]
              ], VISIX_PLUGIN_FORMS_NAME ); ?>
            </div>
          </div>

          <div class="spacer"></div>



          <input type="hidden" name="page" value="<?= (isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1) ?>">

          <noscript>
            <div class="text-center">
              <input type="submit" value="Update" class="button">
            </div>
          </noscript>

        </form>

        <div id="signatories" class="posts-container grid-x grid-margin-y signatory grid-padding-x medium-up-2 large-up-4">
          <?php $form_posts = get_init_page_form_posts('signatories', $_GET); ?>
        </div>

        <div class="grid-x grid-margin-y">
          <div class="cell">
            <div id="signatories-loading" class="posts-loading text-center">
              <i class="icon loading icon-spinner icon-rotate-right ip-orange"></i>
            </div>
          </div>
          <div class="cell">
            <!-- Pagination -->
            <div id="signatories-pagination" class="posts-pagination <?= $form_posts['more_pages'] ? 'active' : ''; ?> text-center">
              <a class="button clear orange" href="<?= get_page_form_next_page_link(); ?>">Load More <i class="icon icon-long-arrow-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
