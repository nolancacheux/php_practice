
	
<?php
	// Connexion
	require "connexion.php";

	// //ETAPE 1: Récupération des données de la BD
	
	if (isset($_GET["id"])){
		$id = $_GET['id'];
		$requete ="SELECT * from $table where id = $id";
		$resultat = mysqli_query($connexion,$requete ); //Executer la requete
		if ( $resultat == FALSE ){
			echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;die();
		}
		
		$row=mysqli_fetch_assoc ($resultat);
		$prenom = $row['Prenom'];
		$nom = $row['Nom'];
		$mail = $row['Email'];
		$naissance = $row['DateNaissance'];
		$id = $row['Id'];
	
	}
	
	//ETAPE 2: Compléter le formulaire en bas

	//ETAPE 3: Modification des données de la BD selon les valeurs envoyées par le formulaire
	
	if (isset($_POST["Modifier"])){
		
		if (isset($_POST["nom"])
		&& isset($_POST["prenom"])
		&& isset($_POST["email"])
		&& isset($_POST["dateN"])
		&&(isset($_POST["id"]))){
		
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$mail = $_POST['email'];
		$naissance = $_POST['dateN'];
		$id = $_POST['id'];
		
		
		$requete ="UPDATE $table SET nom= '".$nom."',prenom='".$prenom."',email='".$mail."',dateNaissance='".$naissance."' WHERE id = $id";
		$resultat = mysqli_query($connexion,$requete ); //Executer la requete
		if ( $resultat == FALSE ){
			echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;die();
		}
			
		// on ferme la connexion à la base
		mysqli_close($connexion);
		header("Location:TP4.php");
	}
	}

?>

<!-- ETAPE 2: Formulaire de modification -->
	<form name="modif" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<fieldset>
			<legend>Modifier un adhérent</legend>
			<input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($id) ?>"><br/>
			
			<label for="nom">Nom : </label>
			<input type="text" id="nom" name="nom" required value="<?php echo htmlspecialchars($nom)?>"><br/>
			
			<label for="prenom">Prénom : </label>
			<input type="text" id="prenom" name="prenom" required value="<?php echo htmlspecialchars($prenom) ?>"><br/>
			
			<label for="email">Email : </label>
			<input type="text" id="email" name="email" required value="<?php echo $mail ?>"><br/>
			
			<label for="dateN">Date de naissance : </label>
			<input type="text" id="dateN" name="dateN" required value="<?php echo htmlspecialchars($naissance) ?>"><br/>
			
			<input Type="submit" name="Modifier" value="Modifier">
		</fieldset>
    </form>