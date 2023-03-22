

<?php
	require "connexion.php";
	
	if (isset($_POST["Ajouter"])
		&& isset($_POST["nom"])
		&& isset($_POST["prenom"])
		&& isset($_POST["email"])
		&& isset($_POST["dateN"])){
		
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$mail = $_POST['email'];
		$naissance = $_POST['dateN'];
		
		$requete = "INSERT INTO ".$table." VALUES (null,'".$nom."','".$prenom."','".$mail."','".$naissance."')";
		//$requete = "INSERT INTO adherents VALUES (null,'aa','bb','az','1901-01-01')";
		
		$resultat = mysqli_query($connexion,$requete ); //Executer la requete 
		
		if ( $resultat == FALSE ){echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;}
		
		mysqli_close($connexion); //Fermer la connexion
		
		header("Location:TP4.php");//Redirection vers la page TP4.php 
	}

?>
