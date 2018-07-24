require('./bootstrap')

import { Foundation } from 'foundation-sites'

// libs from base theme
require( 'libs/fastclick' )
require( 'libs/smoothscroll' )

// dependancies
// require( 'slick-carousel' )
// require( 'jquery-zoom/jquery.zoom.min.js' )

// plugins
// require( 'plugins/woocommerce' )

$(function () {
    $(document).foundation()
})
