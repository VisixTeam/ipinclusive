<section class="section ip-<?= $background_colour['colour']; ?>-bg">

  <div class="grid-container">

    <?php if($title): ?>
      <div class="grid-x">
        <div class="cell">
          <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>"><?= $title; ?></h3>
        </div>

        <?php if($has_content): ?>
          <div class="cell">
            <?= $content; ?>
          </div>
        <?php endif; ?>
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
                <?= readmore($list['content']); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

    <?php endif; ?>

    <?php if ($button['has_button']): ?>
      <div class="spacer"></div>
      <div class="grid-x">
        <div class="cell">
          <?php visix_partial('components/button', $button); ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
