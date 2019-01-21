// bootstrap our js application
require('./bootstrap')

// include the complete Foundation js framework
import { Foundation } from 'foundation-sites'
import fullcalendar from 'fullcalendar'
import moment from 'moment'
import Blazy from 'blazy'

// libs from base theme
// fast click stops the 300ms delay on touch devices when using onClick
require( 'libs/fastclick' )
// applies a nice smooth scrolling to all browsers (not required)
require( 'libs/smoothscroll' )
// includes Parsely.js validation
require( 'libs/validation' )
// includes post ajaxing and prerendering
require( 'libs/post-forms' )



require('./main')

require('./modules/nav')
require('./modules/event-datepicker')
require('./modules/questionnaire')

require('./components/slick')
require('./components/filtering')

$(function () {
  var bLazy = new Blazy({
    selector: '*[data-blazy]',
    src: 'data-blazy',
    loadInvisible: true
  });

  // initialise foundation
  $(document).foundation()
  $('form[data-post-form-id][data-post-container][data-post-pagination][data-post-loading]').each(function () {
    $(this).postForm()
  })

  $(window).on('added_posts', function (e, postform) {
    bLazy.revalidate();
    console.log('Posts have been added')
    $('#signatories-count').text(postform.form_parts.container.find('.signatories').length)
  })

})
