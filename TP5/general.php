<?php 
	//Exercice 2 : QUESTION 3
	
	session_start(); //Démarrer la session
	if(isset($_SESSION['nom']) && ($_SESSION['admin'] == true || $_SESSION['admin'] == false)){ // si l'utilisateur est authentifié (client ou admin) alors on affiche la page

?>
	
	<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>General</title>
			<meta charset="utf-8" />
		</head>
		<body>
			<h1>Page générale</h1>
			<p>Bonjour <br><a href="./logout.php">Déconnexion</a> </p>
			
		 </body>	
	</html>	



<?php	
}
else{ //SINON : si l'utilisateur n'es pas authentifié => redirection vers la page d'authentification TP5.php
	header("Location:TP5.php");
}
?>
