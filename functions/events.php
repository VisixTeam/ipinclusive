<?php

function get_featured_event() {

  $featured = get_field('is_featured');

  $args = array(
    'post_type' => 'events',
    'post_status'  => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC',
    'fields' => 'ids',
    'showposts' => 1,
    'meta_query' => array(
      array(
        'key' => 'is_featured',
        'value' => '1',
        'compare' => '==' // not really needed, this is the default
      )
    )
  );

  $query = new WP_Query($args);

  return $query->posts;
}

function get_events_and_dates() {
  $args = array(
    'post_type' => array('date', 'events'),
    'post_status'  => 'publish',
    'showposts' => -1,
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key' => 'has_date',
        'value' => '1',
        'compare' => '=='
      ),

    )
  );

  $query = new WP_Query($args);

  $results = array();
  foreach ($query->posts as $post) {
    $originalDate = get_field('date_and_time', $post->ID);
    $date = DateTime::createFromFormat('d/m/Y g:i a', $originalDate);

    $event_tax = get_the_terms($post->ID, 'events_communities');

    if (!empty($event_tax) && ! is_wp_error($event_tax)) {
      $tax = wp_list_pluck($event_tax, 'term_id');
      $tax_term = wp_list_pluck($event_tax, 'taxonomy');
    } else {
      $tax = 'all';
    }

    $term_color = get_field('colour_theme', 'events_communities'.'_'.$tax);


    if (!isset($term_color)) {
      if($post->post_type == 'date') {
        $term_color = '#555555';
      } else {
        $term_color = '#0077A1';
      }
    }


    $results[] = array(
      'id' => $post->ID,
      'title' => $post->post_title,
      'date' => date_format($date, 'Y-m-d'),
      'event_link' => get_permalink($post->ID),
      'date_link' => get_field('date_link', $post->ID),
      'type' => $post->post_type,
      'event_communities_id' => $tax,
      'backgroundColor' => $term_color,
    );
  }

  return $results;
}

function get_event_tax() {
  $query = get_terms(array(
    'taxonomy' => 'events_communities',
  ));

  return $query;
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
