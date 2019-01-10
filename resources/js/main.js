(function($){

  $(document).ready(function() {
    detectBroswer();
  });

  let section = $('.section');

  section.each(function(){
    currentSection = $(this);
    readMore(currentSection);
  });

  function readMore(currentSection) {
    let readMoreBtn = currentSection.find('.read-more');
    let readMoreContent = currentSection.find('.read-more-content');

    readMoreBtn.click(function(){
      if(readMoreContent.hasClass('hide')){
        readMoreContent.removeClass('hide');
        readMoreBtn.text('Read less');
      } else {
        readMoreContent.addClass('hide');
        readMoreBtn.text('Read more');
      }
    });
  }

  function detectBroswer() {
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

    var isFirefox = typeof InstallTrigger !== 'undefined';

    var is_iPad = navigator.userAgent.match(/iPad/i) != null;

    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);

    var isIE = false || !!document.documentMode;

    var isEdge = !isIE && !!window.StyleMedia;

    var isChrome = !!window.chrome && !!window.chrome.webstore;

    var isBlink = (isChrome || isOpera) && !!window.CSS;

    var $body = $('body');

    if (isChrome) {
      $body.addClass('chrome');
    } else if (isFirefox) {
      $body.addClass('firefox');
    } else if(isEdge) {
      $body.addClass('edge');
    } else if(isIE) {
      $body.addClass('ie');
    } else if (isOpera) {
      $body.addClass('opera');
    } else if (isSafari || is_iPad) {
      $body.addClass('safari');
    } else  {
      $body.addClass('none');
    }

  }

})(jQuery);
