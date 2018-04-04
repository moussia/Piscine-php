<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="shop.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
</body>
		<div id="item">
			<div id="category">
				<span>Trier par catégorie: </span>
				<form method="post">
					<input class="button" type="submit" name="category" value="Feu"></input>
					<input class="button" type="submit" name="category" value="Terre"></input>
					<input class="button" type="submit" name="category" value="Air"></input>
					<input class="button" type="submit" name="category" value="Eau"></input>
					<input class="button" type="submit" name="category" value="Tout"></input>
				</form>
			</div>
			<?php
				$mysqli = mysqli_connect("localhost", "root", "qwerty", "shop");
				if (mysqli_connect_error())
					echo "couldn't connect to sql (".mysqli_connect_errno().')'.mysqli_connect_error();
				if (!($res = mysqli_query($mysqli, "SELECT * FROM `items`")))
					echo "sql error: couldn't fetch items!";
				while (($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) != null)
				{
					if (isset($array['Category']))
						$category = preg_split("/[ ]+/", $array['Category']);
					foreach ($category as &$elem)
						$elem[0] = strtoupper($elem[0]);
					if (isset($_POST['category']) == FALSE ||
						in_array($_POST['category'], $category) == TRUE ||
						$_POST['category'] == "Tout")
					{
						echo "<div class=\"img_item\">
						<img src=\"".$array['Link']."\">
						<span>".$array['Description']."</span><br>
						<span>Prix: ".$array['Price']." patates.</span>
						<form action=\"cart_function.php\" method=\"post\" target=\"_top\">
							<input type=\"submit\" name=\"submit_purchase\"value=\"".$array['ItemID']."\">
						</form>
						</div>";
					}
				}
				echo "<br>";
			?>
		</div>
</body>
</html>
