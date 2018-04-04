#!/usr/bin/php
<?php
function mois($month)
{
	$array = array(
		"Janvier" => 1,
		"Fevrier" => 2,
		"Mars" => 3,
		"Avril" => 4,
		"Mai" => 5,
		"Juin" => 6,
		"Juillet" => 7,
		"Aout" => 8,
		"Septembre" => 9,
		"Octobre" => 10,
		"Novembre" => 11,
		"Decembre" => 12
	);
	return $array[$month];
}
if (count($argv) > 1)
{
	if (preg_match("/([Ll]undi|[mM]ardi|[Mm]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche) ([012][0-9]|3[0-1]) ([jJ]anvier|[fF][ée]vrier|[mM]ars|[aA]vril|[mM]ai|[jJ]uin|[jJ]uillet|[aA]o[uû]t|Septembre|Octobre|[N|n]ovembre|[dD][ée]cembre) ([0-9]{4}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $argv[1], $matches))
	{
		date_default_timezone_set("Europe/Paris");
		echo (mktime($matches[5], $matches[6], $matches[7], mois($matches[3]), $matches[2], $matches[4]));
		echo "\n";
	}
	else
	{
		echo "Wrong Format\n";
	}
}
?>
