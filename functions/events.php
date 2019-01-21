<?php

function get_featured_event() {

  $featured = get_field('is_featured');

  $meta_query = array('relation' => 'OR');

  $meta_query[] = array(
    'key'     => 'is_featured',
    'value'   => $featured,
    'compare' => 'LIKE',
  );

  $args = array(
    'post_type' => 'events',
    'post_status'  => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC',
    'fields' => 'ids',
    'showposts' => 1,
    'meta_query' => $meta_query,
  );

  $query = new WP_Query($args);

  return $query->posts;
}

function get_events_and_dates() {
  $args = array(
    'post_type' => array('date', 'events'),
    'post_status'  => 'publish',
    'showposts' => -1,
  );

  $query = new WP_Query($args);

  $results = array();
  foreach ($query->posts as $post) {
    $date = DateTime::createFromFormat('d/m/Y g:i a', get_field('date_and_time', $post->ID));
    $results[] = array(
      'id' => $post->ID,
      'title' => $post->post_title,
      'date' => $date->format('Y-m-d'),
      'event_link' => get_permalink($post->ID),
      'type' => $post->post_type,
    );
  }

  return $results;
}


function get_events_query_args($community_id = null) {
  $args = array(
    'post_type' => 'events',
    'post_status'  => 'publish',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_key' => 'time',
    'fields' => 'ids',
    'showposts' => -1,
    'meta_query' => $meta_query,
  );


  if($community_id !== null) {
    $meta_query = array(
      array(
        'key' => 'related_community',
        'value' => array($community_id),
        'compare' => 'IN'
      )
    );

    if (isset($args['meta_query'])) {
      $args['meta_query'][] = $meta_query;
    } else {
      $args['meta_query'] = $meta_query;
    }
    $args['paged'] = $paged;
  }

  return $args;
}

function get_all_events_by_community($community_id = null) {
  $args = get_events_query_args($community_id);
  return (new WP_Query(get_events_query_args($community_id)))->posts;
}
