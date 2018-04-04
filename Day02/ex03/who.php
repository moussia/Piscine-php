#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");
//fopen — Ouvre un fichier
$handle = fopen("/var/run/utmpx", "rb");
$tableau = array();
//fread — Lecture du fichier en mode binaire
while ($contents = fread($handle, 628))
{
	$contents = unpack("a256login/a4id/a32terminal/ipid/itype/I2time", $contents);
//	print_r($contents);
	if (strcmp($contents['type'], "7") == 0)
	{
		//array_push — Empile un ou plusieurs éléments à la fin d'un tableau
		array_push($tableau, $contents);
	}
}
foreach($tableau as $utilisateur)
{
	printf("%s  %s  %s\n", $utilisateur['login'], $utilisateur['terminal'], date("M j H:i", $utilisateur['time1']));
}
fclose($handle);
?>
