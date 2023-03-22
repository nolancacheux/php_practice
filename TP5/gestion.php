<?php 
	//Exercice 2 : QUESTION 4
	
	session_start(); //Démarrer la session
	if(isset($_SESSION['nom']) && $_SESSION['admin'] == true){// si l'utilisateur authentifié est un admin alors on affiche la page
?>
		
	<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>Gestion</title>
			<meta charset="utf-8" />
		</head>
		<body>
			<h1>Gestion du stock</h1>
			<p>Bonjour ADMIN <br><a href="./logout.php">Déconnexion</a> </p>
			

			<?php
				//Exercice 2 : QUESTION 7 - 1 
				
				//Lancer la connexion à la db "tp5" 
				
				$hostname= 'localhost'; //nom du serveur (localhost)
				$username='root';//nom d'utilisateur pour accéder au serveur (root)
				$password='root'; //mot de passe pour accéder au serveur (root)
				$dbname='tp5'; //nom de la base de données
				
				$connexion = mysqli_connect($hostname, $username, $password, $dbname); //Connexion
				if (!$connexion) {
					echo "Erreur de connexion".mysqli_connect_errno();
					die();
				}
				
				$requete1="SELECT NomProduit , RefProduit from produit WHERE CodeCategorie = 1"; //Requete pour récuperer les noms des produits et leurs références de la table produit pour la catégorie boisson (CodeCategorie =1)
				$resultat1 =mysqli_query($connexion,$requete1); //Executer la requete	
				if ( $resultat1 == FALSE ){
					echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
					die();
				}
				
				
			?>
			
			<form action="gestion.php" method="post">
				<fieldset>
					<legend>Modification du stock pour la catégorie "boissons" (CodeCategorie 1)</legend>
					<label>Produit :</label>
					<select name="produit">
					<?php
						//Exercice 2 : QUESTION 7 - 2
						
						//récuperer le résultat de la requête ci-dessus et ajouter les options dynamiquement
						$resultat1->data_seek(0);
                        while ($row = $resultat1->fetch_assoc()) {
                            echo "<option value=".$row["RefProduit"].">".$row["NomProduit"]." (Reference : ".$row["RefProduit"].")</option>";
                        }
                        mysqli_close($connexion);//Fermer la connexion
						
					?>
					</select>
					
					<br><br>
					<label>Quantité :</label>
					<input type="text" name="quantite" required>
					
					<br><br>
					<input type="submit" name="Modifier"/>
				</fieldset>
			</form>
			
			<?php
				////Exercice 2 : QUESTION 8 : script de traitement du formulaire et de modification du stock
				
				
				
				//Ouvrir la connexion
				
				$hostname= 'localhost'; //nom du serveur (localhost)
				$username='root';//nom d'utilisateur pour accéder au serveur (root)
				$password='root'; //mot de passe pour accéder au serveur (root)
				$dbname='tp5'; //nom de la base de données
				
				$connexion = mysqli_connect($hostname, $username, $password, $dbname); //Connexion
				if (!$connexion) {
					echo "Erreur de connexion".mysqli_connect_errno();
					die();
				}
					
				if(isset($_POST["Modifier"])){ 
					$quantite=$_POST["quantite"];//récuperer du formualire la nouvelle quantite du stock
					$ref=$_POST["produit"];//récuperer du formulaire la ref du produit à modifier
					
					
					$requete="UPDATE produit SET UnitesStock = '$quantite' WHERE RefProduit = '$ref'";
					// requete pour modifier le stock du produit
					//dont la réference est $ref et de la catégorie boisson (CodeCategorie =1)
					$resultat =mysqli_query($connexion,$requete);//Executer la requete
					
					if ( $resultat == FALSE ){
						echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>";
						die();
					}
					else
					{
						echo "<p>Stock modifié</p>" ;
						mysqli_close($connexion);//Fermer la connexion
					}
				}
				
			?>
			
		 </body>	
	</html>	



<?php	
}
else{ 
	//Exercice 2 : QUESTION 4
	//si ce n'est pas un admin => redirection vers la page d'authentification TP5.php
	header("Location:./TP5.php");
	
}
?>
