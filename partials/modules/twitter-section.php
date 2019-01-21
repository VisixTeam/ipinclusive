<section class="section cards ip-<?= $background_colour['colour']; ?>-bg">
  <div class="grid-container">
    <div class="grid-x grid-padding-x grid-margin-y">
      <?php if ($section_title): ?>

        <div class="cell medium-3">
          <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>"><?= $section_title; ?></h3>

          <?php if ($button['has_button']): ?>

            <?php visix_partial('components/button', $button); ?>

          <?php endif; ?>
        </div>

      <?php endif; ?>

      <?php if ($content): ?>
        <div class="cell <?= ($section_title ? 'medium-9' : 'one-col'); ?>">
          <?= $content; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
