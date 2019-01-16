<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">

    <div class="card-section">
      <a href="<?= get_permalink($info); ?>" class="ip-teal h2"><?= get_the_title($info); ?></a>
      <div class="spacer tiny"></div>

      <?php if (is_page('resources')):
        $content_post = get_post($info);
        $content = $content_post->post_content;
        $content = wp_strip_all_tags($content);
      ?>

        <p>
         <?= (strlen($content) > 150 ? substr($content,0,150)."..." : $content); ?>
        </p>

        <div class="spacer tiny"></div>

      <?php endif; ?>

      <a class="button clear orange" href="<?= get_permalink($info); ?>">View <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
