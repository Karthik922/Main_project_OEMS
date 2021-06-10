<?php
	include "database.php";
	if(isset($_POST["name"]))
	{
		$reg=$_POST["name"];
		if(strlen($reg)==12)
		{
			echo "<i style='color:green'>Yes Correct <i> ";
		
		}
		else
		{
			echo "<i style='color:red'>Please Enter Register Number which has allow 12 Digit..<i> ";
		}
	}
	else
	{
		header("location:new.php?err=Please Register Here");
	}
?>