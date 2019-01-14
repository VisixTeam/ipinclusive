<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <a href="<?= get_permalink($info); ?>" class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </a>
    <div class="card-section">
      <h3 class="ip-pink h5"><?= get_the_title($info); ?></h3>
    </div>
  </div>
</div>
