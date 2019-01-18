<?php /* Template Name: Resources */ ?>

<?php get_header(); ?>

<?php $hero = get_field('hero_banner'); ?>

<?php visix_partial('modules/banner', $hero['hero']); ?>

<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>


<?php
  $recommended = (isset($_GET['recommended']) ? $_GET['recommended'] : null);
  $resource_cat_id = (isset($_GET['resource_cat_id']) ? $_GET['resource_cat_id'] : null);
  $query = (isset($_GET['query']) ? $_GET['query'] : null);
?>

<section class="section ip-white-smoke-bg resources-filtering filtering">
  <div class="grid-container">
    <div class="grid-x grid-margin-y grid-padding-x medium-up-3">
      <div class="cell">
        <?php visix_partial( 'inputs/field', [
          'field' => [
            'name' => 'recommended',
            'type' => 'select',
            'allow_null' => true,
            'placeholder' => 'View by:',
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
            'name' => 'resource_cat_id',
            'type' => 'select',
            'allow_null' => true,
            'placeholder' => 'Filter by:',
            'choices' => terms_to_choices(get_all_resources_types()),
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
      <div class="cell">
        <?php visix_partial( 'inputs/field', [
          'field' => [
            'name' => 'query',
            'type' => 'search',
            'allow_null' => true,
            'placeholder' => 'Search:',
          ]
        ], VISIX_PLUGIN_FORMS_NAME ); ?>
      </div>
    </div>
  </div>
</section>

<?php $information = get_all_resources($recommended, $resource_cat_id, $query); ?>

<?php if($information): ?>

<section class="section ip-white-bg cards resources">
  <div class="grid-container one-col">
    <div class="grid-x grid-margin-y cards-section" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows": true, "infinite": true, "variableWidth": false}'>

      <?php foreach($information as $info): ?>

        <?php visix_partial('inc/resources', ['info' => $info]); ?>

      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php else: ?>

  <div class="section grid-container">
   <div class="grid-x">
     <div class="cell">
       <div class="card large alert">
         <h2>No Resources found</h2>
         <p>Please filter different option.</p>
       </div>
     </div>
   </div>
 </div>

<?php endif; ?>

<?php get_footer(); ?>
