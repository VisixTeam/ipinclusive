<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <?php $signatory = get_field('signatories', $info); ?>
  <?php $card_image = $signatory['image']; ?>

  <div class="card">
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= $card_image; ?>" <?php endif; ?>>
    </div>
    <div class="card-section">
      <a target="_blank" href="<?= $signatory['signatory_url']; ?>" class="ip-pink h3"><?= get_the_title($info); ?></a>
    </div>
  </div>
</div>
