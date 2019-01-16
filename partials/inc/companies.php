<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <a target="_blank" href="<?= get_field('company_url',$info); ?>" class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </a>
    <div class="card-section">
      <?php $support_type = get_field('type', $info); ?>

      <?php if(is_array($support_type)): ?>

        <h3 class="ip-pink h5">
          <?php foreach ($support_type as $support_type_index =>  $support) : ?>

            <?= $support.'&nbsp;'; ?>

          <?php endforeach; ?>

        </h3>
      <?php else: ?>

        <h3 class="ip-pink h5"><?= get_the_title($support_type); ?></h3>

      <?php endif; ?>

      <?php if (is_page('our-supporters-and-partners')):
        $content = get_field('description', $info);
        $content = wp_strip_all_tags($content);
      ?>

        <p>
         <?= (strlen($content) > 150 ? substr($content,0,150)."..." : $content); ?>
        </p>

        <div class="spacer tiny"></div>

      <?php endif; ?>

      <a class="button clear orange" href="<?= get_field('company_url',$info); ?>" target="_blank">View <i class="icon icon-open-in-new"></i></a>
    </div>
  </div>
</div>
