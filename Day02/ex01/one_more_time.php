#!/usr/bin/php
<?php


function transforme_mois($month)
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
				"Novembre" /*| "novembre" */=> 11,
				"Decembre" => 12
				);
	return $array[$month];
/*		$array = array(
		('Janvier' | 'janvier') => 1,
		('Fevrier' | 'Février' | 'février' | 'fevrier') => 2,
		('Mars' | 'mars') => 3,
		('Avril'| 'avril') => 4,
		('Mai'| 'mai') => 5,
		('Juin'| 'juin') => 6,
		('Juillet'| 'juillet') => 7,
		('Aout'| 'aout'| 'Août'| 'août') => 8,
		('Septembre'| 'septembre') => 9,
		('Octobre'| 'octobre') => 10,
		("Novembre" | "novembre") => 11,
		('Decembre'| 'decembre'| 'Décembre'| 'décembre') =>12);
*/
}

if (count($argv) > 1)
{
//	if (preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche) ([0-9]{2}) ([J|j]anvier|[F|f][e|é]vier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]o[u|û]t|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d][e|é]cembre) ([0-9]{4}) ([0-9]{2}:[0-9]{2}:[0-9]{2})/", $argv[1], $matches))

   if (preg_match("/(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([0-9]{2}) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|[N|n]ovembre|Decembre) ([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $argv[1], $matches))

{
		date_default_timezone_set("Europe/Paris");
		echo (mktime($matches[5], $matches[6], $matches[7], transforme_mois($matches[3]), $matches[2], $matches[4]));
	}
	else
	{
		echo "Wrong Format\n";
	}
}













/*

   function transformMonth($x)
   {
   $array = array("Janvier" => 1,
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
   "Decembre" => 12);
   return $array[$x];
   }
   if ($argc > 1)
   {
   if (preg_match("/(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([0-9]{2}) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) ([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $argv[1], $matches))
   {
   date_default_timezone_set("Europe/Paris");
   print(mktime($matches[5], $matches[6], $matches[7],
   transformMonth($matches[3]), $matches[2], $matches[4]));
   }
   else
   print("Wrong Format");
   print(PHP_EOL);
   }*/



?>
