<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP3 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
        </style>
    </head>
    <body>
        <h1>TP3 : web dynamique<br>Les formulaires</h1>
		<h3>Exercice 1 : Récupération et affichage des données d'un formulaire</h3>
        <h4>Enoncé</h4>
        <p>Considérant le formulaire ci-dessous qui demande à l’utilisateur son nom (champ de type texte), 
		son prénom (champ de type texte), son genre (bouton radio homme/femme), sa couleur préférée (menu sélection entre rouge, vert, bleu, jaune), 
		et ses sports pratiqués (boites à cocher).<br>
		Compléter le script php de la page formulaire.php afin d'avoir un affichage de type : <br>
		Bonjour madame ou monsieur en fonction du genre saisi suivi du nom et prénom. Votre couleur préférée est …, 
		vous ne pratiquez aucun sport ou les sports suivants … en fonction des cases cochés.<br><br>
		
		Une fois que votre formulaire et le script php fonctionnent. Essayez d'envoyer des champs vides à la page formulaire.
		Cela entrainera des erreurs.<br>
		Corrigez cette erreur en modifiant la script php, afin de vérifier que chaque donnée collectée du formulaire est non nulle avant de l'afficher. 
		Vous pouvez utiliser la fonction PHP isset().
		</p>
		<form method="post" action="formulaire.php">
			<fieldset style="width:50%;">
				<legend>Informations sur vous</legend>
				<label for="nom">Nom :</label>
				<input type="text" name="nom" id="nom" />
				
				<hr />
				<label>Sexe :</label>
				<input type="radio" name="genre" id="genre" value="homme"/>
				<label for="homme">Homme</label>
				<input type="radio" name="genre" id="genre" value="femme"/>
				<label for="femme">Femme</label>

				<hr />
				<label>Couleur préférée :</label>
				<select name="couleur">
					<option value="rouge">Rouge</option>
					<option value="vert">Vert</option>
					<option value="bleu">Bleu</option>
					<option value="jaune">Jaune</option>
				</select>
				
				<hr />
				<label>Sports pratiqués :</label>
				<input type="checkbox" name="sports[]" value="football" />Football
				<input type="checkbox" name="sports[]" value="rugby"/>Rugby
				<input type="checkbox" name="sports[]" value="golf" />Golf
				<input type="checkbox" name="sports[]" value="jogging" />Jogging
				<input type="checkbox" name="sports[]" value="autre" />Autre
				<hr />

				<input type="submit" name="Envoyer" Value="Envoyer"/>
				
			</fieldset>
		</form>
		
        <h3>Exercice 2: Validation d'un formulaire</h3>
        <h4>Enoncé</h4>
        <p>Créer un formulaire contenant les champs suivants:</p>
		<ul>
			<li>Civilité: Liste de sélection  contenant les options Mlle, Mme et M.</li>
			<li>Nom: champs de texte</li>
			<li>Email: champs de texte</li>
			<li>Mot de passe: champs de texte</li>
			<li>Confirmation mot de pass: champs de texte</li>
			<li>Bouton d'envoi</li>
		</ul>
		<p>Ecrire un script php permettant de faire la validation du formulaire avec les contraintes suivantes:</p>
		<ul>
			<li>Tous les champs sont obligatoires, si par exemple le nome n'a pas été saisi, le message "Le nom est requis" doit être affiché en rouge à côté du champs nom</li>
			<li>L'émail doit être valide. Utiliser la fonction VerificationEmail du TP précédent</li>
			<li>Le mot de passe doit être valide. Utiliser la fonction VerificationEmail du TP précédent</li>
			<li>Le mot de passe et la confirmation doivent être identique. Utiliser une fonction prédéfinie en php pour la conparaison de deux chaines de caractères</li>
			<li>Si un champs n'est pas valide un message d'erreur en rouge doit être affiché à côté du champs correspondant</li>
		</ul>
		<p>Ecrire un script php afin d'afficher le message suivant : Bonjour civilité. nom. Bienvenue dans notre communauté.<br>
		Remarque: Le script de traitement et d'affichage doivent être dans cette page même<br>
		Documentation: <a href="https://www.w3schools.com/php/php_form_required.asp" target="_blank"> w3schools </a></p>
        <h4>Solution</h4>
		<!-- Votre script de traitement du formulaire ici -->
		<?php
			$nameErr = $emailErr = $passErr = $confErr = $ineqErr = $civErr = '';
			function verificationEmail($mail){
				$flag = "<p  style='color:red';>L'adresse mail n'est pas valide.</p>";
				$end = "junia.com";
				$regex = "/(?i)(([a-z]*)(.|-))(?-i)@((?i)([a-z]*)(?-i)|.)junia.com$/";
				if(preg_match_all("/@/",$mail)==1){
					if(preg_match($regex,$mail)){
						$flag = '';
					}
				}
				return $flag;
			}
			function verificationPassword($pass){
				$flag = "<p  style='color:red';>Le mot de passe n'est pas valide.</p>";
				if(strlen($pass) >= 8){
					if(preg_match('!\d+!',$pass)){
						if(preg_match('/[A-Z]/',$pass) and preg_match('/[a-z]/',$pass)){
							$flag = '';
						}
					}
				}
				return $flag;
			} 
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
			$civil = $_POST['civil'];
			$nom= $_POST['name'];
			$email = $_POST['email'];
			$pass = $_POST['password'];
			$conf = $_POST['passwordConf'];
			
			if(!isset($_POST['civil'])){
				$civErr = '<p style="color:red";>La civilité est requise.</p>';
			}
 			if(empty($_POST["name"]))
				$nameErr = "<p style='color:red';>Le nom est requis.</p>";
			if(empty($email)){
				$emailErr = "<p style='color:red';>L'email est requis.</p>";
			}
			else{
				$emailErr = verificationEmail($email);
			}
			if(!isset($pass))
				$passErr = "<p style='color:red';>Le mot de passe est requis.</p>";
			else{
				$passErr = verificationPassword($pass);
			}
			if(empty($conf)){
				$confErr = "<p style='color:red';>La confirmation est requise.</p>";
			}
			if(isset($pass) and isset($conf)){
				if($pass != $conf){
					$confErr = "<p style='color:red';>Les deux mots de passes ne sont pas égaux</p>";
				}
			}
			}
		?>
        <!-- Votre formulaire ici -->
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
			<fieldset style="width:50%;">
				<legend>Formulaire</legend>

				<label>Civilité</label>
				<select name="civil">
					<option value="Mlle">Mademoiselle</option>
					<option value="Mme">Madame</option>
					<option value="M">Monsieur</option>
				</select>
				<span><?php echo $civErr ;?></span>

				<hr/>
				<label for="name">Nom :</label>
				<input type="text" name="name" id="name" />
				<span class='error'><?php echo $nameErr;?></span>
				
				<hr />
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" />
				<span class='error'><?php echo $emailErr;?></span>

				<hr />
				<label for="password">Mot de passe :</label>
				<input type="text" name="password" id="password" />
				<span class='error'><?php echo $passErr;?></span>

				<hr/>
				<label for="confirmation">Confirmation du mot de passe :</label>
				<input type="text" name="passwordConf" id="passwordConf" />
				<span class='error'><?php echo $confErr;?></span>

				
				<input type="submit" name="Envoyer" Value="Envoyer"/>
				
			</fieldset>
		</form>
		<!-- Votre script d'affichage ici -->
		<?php 
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			echo "Bonjour $civil $nom, bienvenue dans notre communauté."; 
		}
		?>

		<h3>Exercice 3: Création d'un dossier d'upload</h3>
        <h4>Enoncé</h4>
        <p>Completer le formulaire ci-dessous permettant aux utilisateurs de charger des images<br>
		Ecrire un script permettant d'enregistrer les images dans un dossier nommé "images". Les images doivent avoir une taille inférieure à 1000000 octets, 
		et doivent être du type jpg , gif ou png.<br><br>
		Ecrire un script affichant les images contenues dans le dossier "images" (avec la balise img bien sûr). Utiliser les fonctions opendir() ,readdir() et closedir(). <br>
		Documentation: <a href="https://www.php.net/manual/fr/ref.dir.php" target="_blank">Fonctions sur les dossiers </a>
		</p>
		
		<h4>Solution</h4>
		<form action="TP3.php" method="post" enctype="multipart/form-data">
			<label>Choisir une image: </label>
			<input type="file" name="imgToUpload"/>
			<br><br>
			<input type="submit" name="submit"/>
			<br><br>
		</form>
		<h5>Images</h5>
		
		<!-- Script php d'enregistrement des images-->
		<?php 
		$dir = "images/";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$tarFile = $dir . basename($_FILES["imgToUpload"]["name"]);
			if(isset($_POST["submit"])) { 
				$check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
				if($check){
					move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $tarFile);
				}
			}
		}
		
		?> 
		<!-- Script php d'affichage des images -->
		<?php
		$images = glob($dir."*");
		foreach($images as $image) {
			echo '<img src="'.$image.'" /><br />';
		}
		?>



		

    </body>
</html>