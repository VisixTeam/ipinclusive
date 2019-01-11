<?php if ( isset($field['label']) && $field['label'] !== '' && !( isset($field['has_choices']) && $field['has_choices'] ) ) : ?>
  <?php

  if (isset($field['id']) && $field['id']) {
    $attrs = ['for' => $field['id']];
  } elseif (isset($field['key']) && $field['key']) {
    $attrs = ['for' => $field['key']];
  }

  if ( isset($field['show_label']) && $field['show_label'] === false ) {
    $attrs['class'] = 'show-for-sr';
  }

  ?>
  <label <?= acf_esc_atts($attrs); ?>>
    <?= $field['label']; ?>
    <?php if (isset($field['required']) && !$field['required']) : ?>
    <?php endif; ?>
  </label>
<?php endif; ?>
