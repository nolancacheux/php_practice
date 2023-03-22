<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Formulaire Action </title>
	<style>
		body{padding:3%;}
		h4{color:blue;}
	</style>
</head>
<body>
	<h4>Exercice 1: Solution</h4>
	<?php
		if(isset($_POST["Envoyer"])){
			
			if(isset($_POST["nom"])){
				$nom=$_POST["nom"];
			}
			else{echo "<p> Vous n'avez pas renseigné de nom";}
			
			if(isset($_POST["genre"])){
				$genre=$_POST["genre"];
			}
			else{echo "<p> Vous n'avez pas renseigné de genre";}
			
			echo "<p> Bonjour ";
			
			if($genre=="homme")
				echo "monsieur $nom";
			else if ($genre=="femme")
				echo "madame $nom";
			
			if(isset($_POST["couleur"])){
				$couleur=$_POST["couleur"];
				echo ",<br>Votre couleur préférée est le $couleur.<br>";
			}
			else{echo "<p> Vous n'avez pas renseigné de couleur";}
			if(isset($_POST["sports"])==false)
				echo "Vous ne pratiquez aucun sport.</p>";
			else {
				$sports=$_POST["sports"];
				echo "Vous pratiquez : ";
				foreach ($sports as $val)
					echo " le $val,";
				echo ".</p>";
			}
		}
	?>
</body>
</html>