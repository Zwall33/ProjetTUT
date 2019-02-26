
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<link href="../index.css" rel="stylesheet" type="text/css">
	<title>pump</title>
</head>

<body>
	<!--------------menu deroulant------------->
	<?php include("../menu.html"); ?>

<header>
	Home
</header>

<section class="article">
		<p>
		finished operation <br />
		click here for return: <br />
		<li><a href=../pompe.php title="tu va voir!">retour</a></li>
		</p>
		
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "sari";
			$dbName = "pump";

			$conn = new mysqli($servername, $username, $password, $dbName);

			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			//storing the result of the executed query
			$result = $conn->query("UPDATE motor SET value=1 WHERE id=3");
			sleep(30);
			$result = $conn->query("UPDATE motor SET value=0 WHERE id=3");
			//Closing the connection to DB
			$conn->close();
	?>
</section>

		
</body>	

