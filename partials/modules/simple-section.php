<section class="section simple-section ip-<?= $background_colour['colour']; ?>-bg">

  <div class="grid-container">
    <div class="grid-x">

      <?php if($title): ?>

        <div class="cell">
          <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>">
            <?= $title; ?>
          </h3>
        </div>

        <div class="spacer"></div>
      <?php endif; ?>

      <?php if ($content): ?>

        <div class="cell simple">
          <?= readmore($content); ?>
        </div>

      <?php endif; ?>

      <?php if ($button['has_button']): ?>

        <div class="spacer"></div>

        <?php visix_partial('components/button', $button); ?>
      <?php endif; ?>

    </div>
  </div>
</section>
