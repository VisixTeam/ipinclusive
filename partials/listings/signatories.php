<div class="cell">
  <div class="card">
    <?php $card_image = get_the_post_thumbnail_url($post_id); ?>
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($post_id); ?>" <?php endif; ?>>
    </div>
    <div class="card-section">
      <h4 class="ip-pink"><?= get_the_title($post_id); ?></h4>
    </div>
  </div>
</div>
