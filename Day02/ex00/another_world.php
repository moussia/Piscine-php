!/usr/bin/php
<?php

if (count($argv) > 1)
{
	$str = $argv[1];
	$str = preg_replace('/\s\s+/', ' ', $str);
	echo $str . "\n";
}/*
elseif (count($argv) ==  1)
	return;

*/
/*
if ($argv[1] == " " || $argv[1] == "\t")
{
	$argv[1] == " ";
	echo $argv[1];
}
else
	echo "zut alors...\n";
*/

/*
if (count($argv) > 2)
{
	echo $argv[1] . "\n";
}
else
	return ;
*/

?>
