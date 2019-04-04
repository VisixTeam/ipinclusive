(function($){

  var events = $('.calendar-container').attr('data-events');
  var eventFilter = $('#event-filter');

  if($('#calendar').length > 0) {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      handleWindowResize: true,
      editable: false,
      height: 'auto',
      aspectRatio: 3,
      eventBorderColor: 'transparent',
      eventSources: [
        {
          events: JSON.parse(events),
          textColor: '#fff',
          overlap: true,
          allDay: false,
        }
      ],
      eventRender: function eventRender(event, element) {

        if ( eventFilter.val() != 'all' ) {

          let eventFilterVal = eventFilter.val();
          if (event.event_communities_id.indexOf(parseInt(eventFilterVal)) < 0 ) {
            return false
          }
        }
      },
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

    eventFilter.on('change',function(){
      $('#calendar').fullCalendar('rerenderEvents');
    });

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
