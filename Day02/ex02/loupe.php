#!/usr/bin/php
<?PHP

if (!$argv[1])
	exit ;

$file = file($argv[1]);
$str = implode($file);

$res = preg_replace_callback("~=\".*\"~", function ($word) {
	print($word[1]); return strtoupper($word[0]);}, $str);
$res = preg_replace_callback("~\">.*<~", function ($word) {
	print($word[1]); return strtoupper($word[0]);}, $res);
	$res = preg_replace_callback("~http://[^>]+\K[^<]+<~", function ($word) {
		print($word[1]); return strtoupper($word[0]);}, $res);
echo $res;
?>
