<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<link href="calendrier.css" rel="stylesheet" type="text/css">
	<title>Calendar</title>

<!----------------------- fullCalendar ------------------------>
	<link href='fullcalendar/css/fullcalendar.min.css' rel='stylesheet' />
	<link href='fullcalendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='fullcalendar/js/moment.min.js'></script>
	<script src='fullcalendar/js/jquery.min.js'></script>
	<script src='fullcalendar/js/fullcalendar.min.js'></script>
	<script>

  $(document).ready(function() {

    var calendar = $('#calendar').fullCalendar({
      defaultDate: '2018-01-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	  events: "fullcalendar/events.php",
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
		 var title = prompt('Event Title:');
		 if (title) {
		 start=moment(start).format('YYYY-MM-DDTHH:mm:ssZ'); 
        end=moment(end).format('YYYY-MM-DDTHH:mm:ssZ'); 
		alert(start);
		 $.ajax({
		 url: 'fullcalendar/add_events.php',
		 //data: 'title='+ title+'&start='+ start +'&end='+ end ,
		 data: {'title': title, 'start': start, 'end': end } ,
		 type: "POST",
		 success: function(json) {
		 alert('OK1');
		 }
		 });
		 calendar.fullCalendar('renderEvent',
		 {
		 title: title,
		 start: start,
		 end: end,
		 allDay: allDay
		 },
		 true // make the event "stick"
		 );
		 }
		 calendar.fullCalendar('unselect');
		},
		editable: true,
		eventDrop: function(event, delta) {
		 start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
		 end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
		 $.ajax({
		 url: 'fullcalendar/update_events.php',
		 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
		 type: "POST",
		 success: function(json) {
		 alert("OK2");
		 }
		 });
		},
		eventResize: function(event) {
		 start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
		 end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
		 $.ajax({
		 url: 'http://localhost/fullcalendar/update_events.php',
		 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
		 type: "POST",
		 success: function(json) {
		 alert("OK");
		 }
		 });
 
}
    });

  });

</script>


</head>
<body>
	<!--------------menu deroulant------------->
	<?php include("menu.html"); ?>

<header>
	Calendar
</header>

	<section class="article">

		<div id='calendar'></div>
		
	</section>

</body>