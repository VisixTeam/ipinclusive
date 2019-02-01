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
          <?php $company = get_field('company', $info); ?>

          <?php if ($job_title): ?>
            <p><?= $job_title; ?></p>
          <?php endif; ?>

          <?php if ($company): ?>
            <span class="ip-pink h4"><?= $company; ?></span>
          <?php endif; ?>
        </div>
        <div class="cell small-3">

          <?php $email = get_field('email', $info); ?>
          <?php $has_twitter = get_field('has_twitter', $info); ?>
          <?php $twitter_username = get_field('twitter_username', $info); ?>
          <?php $has_linkedin = get_field('has_linkedin', $info); ?>
          <?php $linkedin_url = get_field('linkedin_url', $info); ?>

          <div class="grid-x align-middle grid-margin-x">
            <?php if ($email): ?>
              <div class="cell small-6">
                <a href="mailto: <?= get_field('email', $info); ?>" class="button clear orange large"><i class="icon icon-email"></i></a>
              </div>
            <?php endif; ?>

            <?php if($has_twitter && !empty($twitter_username)): ?>
              <div class="cell small-6">
                <a href="<?= $twitter_username; ?>" target="_blank" class="button clear orange large"><i class="icon icon-twitter"></i></a>
              </div>
            <?php endif; ?>

            <?php if($has_linkedin && !empty($linkedin_url)): ?>
              <div class="cell small-6">
                <a href="<?= $linkedin_url; ?>" target="_blank" class="button clear orange large"><i class="icon icon-linkedin"></i></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
