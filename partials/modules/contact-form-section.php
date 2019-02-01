<?php if($form_theme_colour !== 'orange'): ?>

  <section class="section contact-form-section ip-<?= $background_colour['colour']; ?>-bg">
    <div class="grid-container">
      <div class="grid-x grid-margin-y grid-padding-x">
        <?php if ($form_title): ?>
          <div class="cell medium-3">
            <h3 class="<?= $title_size['size']; ?> <?= 'ip-'.$text_colour['colour'];  ?>"><?= $form_title; ?></h3>
          </div>

        <?php endif; ?>


        <div class="cell <?= ($form_title ? 'medium-9': ''); ?> ip-teal-bg form-wrapper-<?= $form_theme_colour; ?>">

          <?php if ($contact_form == 310): ?>

            <?php visix_partial('inc/mailchimp-form'); ?>

          <?php else: ?>

            <?php if ($confirmation_form_page == 'confirmation'): ?>

              <?php visix_form( $contact_form , ['redirect' => '/contact/confirmation']); ?>

            <?php else:  ?>

              <?php visix_form( $contact_form , ['redirect' => '/welcome']); ?>

            <?php endif; ?>


          <?php endif; ?>
        </div>
      </div>
    </div>

<?php else: ?>

  <section class="contact-form-section ip-<?= $background_colour['colour']; ?>-bg">

    <?php if ($confirmation_form_page == 'confirmation'): ?>

      <?php visix_form( $contact_form , ['redirect' => '/contact/confirmation']); ?>

    <?php else:  ?>

      <?php visix_form( $contact_form , ['redirect' => '/welcome']); ?>

    <?php endif; ?>

<?php endif; ?>

  </section>
