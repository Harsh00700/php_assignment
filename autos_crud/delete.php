<?php

	session_start();


	if ( ! isset($_SESSION['name']) ) 
	{
		die("ACCESS DENIED :( (Not Logged In ! )");
	}

	try 
	{
		require 'pdo.php';	
	} catch (PDOException $e) 
	{
		echo "Connection Failed ! : " . $e->getMessage();
		die();
	}

	$name = $_SESSION['name'];

	if (isset($_REQUEST['autos_id']) ) 
	{
		$auto_id = htmlentities($_REQUEST['autos_id']);

		if (isset($_POST['delete']) ) 
		{
			$stmt = $pdo->prepare("DELETE FROM autos WHERE auto_id = :auto_id");

			$stmt->execute([
				":auto_id" => $auto_id,
			]);

			$_SESSION['status'] = "Record Deleted !";
			$_SESSION['color'] = "green";

			header("Location: index.php");
			return;
		}

		$stmt = $pdo->prepare("SELECT * FROM autos WHERE auto_id = :auto_id");

		$stmt->execute([
			":auto_id" => $auto_id,
		]);

		$auto = $stmt->fetch(PDO::FETCH_OBJ);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		HARSH
	</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body style="font-family: josefin sans">

	<div class="container">

		<h1>
			Deleting Automobiles For <?php echo $name; ?>
		</h1>
		
		<p>
			Confirm Deleting: 
			<?php 
			
				echo $auto->make, "\n";
				echo $auto->model; 
			
			?>
		</p>

		<form method="post" class="form-horizontal">
			
			<div class="form-group">
				<div class="col-sm-2 col-sm-offset-2">
					<input class="btn btn-primary" type="submit" name="delete" value="Delete">
					<a class="btn btn-default" href="index.php">Cancel</a>
				</div>
			</div>

		</form>

	</div>

</body>
</html>