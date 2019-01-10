<section class="section ip-<?= $background_colour['colour']; ?>-bg">

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

      <div class="cell">
        <?= readmore($content); ?>
      </div>

      <?php if ($button['has_button']): ?>

        <div class="spacer"></div>

        <?php visix_partial('components/button', $button); ?>
      <?php endif; ?>

    </div>
  </div>
</section>
