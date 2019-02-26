<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<link href="index.css" rel="stylesheet" type="text/css">
	<title>Pump</title>
</head>

<body>
<!--------------menu deroulant------------->
	<?php include("menu.html"); ?>
<header>
	Pump
</header>

<section class="article">
	<?php if($_COOKIE['password'] == 1) { 
	header('location: pompe.php');
	}
	else { ?>
	<p>
	please enter the password
	</p>
	<form method="post" action="cookie.php"> 
	<input type="password" name="mdp" /><br /> 
	<input type="submit" /> 
	</form> 
	<?php } ?>
</section>
		
</body>	

