(function($){

  $('[data-sticky]').on('sticky.zf.stuckto:top', function(){
    $(this).addClass('no-transparent');

  }).on('sticky.zf.unstuckfrom:top', function(){
    $(this).removeClass('no-transparent');

  });

  $('.hamburger').on('click', function(){
    $('.hamburger').toggleClass('is-active');
  });

})(jQuery);
