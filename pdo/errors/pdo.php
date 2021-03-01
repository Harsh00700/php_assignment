<?php

	echo "<pre>\n";

	$PDO = new PDO ('mysql:host=localhost;port=3306;dbname=misc','root','');

	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>