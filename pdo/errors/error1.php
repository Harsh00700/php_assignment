<?php

	require 'pdo.php';

	$stmt = $PDO->prepare("SELECT * FROM users WHERE user_id = :xyz");
	$stmt->execute(array(":pizza" => $_GET['user_id']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($row === false) 
	{
		echo "<p>User ID Not Found. </p>\n";
	}else
	{
		echo "<p>User ID Found. </p>\n";
	}

?>