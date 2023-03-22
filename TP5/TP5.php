<?php
	//Exercice 1 : Question 2
     
    //Démarrer la session
	//session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP5 : web dynamique</title>
        <meta charset="utf-8" />
		<?php
		//Exercice 1 : Question 2
		
		if (isset($_COOKIE["theme"])){ //si la cookie existe
			$style = $_COOKIE["theme"];	//on récupère le theme choisi
		}
		else
			$style="clair";
		?>
		<link rel="stylesheet" href ="<?php echo $style; ?>.css"/>
    
	
	</head>
    <body>
		<h1>TP5 : web dynamique<br>Cookies & Sessions</h1>
		<h2>Partie I : Cookies</h2>
		<h3>Exercice 1 :</h3>
        <h4>Enoncé</h4>
		
		<p>Nous avons deux fichiers css "sombre.css" et "clair.css" (par défaut). 
		Le formulaire ci-dessous permet à l'utilisateur de choisir son thème préféré.</p>
		<ol>
			<li>Compléter le script du traitement de ce formulaire dans la page theme.php. 
			Ce script permet de récuperer le choix de l'utilisateur et d'enregistrer ce choix dans un cookie nommé "theme" d'une durée de vie d'un an.</li>
			<li>Compléter le script ci-dessus afin de récuperer la valeur du cookie "theme" s'il existe. </li>
			<li>Actualiser votre page pour s'assurer que la page s'affiche toujours avec le thème choisi. 
			Supprimer la cookie de votre navigateur et actualiser votre page, le thème par défaut "clair" doit être activé.</li>
			<li>Ajouter un script PHP afin d'afficher le formulaire du choix du thème seulement si le cookie theme n'existe pas (aucun thème choisi); 
			s'il existe, afficher le message suivant : "Votre thème préféré clair/sombre est activé"</li>
		</ol>
		
		<?php 
		if (isset($_COOKIE["theme"])){
			echo ("Votre thème préferé ".$_COOKIE["theme"]." est activé");
		}
		else{
		?>
			<form method="post" action="theme.php">		
				<label>Choisir votre thème préféré : </label>
				<select name="Choixtheme">
					<option value="sombre">Sombre</option>
					<option value="clair">Clair (par defaut)</option>
				</select>
				<input type="submit" name="Envoyer" Value="Envoyer"/>
			</form>
		<?php
			
		}
		?>
		
		
		
		
		
		<h2>Partie II : Sessions et Base de données</h2>
		<h3>Exercice 2 :</h3>
        <h4>Enoncé</h4>
		<ol>
			<li>Dans phpMyAdmin, créer une base de données nommé tp5 et importer le fichier sql fourni afin de créer les tables (menu importer) <br>
			Voici un visuel partiel de la base de données importée, notamment les tables "fournisseurs", "produits" et "Catégories" 
			ainsi que les colonnes qui les connectent. Pour voir le visuel complet : Menu "Plus" -> "Concepteur".<br> 
			<img src="db.jpg" width="500" height=auto></li>
			
			<li>Nous souhaitons faire la gestion de ce stock et contrôler l'accès à la page de gestion.<br>
			On suppose avoir  deux types d'utilisateurs: client (Login="client",Password="client123") et Admin (Login="admin",Password="admin123").<br>
			Nous avons trois pages: TP5.php (contenant le formulaire d'authentification ci-dessous), general.php et gestion.php.
				<ul>
					<li>TP5.php : est accessible par tout le monde</li>
					<li>general.php : est accessible par les utilisateurs authentifiés (client et admin)</li>
					<li>gestion.php: est accessible par les utilisateurs authentifiés de type admin seulement</li>
				</ul>
			Compléter le scipt de traitement du formulaire d'authentification:
				<ul>
					<li>Démarer d'abord la session (script tout en haut de la page) => démmarage de session est TOUJOURS au début de la page</li>
					<li>Récuperer les données du formulaire (script ci-dessous) et 
					créer deux variables de sessions : 1) "nom" prenant la valeur du login 2) "admin" prenant la valeur 
					true si l'utilisateur est un admin et false sinon</li>
					<li>L'utilisateur est ensuite redirigé vers la page gestion.php si c'est un admin et la page general.php sinon</li>
				</ul>
			</li>
			<li>Completer le script de la page general.php, où seuls les utilisateurs authentifiés (client et admin) ont le droit de voir son contenu</li>
			<li>Completer le script de la page gestion.php, où seul l'admin a le droit de voir son contenu</li>
			<li>Ajouter un script PHP afin d'afficher le formulaire d'authentification seulement si aucun utilisateur n'est authentifié (aucun session en cours),
			sinon on affiche un lien de deconnexion (vers la page logout.php)</li>
			<li>Compléter le script de la page logout.php</li>
			<li>Dans la page gestion.php, on souhaite modifier le stock des produits de la catégorie boisson via un formulaire. 
			Le formulaire contient une liste déroulante qui doit contenir la liste des produits de la catégorie boisson, 
			et un champs de texte pour y saisir la nouvelle valeur du stock.<br>
			Afin de remplir la liste déroulante dynamiquement des produits issue de la bd:
				<ol>
					<li>Compléter le script PHP permettant de récuperer de la bd les noms des produits et leurs références de la table produit 
					pour la catégorie boisson (CodeCategorie =1)</li>
					<li>Modifier le code du formulaire afin d'ajouter dynamiquement les options de la liste déroulante des produits en exploitant le résulat de la requête sql</li>					
				</ol>
			</li>
			<li>Compléter le script PHP du traitement de ce formulaire afin de récuperer le produit à modifier et la nouvelle valeur du stock à mettre à jours dans la bd</li> 

		<?php 
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		
		?>
			<!-- Formulaire d'authentification-->
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
				<fieldset>
					<legend>Formulaire d'authentification</legend>
					<label>Login :</label>
					<input type="text" name="login" placeholder="Entrez votre login" required>
					<label>Password :</label>
					<input type="text" name="passwd"  placeholder="Entrez votre mot de passe" required>
					<input type="submit" name="Envoyer" value="Envoyer"/>
				</fieldset>
			</form>
		<?php
		}
		else{
			header("Location:logout.php"); //redirection vers la page logout.php
		}
		?>
	 <?php
		//Script du traitement du formulaire d'authentification
		
		
		if(isset($_POST["Envoyer"])){
			$login=$_POST["login"];
			$mdp=$_POST["passws"];
			if ($login == "client") { //si un utilisateur normal (client)
				$_SESSION["nom"]= $login; //Variable de session "nom"
				$_SESSION["admin"]=false; //Variable de session "admin"
				header("Location:general.php"); //redirection vers la page general.php

			}
			else if ($login =="admin"){//si utilisateur Admin
				$_SESSION["nom"]= $login;//Variable de session "nom"
				$_SESSION["admin"]=true;//Variable de session "admmin"
				header("Location:gestion.php"); //redirection vers la page gestion.php

			}
		}
	  
	
     ?>
		
	

    </body>
</html>