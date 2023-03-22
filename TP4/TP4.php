<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP4 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
			
			table,td,th{border: solid; border-collapse:collapse;text-align:center;}
        </style>
    </head>
    <body>
		<h1>TP4 : web dynamique<br>Base de données</h1>
		<h2>Objectif</h2>
		<ul>
			<li>Connexion et interrogation d’une base de données MySQL avec PHP.</li>
			<li>Savoir manipuler une base de données (interroger, modifier, insérer et afficher) 
			à partir d'une page web et de l’interface graphique phpMyAdmin.</li>
		</ul>

		
		<h2>Accès à phpMyAdmin</h2>
		<p>L'outil phpMyAdmin est un outil qui permet de gérer l'administration de MySQL sur le Web.<br>
		Le serveur MySQL et phpMyAdmin sont déjà installés avec le logiciel « MAMP »</p>
		<p>Pour accéder à l’interface de phpMyAdmin : Taper " localhost/phpMyAdmin " ou bien 
		aller à la page d’accueil de MAMP (localhost/MAMP) => menu Tools => phpMyAdmin <br> 
		Changer la langue en Français si vous le souhaitez.
		</p>

		<h2>Exercice</h2>
		<h3>Création de la base de données et des tables</h3>
		<ol>
			<li>Créer une base de données « club »</li>
			<li>Créer une table « adherents » contenant les colonnes suivantes :
				<ul>
					<li>Id : de type INT, défini comme clé primaire (index : primary), 
					cocher A_I pour que l'id s'incrémente automatiquement pour chaque nouvelle entrée de la table</li>
					<li>Nom : de type VARCHAR, de longueur maximale 64</li>
					<li>Prenom : de type VARCHAR, de longueur maximale 64</li>
					<li>Email : de type VARCHAR, de longueur maximale 64</li>
					<li>DateNaissance : de type DATE</li>
				</ul>
			</li>
			<li>Ajouter manuellement trois entrées à cette table (Ne donner aucune valeur à l'id)</li>
		</ol>
		
		<h3>Tâches à réaliser:</h3>
        <ol>
			<li>Compléter le script php ci-dessous, permettant la connexion à la base de données "club", 
			et l'affichage du contenu de la table "adherents"</li>
			<li>Modifier le script pour avoir un affichage dans un tableau comme ci-dessous. 
			Les deux dernières colonnes contiennent des liens vers les pages modifier.php et supprimer.php en passant 
			l'id de l'adhérent courant comme variable de l'URL
				<table>
					<tr>
						<th>id</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Date de Naissance</th>
						<th colspan=2>Action</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Benyoussef</td>
						<td>Meryem</td>
						<td>meryem.benyoussef@junia.com</td>
						<td>1901-01-01</td>
						<td><a href="modifier.php?id=...">Modifier</a></td>
						<td><a href="supprimer.php?id=...">Supprimer</a></td>
					</tr>
				</table>
			</li>
			<li>Créer un fichier connexion.php contenant le script de connexion, 
			inclure ce fichier à chaque fois que vous avez besoin d'établir la connexion avec la BD </li>
			<li>Compléter le script de la page supprimer.php, permettant de supprimer l'adhérent dont l'id est passé 
			dans l'URL (Rappel: on récupère les variables de l'URL avec la superglobale $_GET["NomVariable"])</li>
			<li>Compléter le formulaire ci-dessous, permettant de saisir les informations d'un nouveau adhérent. 
			Le script de traitement de ce formulaire est dans la page ajouter.php<br>
			Créer la page ajouter.php permettant d'ajouter le nouveau adhérent dans la table "adherents"</li>
			<li>Compléter le script de la page modifier.php permettant de modifier l'adhérent dont l'id est passé 
			dans l'URL. Suivre les étapes suivantes:
				<ul>
					<li>Récupérer de la BD les données de l'adhérent dont l'id est passé dans l'URL</li>
					<li>Donner à l'attribut "value" des inputs du formulaire, les valeurs récupérées de la BD</li>
					<li>Une fois on click sur le bouton modifier, récupérer les valeurs du formulaire et 
					mettre à jour les données de cet adhérent dans la BD.</li>
				</ul>
			</li>
		</ol>
		<?php
		
			$hostname= 'localhost'; //nom du serveur (localhost)
			$username='root';//nom d'utilisateur pour accéder au serveur (root)
			$password='root'; //mot de passe pour accéder au serveur (root)
			$dbname='club'; //nom de la base de données
			
			$connexion = mysqli_connect($hostname, $username, $password, $dbname);
	 
			if (!$connexion) {
				echo "Erreur de connexion".mysqli_connect_errno();
				die();
			}

			$requete="SELECT * FROM adherents";//La requere SQL
			$resultat = mysqli_query($connexion,$requete ); //Executer la requete
			
			if ( $resultat == FALSE ){
				echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
				die();
			}
			else
			{
				$nbreLignes = mysqli_num_rows($resultat); //Nombre de ligne du retour de la requete
                echo "Le Nombre des adhérents est : $nbreLignes <br>";
				//lire le tableau des resulats ligne par ligne
				if($nbreLignes>0){
					echo "<table border='1'>";
					echo '<tr>
					<th> Id </th>
					<th> Nom </th>
					<th>Prenom</th>
					<th>Email</th>
					<th>DateNaissance</th>
					
					<th colspan ="2">Action</th>
					</tr>';
					while ($row=mysqli_fetch_assoc ($resultat)){
						echo "
						<tr>
						
						<td>".$row['Id']."</td>
						<td>".$row['Nom']."</td>
						<td>".$row['Prenom']."</td>
						<td>".$row['Email']."</td›
						<td>"."</td>
						<td>".$row['DateNaissance']."</td>
						
						<td><a href='modifier.php?id=".$row['Id']."'>Modifier</a></td>
						<td><a href='supprimer.php?id=".$row['Id']."'>Supprimer</a></td>
						
						</tr>";		
					}
					echo "</table>";
				}
				else{
					echo "aucune ligne";
				}
				mysqli_close($connexion);//Fermer la connexion
			}
		?>
		<!-- Formulaire de modification -->
		<form name="ajout" action="ajouter.php" method="post">
			<fieldset>
				<legend>Ajouter un adhérent</legend>
				
				<label for="nom">Nom : </label>
				<input type="text" id="nom" name="nom"><br/>
				
				<label for="prenom">Prénom : </label>
				<input type="text" id="prenom" name="prenom"><br/>
				
				<label for="email">Email : </label>
				<input type="text" id="email" name="email"><br/>
				
				<label for="dateN">Date de naissance : </label>
				<input type="text" id="dateN" name="dateN"><br/>
				
				<input Type="submit" name="Ajouter" value="Ajouter">
			</fieldset>
		</form>
		
    </body>
</html>