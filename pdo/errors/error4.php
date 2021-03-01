<?php

	require 'pdo.php';

	try 
	{
		$stmt = $PDO->prepare("SELECT * FROM users WHERE users_id = :xyz");
		$stmt->execute(array(":pizza" => $_GET['users_id']));
		
	} catch (Exception $ex) 
	{
		echo("Internal Error, Please Contact Support");
		error_log("error4.php, SQL error = " . $ex->getMessage());
		return;
	}

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($row === false) 
	{
		echo("<p>User ID Not Found. </p>");
	}else
	{
		echo("<p>User ID Found. </p>");
	}

?>