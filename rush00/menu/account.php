<!DOCTYPE HTML>
<?php
	include "../utils.php";
	include "../auth/auth.php";
	session_start();

	if (!check_auth(session('logged_user'))) {
		$_SESSION['logged_user'] = null;
		$_SESSION['admin'] = null;
	}

	if (session('logged_user') === null) {
		$_SESSION['return_msg'] = '<p style="color:red">You do not have access to this page!</p>';
		header("Location: ..");
	}

	$admin = session('admin') === true;

	if (post('submit') == 'OK')
		$status = modify_account(session('logged_user'), post('oldpw'), post('newpw'), post('newpw2'));
	else
		$status = null;
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../global.css">
		<link rel="stylesheet" href="account.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<h1 class="menu_title">My account</h1>
		<h3 class="menu_title"><?php echo '"'.session('logged_user').'"'; ?></h3>
<?php if ($admin): ?>
		<h3 style="color:red;">ADMIN MODE</h3>
<?php endif; ?>
<?php
	if (($ret = post('submit')) == 'OK' || ($ret = post('delete')) == 'DELETE') {
		if ($status !== null)
			echo '<h3 style="color:red;">' . $status . '</h3>';
		else if ($ret == 'OK')
			echo '<h3 style="color:green;">Successfuly changed password!</h3>';
		else
			echo '<h3 style="color:green;">Successfuly deleted your account!</h3>';
	}
?>
		<div class="folding_div">
			<div class="folding_div_top">Change Password</div>
			<div class="folding_div_bottom">
				<div class="options modif_account">
		<form action="" method="post">
			<label for="oldpw">Old Password</label>
			<input class="inputfield" type="password" name="oldpw" value=""/><br/>
			<label for="newpw2">New Password</label>
			<input class="inputfield" type="password" name="newpw" value=""/><br/>
			<label for="neww2">New Password (confirm)</label>
			<input class="inputfield" type="password" name="newpw2" value=""/><br/>
			<input type="submit" name="submit" value="OK"/>
		</form>
				</div>
			</div>
		</div>
		<div class="folding_div">
			<div class="folding_div_top">Delete Account</div>
			<div class="folding_div_bottom">
				<div class="options delete_account">
					<p>Are you sure you want to delete your account?
					If so, enter your password below and press the button.
					Once deleted, your account will be lost <i>forever</i> !</p>
					<form action="../delete.php" method="post" target="_top">
						<label for="oldpw">Password</label>
						<input class="inputfield" type="password" name="delpwd" value=""/><br/>
						<input type="submit" name="delete" value="DELETE"/>
					</form>
				</div>
			</div>
		</div>
<?php if ($admin): ?>
		<div class="admin folding_div">
			<div class="folding_div_top">ADMIN SETTINGS</div>
			<div class="folding_div_bottom">
				<a href="../item/create.php">Add item...</a><br/>
				<a href="../item/list.php">List items...</a><br/>
				<a href="../cart_list.php">List cart...</a>
			</div>
		</div>
<?php endif; ?>
	</body>
</html>
