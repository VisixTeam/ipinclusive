<section class="section cards ip-<?= $background_colour['colour']; ?>-bg">
  <div class="grid-container">

    <?php if ($has_more_info): ?>

      <div class="grid-x">
        <div class="cell">
          <p class="h3 ip-gray"><?= $section_more_information; ?></p>
        </div>
      </div>
      <div class="spacer small"></div>
    <?php endif; ?>
    <div class="grid-x grid-padding-x grid-margin-y">
      <?php if ($section_title): ?>

        <div class="cell medium-3">
          <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>"><?= $section_title; ?></h3>

          <?php if ($button['has_button']): ?>

            <?php visix_partial('components/button', $button); ?>

          <?php endif; ?>
        </div>

      <?php endif; ?>

      <div class="cell <?= ($section_title ? 'medium-9' : ''); ?>">
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

              <?php elseif($post_type == 'post'): ?>

                <?php visix_partial('inc/post', ['info' => $info]); ?>

              <?php elseif($post_type == 'signatories'): ?>

                <?php visix_partial('inc/signatories', ['info' => $info]); ?>


              <?php elseif($post_type == 'team'): ?>

                <?php visix_partial('inc/team', ['info' => $info]); ?>

              <?php elseif($post_type == 'resources'): ?>

                <?php visix_partial('inc/resources', ['info' => $info]); ?>

              <?php endif; ?>

            <?php endforeach; ?>

          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
