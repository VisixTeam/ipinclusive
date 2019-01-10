<section class="section ip-<?= $background_colour['colour']; ?>-bg">

  <div class="grid-container">

    <?php if($title): ?>
      <div class="grid-x">
        <div class="cell">
          <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>"><?= $title; ?></h3>
        </div>
      </div>
    <?php endif; ?>

    <div class="spacer tiny"></div>

    <?php if ($lists): ?>

      <div class="grid-x">
        <div class="cell">
          <ul class="custom-bullets no-bullets">
            <?php foreach($lists as $list_num => $list): ?>

              <li>
                <span class="num"><?= $list_num + 1; ?></span>
                <?= $list['content']; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

    <?php endif; ?>

  </div>

<?php if ($button['has_button']): ?>

  <div class="spacer"></div>

  <?php visix_partial('components/button', $button); ?>

<?php endif; ?>
</section>
