<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <?php $image_id = get_post_thumbnail_id($info); ?>

  <div class="card">
    <?php $card_image = $image_id; ?>
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" style="background-image: url(<?= wp_get_attachment_image_src($image_id, 'small')[0];  ?>);" data-blazy="<?= wp_get_attachment_image_src($image_id, 'medium')[0]; ?>">
    </div>
    <div class="card-section">
      <div class="grid-x">
        <div class="cell small-9">
          <h3 class="ip-teal h4"><?= get_the_title($info); ?></h3>

          <?php $job_title = get_field('job_title', $info); ?>
          <?php if ($job_title): ?>
            <p><?= $job_title; ?></p>
          <?php endif; ?>
        </div>
        <div class="cell small-3">
          <?php $email = get_field('email', $info); ?>
          <?php $has_twitter = get_field('has_twitter', $info); ?>
          <?php $twitter_username = get_field('twitter_username', $info); ?>

          <?php if ($email): ?>
            <a href="mailto: <?= get_field('email', $info); ?>" class="button clear orange large"><i class="icon icon-email"></i></a>

          <?php elseif($has_twitter && !empty($twitter_username)): ?>

            <a href="<?= $twitter_username; ?>" target="_blank" class="button clear orange large"><i class="icon icon-twitter"></i></a>

          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
