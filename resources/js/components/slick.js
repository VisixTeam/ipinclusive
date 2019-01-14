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
