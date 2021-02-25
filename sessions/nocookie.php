<?php

	ini_set('session.use_cookies', '0');
	ini_set('session.use_only_cookies', 0);
	ini_set('session.use_trans_sid', 1);

	session_start();

?>

<p>
	<b>No Cookies For You ! </b>
</p>

<?php
	
	if ( ! isset($_SESSION['fab']) )
	{
		echo("<p>Sesison Is Empty ! </p>\n");
		$_SESSION['fab'] = 0;
	}	elseif ($_SESSION['fab'] < 3) 
	{
		$_SESSION['fab'] = $_SESSION['fab'] + 1;
		echo("<p> Added One \$_SESSION['fab'] = " . $_SESSION['fab'] . " </p>\n");
	}	else
	{
		session_destroy();
		session_start();
		echo("<p>Session Restarted ! </p>\n");
	}

?>

<p>
	<a href="nocookie.php"> Click This Anchor Tag ! </a>
</p>

<p>
	<form action="nocookie.php" method="post">
		<input type="submit" name="Click ! " value="Click This Submit Button ! ">
	</form>

	<p>Our Session ID. is : <?php echo(session_id()); ?></p>
</p>

<pre>
	<?php

		print_r($_SESSION);

	?>
</pre>