<?php
	session_start();
	if (! isset($_SESSION['name']) )
	{
		die("Not Logged In !");
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
	}
	catch (PDOException $e)
	{
		echo"Connection Failed ! : " . $e->getMessage();
		die();
	}
	$name = htmlentities($_SESSION['name']);
	
	$autos = [];
	$all_autos = $pdo->query("SELECT * FROM autos");
	while ($row = $all_autos->fetch(PDO::FETCH_OBJ) )
	{
	$autos[] = $row;
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
			Tracking Autos For <?php echo($name); ?>
			</h1>
			<p>
				<a href="add.php" class="btn btn-primary">Add</a>
				<a href="logout.php" class="btn btn-default">LogOut</a>
			</p>
			<?php if( !empty($autos) ) : ?>
			
			<h2>
			Automobiles
			</h2>
			<ul>
				
				<?php foreach ($autos as $auto) : ?>
				<li>
					<?php echo $auto->year; ?>
					<?php echo $auto->make; ?>
					<?php echo $auto->model; ?>
					<?php echo $auto->mileage; ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
	</body>
</html>