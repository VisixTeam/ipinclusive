// bootstrap our js application
require('./bootstrap')

// include the complete Foundation js framework
import { Foundation } from 'foundation-sites'

// libs from base theme
// fast click stops the 300ms delay on touch devices when using onClick
require( 'libs/fastclick' )
// applies a nice smooth scrolling to all browsers (not required)
require( 'libs/smoothscroll' )
// includes Parsely.js validation
require( 'libs/validation' )
// includes blazy.js lazy loading
require( 'libs/lazy-loading' )
// includes post ajaxing and prerendering
require( 'libs/post-forms' )

require('./main')

require('./modules/nav')

require('./components/slick')

$(function () {

  // initialise foundation
  $(document).foundation()
  $('form[data-post-form-id][data-post-container][data-post-pagination][data-post-loading]').each(function () {
    $(this).postForm()
  })
})
