<?php
include "utils.php";
include "auth/auth.php";

session_start();

if (post('delete') == 'DELETE') {
	if (($status = delete_account(session('logged_user'), post('delpwd'))) === null) {
		$_SESSION['logged_user'] = null;
		$_SESSION['admin'] = null;
		$_SESSION['return_msg'] = "<p>You just logged out.</p>";
	}
	else
		$_SESSION['return_msg'] = '<p style="color:red;">' . $status .'</p>';
}
header('Location: index.php?menu=account');
?>
