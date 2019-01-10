<section class="section option-section ip-<?= $background_colour['colour']; ?>-bg">
  <div class="grid-container">
    <div class="grid-x">
      <h2 class="ip-teal"><?= $title; ?></h2>
    </div>

    <div class="spacer"></div>

    <?php if($options):?>
      <div class="grid-x grid-padding-x grid-margin-y medium-up-2">

          <div class="cell show-for-small-only"><a href="<?= site_url('contact'); ?>" class="button expanded teal ip-white">Stay in touch <i class="icon icon-long-arrow-right ip-white"></i></a></div>
          <div class="cell show-for-small-only"><a href="<?= site_url('sign-up-to-the-ip-inclusive-charter'); ?>" class="button expanded orange ip-white">Sign the ip inclusive charter <i class="icon icon-long-arrow-right ip-white"></i></a></div>

        <?php foreach($options as $option): ?>
          <div class="cell">
            <?php visix_partial('components/button', $option['button']); ?>
          </div>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>

  </div>
</section>
