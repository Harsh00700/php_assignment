<?php

	require 'pdo.php';

	try 
	{
		$stmt = $PDO->prepare("SELECT * FROM users WHERE user_id = :xyz");
		$stmt->execute(array(":pizza"=>  $_GET['user_id']));	
	} catch (Exception $ex) 
	{
		echo("Exception Message : " . $ex->getMessage());
		return;	
	}

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($row === false) 
	{
		echo ("User ID Not Found. ");
	}else
	{
		echo("User ID Found. ");
	}

?>