<!DOCTYPE html>
<html>
<head>
	<title>Harsh Gandhi PHP</title>
</head>
<body style="background-color: aqua; font-family: josefin sans">
	
	<h2 style="color: firebrick; text-align: center;">Harsh Gandhi PHP</h2>
	
	<pre style="text-align: center; padding-right: 171px">		
			.------.
			|H.--. |
			| :/\: |
			| (__) |
			| '--'H|
			`------'
	</pre>

	<p style="text-align: center;">
		The SHA256 HASH of 'Harsh Gandhi is: '
			<?php
				$name= 'Harsh Gandhi';
				print hash('sha256', "$name");
			?>
	</p>

	<p style="text-align: center;">
		<a href="fail.php" style="color: deeppink; text-decoration: none;">Click Here To Check 'Fail.php' file.</a>
	</p>

	<p style="text-align: center;">
		<a href="check.php" style="color: deeppink; text-decoration: none;">Click Here To Visit 'Check.php' file.</a>
	</p>
</body>
</html>