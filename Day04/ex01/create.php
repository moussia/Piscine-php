<?php

$filename = "../private";
$file_name = "../private/passwd";

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit']== "OK")
{
	if (!file_exists($filename))
	{
		mkdir($filename);
	}
	if (file_exists($file_name) != NULL)
	{
		file_get_contents($file_name, NULL);
	}
	$creationdevariable =unserialize(file_get_contents($file_name));
	if($creationdevariable == NULL)
	{
		$existe = 0;
		foreach ($creationdevariable as $cle => $elements)
		{
			if ($elements['login'] === $_POST['login'])
				$existe = 1;
		}
	}
	if ($existe)
	{
		echo "ERROR\n";
	} else {
		$tmp['login'] = $_POST['login'];
		$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
		$creationdevariable[] = $tmp;
		file_put_contents($file_name, serialize($creationdevariable));
		echo "OK\n";
	}
}
else
{
	echo "ERROR\n";
}

?>
