#!/usr/bin/php
<?PHP

if ($argc != 2)
	return (0);


$res = array();

$content = file_get_contents($argv[1]);

preg_match_all("~<img src=\"[^\"]*~", $content, $matches);

$res = $matches[0];

preg_match("~(?<=//).*~", $argv[1] ,$folder);

if (is_dir($folder[0]) == TRUE)
	exit ;

mkdir ("$folder[0]");

foreach ($res as $val)
{
	preg_match("~(?<=\").*~", $val, $link_tab);
	$link = $link_tab[0];
	preg_match("~[^\/]*~", strrev($val), $array);
	$img_file = strrev($array[0]);
	if(!preg_match("~^(http)~", $link))
		$link = "$argv[1]".$link;
	$ch = curl_init("$link");
	$fp = fopen("$folder[0]/$img_file", 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}

?>
