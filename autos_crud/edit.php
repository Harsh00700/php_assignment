<?php

    session_start();

    if ( ! isset($_SESSION['name']) ) 
    {
        die("ACCESS DENIED :( (Not Logged In !)");
    }

    if (isset($_POST['cancel']) ) 
    {
        header("Location: index.php");
        return;
    }

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
    } catch (PDOException $e) 
    {
        echo "Connection Failed ! : " . $e->getMessage();
        die();
    }

    $name = htmlentities($_SESSION['name']);

    $_SESSION['color'] = "red";

    if (isset($_REQUEST['autos_id']) ) 
    {
        if (isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage']) ) 
        {
            if (strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1) 
            {
                $_SESSION['status'] = "All Fields Are Required :) ";
                header("Location: edit.php?autos_id" . htmlentities($_REQUEST['auto_id']));
                return;
            }
            if ( ! is_numeric($_POST['year']) ) 
            {
                $_SESSION['status'] = "Year Must Be An Integer :) ";
                header("Location: edit.php?autos_id" . htmlentities($_REQUEST['auto_id']));
                return;
            }
             if ( ! is_numeric($_POST['mileage']) ) 
            {
                $_SESSION['status'] = "Mileage Must Be An Integer :) ";
                header("Location: edit.php?autos_id" . htmlentities($_REQUEST['auto_id']));
                return;
            }

            $make = htmlentities($_POST['make']);
            $model = htmlentities($_POST['model']);
            $year = htmlentities($_POST['year']);
            $mileage = htmlentities($_POST['mileage']);

            $auto_id = htmlentities($_REQUEST['autos_id']);

            $stmt = $pdo->prepare("UPDATE autos SET make = :make, model = :model, year = :year, mileage = :mileage WHERE auto_id = :auto_id");

            $stmt->execute([
                ':make' => $make,
                ':model' => $model,
                ':year' => $year,
                ':mileage' => $mileage,
                ':auto_id' => $auto_id,
            ]);

            $_SESSION['status'] = "Record Updated :) ";
            $_SESSION['color'] = "green";

            header("Location: index.php");
            return;
        }

        $auto_id = htmlentities($_REQUEST['autos_id']);

        $stmt = $pdo->prepare("SELECT * FROM autos WHERE auto_id = :auto_id");

        $stmt->execute([
            ':auto_id' => $auto_id,
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
			Tracking Automobiles For <?php echo $name; ?>
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
                    <label class="control-label col-sm-2" for="make">Make:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="make" id="make" value="<?= htmlentities($auto->make) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="model">Model:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="model" id="model" value="<?= htmlentities($auto->model) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="year">Year:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="year" id="year" value="<?= htmlentities($auto->year) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="mileage">Mileage:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="mileage" id="mileage" value="<?= htmlentities($auto->mileage) ?>">
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