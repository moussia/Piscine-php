<?php
include "../utils.php";
include "auth.php";

session_start();

if (session('logged_user') !== null)
	header("Location: ..");

if (post('submit') == "OK") {
	if (($status = connect(post('login'), post('passwd'), $admin)) === null) {
		$_SESSION['logged_user'] = $_POST['login'];
		if ($admin) {
			$_SESSION['return_msg'] = "<p>Logged as administrator</p>";
			$_SESSION['admin'] = true;
		}
		else
			$_SESSION['return_msg'] = "<p>You just logged in!</p>";
		header("Location: ..");
	}
}
else
	$status = null;

?>
<html>
	<head>
		<title>Log In</title>
		<style>
			div {margin-left: 40vw;
				margin-top: 20vh;}
		</style>
	</head>
	<body>
		<div>
		<h1>Log In</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<label for="login">Login</label>
			<input type="text" name="login" value=""/><br/>
			<label for="passwd">Password</label>
			<input type="password" name="passwd" value=""/><br/>
			<input type="submit" name="submit" value="OK"/>
		</form>
		<a href="create.php">Create account...</a><br/>
		<a href="..">Back to main page...</a><br/>
<?php
if (post('submit') == "OK" && $status !== null)
	echo "$status\n";
?>
	</div>
	</body>
</html>
