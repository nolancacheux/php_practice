

<?php
	require "connexion.php";

	
	if(isset($_GET["id"])){
		
		$id = $_GET['id'];
		$requete = "DELETE from $table where id = $id";

		$resultat = mysqli_query($connexion,$requete ); //Executer la requete de suppression

		if ( $resultat == FALSE ){echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;}
		
		mysqli_close($connexion); //Fermer la connexion
		
		header("Location:TP4.php");//Redirection vers la page TP4.php 
	}

?>
