<?php

	require_once 'pdo.php';

	if (isset($_POST['user_id']))
	{
		$sql = "DELETE FROM users WHERE user_id = :user_id";
		echo "<pre>\n $sql \n</pre>\n";
		$stmt = $PDO->prepare($sql);
		$stmt->execute(array(':user_id'=>$_POST['user_id']));
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DELETE</title>
</head>
<body>

	<p>Delete A User</p>

	<form method="post">
		
		<p>ID to Delete : <input type="text" name="user_id"></p>
		<p><input type="submit" value="DELETE"></p>

	</form>

</body>
</html>