#!/usr/bin/php
<?php

if (count($argv) < 3)
{
	exit();
}
else
{
	$cle = $argv[1];
	$tableau = array();
	for ($argument = 2; $argument < $argc; $argument++)
	{
		$str = explode(":", $argv[$argument], 2);
		//isset — Détermine si une variable est définie et est différente de NULL
		if (isset($str[1]))
		{
			$tableau[$str[0]] = $str[1];
		}
		else
		{
			$tableau[$str[0]] = "";
		}
	}
	if (isset($tableau[$cle]))
		echo $tableau[$cle] . "\n";
}

?>
