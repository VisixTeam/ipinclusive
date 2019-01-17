<div class="cell">
  <div class="card">
    <?php $signatory = get_field('signatories', $post_id); ?>
    <?php $card_image = $signatory['image']; ?>

    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= $card_image; ?>" <?php endif; ?>>
    </div>
    <div class="card-section">
      <h4 class="ip-pink">
        <a class="ip-pink" href="<?= $signatory['signatory_url']; ?>" target="_blank"><?= get_the_title($post_id); ?></a>
      </h4>
    </div>
  </div>
</div>
