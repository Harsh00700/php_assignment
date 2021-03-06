<?php

	session_start();

	$logged_in = false;
	$autos = [];

	if (isset($_SESSION['name']) ) 
	{
		$logged_in = true;
		$status = false;

		if (isset($_SESSION['status']) ) 
		{
			$status = htmlentities($_SESSION['status']);
			$status_color = htmlentities($_SESSION['color']);

			unset($_SESSION['status']);
			unset($_SESSION['color']);
		}

		try 
		{
			require 'pdo.php';

			$all_autos = $pdo->query("SELECT * FROM autos");

			while ($row = $all_autos->fetch(PDO::FETCH_OBJ) ) 
			{
			    $autos[] = $row;
			}

		} 
		catch (PDOException $e) 
		{
			echo 'Connection Failed ! : ' . $e->getMessage();
			die();	
		}
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
			Welcome To The Automobile Database :)	
		</h1>

		<?php if ( ! $logged_in) : ?>

			<p>
				<a href="login.php">Please Log In :) </a>
			</p>

			<p>
				Attempt to<a href="add.php"> add data </a>without logging in !
			</p>

		<?php else : ?>

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

		<?php if(empty($autos)) : ?>

			<p>
				Data Not Found !
			</p>

		<?php else : ?>

			<p>
				<table class="table">
					<thead>
						<tr>
							<th>Make</th>
							<th>Model</th>
							<th>Year</th>
							<th>Mileage</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($autos as $auto) : ?>
							<tr>
								<td><?php echo $auto->make; ?></td>
								<td><?php echo $auto->model; ?></td>
								<td><?php echo $auto->year; ?></td>
								<td><?php echo $auto->mileage; ?></td>
								<td><a href="edit.php?autos_id=<?php echo $auto->auto_id; ?>" class="btn btn-primary">Edit</a>
									<a href="delete.php?autos_id=<?php echo $auto->auto_id; ?>" class="btn btn-default">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</p>
		<?php endif; ?>	

			<p>
				<a href="add.php" class="btn btn-primary">ADD</a>
				<a href="logout.php" class="btn btn-default">LogOut</a>
			</p>

		<?php endif; ?>

	</div>

</body>
</html>