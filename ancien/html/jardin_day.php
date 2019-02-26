<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link href="le_jardin.css" rel="stylesheet" type="text/css">
	<title>The garden</title>
	
<!-------------------------- actualisation automatique --------------------------->
    <meta http-equiv="refresh" content="3600; URL=le_jardin.php" />

<!--------------------------------- array ------------------------------------------>
	<script src="fusioncharts/js/jquery-2.1.4.js"></script>
	<script src="fusioncharts/js/fusioncharts.js"></script>
	<script src="fusioncharts/js/fusioncharts.charts.js"></script>
	<script src="fusioncharts/js/themes/fusioncharts.theme.zune.js"></script>
	<script src="sensors/humidity/app.js"></script>
	<script src="sensors/sunshine/app.js"></script>
	<script src="sensors/air_temp/app.js"></script>
	<script src="sensors/earth_temp/app.js"></script>
</head>

<body>
	<!--------------menu deroulant------------->
	<?php include("menu.html"); ?>

<header> records of the day </header>

<section class="article", id="chart-container"> </section>
<section class="article2", id="chart-container2"> </section>
<section class="article3", id="chart-container3"> </section>
<section class="article4", id="chart-container4"> </section> 

</body>
</html>