<section class="section cards ip-<?= $background_colour['colour']; ?>-bg">
  <div class="grid-container">
    <div class="grid-x grid-padding-x grid-margin-y">
      <div class="cell medium-3">
        <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>"><?= $section_title; ?></h3>

        <?php if ($button['has_button']): ?>

          <?php visix_partial('components/button', $button); ?>

        <?php endif; ?>
      </div>
      <div class="cell medium-9">
        <?php if ($information): ?>
          <div class="grid-x grid-margin-x grid-margin-y cards-section card-<?= $information_theme_colour; ?>-theme" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows": true, "infinite": true, "variableWidth": false}'>

            <?php foreach($information as $info): ?>

              <?php $post_type = get_post_type($info); ?>

              <?php if($post_type == 'events'): ?>

                <?php visix_partial('inc/events', ['info' => $info]); ?>

              <?php elseif($post_type == 'community'): ?>

                <?php visix_partial('inc/community', ['info' => $info]); ?>

              <?php elseif($post_type == 'companies'): ?>

                <?php visix_partial('inc/companies', ['info' => $info]); ?>

              <?php endif; ?>

            <?php endforeach; ?>

          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
