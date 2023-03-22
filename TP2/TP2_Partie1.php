<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP1 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
			.orange{color:orange}
			.jaune{color:jaune}
	
			table{border-collapse:collapse;}
			td{border: 1px solid black; width: 100px; text-align:center;}
			div{border:solid red; padding:10px;}

        </style>
    </head>
    <body>
        <h1>TP2 : web dynamique<br>Les fonctions intégrées<br>(partie I)</h1>
        <h2>I. Manipulation des chaines de caractères</h2>
		<div>
			Aide:
			<ul>
				<li>Documentation: <a href="https://www.php.net/manual/fr/ref.strings.php" target="_blank">Liste des fonctions sur les chaines de caractères</a></li>
				<li>Fonctions utiles pour cette partie: strlen, preg_match, printf, str_pad, str_replace, ord, ucwords, </li>
			</ul>
		</div>
		<h3>Exercice 1</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant le code ASCII de chaque lettre d'une chaine de caractères.</p>
        <h4>Solution</h4>
		<?php
		$chaine="TP2 : PHP dynamique";
		//Votre solution ici
		$longueur=strlen($chaine);
		
		for($i=0;$i<$longueur;$i++){
		$caractere=substr($chaine,$i,1);
		echo "Le code Ascii de la lettre : ".$caractere." est : ".ord($caractere)."<br /><br />";
		}
		?>
		
        <h3>Exercice 2</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant Tous les mots d'une phrase donnée avec une initiale en majuscule.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		$phrase = "Bonjour je suis là";
		echo ucwords($phrase);
		?>
		<h3>Exercice 3</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script remplaçant les caractères \n par &lt; br&gt;</p>
        <h4>Solution</h4>
		<?php
		$chaine="PHP \n est meilleur \n que ASP \n et JSP \n";
		echo "Avant : $chaine <br><br>";
		// Votre solution ici 
		$chaine = str_replace("\n","<br>",$chaine);
		echo "Après : $chaine <br>";
		?>

		<h3>Exercice 4</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script permettant de formater l'affichage d'un sommaire composé d'une suite de titres et leurs numéros de page de la façons suivante 
		</p>
        <h4>Solution</h4>
		<?php
		$titre1= "HTML";
		$titre2="CSS";
		$titre3="PHP";
		$page1="1";
		$page2="5";
		$page3="20";
		echo "<br>";
		echo "<pre>";
		 
		//Votre solution ici
		echo str_pad("Chapitres",20," "),str_pad("Pages",20," ",STR_PAD_LEFT),"<br>";

		echo str_pad($titre1,20,"."),str_pad($page1,20,".",STR_PAD_LEFT),"<br>";

		echo str_pad($titre2,20,"."),str_pad($page2,20,".",STR_PAD_LEFT),"<br>";
		
		echo str_pad($titre3,20,"."),str_pad($page3,20,".",STR_PAD_LEFT),"<br>";
		 
		echo "</pre>";
		?>
		
		
        <h3>Exercice 5</h3>
        <h4>Enoncé</h4>
        <p>Ecrire une fonction qui s'appelle verificationPassword(). Elle prendra un argument de type string.
		Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
		<ul>
			<li>faire au moins 8 caractères ;</li>
			<li>avoir au moins 1 chiffre ;</li>
			<li>avoir au moins une majuscule et une minuscule.</li>
		</ul>
		Utiliser les expressions régulières et la fonction preg_match().
		</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		function verificationPassword ($chaine){
			
			$uppercase = preg_match('/[A-Z]+/', $chaine);
			$lowercase = preg_match('/[a-z]+/', $chaine);
			$number = preg_match('/[0-9]+/', $chaine);
			
			if(!$uppercase || !$lowercase || !$number || strlen($chaine) < 8) {
				return false;
			}
			return true;
		}
		if (verificationPassword ("AbCdeee899")){printf("Valide");}
		else{printf("Non Valide");}

		?>

		<h3>Exercice 6</h3>
        <h4>Enoncé</h4>
        <p>Ecrire une fonction qui s'appelle verificationEmail(). Elle prendra un argument de type string.
		Elle devra retourner un boolean qui vaut true si le email respecte les règles suivantes :<br>
		L'émail doit contenir le caractère "@" une seul fois, suivit de 0 ou plusieurs lettres, suivit de la chaine "junia.com qui doit être à la fin de l'émail"
		</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		function verificationEmail ($chaine){
			
			$test = preg_match("/@{1}[a-z]*(junia.com)$/",$chaine);
			if($test) {
				return true;
			}
			return false;
		}
		if (verificationEmail ("yhehzhzehe@zpmmdzjunia.com")){printf("Valide");}
		else{printf("Non Valide");}

		?>


        <h2>II. Manipulation des tableaux</h2>
		<div>
			Aide:
			<ul>
				<li>Documentation: <a href="https://www.php.net/manual/fr/ref.array.php" target="_blank">Liste des fonctions sur les tableaux</a>, 
				<a href="https://www.php.net/manual/fr/ref.math.php" target="_blank">Liste des fonctions mathématiques</a></li>
				<li>Fonctions utiles pour cette partie:  array_sum, round, array_merge, count, print_r, ksort, array_keys, unset, arsort, max, min,</li>
			</ul>
		</div>
        <h3>Exercice 7</h3>
        <h4>Enoncé</h4>
        <p>
		Considérant le tableau suivante des étudiants et leurs notes.</p>
		<table>
			<tr><td>Alixe</td><td>13</td></tr>
			<tr><td>Justine</td><td>16</td></tr>
			<tr><td>Raja</td><td>10</td></tr>
			<tr><td>Jean</td><td>15</td></tr>
			<tr><td>Clément</td><td>10</td></tr>
			<tr><td>Mathieu</td><td>12</td></tr>
			<tr><td>Claire</td><td>11</td></tr>
			<tr><td>Juliette</td><td>20</td></tr>
			<tr><td>Paul</td><td>12</td></tr>
		</table>
		<ol>
			<li>Créer et initialiser un tableau associatif $notes, sachant que les noms représentent les clés et les notes représentent les valeurs.
			Utiliser la fonction print_r pour pour afficher le contenu de votre tableau</li>
			<li>Afficher la note maximale, la note minimale et la moyenne de la classe (précision : deux chiffres après la virgule). 
			Utiliser les fonctions mathématiques intégrées min, max, round.</li>
			<li>Ecrire une fonction "Affichage" prenant un tableau associatif des notes comme argument et affiche son contenu à l'aide de la balise HTML table, 
			tout en respectant le style suivant:
				<ul>
					<li>Couleur du texte: la note maximale en rouge, la note minimale en vert</li>
					<li>Couleur du fond: les notes supérieures ou égale à la moyenne en orange, les notes inférieures à la moyenne en jaune.</li>
				</ul>
			</li>
			<li>Ajouter au tableau $note l'étudiant "Hugo" et sa note 14. Supprimer l'étudiant Clément du tableau. Trier votre tableau par ordre alphabétique des noms et afficher-le<br></li>
			<li>Trier le tableau par ordre décroissant des notes.</li>
			<li>Ajouter au début du tableau ces deux étudiants : "Cristophe"=>20 et "Karim" => 20. Afficher votre tableau.</li>
			<li>Créer deux tableaux $cleMax et $cleMin contenant les noms des étudiants qui ont la note maximale et minimale repectivement 
			(utiliser la fonction intégrée "array_keys")</li>
		</ol>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		
		<?php
		$tableaunotes = array(
			"Alixe" => 13,
			"Justine" => 16,
			"Raja" => 10,
			"Jean" => 15,
			"Clément" => 10,
			"Mathieu" => 12,
			"Claire" => 11,
			"Juliette" => 20,
			"Paul" => 12
		);
		print_r($tableaunotes);
		echo "<br>";

		echo "Note maximale: ",$Nmax = max($tableaunotes), "<br>";
		echo "Note minimale: ",$Nmin = min($tableaunotes), "<br>";
		echo "Note moyenne: ",$Nmid = round(array_sum($tableaunotes)/count($tableaunotes),2);
		
		$notes = array(
			array("Alixe" => 13),
			array("Justine" => 16),
			array("Raja" => 10),
			array("Jean" => 15),
			array("Clément" => 10),
			array("Mathieu" => 12),
			array("Claire" => 11),
			array("Juliette" => 20),
			array("Paul" => 12),
		);

		function table($notes,$Nmin,$Nmax,$Nmid){			
			$rows = array();
			foreach ($notes as $row) {
				$cells = array();
				foreach ($row as $key => $value) {
					if ($value == $Nmax) {
						$cells[] = "<td>{$key}</td><td style='color:red;background-color:orange'>{$value}</td>";
					}
					else if ($value == $Nmin) {
						$cells[] = "<td>{$key}</td><td style='color:green;background-color:yellow'>{$value}</td>";
					}
					else{
						if ($value >= $Nmid){
							$cells[] = "<td>{$key}</td><td style='background-color:orange'>{$value}</td>";
						}
						else{
							$cells[] = "<td>{$key}</td><td style='background-color:yellow'>{$value}</td>";
						}
					}
				}
				$rows[] = "<tr>" . implode('', $cells) . "</tr>";
			}
			return "<table>" . implode('', $rows) . "</table>";
		}
		echo table($notes,$Nmin,$Nmax,$Nmid);
		echo '<br>';
		echo '<br>';


		// pour le tableau de tableau
		$Hugo = array("Hugo" => 14);
		array_push($notes,$Hugo);
		// pour le tableau "simple"
		$tableaunotes["Hugo"] = 14;

		unset($notes[4]);
		unset($tableaunotes["Clément"]);
		echo table($notes,$Nmin,$Nmax,$Nmid);
		echo '<br>';
		echo "<br>";

		ksort($tableaunotes);
		print_r($tableaunotes);
		echo "<br>";
		arsort($tableaunotes);
		print_r($tableaunotes);
		echo "<br>";
		echo "<br>";

		$tableaunotes=array("Christophe"=>20) + $tableaunotes;
		$tableaunotes=array("Karim"=>20) + $tableaunotes;
		print_r($tableaunotes);
		echo "<br>";
		echo "<br>";
		
		$cleMax = array();
		foreach($tableaunotes as $key => $value){
			if ($value == $Nmax){
				$cleMax=array($key=>$value)+$cleMax;
			}
		}
		$cleMin = array();
		foreach($tableaunotes as $key => $value){
			if ($value == $Nmin){
				$cleMin=array($key=>$value)+$cleMin;
			}
		}
		print_r($cleMax);
		echo "<br>";
		print_r($cleMin);
		echo "<br>";
		?>

    </body>
</html>