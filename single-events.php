<?php get_header(); ?>

<?php
$post_id = (is_home() ? get_option('page_for_posts') : get_the_ID());

$id = get_the_ID();
$content_post = get_post($id);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
?>

<?php $image = get_the_post_thumbnail_url($id); ?>

<?php visix_partial('modules/banner', ['custom_title' => get_the_title($id), 'communities_background_image' => $image]); ?>

<section class="section event-details ip-pink-bg">
  <div class="grid-container">
    <div class="grid-x grid-margin-y align-middle">
      <div class="cell small-6 medium-3">
        <?php $related_comunity = get_field('related_community', $info); ?>

        <?php if(is_array($related_comunity)): ?>

          <h4 class="ip-white">
            <?php foreach ($related_comunity as $related_comunity_index =>  $comunity) : ?>

              <?= get_the_title($comunity).'&nbsp;'; ?>

            <?php endforeach; ?>

          </h4>
        <?php else: ?>

          <h4 class="ip-white"><?= get_the_title($related_comunity); ?></h4>

        <?php endif; ?>
      </div>
      <div class="cell small-3 medium-2 ip-white">
        <time><i class="icon icon-time ip-white"></i> <?= get_field('time', $id); ?></time>
      </div>

      <div class="cell small-3 medium-2 ip-white">
        <time><i class="icon icon-calendar ip-white"></i> <?= get_field('date', $id); ?></time>
      </div>

      <?php $event_url = get_field('event_url', $id);  ?>

      <?php if ($event_url): ?>
        <div class="cell medium-auto medium-text-right">
          <a href="<?= $event_url; ?>" target="_blank" class="button hollow white">Book to attend <i class="icon icon-open-in-new"></i></a>
        </div>

      <?php endif; ?>
    </div>
  </div>
</section>

<section class="section ip-white-bg">
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell">
        <?= $content; ?>
      </div>
    </div>
  </div>
</section>

<?php
  $community_id = (isset($_GET['related_community']) ? $_GET['related_community'] : null);
?>

<section class="section events-calendar ip-white-smoke-bg filtering">
  <div class="grid-container">
    <div class="grid-x grid-margin-y">
      <div class="cell large-3">
        <h2 class="ip-teal">Upcoming IP out events</h2>
      </div>

      <div class="cell large-9">

        <div class="grid-x grid-margin-y">
          <div class="cell">
            <div class="grid-x grid-margin-x">
              <div class="cell small-4 large-7 view-options">
                <span id="calendar-view">
                  <i class="icon icon-calendar ip-orange"></i>
                </span>

                <span id="list-view">
                  <i class="icon icon-view-list-alt ip-orange"></i>
                </span>
              </div>

              <div class="cell small-8 large-5">

                <div class="grid-x align-middle">
                  <div class="cell small-4 medium-6 large-4">
                    <p>Filter by:</p>
                  </div>
                  <div class="cell small-8 medium-6 large-8">
                    <?php visix_partial( 'inputs/field', [
                      'field' => [
                        'name' => 'related_community',
                        'id' => 'community',
                        'type' => 'select',
                        'allow_null' => true,
                        'placeholder' => 'Search by Community',
                        'choices' => ids_to_choices(get_pages_by_post_type('community')),
                        'attributes' => [
                          'data-minlength' => '10'
                        ],
                        'option' => [
                          'attributes' => [
                          ]
                        ]
                      ]
                    ], VISIX_PLUGIN_FORMS_NAME ); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php $events = get_all_events_by_community($community_id); ?>

          <div class="cell calendar-view">
            <div id="event-datepicker" class="table-scroll"></div>
            <input type="hidden" name="" class="datest" value="22/01/2019">

          </div>

          <div class="cell list-view" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": true, "infinite": true, "variableWidth": false, "responsive": [{"breakpoint":992,"settings":{"slidesToShow": 1}}]}'>


            <?php foreach($events as $event): ?>

              <div class="card events">

                <div class="grid-x medium-up-2">
                  <div class="cell">
                    <?php $card_image = get_the_post_thumbnail_url($event); ?>
                    <div class="card-image <?php if($card_image): ?> b-lazy <?php endif; ?>" <?php if($card_image): ?> data-blazy="<?= get_the_post_thumbnail_url($event); ?>" <?php endif; ?>>
                      <?php $event_url = get_field('event_url', $event);  ?>

                      <?php if ($event_url): ?>

                        <span class="event-url">
                          <a target="_blank" href="<?= $event_url; ?>">
                            <i class="icon icon-share"></i>
                          </a>
                        </span>

                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="cell">
                    <div class="card-section">
                      <div class="grid-x small-up-2 align-middle">
                        <div class="cell">
                          <time><i class="icon icon-time ip-orange"></i> <?= get_field('time', $event); ?></time>
                        </div>
                        <div class="cell">
                          <time><i class="icon icon-calendar ip-orange"></i> <?= get_field('date', $event); ?></time>
                        </div>
                      </div>

                      <div class="spacer tiny"></div>

                      <?php $related_comunity = get_field('related_community', $event); ?>

                      <?php if(is_array($related_comunity)): ?>

                        <h5 class="ip-pink">
                          <?php foreach ($related_comunity as $related_comunity_index =>  $comunity) : ?>

                            <?= get_the_title($comunity).'&nbsp;'; ?>

                          <?php endforeach; ?>

                        </h5>
                      <?php else: ?>

                        <h5 class="ip-pink"><?= get_the_title($related_comunity); ?></h5>

                      <?php endif; ?>

                      <h3 class="ip-teal h2"><?= get_the_title($event); ?></h3>
                      <div class="spacer tiny"></div>
                      <a class="button clear orange" href="<?= get_permalink($event); ?>">View <i class="icon icon-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
          </div>

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
