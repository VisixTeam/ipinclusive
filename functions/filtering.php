<?php

/**
* Returns array for use in mysql query as a list
*/
function array_to_mysql_list($arr = array()) {
  $mysql_list = '';
  $arr_size = count($arr);
  foreach ($arr as $index => $item) {
    $mysql_list .= sprintf(
      "'%s'%s",
      $item,
      $index < $arr_size - 1 ? ',' : ''
    );
  }
  return "($mysql_list)";
}

function ids_to_choices($ids = array()) {
  $choices = array();
  foreach($ids as $id) {
    $choices[$id] = get_the_title($id);
  }

  return $choices;
}

function terms_to_choices($terms = array()) {
  $choices = array();
  foreach($terms as $term) {
    $choices[$term->cat_ID] = $term->name;
  }

  return $choices;
}

/**
* Return list of date categories for filtering
*/
function get_date_categories() {
  global $wpdb;
  $date_categories = array();
  $post_types_list = array_to_mysql_list(array('post'));
  $query =
  "SELECT DISTINCT MONTH(`post_date`) AS `month`, YEAR(`post_date`) AS `year`
  FROM `$wpdb->posts`
  WHERE (`post_type` IN $post_types_list AND `post_status` = 'publish')
  ORDER BY `post_date` ASC
  ";
  $results = $wpdb->get_results($query);
  $current_year = date('Y');
  foreach ($results as $result_index => $result) {
    $label = '';
    $label .= DateTime::createFromFormat('!m', $result->month)->format('F');
    if ($result->year != $current_year) {
      $label .= ' ' . $result->year;
    }
    $date_categories[] = array(
      'label' => $label,
      'month' => $result->month,
      'year'  => $result->year,
      'value' => $result_index,
      's'     => strtotime('y', $result->year),
    );
  }
  return $date_categories;
}
