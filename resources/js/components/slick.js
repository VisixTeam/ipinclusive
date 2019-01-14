require( 'slick-carousel' );

let next = '<span class="next"><svg viewBox="0 0 72 72"><g fill="none" fill-rule="evenodd"><circle fill="#FFF" cx="36" cy="36" r="36"/><path stroke="#F49B25" stroke-width="2" stroke-linecap="round" d="M32 46l10-11-10-11"/></g></svg></span>';
let prev = '<span class="prev"><svg viewBox="0 0 72 72"><g fill="none" fill-rule="evenodd"><circle fill="#FFF" cx="36" cy="36" r="36"/><path stroke="#F49B25" stroke-width="2" stroke-linecap="round" d="M38 46L28 35l10-11"/></g></svg></span>';
let slideSpeed = 1000;

$('[data-slick]').slick({
  speed: slideSpeed,
  prevArrow: prev,
  nextArrow: next,
  lazyLoad: 'ondemand',
  variableWidth: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        variableWidth: false
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        variableWidth: false
      },
    },
  ]
});

var time = 5;
var $bar,
isPause,
tick,
percentTime;

$bar = $('.slider-progress .progress');

$('[data-slick].home-banner').on({
  mouseenter: function() {
    isPause = true;
  },
  mouseleave: function() {
    isPause = false;
  }
})

function startProgressbar() {
  resetProgressbar();
  percentTime = 0;
  isPause = false;
  tick = setInterval(interval, 10);
}

function interval() {
  if(isPause === false) {
    percentTime += 1 / (time+0.1);
    $bar.css({
      width: percentTime+"%"
    });
    if(percentTime >= 100)
    {
      $('[data-slick].home-banner').slick('slickNext');
      startProgressbar();
    }
  }
}


function resetProgressbar() {
  $bar.css({
    width: 0+'%'
  });
  clearTimeout(tick);
}

startProgressbar();
