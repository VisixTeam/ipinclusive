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
      <?php
      $originalDate = get_field('date_and_time', $id);
      $date = DateTime::createFromFormat('d/m/Y g:i a', $originalDate);
      $event_url = get_field('event_url', $id);
      ?>
      <?php $post_categories = get_the_terms( $id, 'events_communities' ); ?>

      <?php if ($post_categories): ?>

        <div class="cell small-6 <?= ($event_url ? 'medium-3': 'medium-3');  ?>">

          <h4 class="ip-white">
            <?php foreach ($post_categories as $cat_index => $c) : ?>

              <?php $itemPos = ( $cat_index !== count( $post_categories ) -1 ) ? "," : ""; ?>

              <?= $c->name.$itemPos; ?>

            <?php endforeach; ?>

          </h4>
        </div>

      <?php endif; ?>

      <?php if ($date): ?>

        <div class="cell small-3 <?= ($event_url ? 'medium-2': 'medium-3');  ?> ip-white">
          <time><i class="icon icon-time ip-white"></i> <?= $date->format('H:i'); ?></time>
        </div>

        <div class="cell small-3 <?= ($event_url ? 'medium-2': 'medium-3');  ?> ip-white">
          <time><i class="icon icon-calendar ip-white"></i> <?= $date->format('jS F Y'); ?></time>
        </div>
      <?php endif; ?>

      <?php $location = get_field( "location", $id ); ?>

      <?php if ($location): ?>

        <div class="cell small-6 medium-2 medium-text-center ip-white">
          <time><i class="icon icon-pin ip-white"></i> <?= $location; ?></time>
        </div>

      <?php endif; ?>

      <?php if ($event_url): ?>
        <div class="cell small-6 <?= ($location ? 'medium-3' : 'medium-auto'); ?> medium-text-right">
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
        <?= readmore($content); ?>
      </div>
    </div>
  </div>
</section>

<?php
$community_id = (isset($_GET['related_community']) ? $_GET['related_community'] : null);
?>
<?php if ($date): ?>

  <section class="section events-calendar filtering">
    <div class="grid-container">
      <div class="grid-x grid-margin-y">
        <div class="cell large-3">
          <h2 class="ip-teal">Upcoming Events</h2>
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

<?php endif; ?>

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
