 $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      weekNumberCalculation: 'ISO',
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        var title = prompt('Entrez le nom la pompe à activer : ');
        var date = start.format();
        var timestart = prompt('HH:MM:SS');
        var timeend = prompt('HH:MM:SS');
        var startevent = date + 'T' + timestart;
        var endevent = date + 'T' + timeend;
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: startevent,
            end: endevent
          };
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      },
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      timeFormat: 'H(:mm)' // uppercase H for 24-hour clock
    });

  });