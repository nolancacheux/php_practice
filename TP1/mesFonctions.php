
<?php
		function premierElementTableau($tab = array('a','b')){
				if ($tab != NULL){
				return $tab[0];
				}
				else{return null;}
			}
?>
<?php
			function remplacerLettre ($mot = "abcdef"){
				
				$remplacer = str_replace(array('e', 'i'), array('3', '1'), $mot);
				return $remplacer;
					
			}
?>