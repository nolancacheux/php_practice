<?php 
	require_once "mesFonctions.php"
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP1 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
			p{color:red;display : inline;}
			h6{background-color:green;display : inline;}
			span{text-align : center;color:brown;border: medium solid red ;width: 50%;}
			table {background:#dbe5f1;border: medium solid red ;width: 50%;border-collapse: collapse;}
        </style>
    </head>
    <body>
        <h1>TP1 : web dynamique</h1>
        <h2>Variables et constantes</h2>
        <h3>Exercice 1</h3>
        <h4>Enoncé</h4>
        <p>
        Donner la valeur des variables après chaque affectation, et corriger les "Warning". 
        Vous pouvez utiliser la fonction var_dump() qui donne plusieurs information sur une variable (type, taille ,valeur)
        </p>
        <h4>Solution</h4>
        <?php
            echo "<h5>Script 1</h5>";// affichage d'un code HTML
			
            $x="7 personnes"; 
            var_dump($x); //Utilisation de la fonction var_dump() qui donne : string(11) "7 personnes" : une chaine de 11 caracères
            echo "<br>"; // affichage d'un retour à la ligne
			
            $y=(integer)$x;
			var_dump($y); 
			echo "<br>";
			
            $x="9E3";
			var_dump($x); 
			echo "<br>"; 
			
            $z=(double)$x;
			var_dump($z); 
			echo "<br>"; 
        
            echo "<h5>Script 2</h5>";
            $a="<br>Les ";
			var_dump($a);echo "<br>"; 
            $b="10 merveilles du monde";
			var_dump($b);echo "<br>"; 
            $c=(integer)$a.(integer)$b;
			var_dump($c);echo "<br>"; 
            $d=(integer)$b+13;
			var_dump($d);echo "<br>"; 
            $b=&$c;
			var_dump($b);echo "<br>"; 
            $b[1]=4;
			var_dump($b);echo "<br>"; 
    
            echo "<h5>Script 3</h5>";
            $a="5+6";
			var_dump($a);echo "<br>"; 
            $b="2E2";
			var_dump($b);echo "<br>"; 
            $c=(integer)$a+(integer)$b;
			var_dump($c);echo "<br>"; 
        
            echo "<h5>Script 4</h5>";
            $a="1";
			var_dump($a);echo "<br>"; 
            $b="FALSE";
			var_dump($b);echo "<br>"; 
            $c=FALSE;
			var_dump($c);echo "<br>"; 
            $d=($a OR $b);
			var_dump($d);echo "<br>"; 
            $e=($a AND $c);
			var_dump($e);echo "<br>"; 
            $f=($a XOR $b);
			var_dump($f);echo "<br>"; 

            echo "<h5>Script 5</h5>";
            $x="3 fois";
			var_dump($x);echo "<br>"; 
            $x= (float)$x*5.2;
			var_dump($x);echo "<br>"; 
            $z=$x%5;
			var_dump($z);echo "<br>"; 
            $x= "0" || 1;
			var_dump($x);echo "<br>"; 
            $y=is_string($x);
			var_dump($y);echo "<br>"; 
        ?>

        <h3>Exercice 2</h3>
        <h4>Enoncé</h4>
        <p>
        En utilisant les variables et les constantes prédéfinies du php, écrire un script qui permet d'afficher la version du php, 
        le système d'exploitation du serveur, le fichier courant, le host et la langue du navigateur client.<br>
        <a href="https://www.php.net/manual/fr/reserved.variables.php " target="_blank">Variables prédéfinies</a><br>
        <a href="https://www.php.net/manual/fr/reserved.constants.php  " target="_blank">Constantes prédéfinies</a><br>
        <a href="https://www.php.net/manual/fr/language.constants.magic.php  " target="_blank">Constantes magiques</a>
        </p>
        <h4>Solution</h4>
		
        <!-- Votre solution ici -->
		
		<?php
		echo "La version du php est : " .PHP_VERSION."<br>";
		echo "Le système d'exploitation : ".PHP_OS."<br>";
		echo "Le fichier courant : ".__FILE__."<br>";
		echo "Le nom du host est : ".$_SERVER['HTTP_HOST']."<br>";
		echo "La langue du navigateur client : ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."<br>";
		?>
		
        <h2>Structures conditionnelles et itératives</h2>
        <h3>Exercice 3</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script pour tester si un nombre est à la fois un multiple de 3 et de 5.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		$x=12333; // choisir un nombre au choix.
		if($x%3==0 AND $x%5==0)
		{
		echo "$x est multiple de 3 et de 5 
		";
		}
		else
		{
		echo "$x n'est pas multiple de 3 et de 5 
		";
		}
		?>
        <h3>Exercice 4</h3>
        <h4>Enoncé</h4>
        <p>En utilisant les variables $nombre1 $nombre2 et $operation, écrire un script effectuant une opération parmi les quatre 
            opérations arithmétiques élémentaires suivant la valeur de la variable $opération (utiliser l'instruction switch).</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		$nombre1 = 10; // Au choix 
		$nombre2 = 5;// Au choix 
		$operation ="multiplication"; // Au choix parmis les 4 opérations arithmétiques élémentaires.
		
		switch($operation){
			
			case "soustraction" : 
				$resultat = $nombre1 - $nombre2;
				break;
				
			case "addition" : 
				$resultat = $nombre1 + $nombre2;
				break;
				
			case "multiplication" : 
				$resultat = $nombre1 * $nombre2;
				break;
				
			case "division" : 
				$resultat = $nombre1 / $nombre2;
				break;
		}
		echo"Le résultat de la $operation entre $nombre1 et $nombre2 est : $resultat";
		?>
        <h3>Exercice 5</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant les nombres de 1 à 100, et mettant les nombres pairs en rouge et le fond des multiples de 5 en vert.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		for($num=1;$num<=100;$num++){
			if ($num % 2 == 0){echo "<p>$num </p>";}
			else if ($num % 5 == 0){echo "<h6>$num </h6>";}
			else {echo "$num ";}
			
			}
		?>

        <h3>Exercice 6</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script faisant une suite de tirages de nombres aléatoires jusqu’à obtenir une suite composée d’un nombre pair 
            suivi de deux nombres impairs. Afficher le nombre d'itérations réalisées.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		$compteur=0;
		do
		{
		$x=rand(0,1000);
		$y=rand(0,1000);
		$z=rand(0,1000);
		$compteur++;
		echo $x, "," , $y, "," , $z,"
		";
		}
		while($x%2==1 OR $y%2==0 OR $z%2==0);
		echo "Résultat obtenu en $compteur coups";
		?>
        <h3>Exercice 7</h3>
        <h4>Enoncé</h4>
        <p>Écrire le code PHP/HTML/CSS permettant de réaliser le tableau suivant (il s'agit de la table de multiplication des nombres de 1 à 10) (Voir le fichier pdf).</p>
       
		

        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
			echo"<table>";
			echo"<span >Table de multiplication</span>";
				echo"<tr>";
				$compteur = 1;
				for($i=1;$i<=10;$i++){
					 for($j=1;$j<=10;$j++){
						 $resultat = $j*$compteur ;
						 echo"<td style= width:50px >", $resultat ,"</td>";
					 }
				$compteur++;
				echo"<tr>"; 
				}
			echo"</table>";
		?>
        <h2>Fonctions et tableaux</h2>
        <h3>Exercice 8</h3>
        <h4>Enoncé</h4>
        <p>Créer une fonction appelée remplacerLettres(). Elle prendra un argument de type string. 
            Elle devra retourner ce même string mais en remplaçant les e par des 3, les i par des 1. </p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
			echo remplacerLettre();
		?>
        <h3>Exercice 9 (tableaux indexés)</h3>
        <h4>Enoncé</h4>
        <p>Créer une fonction appelée premierElementTableau(). Elle prendra un argument de type array. 
            Elle devra retourner le premier élément du tableau. Si l'array est vide, il faudra retourner null.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		echo premierElementTableau();
		?>
        <h3>Exercice 10 (tableaux associatifs)</h3>
        <h4>Enoncé</h4>
        <p>En utilisant un tableau associatif avec les valeurs ci-dessous, afficher seulement les pays qui ont une population 
            supérieure ou égale à 20 millions d'habitants. Afficher les pays en utilisant une liste non-ordonnée.</p>
        <ul>
            <li>France : 67595000,</li>
            <li>Suede : 9998000,</li>
            <li>Suisse : 8417000,</li>
            <li>Kosovo : 1820631,</li>
            <li>Malte : 434403,</li>
            <li>Mexique : 122273500,</li>
            <li>Allemagne : 82800000,</li>
        </ul>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
      <?php
		$population = [
		"France" => "67595000",
		"Suede" => "9998000",
		"Suisse" => "8417000",
		"Kosovo" => "1820631",
		"Malte" => "434403",
		"Mexique" => "122273500",
		"Allemagne" => "82800000",];
		foreach($population as $clef => $valeur){
                if ($valeur>= 20000000){
					echo 'La '.$clef. ' a plus de 20 millions d habitants , elle en a ' .$valeur. '<br>';
            }
		}
	  ?>
      
        <h2>Factorisation du code</h2>
        <h3>Exercice 11</h3>
        <h4>Enoncé</h4>
        <p>Créer un fichier PHP appelé « mesFonctions.php »et y copier les fonctions définies dans les exercices 8 et 9 
            (supprimer la définition de ces fonctions de la page tp1.php). 
            Avant de tester ces fonctions dans les exercices 8 et 9, ajouter le fichier mesFonctions.php en utilisant : 
            inlude, include_once, require et require_once. 
            Laquelle de ces quatre options est la plus convenable ? justifier votre réponse.<br>
			<a href="https://www.php.net/manual/fr/language.control-structures.php" target="_blank">Documentation</a>
        </p>
        <h4>Justification</h4>
        <!-- Votre justification ici -->
		<h4>La dernière des quatre fonctions est require_once, qui est une combinaison des fonctions require et include_once. De ce fait cette fonction s'assure d'abord que le fichier à inclure existe bien, et si ce n'est pas le cas, génère une erreur. Puis elle s'assure que le fichier n'est utilisé qu'une seule fois.

		Cette fonction est la plus stricte des quatre et est celle que j'utilise le plus pour construire mes pages. Si l'on reprend l'exemple cité plus haut, la fonction require_once est celle qui doit être utilisée pour inclure l'entête et le pied de page de vos pages. En effet, sans ces deux éléments, votre site ne s'affichera pas correctement, il ne faut donc pas qu'il puisse fonctionner sans eux. Mais il faut également qu'ils ne s'affichent qu'une seule fois.
      
        </h4>

    </body>
</html>