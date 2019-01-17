<section class="section questionnaire-section ip-<?= $background_colour['colour']; ?>-bg">
  <div class="grid-container">

    <?php if ($questionnaire): ?>

      <form class="grid-x grid-padding-x grid-margin-y">

        <?php foreach ($questionnaire as $question_index => $question): ?>

          <div class="cell medium-6 large-4">
            <div class="card question">
              <div class="card-section">

                <div class="grid-x grid-margin-y">
                  <div class="cell">
                    <h4 class="ip-teal"><?= $question['question']; ?></h4>
                  </div>

                  <div class="cell">
                    <?php visix_partial( 'inputs/field', [
                      'field' => [
                        'name' => "question-$question_index",
                        'id' => "question-$question_index",
                        'type' => 'radio',
                        'allow_null' => false,
                        'choices' => [
                          'yes',
                          'no',
                          'n/a'
                        ],
                        'attributes' => [
                        ]
                      ]
                    ], VISIX_PLUGIN_FORMS_NAME ); ?>

                  </div>

                  <div class="cell hide" data-response="no">
                    <?= $question['answer_to_no']; ?>
                  </div>

                  <div class="cell hide" data-response="n/a">
                    <?= $question['answer_to_na']; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

        <div class="spacer"></div>

        <div class="cell">
          <button type="reset" class="button clear orange" id="submit-questionnaire"><?= $submit_button_text; ?> <i class="icon icon-long-arrow-right"></i></button>
        </div>

      </form>

    <?php endif; ?>
  </div>
</section>
