#!/usr/bin/php
<?PHP
$tab = array();
$user_mean = array();
$array_moul = array();
if ($argc != 2)
	exit ;
while ($line = fgets(STDIN))
{
	if (preg_match("#^[a-zA-Z]+_[a-zA-Z]+;([0-1]?[0-9]|20);[a-zA-Z_]+;[0-5]$#i", $line))
	{
		array_push($tab, $line);
	}
}
$moyenne = 0;
$div_moy = 0;
$note_m = 0;
$count_moul = 0;
$tot_moul = 0;
foreach($tab as $elem)
{
	preg_match("#^[a-zA-Z]+_[a-zA-Z]+#", $elem, $match);
	$name = $match[0];
	$tot = 0;
	$div = 0;
	foreach($tab as $i => $row)
	{
		preg_match("#^[a-zA-Z]+_[a-zA-Z]+#", $row, $a);
		if ($name == $a[0])
		{
			preg_match("#;([0-1]?[0-9]|20);#", $row, $mean);
			$tot =  str_replace(";", "", $mean[0])."\n" + $tot;
			$div++;
			if (preg_match("#;moulinette;#", $row))
			{
				preg_match("#;([0-1]?[0-9]|20);#", $row, $moul_mean);
				$note_moul = str_replace(";", "", $moul_mean[0]);
				$tot_moul = $note_moul + $tot_moul;
				$count_moul++;
			}
			unset($tab[$i]);
		}
	}
	$moyenne = ($tot + $moyenne);
	$div_moy = $div + $div_moy;
	if ($div != 0)
	{
		array_push($user_mean, $name.":".($tot - $note_moul) / ($div - 1)."\n");
		array_push($array_moul, $name.":".((- $note_moul + ($tot - $note_moul) / ($div - 1))."\n"));
	}
}
$moyenne -= $tot_moul;
$div_moy -= $count_moul;
if ($argv[1] == "moyenne_user")
{
	sort($user_mean);
	foreach ($user_mean as $x)
		echo $x;
}
if ($argv[1] == "moyenne")
	print($moyenne / $div_moy."\n");
if ($argv[1] == "ecart_moulinette")
{
	sort($array_moul);
	foreach ($array_moul as $x)
		echo $x;
}
?>
