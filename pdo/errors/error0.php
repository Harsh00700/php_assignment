<?php

	require_once 'pdo.php';

	if ( ! isset($_GET['user_id']) ) die('user_id = 1 GET parameter required'); 

		$stmt = $PDO->prepare("SELECT * FROM users WHERE user_id = :xyz");
		$stmt->execute(array(":xyz" => $_GET['user_id']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row === false) 
		{
			echo "<p>User ID Not Found. </p>\n";
		}else
		{
			echo "<p>User ID Found</p>\n";
		}

?>