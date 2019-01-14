<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

    <span class="event-url">

      <a target="_blank" href="#">
        <i class="icon ip-pink icon-share"></i>
      </a>
    </span>

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </div>
    <div class="card-section">
      <?php $related_comunity = get_field('related_community', $info); ?>

      <div class="spacer tiny"></div>

      <?php if(is_array($related_comunity)): ?>

        <h5 class="ip-pink">
          <?php foreach ($related_comunity as $related_comunity_index =>  $comunity) : ?>

            <?= get_the_title($comunity).'&nbsp;'; ?>

          <?php endforeach; ?>

        </h5>
      <?php else: ?>

        <h5 class="ip-pink"><?= get_the_title($related_comunity); ?></h5>

      <?php endif; ?>

      <h3 class="ip-pink h3"><?= get_the_title($info); ?></h3>
      <div class="spacer tiny"></div>

      <div class="grid-x small-up-3 align-middle">
        <div class="cell">
          <?php
            global $post;
            $author_id=$post->post_author;
           ?>
          <time><i class="icon icon-account-o ip-pink"></i> <?= ucwords(get_the_author_meta( 'user_nicename' , $author_id )); ?></time>
        </div>
        <div class="cell">
          <time><i class="icon icon-comment ip-pink"></i> <?= get_comments_number($info); ?></time>
        </div>

        <div class="cell">
          <time><i class="icon icon-thumb-up ip-pink"></i> <?= getPostViews($info); ?></time>
        </div>
      </div>

      <div class="spacer small"></div>
      <a class="button clear pink" href="<?= get_permalink($info); ?>">Read <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
