<?php /* Template Name: Events */ ?>

<?php get_header(); ?>

<?php $hero = get_field('hero_banner'); ?>

<?php visix_partial('modules/banner', $hero['hero']); ?>

<?php $featured = get_featured_event(); ?>

<?php if (!empty($featured) && $featured): ?>

  <section class="section featured-event ip-white-smoke-bg">
    <div class="grid-container">
      <div class="grid-x grid-margin-y">
        <div class="cell medium-3">
          <h3 class="ip-teal h2">Featured Event</h3>
        </div>
        <div class="cell medium-9">


          <?php foreach($featured as $feature): ?>

            <div class="card events">

              <div class="grid-x medium-up-2">
                <div class="cell">
                  <?php $card_image = get_the_post_thumbnail_url($feature); ?>
                  <a href="<?= get_permalink($feature); ?>" class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($feature); ?>" <?php endif; ?>>
                    <?php $event_url = get_field('event_url', $feature);  ?>


                    <span class="event-url">
                      <?php echo sharethis_inline_buttons(); ?>
                    </span>
                  </a>
                </div>

                <?php
                $originalDate = get_field('date_and_time', $feature);
                $date = DateTime::createFromFormat('d/m/Y g:i a', $originalDate);
                ?>


                <div class="cell">
                  <div class="card-section">

                    <?php if ($date): ?>


                      <div class="grid-x small-up-2 align-middle">
                        <div class="cell">
                          <time><i class="icon icon-time ip-orange"></i> <?= $date->format('H:m'); ?></time>
                        </div>
                        <div class="cell">
                          <time><i class="icon icon-calendar ip-orange"></i> <?= $date->format('d-m-Y'); ?></time>
                        </div>
                      </div>

                      <div class="spacer tiny"></div>

                    <?php endif; ?>

                    <?php $related_comunity = get_field('related_community', $feature); ?>

                    <?php if (isset($related_comunity) && !empty($related_comunity)): ?>

                      <?php if(is_array($related_comunity)): ?>

                        <h5 class="ip-pink">
                          <?php foreach ($related_comunity as $related_comunity_index =>  $comunity) : ?>

                            <?= get_the_title($comunity).'&nbsp;'; ?>

                          <?php endforeach; ?>

                        </h5>
                      <?php else: ?>

                        <h5 class="ip-pink"><?= get_the_title($related_comunity); ?></h5>

                      <?php endif; ?>

                    <?php endif; ?>

                    <a href="<?= get_permalink($feature); ?>" class="ip-teal h2"><?= get_the_title($feature); ?></a>

                    <div class="spacer tiny"></div>

                    <?php $location = get_field( "location", $feature ); ?>

                    <?php if ($location): ?>

                      <div class="grid-x">
                        <div class="cell">
                          <time><i class="icon icon-pin ip-teal"></i> <?= $location; ?></time>
                        </div>
                      </div>

                    <?php endif; ?>

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
<?php endif; ?>

<section class="section events-calendar">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell large-3">
        <h2 class="ip-teal">Upcoming Events</h2>
      </div>

      <div class="cell large-9">
        <div class="calendar-container" data-events="<?php echo htmlspecialchars(json_encode(get_events_and_dates()), ENT_QUOTES, 'UTF-8'); ?>">
          <div class="grid-x">
            <div class="cell medium-4">
              <div class="view-options">
                <a href="javascript:;" data-view="month" class="change-calendar-view active-view" id="calendar-view">
                  <i class="icon icon-calendar ip-orange"></i>
                </a>

                <a href="javascript:;" data-view="listMonth" class="change-calendar-view" id="list-view">
                  <i class="icon icon-view-list-alt ip-orange"></i>
                </a>
              </div>
            </div>

            <?php
              $event_communities = get_event_tax();
            ?>

            <div class="cell medium-8">
              <?php visix_partial( 'inputs/field', [
                'field' => [
                  'name' => 'community',
                  'id' => 'event-filter',
                  'type' => 'select',
                  'allow_null' => true,
                  'placeholder' => 'Filter by community',
                  'choices' => tags_to_choices($event_communities),
                ]
              ], VISIX_PLUGIN_FORMS_NAME ); ?>
            </div>
          </div>
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="tiny reveal" id="calendar-more_info" data-reveal>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <i class="icon icon-close-circle-o"></i>
  </button>

  <div class="grid-container">
    <div class="grid-x grid-margin-y grid-padding-x">
      <div class="cell">
        <h3 class="ip-teal h2" id="event-title">Awesome. I Have It.</h3>
      </div>

      <div class="cell">
        <p id="testr"></p>
      </div>

      <div class="cell">
        <a href="#" id="event-link" class="button clear orange">View <i class="icon icon-long-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>

<?php if ( have_rows('sections', $post_id) ): ?>

  <?php while ( have_rows('sections', $post_id) ) : the_row();  ?>

    <?php visix_partial( 'modules/' . get_row_layout(), get_row(true)['data'] ); ?>

  <?php endwhile;  ?>

<?php endif; ?>

<?php get_footer(); ?>
