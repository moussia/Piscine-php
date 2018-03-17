#!/usr/bin/php
<?php

function ft_split($tableau)
{
	$tab = explode(" ", $tableau);
	sort($tab);
	return ($tab);
}
$resultat = array();
foreach($argv as $elements)
{
	if ($elements != $argv[0])
	{
		$tab = ft_split($elements);
		//array_merge — Fusionne plusieurs tableaux en un seul
		$resultat = array_merge($resultat, $tab);
	}
}
sort($resultat);
foreach ($resultat as $element)
{
	echo $element;
	echo "\n";
}
?>
