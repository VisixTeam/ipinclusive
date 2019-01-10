
<?php if($has_background_image): ?>

<section class="banner top-banner" style="background-image: url(<?= esc_url($image); ?>);">

<?php else: ?>

<section class="banner top-banner">

<?php endif; ?>

  <div class="grid-container">
    <div class="grid-x">
      <div class="cell text-center medium-text-left large-6">

        <?php if($has_custom_title): ?>
          <h1 style="color: <?= ($color_title ? $title_color : '' ); ?>"><?= $custom_title; ?></h1>
        <?php else: ?>
          <h1 style="color: <?= ($color_title ? $title_color : '' ); ?>"><?= get_the_title(); ?></h1>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
