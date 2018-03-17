#!/usr/bin/php
<?php
function enlenver_espace($elements)
{
	$elements = trim($elements);
	$elements = preg_replace("/ +/", " ", $elements);
	return ($elements);
}
if (count($argv) != 2)
	return ;
echo enlenver_espace($argv[1]) . "\n";
?>
