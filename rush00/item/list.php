<?php

include "item.php";

session_start();

if (session('logged_user') === null || session('admin') === null) {
	$_SESSION['return_msg'] = '<p style="color:red">you do not have access to this page!</p>';
	header("Location: ..");
}
?>
<html>
	<head>
		<title>Item List</title>
	</head>
	<body>
		<h1>Item List</h1>
<?php
if (($res = list_items($str)) !== null)
	echo $res;
else
	echo $str;
?>
		<a href="../menu/account.php">back to main page...</a><br/>
	</body>
</html>
