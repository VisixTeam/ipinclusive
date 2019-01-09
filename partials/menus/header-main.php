<ul>
  <?php foreach ($items as $item) : ?>
    <?php if ($item->menu_item_parent == 0) : ?>

      <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

      <?php $super_parent = get_field('is_super_parent', $item); ?>

      <li class="<?= ($super_parent ? 'super-parent': '');?>">
        <a class="<?= ($item->url == $actual_link ? 'active' : ''); ?>" href="<?= $item->url; ?>"><?= $item->title; ?></a>
        <?php $subItems = []; ?>
        <?php foreach ($items as $subItem) : ?>
          <?php if ($subItem->menu_item_parent == $item->ID) : ?>
            <?php $subItems[] = $subItem; ?>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php if ( !empty( $subItems ) ) : ?>
          <ul>
            <?php foreach ($subItems as $subItem) : ?>
              <?php $super_parent = get_field('is_super_parent', $subItem); ?>
              <li class="<?= ($super_parent ? 'super-parent': '');?>">
                <a class="<?= ($subItem->url == $actual_link ? 'active' : ''); ?>" href="<?= $subItem->url; ?>"><?= $subItem->title; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

      </li>
    <?php endif; ?>
  <?php endforeach; ?>
</ul>
