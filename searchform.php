<section class="section search-form">
  <div class="grid-container">
    <form class="grid-x grid-margin-y" method="get" action="<?php echo home_url() ?>">
      <div class="cell">
        <h3 class="ip-pink">Search</h3>
      </div>
      <div class="cell">
        <?php visix_partial( 'inputs/field', [
          'field' => [
            'name' => 's',
            'id' => 's',
            'placeholder' => 'Search',
            'type' => 'search',
          ]
        ], VISIX_PLUGIN_FORMS_NAME ); ?>
      </div>

      <div class="cell">
        <button type="submit" class="button teal clear" name="button"><?php echo esc_attr_x( 'Search', 'submit button' ) ?> <i class="icon icon-long-arrow-right"></i></button>
      </div>
    </form>
  </div>
</section>
