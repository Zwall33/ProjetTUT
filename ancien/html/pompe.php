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

	 <?php
    if ((isset($_POST['mdp']) AND $_POST['mdp'] ==  "sari") OR $_COOKIE['password'] == 1) // Si le mot de passe est bon
    {
    ?>
		<p>
			Veuillez rentrer le numéro de la vanne (1, 2, 3 ou 4). <br />
			Et la valeur de la vanne (0= fermer, 1= ouvert).
		</p>
		<form method="post" action="pompe.php"> 
			<input type="text" name="pump_number" /><br /> 
			<input type="text" name="value" /><br /> 
			<input type="submit" /> 
		</form> 

		<p>
			ouvre une des quatres vannes pendant 30 s
		</p>
		<form method="post" action="pump/tempo1.php"> 
			<input type="submit" /> <br /> 
		</form> 
		<form method="post" action="pump/tempo2.php"> 
			<input type="submit" /> <br /> 
		</form> 
		<form method="post" action="pump/tempo3.php"> 
			<input type="submit" /> <br /> 
		</form> 
		<form method="post" action="pump/tempo4.php"> 
			<input type="submit" /> <br /> 
		</form> 
	<?php 
		$num=$_POST["pump_number"];
		$val=$_POST["value"];

		if(isset($_POST["value"]))
		{ 
			try{ $bdd= new PDO("mysql:host=localhost;dbname=pump","root","sari"); } 
			catch(exception $e){ 
			die ("Il y a un petit problème".$e->getMessage()); 
			} 

			$req = $bdd ->prepare("UPDATE motor SET value=:value WHERE id=:pump"); 
			$req -> execute(array(':value'=>$val, ':pump'=>$num)); 
			$req -> closeCursor(); 
		} 

    }
    else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe incorrect</p>';
		?>
		<li><a href=/password.php title="tu va voir!">retour</a></li>
	<?php
    }
    ?>		

	</section>
</body>	

