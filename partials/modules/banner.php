<?php $post_id = (is_home() ? get_option('page_for_posts') : get_the_ID());?>

<?php if($has_background_image): ?>

  <section class="banner top-banner b-lazy" data-blazy="<?= esc_url($image); ?>">

  <?php elseif(!empty($communities_background_image)): ?>

    <section class="banner top-banner b-lazy" data-blazy="<?= esc_url($communities_background_image); ?>">

    <?php else: ?>

      <section class="banner top-banner">

      <?php endif; ?>

      <div class="grid-container">
        <div class="grid-x">
          <div class="cell text-center medium-text-left large-6">

            <?php if($has_custom_title): ?>
              <h1 style="color: <?= ($color_title ? $title_color : '' ); ?>"><?= $custom_title; ?></h1>
            <?php elseif(!empty($communities_title)): ?>
              <h1><?= $communities_title; ?></h1>
            <?php else: ?>
              <h1 style="color: <?= ($color_title ? $title_color : '' ); ?>"><?= get_the_title(); ?></h1>
            <?php endif; ?>

            <?php if (is_404()): ?>
              <div class="spacer tiny"></div>
              <h3 class="ip-teal"><?php _e( 'It looks like nothing was found at this location.', 'ipinclusive' ); ?></h3>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section>
