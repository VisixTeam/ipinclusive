(function($){

  let calendarView = $('#calendar-view')

  let listView = $('#list-view')

  let listViewDisplay = $('.list-view')
  let calendarViewDisplay = $('.calendar-view')

  let eventSlider = $('[data-slick].list-view')

  listViewDisplay.addClass('hide')
  calendarView.addClass('active-view')


  calendarView.click(function(){
    calendarView.addClass('active-view')
    calendarViewDisplay.removeClass('hide')

    listView.removeClass('active-view')
    listViewDisplay.addClass('hide')
  });

  listView.click(function(){
    calendarView.removeClass('active-view')
    calendarViewDisplay.addClass('hide')

    listView.addClass('active-view')
    listViewDisplay.removeClass('hide')

    $('[data-slick].list-view').slick()

  });

})(jQuery);
