<?php

header("Cache-Control: no-cache");

echo "Attempting connection with SQL database...\n";

$mysqli = new mysqli("localhost", "root", "qwerty");
if (mysqli_connect_errno()) {
	echo "ERROR " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "\n";
	die;
}

echo "OK\nCreating database and tables...\n";

$query = file_get_contents("./sql/setup.sql");

if (!mysqli_multi_query($mysqli, $query))
	echo "ERROR " . mysqli_errno() . ": " . mysqli_error() ."\n";
else
	echo "OK\n";
?>
