#!/usr/bin/php
<?php

if (count($argv) != 2)
{
	echo "Incorrect Parameters\n";
}
else
{
	$symboles = explode(";", "+;-;*;/;%");
	$recuperation = sscanf($argv[1], "%d %c %d");
	if ($recuperation[0] !== FALSE && $recuperation[1] && $recuperation[2] !== FALSE && !$recuperation[3])
	{
		if ($recuperation[1] == '+')
		{
			$resultat = $recuperation[0] + $recuperation[2];
			echo $resultat . "\n";
		}
		if ($recuperation[1] == '-')
		{
			$resultat = $recuperation[0] - $recuperation[2];
			echo $resultat . "\n";
		}
		if ($recuperation[1] == '*')
		{
			$resultat = $recuperation[0] * $recuperation[2];
			echo $resultat . "\n";
		}
		if ($recuperation[1] == '/' && $recuperation[2] == 0)
		{
			echo "Syntax Error\n";
			return;
		}
		if ($recuperation[1] == '/')
		{
			$resultat = $recuperation[0] / $recuperation[2];
			echo $resultat . "\n";
		}
		if ($recuperation[1] == '%')
		{
			$resultat = $recuperation[0] % $recuperation[2];
			echo $resultat . "\n";
		}
	}
	else
	{
		echo "Syntax Error\n";
	}
}

?>
