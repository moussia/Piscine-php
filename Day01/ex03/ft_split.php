#!/usr/bin/php
<?php

function ft_split($tableau)
{
	$tab = explode(" ", $tableau); //explode — Coupe une chaîne en segments
	sort($tab);//sort — Trie un tableau
	$resultat = array();//array — Crée un tableau
	foreach($tab as $element)
	{
		if (!empty($element))
			$resultat[] = $element;
	}
	unset($tab);//unset — Détruit une variable
	return ($resultat);
}
?>
