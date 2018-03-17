#!/usr/bin/php
<?php

//1er alphabat
//2eme chiffre
//3eme les autres caracteres


function ft_split($tableau)
{
	$tab = explode(" ", $tableau);
	sort($tab);
	return ($tab);
}

if ($argv != 1)
{
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
	foreach ($resultat as $element)
	{
		if (is_numeric($element) == TRUE)
		{
			$numeric[] = $element;
		}
	}
	sort($numeric, SORT_STRING);

	foreach ($resultat as $element)
	{
		if (ctype_alpha($element) == TRUE)
		{
			$alpha[] = $element;
		}
	}
	sort($alpha, SORT_NATURAL | SORT_FLAG_CASE);

	foreach ($resultat as $element)
	{
		if (is_numeric($element) == FALSE && ctype_alpha($element) == FALSE)
		{
			$ascii[] = $element;
		}
	}
	sort($ascii);

	foreach($numeric as $ele)
	{
		echo $ele . "\n";
	}
	foreach($alpha as $ele)
	{
		echo $ele . "\n";
	}
	foreach($ascii as $ele)
	{
		echo $ele . "\n";
	}
}
?>
