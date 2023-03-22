<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP2 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
	
			table{border-collapse:collapse;}
			td{border: 1px solid black; width: 100px; text-align:center;}
			div{border:solid red; padding:10px;}

        </style>
    </head>
    <body>
        <h1>TP2 : web dynamique<br>Les fonctions intégrées<br>(partie II)</h1>
		<h2>I. Manipulation des chaines de caractères</h2>
		<h3>Exercice 6 (Précision)</h3>
        <h4>Enoncé</h4>
        <p>Ecrire une fonction qui s'appelle verificationEmail(). Elle prendra un argument de type string.
		Elle devra retourner un boolean qui vaut true si le email respecte les règles suivantes :<br>
		L'émail doit contenir des lettres, le caractère point "." ou le caractère "-", suivit du caractère "@" une seul fois, suivit de 0 ou plusieurs lettres ou caractère point, suivit de la chaine "junia.com qui doit être à la fin de l'émail"
		</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		
		function verificationEmail ($chaine){
			
			$lettres = preg_match('/[a-z]+/', $chaine);
			$point = preg_match('/(.)+/', $chaine);
			$tiret = preg_match('/(-)+/', $chaine);
			$findumail = preg_match("/@{1}[a-z]*(junia.com)$/",$chaine);
			
			if($lettres && $point && $tiret && $findumail) {return true;}
			return false;
		}
		$chainetest = "yhehzhzeh.-e@zpmmdzjunia.com";
		echo "La chaîne que l'on va tester est $chainetest , cette chaîne est : ";
		if (verificationEmail ($chainetest)){printf("Valide");}
		else{printf("Non Valide");}
		
		?>
        <h2>III. Manipulation des dates</h2>
		<div>
			Définitions:
			<ul>
				<li>Les fonctions date de PHP permettent d’afficher la date et l’heure sur les pages web.</li>
				<li>Les informaticiens ont défini une date de base arbitraire, correspondant au 1er janvier 1970 00h00m00s. À partir de cette date, le temps est compté en secondes.</li>
				<li>Ce nombre de secondes est nommé <span style="color:red;"> timestamp</span>, ou instant Unix</li>
				<li>Le timestamp est universel, puisqu'il y a pas de notion de fuseaux horaire.</li>
				<li>Le timestamp est passé en paramètre à d'autres fonctions pour réaliser l’affichage en clair de la date.</li>
			</ul>
			Exemples:
			<ul>
			<?php		
				echo "<li>La fonction time() retourne le timestamp actuelle : ".time()." secondes.</li>";
				echo "<li>La fonction date() affiche la date sous plusieurs formes : ".date('r')."</li>" ;
				echo "<li>La fonction date peut aussi prendre un timestamp comme paramètre pour l'afficher selon le format souhaité</li>.";
			?>
			</ul>
			Aide:
			<ul>
				<li>Documentation: <a href="https://www.php.net/manual/fr/ref.datetime.php" target="_blank">Liste des fonctions sur les dates</a>, 
				<a href="https://www.php.net/manual/fr/datetime.format.php" target="_blank">Les formats pour la fonction date()</a> </li>
				<li>Fonctions utiles pour cette partie: checkdate, date, time, mktime</li>
			</ul>
		</div>
		<h3>Exercice 1</h3>
        <h4>Enoncé</h4>
        <p>Vérifiez si la date du 29 février 2022 est valide.</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
			if (checkdate(12, 31, 2000)){printf("La date est valide");}
			else{printf("La date n'est pas valide");}
		?>
		
		<h3>Exercice 2</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant la date et l'heure courantes sous les formes suivantes :</p>
		<p>Monday/January/2022<br>25/Jan/2022<br>25-01-22<br>23h: 31m: 01s</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
			echo date('l/F/Y')."<br>"; 
			echo date('d/F/Y')."<br>";  
			echo date('d-m-y')."<br>";   
			echo date('H')."h: ".date('i')."m: ".date('s')."s <br>"; 			
		?>
		
		<h3>Exercice 3</h3>
        <h4>Enoncé</h4>
        <p>Quel jour de la semaine était le 6 novembre 1975?</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
		$date="06-11-1975";
		$joursem = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
		list($jour, $mois, $annee) = explode('-', $date);
		$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
		echo $joursem[date("w",$timestamp)];
		?>
		
		<h3>Exercice 4</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant si une année est bissextile.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
			function bissextile($annee){
				if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) {return TRUE;} 
				return FALSE;
			}	
			$anneetest = 2008;
			if (bissextile($anneetest)){echo"C'est une année bissextile";}
			else{echo"Ce n'est pas une année bissextile";}
		?>
		
		<h3>Exercice 5</h3>
        <h4>Enoncé</h4>
        <p>Calculez votre âge à l’instant en cours (soustraction de deux timestamp), en secondes puis en années.</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
		$date ="2003-05-23";
		$age = date('Y') - date('Y', strtotime($date));
		echo "Ton âge en année vaut : ";
		if (date('md') < date('md', strtotime($date))) { echo $age-1; }
		else{ echo $age; }
		
		$ageseconde = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y")) - mktime(0, 0,0, 05, 23, 2003);
		echo "<br>Ton âge en secondes vaut : $ageseconde";
		
		?>

		<h3>Exercice 6</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant le jours de la semaine (en français) du premier mai des années comprises entre 2022 et 2033, <br>
		le script affiche : "vous aurez un weekend prolongé" si le premier mai correspond à un vendredi ou un lundi, <br>
		"vous aurez un jours de repos" si le premier mai correspond à un mardi, mercredi ou jeudi,<br>
		"désolé" si le premier mai correspond à un samedi ou dimanche</p>
        <h4>Solution</h4>
		<?php
		$jours=["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
		//Votre solution ici
	
		for ($i = 2022 ; $i<=2033 ; $i++){
			
			$date ="01-05-".$i;
			echo "$date : ";
			
			list($jour, $mois, $annee) = explode('-', $date);
			
			$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
			
			$joursemaine = $jours[date("w",$timestamp)];

			if ($joursemaine== "Vendredi" || $joursemaine== "Lundi") {echo "Vous aurez un weekend prolongé<br>";}
			
			if ($joursemaine== "Mercredi" || $joursemaine== "Mardi" || $joursemaine== "Jeudi") {echo "Vous aurez un jours de repos<br>";}
			
			if ($joursemaine== "Samedi" || $joursemaine== "Dimanche") {echo "Désolé <br>";}
		}
		?>
		
		

    </body>
</html>