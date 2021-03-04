<?php
	session_start();
	if ( ! isset($_SESSION['name']) )
	{
		die("Not Logged In ! ");
	}
	if (isset($_POST['cancel']) )
	{
		header("Location: view.php");
			return;
	}
	$status = false;
	if (isset($_SESSION['status']) )
	{
		$status = $_SESSION['status'];
		$status_color = $_SESSION['color'];
		unset($_SESSION['status']);
			unset($_SESSION['color']);
	}
	try
	{
		require 'pdo.php';
	} catch (PDOException $e)
	{
		echo "Connectioin Failed ! : " . $e->getMessage();
			die();
	}
	$name = htmlentities($_SESSION['name']);
	$_SESSION['color'] = 'red';
	if (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) ) 
	{
		if ( !is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) 
		{
			$_SESSION['status'] = "Year And Mileage Must Be Numeric :) ";
			header("Location: add.php");
			return;
		}
		elseif (strlen($_POST['make']) < 1) 
		{
			$_SESSION['status'] = "Make is required :) ";
			header("Location: add.php");
			return;
		}
		else
		{
			$make = htmlentities($_POST['make']);
			$year = htmlentities($_POST['year']);
			$mileage = htmlentities($_POST['mileage']);

			$stmt = $pdo->prepare("INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)");
			$stmt->execute([
				':make' => $make,
				':year' => $year,
				':mileage' => $mileage,
			]);

			$_SESSION['status'] = "Record Inserted :) ";
			$_SESSION['color'] = "green";
			header("Location: view.php");
			return;
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
			Tracking Autos For <?php echo $name; ?>
			</h1>
			<?php
				if ( $status !== false)
				{
					echo
					(
			'<p style="color: ' .$status_color. ';" class="col-sm-10 col-sm-offset-2">'.
				htmlentities($status).
			"</p>\n"
			);
							}
			?>
			<form method="post" class="form-horizontal">
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="make">Make: </label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="make" id="make">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="year">Year: </label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="year" id="year">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="mileage">Mileage: </label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="mileage" id="mileage">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2">
						<input class="btn btn-primary" type="submit" value="ADD">
						<input class="btn" type="submit" name="cancel" value="Cancel">
					</div>
				</div>
			</form>
		</div>
	</body>
</html>