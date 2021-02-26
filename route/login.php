<?php

	session_start();

	if (isset($_POST['account']) && isset($_POST['pw']) ) 
	{
		unset($_SESSION['account']);

		if ($_POST['pw'] == '007') 
		{
			$_SESSION['account'] = $_POST['account'];
			$_SESSION['success'] = "Logged In :) ";
			header('location: app.php');
			return;
		}else
		{
			$_SESSION['error'] = "Incorrect Password :(";
			header('location: login.php');
			return;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
</head>
<body style="font-family: josefin sans;">

	<h1>Please Log In :) </h1>

<?php

	if (isset($_SESSION['error']) ) 
	{
		echo('<p style = "color:red">' . $_SESSION['error'] . "</p>\n");
		unset($_SESSION['error']);	
	}

	if (isset($_SESSION['success']) ) 
	{
		echo('<p style = "color:green">' . $_SESSION['success'] . "</p>\n");
		unset($_SESSION['success']);
	}

?>


<form method="post">
	
	<p>Account: <input type="text" name="account" value=""></p>
	<p>Password: <input type="password" name="pw" value=""></p>
	<p>
		<input type="submit" name="submit" value="LOG IN">
		<a href="app.php">Cancel</a>
	</p>

</form>
</body>
</html>