<?php

function is_blank($str) {
	return empty($str) && !is_numeric($str);
}

function post($key) {
	return isset($_POST[$key]) ? $_POST[$key] : null;
}

function session($key) {
	return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

function escape($mysqli, &...$strings) {
	foreach ($strings as $i => $str)
		$strings[$i] = mysqli_escape_string($mysqli, $str);
}

?>
