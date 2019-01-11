<?php
/**
* Returns field from field group fields by its name
*/
function get_form_field_by_name($field_group_fields, $field_name) {
  foreach ($field_group_fields as $field) {
    if ($field['name'] == $field_name) {
      return $field;
    }
  }
  return array();
}
