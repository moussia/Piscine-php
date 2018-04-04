#!/usr/bin/php
<?php

if (count($argv) == 4)
	{
		$symbole1 = trim($argv[1]);
		$symbole2 = trim($argv[2]);
		$symbole3 = trim($argv[3]);
		if ($symbole2 == '+')
		{
			$resultat = $symbole1 + $symbole3;
			echo $resultat . "\n";
		}
		elseif ($symbole2 == '-')
		{
			$resultat = $symbole1 - $symbole3;
			echo $resultat . "\n";
		}
		elseif ($symbole2 == '*')
		{
			$resultat = $symbole1 * $symbole3;
			echo $resultat . "\n";
		}
		elseif($symbole2 == '/' && $symbole3 == 0)
		{
			echo "Incorrect Parameters\n";
		}
		elseif ($symbole2 == '/')
		{
			$resultat = $symbole1 / $symbole3;
			echo $resultat . "\n";
		}
		elseif ($symbole2 == '%')
		{
			$resultat = $symbole1 % $symbole3;
			echo $resultat . "\n";
		}
}
else
	echo "Incorrect Parameters\n"

?>
