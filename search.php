<?php get_header(); ?>

<?php $allsearch = new WP_Query(
  array(
    'post_type' => array('page', 'post', 'resources', 'events'),
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
    'showposts' => 9,
    's' => $s
  )
); ?>

<?php visix_partial('modules/banner', ['communities_title' => 'Your search for', 's' => $s ,'communities_background_image' => '/wp-content/uploads/2019/01/parrots-277093_1280.jpg)']); ?>

<section class="section search-form">
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</section>

<main class="section">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell">
        <?php if(!empty($s)): ?>
          <h4 class="ip-teal">Your search for <mark><em>"<?php echo $s ?>"</em></mark> matched <?php echo $allsearch ->found_posts; ?> page<?= ($allsearch ->found_posts > 1) ? '(s).' : '.'?></h4>
        <?php endif; ?>
      </div>
    </div>

    <div class="grid-x grid-margin-y grid-margin-x">
      <?php if ($allsearch->have_posts()): ?>
        <?php while($allsearch->have_posts()) : $allsearch->the_post(); ?>
          <?php $post_type = get_post_type(); ?>
          <div class="cell medium-4">
            <a href="<?= get_permalink();?>"><h4 class="ip-orange h3"><?= get_the_title(); ?></h4></a>
            <div class="spacer tiny"></div>

            <a href="<?= get_permalink();?>" class="button clear teal">View <?= $post_type; ?> <i class="icon icon-long-arrow-right"></i></a>
          </div>
        <?php endwhile; ?>

        <div class="spacer"></div>

        <div class="cell text-center">
          <?= custom_paginate_links(array('type' => 'list')); ?>
        </div>
      <?php else : ?>
        <div class="cell">
          <div class="callout large alert">
            <h5>No results found for <mark><em><?= $s; ?></em></mark></h5>
            <p>Please retype the correct word.</p>
          </div>
        </div>

      <?php endif; ?>
    </div>
  </div>
</main>


  <?php get_footer(); ?>
