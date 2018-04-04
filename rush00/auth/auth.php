<html>
<head>
	<link rel="stylesheet" href="../global.css">
</head>
</html>
<?php

function create_account($name, $passwd, $passwd2) {
	$name = trim($name);
	if (is_blank($name))
		return "'Login' field must not be empty";
	else if (is_blank($passwd))
		return "'Password' field must not be empty";
	else if ($passwd !== $passwd2)
		return "Passwords doesn't match";

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "Couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	escape($mysqli, $name);
	if (!$res = mysqli_query($mysqli, "SELECT * FROM users WHERE Username = '$name';"))
		return "sql error: couldn't fetch names!";

	if ((mysqli_fetch_array($res)) != null)
		return "Account already exists!";

	$salt = time();
	$hash = hash('whirlpool', $salt . $passwd);

	if (!mysqli_query($mysqli, "INSERT INTO users (Username, Password, Salt) VALUES ('$name', '$hash', $salt)"))
		return "Couldn't create account!";
	return null;
}

function auth($mysqli, $name, $passwd, &$data) {
	$data = null;
	if (!$res = mysqli_query($mysqli, "SELECT * FROM users WHERE Username = '$name';"))
		return "sql error: couldn't fetch from database!";

	if (($usrdata = mysqli_fetch_array($res, MYSQLI_ASSOC)) == null)
		return "Account doesn't exists!";

	if ($usrdata['Password'] != hash('whirlpool', $usrdata['Salt'] . $passwd))
		return "Invalid password!";
	$data = $usrdata;
	return null;
}

function check_auth($name) {
	if (is_blank($name))
		return false;

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return false;

	escape($mysqli, $name);
	if ((!$res = mysqli_query($mysqli, "SELECT * FROM users WHERE Username = '$name';")) ||
		mysqli_fetch_array($res) === null)
		return false;
	return true;
}

function connect($name, $passwd, &$admin) {
	$name = trim($name);
	if (is_blank($name))
		return "'Login' field must not be empty";
	else if (is_blank($passwd))
		return "'Password' field must not be empty";

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	escape($mysqli, $name);
	$ret = auth($mysqli, $name, $passwd, $data);
	$admin = $data !== null ? $data['IsAdmin'] : false;
	return $ret;
}

function modify_account($name, $oldpw, $newpw, $newpw2) {
	$name = trim($name);
	if (is_blank($name))
		return "'login' field must not be empty";
	else if (is_blank($oldpw))
		return "'old password' field must not be empty";
	else if (is_blank($newpw))
		return "'new password' field must not be empty";
	else if ($newpw !== $newpw2)
		return "passwords doesn't match";

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	escape($mysqli, $name);
	if (($ret = auth($mysqli, $name, $oldpw, $data)) !== null || $data === null)
		return $ret;

	$hash = hash('whirlpool', $data['Salt'] . $newpw);
	if (!mysqli_query($mysqli, "UPDATE `users` SET `Password`='$hash' WHERE `Username` = '$name'"))
		return "Couldn't change password!";
	return null;
}

function delete_account($name, $passwd) {
	if (is_blank($passwd))
		return "'password' field must not be empty";
	else if ($name === 'root')
		return "Cannot delete 'root' user!";

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	escape($mysqli, $name);
	if (($ret = auth($mysqli, $name, $passwd, $data)) !== null || $data === null)
		return $ret;

	if (!mysqli_query($mysqli, "DELETE FROM `users` WHERE `Username` = '$name'"))
		return "Couldn't delete account!";
	return null;
}
?>
