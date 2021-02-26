<?php

	/**
	 * 
	 */
	class person
	{
		public $fullname = false;
		public $familyname = false;
		public $givenname = false;
		public $room = false;	

		function get_name()
		{
			if ($this->fullname !== false)
				return $this->fullname;
			if ($this->familyname !== false && $this->givenname !== false)
			{
				return $this->givenname . ' ' . $this->familyname;
			}
			return false;
		}

		function get_room()
		{
			if ($this->room !== false) 
			{
				return $this->room;
			}
			return false;
		}
	}
	
	$chuck = new person();
	$chuck->fullname = "Chuck Severance";
	$chuck->room = "4429NQ";

	$colleen = new person();
	$colleen->familyname  = "Van Lent";
	$colleen->givenname = "Colleen";
	$colleen->room = "3439NQ";

	print $chuck->get_name();
	print "<br>";
	print $colleen->get_name();

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Person Name
	</title>
</head>
<body>

</body>
</html>