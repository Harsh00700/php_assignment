<?php 

	date_default_timezone_set('Asia/Kolkata');

	$nextweek = time() + (7 * 24 * 60* 60);

	echo "Now : " . date("y-m-d");
	echo "<br>";
	echo "Next Week : " . date("y-m-d" , "$nextweek");
	echo "<br>";

	echo "=====";
	
	echo "<br>";
	$now = new DateTime();
	$nextweek = new DateTime("Today +1 Week");
	echo "Now : " . $now->format("y-m-d");
	echo "<br>";
	echo "Next Week : " . $nextweek->format("y-m-d");

 ?>	