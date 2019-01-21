<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <div class="card">

    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </div>
    <div class="card-section">
      <?php
        $post_categories = wp_get_post_categories( $info );
        $cats = array();
      ?>

      <div class="spacer tiny"></div>

        <h5 class="ip-pink">
          <?php foreach ($post_categories as $c) :

            $cat = get_category( $c ); ?>

            <?= $cat->name.'&nbsp;'; ?>

          <?php endforeach; ?>

        </h5>

      <h3 class="ip-pink h3"><?= get_the_title($info); ?></h3>
      <div class="spacer tiny"></div>

      <div class="grid-x small-up-3 align-middle">
        <div class="cell">
          <?php
            $post_author_id = get_post_field( 'post_author', $info );
            $authord = get_the_author_meta( 'user_nicename', $post_author_id);
           ?>
          <time><i class="icon icon-account-o ip-pink"></i> <?= ucwords($authord); ?></time>
        </div>
        <div class="cell">
          <time><i class="icon icon-comment ip-pink"></i> <?= get_comments_number($info); ?></time>
        </div>

        <div class="cell">
          <time><i class="icon icon-eye ip-pink"></i> <?= getPostViews($info); ?></time>
        </div>
      </div>

      <div class="spacer small"></div>
      <a class="button clear pink" href="<?= get_permalink($info); ?>">Read <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
