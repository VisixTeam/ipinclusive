(function($){

  var questionSection = $('.question');

  questionSection.each(function(){
    var question = $(this);

    var radioBtns = question.find('input[type=radio]');
    var answerResponses = question.find('[data-response]');


    radioBtns.each(function(){
      var radioBtn = $(this);


      radioBtn.click(function(){
        var radioBtnVal = radioBtn.val()

        answerResponses.addClass('hide')

        answerResponses.each(function(){
          answer = $(this);

          if(radioBtnVal == answer.attr('data-response')) {
            answer.removeClass('hide');
          }

        });
      })
    });
  });

  $('#submit-questionnaire').on('click', function(){
    $('[data-response]').addClass('hide')
  });

})(jQuery);
