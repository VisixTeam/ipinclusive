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

$(function () {

    // initialise foundation
    $(document).foundation()

})
