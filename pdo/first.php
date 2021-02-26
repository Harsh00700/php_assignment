<?php

	echo "<pre>\n";

	$PDO = new PDO ('mysql:host=localhost;port=3306;dbname=misc','root','');

	$stmt =$PDO->query("SELECT * FROM users");

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		print_r($row);
	}

	echo "</pre>\n";
	
?>