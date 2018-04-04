<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="shop.css">
	</head>
	<body>
<?php
include "utils.php";
session_start();

$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
if (mysqli_connect_error())
	echo "couldn't connect to sql (".mysqli_connect_errno().')'.mysqli_connect_error();
if (!($res = mysqli_query($mysqli, "SELECT * FROM `items`")))
	echo "sql error: couldn't fetch items!";
while (($array[] = mysqli_fetch_array($res, MYSQLI_ASSOC)) != null)
	;
$acart = ($tmp = session('cart')) === null ? array() : $tmp;
foreach ($acart as $elem_cart)
{
	foreach($array as $elem_item)
	{
		if ($elem_cart[0] == $elem_item['ItemID'])
		{
			echo "<div class=\"img_item\">
			<img src=\"".$elem_item['Link']."\">
			<span>".$elem_item['Description']."</span><br>
			<span>Prix: ".$elem_item['Price']." patates à l'unité.</span>
			<form action=\"add_to_cart.php\" method=\"post\" target=\"_top\">
				<input type=\"number\" name=\"".$elem_item['ItemID']."\" value=\"".$elem_cart[1]."\">
			</form>
			<form action=\"add_to_cart.php\" method=\"post\" target=\"_top\">
				<input type=\"submit\" name=\"".$elem_item['ItemID']."\" value=\"Retirer\">
			</form>
			</div>";
		}
	}
}
$total = 0;
foreach ($acart as $cart)
{
	foreach ($array as $ref)
	{
		if ($ref['ItemID'] == $cart[0])
		{
			$total += ($cart[1] * $ref['Price']);
		}
	}
}
$_SESSION['total_price'] = $total;
echo "<br>";
echo "Prix total: ".$_SESSION['total_price']." patates.\n";
?>
		<form action="finish_purchase.php" method="post" target="_top">
			<input type="submit" value="Finalisez l'achat.">
		</form>
	</body>
</html>
