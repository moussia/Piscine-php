<?php

session_start();

$titre = "formulaire";

if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>

<html>
	<body>
		<form method="get" action="index.php">
			<fieldset>
				<p>
			Identifiant :<input name="login" type="text" value="<?php echo $_SESSION['login']; ?>" />
			<br />
			Mot de Passe :<input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
			<br />
			<input type="submit" name="submit" value="OK" />
			<br />
				</p>
			</form>
	</fieldset>
	</body>
</html>
