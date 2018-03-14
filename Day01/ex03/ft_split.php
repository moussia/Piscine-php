#!/usr/bin/php
<?php

function ft_split($tableau)
{
	$tab = explode("", $tableau);
	if ($tableau != NULL)
		sort($tab);
	return ($tab);

}
?>
