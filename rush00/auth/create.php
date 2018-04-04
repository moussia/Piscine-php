<?php
include "../utils.php";
include "auth.php";

session_start();

if (post('submit') == "OK") {
	if (($status = create_account(post('login'), post('passwd'), post('passwd2'))) === null) {
		$_SESSION['logged_user'] = $_POST['login'];
		$_SESSION['return_msg'] = "<p>Succesfuly created account</p>";
		header("Location: ..");
	}
}
else
	$status = null;

?>
<html>
	<head>
		<title>Create account</title>
		<style>
			div {margin-left: 40vw;
				margin-top: 20vh;}
		</style>
	</head>
	<body>
		<div>
		<h1>Create account</h1>
		<form action="" method="post">
			<label for="login">Login</label>
			<input type="text" name="login" value=""/><br/>
			<label for="passwd">Password</label>
			<input type="password" name="passwd" value=""/><br/>
			<label for="passwd2">Password (confirm)</label>
			<input type="password" name="passwd2" value=""/><br/>
			<input type="submit" name="submit" value="OK"/>
		</form>
		<a href="login.php">Login...</a><br/>
		<a href="..">Back to main page...</a><br/>
<?php
if (post('submit') == "OK" && $status !== null)
	echo "$status\n";
?>
	</div>
	</body>
</html>
