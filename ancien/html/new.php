<?php 
				// connexion à la base de données
		 try {
		 $bdd = new PDO('mysql:host=localhost;dbname=capteurs', 'root', 'sari');
		 } catch(Exception $e) {
		 exit('Impossible de se connecter à la base de données.');
		 }
		$reponse = $bdd->query('SELECT * FROM ajd');
				while ($donnees = $reponse->fetch())
				{
					echo '{"value": "';
					echo $donnees['value'];
				echo '"},';
				}
?>