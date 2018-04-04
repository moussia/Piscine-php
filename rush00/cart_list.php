<?php

include "utils.php";
include "item/item.php";

session_start();

if (session('logged_user') === null || session('admin') === null) {
	$_SESSION['return_msg'] = '<p style="color:red">you do not have access to this page!</p>';
	header("Location: ..");
}
?>
<html>
	<head>
		<title>Cart List</title>
	</head>
	<body>
		<h1>Cart List</h1>
<?php
if (($res = list_cart($str)) !== null)
	echo $res;
else
	echo $str;
?>
		<a href="menu/account.php">back to main page...</a><br/>
	</body>
</html>
