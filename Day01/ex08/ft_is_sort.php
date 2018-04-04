#!/usr/bin/php
<?php

function ft_is_sort($tableau)
{
	$tableau_trie = $tableau;
	sort ($tableau_trie);
	//Calcule la différence de deux tableaux, en prenant aussi en compte les clés
	if (!(array_diff_assoc($tableau, $tableau_trie)))
		return (TRUE);
	else
		return (FALSE);
}

?>
