<?php /* Template Name: Events */ ?>

<?php get_header(); ?>

<?php $hero = get_field('hero_banner'); ?>

<?php visix_partial('modules/banner', $hero['hero']); ?>

<section class="section featured-event ip-white-smoke-bg">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell medium-3">
        <h3 class="ip-teal h2">Featured Event</h3>
      </div>
      <div class="cell medium-9">

        <?php $featured = get_featured_event(); ?>

        <?php foreach($featured as $feature): ?>

          <div class="card events">

            <div class="grid-x medium-up-2">
              <div class="cell">
                <?php $card_image = get_the_post_thumbnail_url($feature); ?>
                <a href="<?= get_permalink($feature); ?>" class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($feature); ?>" <?php endif; ?>>
                  <?php $event_url = get_field('event_url', $feature);  ?>

                  <?php if ($event_url): ?>

                    <span class="event-url">
                      <a target="_blank" href="<?= $event_url; ?>">
                        <i class="icon icon-share"></i>
                      </a>
                    </span>

                  <?php endif; ?>
                </a>
              </div>
              <div class="cell">
                <div class="card-section">
                  <div class="grid-x small-up-2 align-middle">
                    <div class="cell">
                      <time><i class="icon icon-time ip-orange"></i> <?= get_field('time', $feature); ?></time>
                    </div>
                    <div class="cell">
                      <time><i class="icon icon-calendar ip-orange"></i> <?= get_field('date', $feature); ?></time>
                    </div>
                  </div>

                  <div class="spacer tiny"></div>

                  <?php $related_comunity = get_field('related_community', $feature); ?>

                  <?php if(is_array($related_comunity)): ?>

                    <h5 class="ip-pink">
                      <?php foreach ($related_comunity as $related_comunity_index =>  $comunity) : ?>

                        <?= get_the_title($comunity).'&nbsp;'; ?>

                      <?php endforeach; ?>

                    </h5>
                  <?php else: ?>

                    <h5 class="ip-pink"><?= get_the_title($related_comunity); ?></h5>

                  <?php endif; ?>

                  <a href="<?= get_permalink($feature); ?>" class="ip-teal h2"><?= get_the_title($feature); ?></a>
                  <div class="spacer tiny"></div>
                  <a class="button clear orange" href="<?= get_permalink($feature); ?>">View <i class="icon icon-long-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php
  $community_id = (isset($_GET['related_community']) ? $_GET['related_community'] : null);
?>

<section class="section events-calendar filtering">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell large-3">
        <h2 class="ip-teal">Upcoming IP out events</h2>
      </div>

      <div class="cell large-9">

        <div class="calendar-container" data-events="<?php echo htmlspecialchars(json_encode(get_events_and_dates()), ENT_QUOTES, 'UTF-8'); ?>">
          <div class="view-options">
            <a href="javascript:;" data-view="month" class="change-calendar-view active-view" id="calendar-view">
              <i class="icon icon-calendar ip-orange"></i>
            </a>

            <a href="javascript:;" data-view="listMonth" class="change-calendar-view" id="list-view">
              <i class="icon icon-view-list-alt ip-orange"></i>
            </a>
          </div>

          <div id="calendar"></div>
        </div>
    </div>


    </div>
  </div>
</section>

<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>

<?php get_footer(); ?>
