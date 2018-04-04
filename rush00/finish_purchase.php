<?php
session_start();

include "utils.php";


function send_cart_data($data, $user) {
	if ($data == null)
		return "Empty cart!";
	else if ($user == null)
		return "You must be logged in to buy things!";

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	if (!($res = mysqli_query($mysqli, "SELECT MAX(CartID) FROM purchases")) ||
		($row = mysqli_fetch_array($res)) === null)
		return "sql error: couldn't find maximum cart id!";

	$query = "INSERT INTO purchases (Username, CartID, ItemID, Amount) VALUES";
	++$row[0];

	escape($mysqli, $user);
	foreach ($data as $item)
		if (!mysqli_query($mysqli, $query . "('$user', '$row[0]', '$item[0]', $item[1])"))
			return "sql error: couldn't add cart data!";
	return null;
}

if (($res = send_cart_data(session('cart'), session('logged_user'))) === null)
{
	unset($_SESSION['total_price']);
	unset($_SESSION['cart']);
	$_SESSION['return_msg'] = '<p style="color:green;">Successfuly bought cart</p>';
}
else
	$_SESSION['return_msg'] = '<p style="color:red;">' . $res .'</p>';


header("Location: index.php?menu=shop");
?>
