<?php

	session_start();

	if ( ! isset($_SESSION['fab']) )
	{
		echo("<p>Sesison Is Empty ! </p>\n");
		$_SESSION['fab'] = 0;
	}	elseif ($_SESSION['fab'] < 3) 
	{
		$_SESSION['fab'] = $_SESSION['fab'] + 1;
		echo("<p> Added One ... </p>\n");
	}	else
	{
		session_destroy();
		session_start();
		echo("<p>Session Restarted ! </p>\n");
	}

?>

<p>
	<a href="sessfun.php">Click Me ! </a></p>
<p>
	Our Session ID. is : <?php echo(session_id()); ?>
</p>
<pre>
	<?php

		print_r($_SESSION);

	?>
</pre>