<?php if ( af_has_submission() ) : ?>
  <div class="callout success">
    <h5>Form Submission Successful!</h5>
    <p><?= ($form['display']['success_message'] ?: 'Thanks for getting in touch.') ?></p>
  </div>
<?php elseif ( $restriction ) : ?>

  <div class="callout alert">
    <h5>Restricted.</h5>
    <p><?= $restriction ?></p>
  </div>

<?php else : ?>

  <form <?= acf_esc_atts( $form_attributes ); ?>>

    <?php visix_partial( 'inputs/hidden', compact('hidden_inputs'), VISIX_PLUGIN_FORMS_NAME ); ?>

    <?php wp_nonce_field( 'form_submission', '_acfnonce' ) ?>

    <?php foreach ($field_groups as $field_group) : ?>
      <?php if (isset($form['display_title'])) : ?><fieldset><?php endif; ?>
        <?php if (isset($form['display_title'])) : ?><legend><?= $field_group['title']; ?></legend><?php endif; ?>

        <div class="grid-x grid-margin-y large-margin-collapse grid-padding-x">

          <?php foreach ($field_group['fields'] as $key => $field) : ?>

            <?php if ($key < 6): ?>

              <?php visix_partial( 'inputs/field', compact( 'field' ), VISIX_PLUGIN_FORMS_NAME ); ?>

            <?php endif; ?>

          <?php endforeach; ?>

          <?php foreach ($field_group['fields'] as $key => $field) : ?>
            <?php if ($key == 6): ?>
            <div class="cell medium-6">
              <div class="grid-x grid-margin-x align-middle">
                <div class="cell small-3">
                  <?php
                  $field = get_form_field_by_name($field_group['fields'], 'privacy_policy');
                  $field['show_label'] = false;
                  visix_partial( 'inputs/field', compact( 'field' ), VISIX_PLUGIN_FORMS_NAME );
                  ?>
                </div>
                <div class="cell small-9 privacy_link">
                  <p class="ip-teal"><b>Agree to our <a class="ip-teal" href="<?= site_url("privacy-policy") ?>">Privacy policy</a></b></p>
                </div>
              </div>
            </div>

            <?php endif; ?>
          <?php endforeach; ?>


          <?php foreach ($field_group['fields'] as $key => $field) : ?>

            <?php if ($key == 7): ?>

              <div class="cell medium-6">
                <?php
                $field = get_form_field_by_name($field_group['fields'], 'captcha');
                $field['show_label'] = false;
                visix_partial( 'inputs/field', compact( 'field' ), VISIX_PLUGIN_FORMS_NAME );
                ?>
              </div>

            <?php endif; ?>

          <?php endforeach; ?>

          <div class="spacer"></div>

          <div class="cell">
            <button type="submit" class="button clear orange">Submit <i class="icon icon-long-arrow-right ip-orange"></i></button>
          </div>

        </div>

        <?php if (isset($form['display_title'])) : ?></fieldset><?php endif; ?>

      <?php endforeach; ?>

    </form>

  <?php endif; ?>
