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
	<head>
		<style>
		.centre
		{
			text-align:center;
		}
		body
		{
			background-color:#F5A9D0;
		}
		</style>
	</head>
	<body>
		<form method="get" action="index.php">
			<fieldset>
				<div class="centre">
				<p>
			Identifiant :<input name="login" type="text" value="<?php echo $_SESSION['login']; ?>" />
			<br />
			Mot de Passe :<input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
			<br />
			<input type="submit" name="submit" value="OK" />
			<br />
				</p>
				</div>
			</fieldset>
		</form>
	</body>
</html>
