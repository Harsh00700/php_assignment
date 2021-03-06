<?php
	session_start();
	if (isset($_POST['cancel']) )
	{
		header("Location: index.php");
		return;
	}
	$stored_hash = '9e94b15ed312fa42232fd87a55db0d39';//pw is 007
	$failure = false;
	if (isset($_SESSION['failure']) )
	{
		$failure = $_SESSION['failure'];
			unset($_SESSION['failure']);
	}
	if (isset($_POST['email']) && isset($_POST['pass']) )
	{
		if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 )
		{
			$_SESSION['failure'] = "Email And Password Must Require ! ";
			header("Location: login.php");
			return;
		}
		else
		{
			$pass = htmlentities($_POST['pass']);
			$email = htmlentities($_POST['email']);
			if ((strpos($email , '@') === false ))
			{
				$_SESSION['failure'] = "Email Must Contain at-sign (@) ! ";
				header("Location: login.php");
				return;
			}
			else
			{
				$check = hash('md5', $pass);
				if ($check == $stored_hash)
				{
					error_log("Login Success. ".$email);
					$_SESSION['name'] = $email;
					header("Location: index.php");
							return;
				}
				else
				{
					error_log("Login Unsuccessfull. ".$pass."$check");
					$_SESSION['failure'] = "Incorrect Password !";
					header("Location: login.php");
					return;
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HARSH</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body style="font-family: josefin sans">
		<div class="container">
			
			<h1>
			Please Log In !
			</h1>
			<?php
				if ($failure !== false)
				{
					echo(
						'<p style="color: red;" class="col-sm-10 col-sm-offset-2">'.htmlentities($failure)."
						</p>\n"
					);
				}
			?>
			<form method="post" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email: </label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="email" id="email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pass">Password: </label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="pass" id="pass">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2">
						<input class="btn btn-primary" type="submit" value="Log In">
						<input class="btn" type="submit" name="cancel" value="Cancel">
					</div>
				</div>
			</form>
			
			<p>
				For a password hint, view source and find a password hint
				in the HTML comments.
				<!-- Hint: The password is of three digit which comes in the title of the movie James Bond :)-->
			</p>
		</div>
	</body>
</html>