<?php
session_start();
$flag = 0;
if (isset($_SESSION['cart']) == FALSE)
	$_SESSION['cart'] = array();
foreach($_SESSION['cart'] as &$elem)
{
	if ($elem[0] == $_POST['submit_purchase'])
		$flag = 1;
}
if ($flag == 0)
	$_SESSION['cart'][] = array($_POST['submit_purchase'], 0);
header("Location: index.php?menu=shop");
?>
