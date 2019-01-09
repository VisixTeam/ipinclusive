(function($){

  $('[data-sticky]').on('sticky.zf.stuckto:top', function(){
    $(this).addClass('no-transparent');

  }).on('sticky.zf.unstuckfrom:top', function(){
    $(this).removeClass('no-transparent');

  });

  let header = $('#header')
  let headerHeight = header.outerHeight(true);

  $('.sidebar').css('padding-top', (headerHeight * 1.5) + 'px')

  $('.hamburger').on('click', function(){
    $('.hamburger').toggleClass('is-active');
    $('.sidebar').toggleClass('open');
    $('#header .sticky').toggleClass('no-transparent');
  });

})(jQuery);
