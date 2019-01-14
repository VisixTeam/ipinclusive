<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <?php $event_url = get_field('event_url', $info);  ?>

  <?php if ($event_url): ?>

    <span class="event-url">

      <a target="_blank" href="<?= $event_url; ?>">
        <i class="icon icon-share"></i>
      </a>
    </span
    >
  <?php endif; ?>

  <div class="card">


    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($info); ?>" <?php endif; ?>>
    </div>
    <div class="card-section">
      <?php $related_comunity = get_field('related_community', $info); ?>

      <div class="grid-x small-up-2 align-middle">
        <div class="cell">
          <time><i class="icon icon-time ip-orange"></i> <?= get_field('time', $info); ?></time>
        </div>
        <div class="cell">
          <time><i class="icon icon-calendar ip-orange"></i> <?= get_field('date', $info); ?></time>
        </div>
      </div>

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

      <h3 class="ip-teal h3"><?= get_the_title($info); ?></h3>
      <div class="spacer tiny"></div>
      <a class="button clear orange" href="<?= get_permalink($info); ?>">View <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
