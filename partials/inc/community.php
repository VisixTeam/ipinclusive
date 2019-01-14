<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </div>
    <div class="card-section">

      <div class="spacer tiny"></div>

      <h3 class="ip-teal h3"><?= get_the_title($info); ?></h3>
      <div class="spacer tiny"></div>
      <a class="button clear orange" href="<?= get_permalink($info); ?>">Learn more <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
