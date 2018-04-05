<?php

class Jaime extends Lannister
{
	public function with($element)
	{
		if (get_parent_class($element) !== 'Lannister')
		{
			return ("Let's do this.");
		}
		elseif (get_class($element) === "Cersei")
		{
			return ("With pleasure, but only in a tower in Winterfell, then.");
			}
		else
		{
			return ("Not even if I'm drunk !");
		}
	}
}

?>
