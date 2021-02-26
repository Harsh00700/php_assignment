<?php

	/**
	 * 
	 */
	class MyClass
	{
		public $pub = "Public";
		protected $pro = "Protected";
		private $priv = "Private";
		
		function print()
		{
			echo $this->pub."\n";
			echo $this->pro."\n";
			echo $this->priv."\n";
		}
	}

	$obj = new MyClass();
	echo $obj->pub."\n";
	$obj->print();

	/**
	 * 
	 */
	class MyClass2 extends MyClass
	{
		
		function print()
		{
			echo $this->pub."\n";
			echo $this->pro."\n";
		}
	}

	echo("--- MyClass2 ---\n");
	$obj2 = new MyClass2();
	echo $obj2->pub."\n";
	$obj2->print();

?>