<?php
	session_start();
	$i = 0;
	foreach ($_POST as $price)
	{
		if ($price == 'Retirer')
		{
			foreach ($_SESSION['cart'] as &$elem_cart)
			{
				if ($elem_cart[0] == key($_POST))
				{
					if ($i == 0)
						array_splice($_SESSION['cart'], $i, $i + 1);
					else
						array_splice($_SESSION['cart'], $i, $i);
				}
				$i++;
			}
		}
		else
		{
			foreach ($_SESSION['cart'] as &$elem_cart)
			{
				if ($elem_cart[0] == key($_POST))
						$elem_cart[1] = $price;
			}
		}
	}
	header('Location: index.php?menu=cart');
?>
