<?php
	if ( ! isset($_COOKIE['cookie']) ) 
	{
		setcookie('cookie', '43', time()+3600);
	}
?>
<pre>
	<?php
	print_r($_COOKIE);
	?>
</pre>
<p><a href="cookie.php">Click Me ! </a> Or Press Refresh :) </p>