<?php

	$player = new stdclass();

	$player->name = "Chuck";
	$player->score = "0";

	$player->score++;

	print_r($player);

?>

<?php echo "<br>"; ?>

<?php

	/**
	 * 
	 */
	class Player
	{
		public $name = "Sally";
		public $score = "0";
	}

	$p2 = new Player();
	$p2->score++;

	print_r($p2);

?>