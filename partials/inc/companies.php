<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">
    <?php $image_id = get_post_thumbnail_id($info); ?>


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <a target="_blank" href="<?= get_field('company_url',$info); ?>" class="card-image b-lazy" style="background-image: url(<?= wp_get_attachment_image_src($image_id, 'small')[0];  ?>);" data-blazy="<?= wp_get_attachment_image_src($image_id, 'medium')[0]; ?>">
    </a>
    <div class="card-section">
      <?php $support_type = get_field('type', $info); ?>

      <?php if(is_array($support_type)): ?>

        <h3 class="ip-pink h5">
          <?php
          $numItems = count($support_type);
          $i = 1;
          ?>
          <?php foreach ($support_type as $support_type_index =>  $support) : ?>

            <?php $itemPos = ( $support_type_index !== count( $support_type ) -1 ) ? "," : ""; ?>

            <?= $support.$itemPos; ?>

          <?php endforeach; ?>
        </h3>

      <?php else: ?>

        <h3 class="ip-pink h5"><?= get_the_title($support_type); ?></h3>

      <?php endif; ?>

      <div class="spacer tiny"></div>

      <a class="button clear orange" href="<?= get_field('company_url',$info); ?>" target="_blank">View <i class="icon icon-open-in-new"></i></a>
    </div>
  </div>
</div>
