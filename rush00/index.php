<!DOCTYPE HTML>
<?php
	include "utils.php";
	include "auth/auth.php";

	header("Cache-Control: no-cache");
	session_start();

	if (!check_auth(session('logged_user'))) {
		$_SESSION['logged_user'] = null;
		$_SESSION['admin'] = null;
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Vente-nature.world</title>
	<link rel="stylesheet" href="./index.css">
	<link rel="stylesheet" href="./global.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<div id="header">
		<span id="title">vente-nature.<br>world</span>
		<div id="log">
<?php
	if (session('logged_user') === null)
		echo '<p style="color:red;">Not logged in</p><br/><a href="auth">Login</a>';
	else
		echo '<p>Welcome, <span style="color:green;">'.$_SESSION['logged_user'].'</span>!</p><a href="auth/disconnect.php">disconnect</a>';
	echo "<br/>" . $_SESSION['return_msg'];
	$_SESSION['return_msg'] = null;
?>
		</div>
	</div>
	<div id="middle">
		<div id="left">
			<a href="./index.php"><div class="link_button" id="button_home">
				Accueil
			</div></a>
			<a href="./index.php?menu=shop"><div class="link_button" id="button_shop">
				Articles
			</div></a>
			<a href="./index.php?menu=account"><div class="link_button" id="button_account">
				Mon compte
			</div></a>
			<a href="./index.php?menu=cart"><div class="link_button" id="button_account">
				Mon panier
			</div></a>
		</div>
		<div id="right">
<?php
	$link = './vitrine.php';
	if (isset($_GET['menu']))
		switch ($menu = $_GET['menu']) {
		case 'shop':
			$link = './shop.php';
			break;
		case 'cart':
			$link = './cart.php';
			break;
		case 'account':
			$link = session('logged_user') === null ? './menu/no_account.html' : './menu/account.php';
			break;
		};
?>
		<iframe src=" <?php echo" $link"; ?> ">iframes are not supported by your browser</iframe>
		</div>
	</div>
	<div id="footer">
		<span style="margin-left: 10px; margin-top: 10px;">Version 0.17</span>
	</div>
</body>
</html>
