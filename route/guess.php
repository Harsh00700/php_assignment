<?php
	$guess = '';
	$message = false;
	if (isset($_POST['guess']) )
	{
		$guess = $_POST['guess'] + 0;
		
		if ($guess == 42)
		{
			$message = "Great Job ! ";
		}elseif ($guess < 42 )
		{
			$message = "Too Low .... ";
		}else
		{
			$message = "Too High ....";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>GUESS</title>
	</head>
	<body style="font-family: josefin sans;">
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
			/></p>
			<input type="submit">
		</form>
	</body>
</html>