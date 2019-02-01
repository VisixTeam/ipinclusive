<div class="cell medium-6 large-4 <?= get_post_type($info); ?>" id="post-<?= $info; ?>">

  <span class="event-url">
    <?php echo sharethis_inline_buttons(); ?>
  </span>

  <div class="card">

    <?php $image_id = get_post_thumbnail_id($info); ?>

    <?php $card_image = get_the_post_thumbnail_url($info); ?>
    <a href="<?= get_permalink($info); ?>" class="card-image b-lazy" style="background-image: url(<?= wp_get_attachment_image_src($image_id, 'small')[0];  ?>);" data-blazy="<?= wp_get_attachment_image_src($image_id, 'small')[0]; ?>">
    </a>
    <div class="card-section">
      <?php $related_comunity = get_field('related_community', $info); ?>


      <?php
      $originalDate = get_field('date_and_time', $info);
      $date = DateTime::createFromFormat('d/m/Y g:i a', $originalDate);
      $event_url = get_field('event_url', $info);
      ?>
      <?php if (!empty($originalDate)): ?>

        <div class="grid-x small-up-2 align-middle">
          <div class="cell">
            <time><i class="icon icon-time ip-orange"></i> <?= $date->format('H:i'); ?></time>
          </div>
          <div class="cell">
            <time><i class="icon icon-calendar ip-orange"></i> <?= $date->format('dS M y'); ?></time>
          </div>
        </div>

        <div class="spacer tiny"></div>
      <?php endif; ?>

      <?php $location = get_field( "location", $info ); ?>

      <?php if ($location): ?>
        <time><i class="icon icon-pin ip-teal"></i> <?= $location; ?></time>
      <?php endif; ?>

      <?php $post_categories = get_the_terms( $info, 'events_communities' ); ?>

      <?php if ($post_categories): ?>

        <h5 class="ip-pink">

          <?php foreach ($post_categories as $cat_index => $c) : ?>

            <?php $itemPos = ( $cat_index !== count( $post_categories ) -1 ) ? "," : ""; ?>

            <?= $c->name.$itemPos; ?>

          <?php endforeach; ?>

        </h5>
      <?php endif; ?>

      <h3 class="ip-teal h3"><?= get_the_title($info); ?></h3>
      <div class="spacer tiny"></div>
      <a class="button clear orange" href="<?= get_permalink($info); ?>">View <i class="icon icon-long-arrow-right"></i></a>
    </div>
  </div>
</div>
