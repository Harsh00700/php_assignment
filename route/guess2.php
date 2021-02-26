<?php
	session_start();
	if (isset($_POST['guess']) )
	{
		$guess = $_POST['guess'] + 0;
		$_SESSION['guess'] = $guess;
		if ($guess == 42)
		{
			$_SESSION['message'] = "Great Job ! ";
		} elseif ($guess < 42)
		{
			$_SESSION['message'] = "Too Low ....";
		}else
		{
			$_SESSION['message'] = "Too High ....";
		}
		header("location: guess2.php");
		return;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>GUESS</title>
	</head>
	<body style="font-family: josefin sans;">
		<?php
			$guess = isset($_SESSION['guess']) ? $_SESSION['guess'] : '';
			$message = isset($_SESSION['message']) ? $_SESSION['message'] : false;
		?>
		<p>Guessing Game ....</p>
		<?php
			if ($message !== false)
			{
				echo("<p>$message</p>\n");
			}
		?>
		<form method="post">
			
			<p>
				
				<label for="guess">Input Guess</label>
				
				<input type="text" name="guess" id="guess" size="40"
				<?php
					echo 'value = "' . htmlentities($guess) . '"';
				?>
			></p>
			<input type="submit" name="submit">
		</form>
	</body>
</html>