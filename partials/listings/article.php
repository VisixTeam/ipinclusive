<div class="cell medium-6 large-4 <?= get_post_type($post_id); ?>" id="post-<?= $post_id; ?>">

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($post_id); ?>
    <a href="<?= get_permalink($post_id); ?>" class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($post_id); ?>" <?php endif; ?>>
    </a href="<?= get_permalink($post_id); ?>">
    <div class="card-section">
      <?php
      $post_categories = wp_get_post_categories( $post_id );
      $cats = array();

      foreach($post_categories as $c){
        $cat = get_category( $c );
        $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
      }

      ?>

      <div class="spacer tiny"></div>

        <h5 class="ip-pink">
          <?php foreach ($post_categories as $c) :

            $cat = get_category( $c ); ?>

            <?= $cat->name.'&nbsp;'; ?>

          <?php endforeach; ?>

        </h5>

      <div class="spacer tiny"></div>


      <h3  class="ip-pink h3">
        <a class="ip-pink" href="<?= get_permalink($post_id); ?>"><?= get_the_title($post_id); ?></a>
      </h3>

      <div class="spacer tiny"></div>

      <div class="grid-x small-up-2 align-middle">
        <div class="cell">
          <time><i class="icon icon-comment ip-pink"></i> <?= get_comments_number($post_id); ?></time>
        </div>

        <div class="cell">
          <time><i class="icon icon-eye ip-pink"></i> <?= getPostViews($post_id); ?></time>
        </div>
      </div>

      <div class="spacer small"></div>
      <a class="button clear pink" href="<?= get_permalink($post_id); ?>">Read <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
