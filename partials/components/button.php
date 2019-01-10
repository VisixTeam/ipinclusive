<?php if($has_button): ?>

<a
  <?php if($open_new_tab): ?>
    target="_blank"
  <?php endif; ?>

  class="<?= ($button_style == true ? 'button' : 'button clear'); ?>
  <?= (($button_size == true) ? 'expanded': ''); ?> <?= $colour; ?> <?= (($button_text_colour !== 'none') ? 'ip-'.$button_text_colour : ''); ?>"

  <?php if($button_type == 'page'):?>

    href="<?= $page_link['url']; ?>">
    <?= $page_link['title']; ?>

  <?php elseif($button_type == 'anchor'): ?>

    href="<?= $anchor_link['url']; ?>">
    <?= $anchor_link['title']; ?>

  <?php elseif($button_type == 'external'): ?>

    href="<?= $external_link; ?>">
    <?= $external_link_title; ?>

  <?php elseif($button_type == 'modal'): ?>

    data-open="<?= $modal_id; ?>">
    <?= $modal_text; ?>

  <?php endif; ?>

  <?php if($include_icon): ?>
    <i class='icon icon-long-arrow-right <?= (($button_text_colour !== 'none') ? 'ip-'.$button_text_colour : ''); ?>'></i>
  <?php endif; ?>
</a>

<?php endif; ?>
