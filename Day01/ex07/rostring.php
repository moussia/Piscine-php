#!/usr/bin/php
<?php

if(count($argv) == 1)
{
	exit;
}
elseif ($argv[1] != 1)
{
	$argv[1] = trim($argv[1]);
	$argv[1] = preg_replace("/ +/", " ", $argv[1]);
	$tableau = explode(" ", $argv[1]);
	//array_merge — Fusionne plusieurs tableaux en un seul
	$filtre = array_merge($tableau);
	//array_slice — Extrait une portion de tableau
	foreach(array_slice($filtre ,1) as $elements)
	{
		echo $elements . " ";
	}
	echo $filtre[0] . "\n";
}
else
	return;
?>
