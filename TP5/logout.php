<?php 
	session_start(); //Démarrer la session
	if(isset($_SESSION['nom']) && ($_SESSION['admin'] == true || $_SESSION['admin'] == false)){ // si un utilisateur est authentifié
		session_unset(); //détruire les variable
		session_destroy();;//détruire la session
		header("Location:TP5.php");
	}
?>
