<?php

include "item.php";

session_start();

if (session('logged_user') === null || session('admin') === null) {
	$_SESSION['return_msg'] = '<p style="color:red">You do not have access to this page!</p>';
	header("Location: ..");
}

if (post('submit') == "OK")
	$status = create_item(post('name'), post('category'), post('title'), post('description'), post('image'), post('price'));
else
	$status = null;

?>
<html>
	<head>
		<title>Create Shop Item</title>
		<link rel="stylesheet" href="../global.css">
	</head>
	<body>
		<div id="login_page">
		<h1>Create Shop Item</h1>
		<form action="" method="post">
			<label for="name">Item Name</label>
			<input type="text" name="name" value="" maxlength="250"/><br/>
			<label for="category">Item Category</label>
			<select name="category"><?php echo fetch_item_categories() ?></select><br/>
			<label for="title">Title</label>
			<input type="text" name="title" value="" maxlength="250"/><br/>
			<label for="description">Description:</label><br/>
			<textarea name="description" cols="100" rows="15"></textarea><br/>
			<label for="image">Image Link</label>
			<input type="text" name="image" value="" maxlength="250"/><br/>
			<label for="price">Price</label>
			<input name="price" type="number"/>
			<input type="submit" name="submit" value="OK"/>
		</form>
<?php
if (post('submit') == "OK")
	echo $status === null ? "added item '" . post('name') . "'" : "$status\n";
?>
	</div>
	</body>
</html>
