<?php
include "../utils.php";

function fetch_item_categories() {
	$categories = array("air", "terre", "eau", "feu");
	$ret = "";

	foreach ($categories as $cat)
		$ret .= "<option value=\"$cat\">$cat</option>";
	return $ret;
}

function create_item($name, $category, $title, $description, $link, $price) {
	if (is_blank($name))
		return "Cannot have blank name";
	else if (is_blank($title))
		return "Cannot have blank title";
	else if (is_blank($description))
		return "Cannot have blank description";
	else if (is_blank($link))
		return "Missing image link!";
	else if (!is_numeric($price))
		return "Missing price!";

	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	escape($mysqli, $category, $name, $title, $description, $link, $price);
	if (!mysqli_query($mysqli, "INSERT INTO items (Category, Name, Title, Description, Link, Price) VALUES
		('$category', '$name', '$title', '$description', '$link', '$price')"))
		return "Couldn't create item!";
	return null;
}

function list_items(&$str) {
	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	if (!($res = mysqli_query($mysqli, "SELECT * FROM items")))
		return "sql error: couldn't fetch!";

	$str = "ID, CATEGORY, NAME, TITLE, DESCRIPTION, LINK, PRICE<br/>";
	while (($row = mysqli_fetch_array($res)) !== null) {
		$str .= "$row[0]: $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]" . "<br/>";
	}
	return null;
}

function list_cart(&$str) {
	$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
	if (mysqli_connect_error())
		return "couldn't connect to sql (" . mysqli_connect_errno() . ') '. mysqli_connect_error();

	if (!($res = mysqli_query($mysqli, "SELECT * FROM purchases")))
		return "sql error: couldn't fetch!";

	$str = "ID, NAME, CART_ID, ITEM_ID, AMOUNT<br/>";
	while (($row = mysqli_fetch_array($res)) !== null) {
		$str .= "$row[0]: $row[1], $row[2], $row[3], $row[4]" . "<br/>";
	}
	return null;
}

?>
