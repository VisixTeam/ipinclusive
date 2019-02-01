<?php
/**
* Get resources categories
*/
function get_all_resources_types() {
  return get_categories(array(
    'orderby' => 'name',
    'taxonomy' => 'resources_type',
  ));
}

/**
* Get all resources depend by filters
**/
function get_all_resources($recommended = null, $resource_cat_id = null , $query = null) {
  $args = array(
    'post_type' => 'resources',
    'post_status' => 'publish',
    'showposts' => -1,
    'fields' => 'ids'
  );

  if ($recommended !== null) {

    if ($recommended == '1') {
      $args['orderby'] = 'meta_value_num';

      $args['meta_query'] = array(
        array(
          'key' => 'post_views_count',
          'value' => 0,
          'compare' => '>'
        )
      );
    } elseif($recommended == '2') {
      $args['orderby'] = 'publish_date';
      $args['order'] = 'DESC';
    }
  }

  if($resource_cat_id !== null) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'resources_type',
        'terms' => $resource_cat_id,
      )
    );
  }

  if($query !== null) {
    $args['s'] = $query;
  }

  return (new WP_Query($args))->posts;
}
