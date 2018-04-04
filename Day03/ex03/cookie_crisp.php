<?php

if ($_GET['action'] == 'set')
	setcookie($_GET['name'], $_GET['value'], time() + 365*24*3600);

elseif ($_GET['action'] == 'get')
	echo $_COOKIE[$_GET["name"]] . "\n";

elseif ($_GET['action'] == 'del')
	setcookie($_GET['name']);
?>
