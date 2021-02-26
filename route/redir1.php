<?php

	if (isset($_POST['where']) )
	{
		if ($_POST['where'] == '1')
		{
			header("location: redir1.php");
			return;
		} elseif ($_POST['where'] == '2') 
		{
			header("location: redir2.php?parm=123");
			return;
		}else 
		{
			header("location: https://www.google.com");
			return;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>REDIRECT 1</title>
</head>
<body style="font-family: josefin sans;">

	<p>I am a Router 1 .... </p>

	<form method="post">
		<p>
			<label for="inp9">Where To Go ? (1-3)</label>
			<input type="text" name="where" id="inp9" size="5">
		</p>

		<input type="submit" name="submit">
	</form>

</body>
</html>