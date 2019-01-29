<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <?php $signatory = get_field('signatories', $info); ?>
  <?php $card_image = $signatory['image']; ?>

  <?php $image_id = get_post_thumbnail_id($info); ?>

  <div class="card">
    <div class="card-image b-lazy" style="background-image: url(<?= wp_get_attachment_image_src($image_id, 'small')[0];  ?>);" data-blazy="<?= wp_get_attachment_image_src($image_id, 'medium')[0]; ?>">
    </div>
    <div class="card-section">
      <a target="_blank" href="<?= $signatory['signatory_url']; ?>" class="ip-pink h3"><?= get_the_title($info); ?></a>
    </div>
  </div>
</div>
