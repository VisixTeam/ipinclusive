(function($){

  var events = $('.calendar-container').attr('data-events');

  if($('#calendar').length > 0) {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      height: 'auto',
      aspectRatio: 3,
      eventBorderColor: 'transparent',
      eventSources: [
        {
          events: JSON.parse(events),
          backgroundColor: '#0077A1',
          textColor: '#fff',
          overlap: true,
          allDay: false,
        }
      ],
      eventClick: function(calEvent) {
        $('#event-title').text(calEvent.title);

        if(calEvent.type == 'events') {
          $('#event-link').attr('href', calEvent.event_link).show()
        } else {
          if (calEvent.date_link !== null) {
            $('#event-link').attr({
              'href': calEvent.date_link,
              'target': '_blank',
            }).show()
          } else {
            $('#event-link').hide()
          }
        }

        $('#calendar-more_info').foundation('open');
      },
      timeFormat: 'H:mm',
      displayEventTime: false,
      displayEventEnd: false,
      eventLimit: true
    })

    $('.change-calendar-view').each(function(){
      $(this).on('click', function(){
        if(!$(this).hasClass('active-view')) {
          $('.change-calendar-view.active-view').removeClass('active-view')
          $(this).addClass('active-view')
          $('#calendar').fullCalendar('changeView', $(this).attr('data-view'))
        }
      })
    })
  }


})(jQuery);
