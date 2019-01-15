<?php /* Template Name: Resources */ ?>

<?php get_header(); ?>

<?php $hero = get_field('hero_banner'); ?>

<?php visix_partial('modules/banner', $hero['hero']); ?>

<section class="section ip-white-smoke-bg filtering">
  <div class="grid-container">
    <div class="grid-x grid-margin-y grid-padding-x medium-up-3">
      <div class="cell">
        <?php visix_partial( 'inputs/field', [
          'field' => [
            'name' => 'related_community',
            'type' => 'select',
            'allow_null' => true,
            'placeholder' => 'View by',
            'choices' => ids_to_choices(get_pages_by_post_type('community')),
            'attributes' => [
              'data-minlength' => '10'
            ],
            'option' => [
              'attributes' => [
              ]
            ]
          ]
        ], VISIX_PLUGIN_FORMS_NAME ); ?>
      </div>
      <div class="cell"></div>
      <div class="cell"></div>
    </div>
  </div>
</section>


<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>

<?php get_footer(); ?>
