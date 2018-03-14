#!/usr/bin/php
<?php
while(1)
{
	echo 'Entrez un nombre: ';
	$chiffre = trim(fgets(STDIN));
	if (feof(STDIN) == true)
		exit();
	if (!is_numeric($chiffre))
	{
		echo "'" .$chiffre. "'"  . ' n\'est pas un chiffre';
		echo "\n";
	}
	elseif ($chiffre % 2 == 1)
	{
		echo 'Le chiffre ' . $chiffre . ' est Impair';
		echo "\n";
	}
	elseif ($chiffre % 2 == 0)
	{
		echo 'Le chiffre ' . $chiffre . ' est Pair';
		echo "\n";
	}
}
?>
