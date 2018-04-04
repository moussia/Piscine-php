<?php

if ($_POST && $_POST['submit'] == "OK" && $_POST['login'] !== "" && $_POST['passwd'] !== "")
{
	$var = 1;
	if (file_exists("../private") == false)
		mkdir("../private");
	else
	{
		$file = file_get_contents("../private/passwd");
		if ($file)
		{
			$data = unserialize($file);
			foreach ($data as $account)
			{
				if ($account['login'] == $_POST['login'])
				{
					$var = 2;
					echo "ERROR\n";
				}
			}
		}
	}
	if ($var == 1)
	{
		$data[] = array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']));
		file_put_contents("../private/passwd", serialize($data));
		echo "OK\n";
	}
}
else
	echo "ERROR\n";

?>
