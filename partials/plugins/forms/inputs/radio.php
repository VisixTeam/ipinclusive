<?php if ( isset( $field['choices'] ) && is_array( $field['choices'] ) ) : ?>
  <div class="options-list  <?php if(is_page('sign-up-to-the-ip-inclusive-charter')): ?> radio-options-list <?php endif; ?>">
    <?php foreach ($field['choices'] as $key => $choice) : ?>


      <div class="input-container">
        <input <?= acf_esc_atts(array_merge($attributes, [
          'id' => visix_generate_checkbox_id($attributes['id'], $choice),
          'name' => $attributes['name'],
          'value' => $choice
        ])); ?> />

        <?php visix_partial( 'inputs/label', [
          'field' => [
            'key' => visix_generate_checkbox_id($attributes['id'], $choice),
            'label' => $choice
          ]
        ], VISIX_PLUGIN_FORMS_NAME ); ?>
        <?php if(is_page('sign-up-to-the-ip-inclusive-charter')): ?>

          <div class="spacer tiny"></div>
          <?php if ($key == 'option-a'): ?>
            <p class="ip-teal">I am signing on behalf of a whole business or organisation.</p>
            <p>
              ​Please select Option A if you are a director, partner or other senior officer representing your organisation.
            </p>

          <?php elseif($key == 'option-b'): ?>
            <p class="ip-teal">I am signing on behalf of an IP department/team within a Company or Group we support the objectives of IP Inclusive and will comply with the Charter for Equality, Diversity and Inclusion to the extent possible and appropriate within our larger organisation.</p>
            <p>Please select Option B if you are a director or manager representing your in-house IP department/team within a Company or Group.</p>

          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
