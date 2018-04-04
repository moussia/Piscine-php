#!/usr/bin/php
<?php

function msg_result($val)
{
	if (preg_match("#[0-9]?[02468]$#", $val))
		echo "Le chiffre $val est Pair\n";
	else
		echo "Le chiffre $val est Impair\n";
}

while (1)
{
	print("Entrez un nombre: ");
	$line = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE)
		exit;
	if (!is_numeric($line))
		print("'$line' n'est pas un chiffre\n");
	else
		msg_result($line);
}

?>
