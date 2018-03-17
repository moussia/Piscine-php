#!/usr/bin/php
<?php

if ($argv[1] != 1)
{
	$tableau = explode(" ", $argv[1]);
	$filtre = array_filter($tableau);
	foreach(array_slice($filtre ,1) as $elements)
	{
		echo $elements . " ";
	}
	echo $filtre[0] . "\n";
}
































/*
if ($argv[1] != 1)
{
	$tableau = explode(" ", $argv[1]);
	//array_filter — Filtre les éléments d'un tableau grâce à une fonction utilisateur
	$filtre = array_filter($tableau);
	//array_slice — Extrait une portion de tableau
	foreach (array_slice($filtre, 1) as $elements)
	{
		echo "$elements" . " ";
	}
	echo "$filtre[0]" . "\n";
}
*/
?>
