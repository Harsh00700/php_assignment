<?php

	echo "<pre>\n";

	require_once 'pdo.php';

	$stmt =$PDO->query("SELECT * FROM users");

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		print_r($row);
	}

	echo "</pre>\n";
	
?>