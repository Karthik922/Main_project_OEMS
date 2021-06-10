<?php
	include "database.php";
	if(isset($_POST["name"]))
	{
		$reg=$_POST["name"];
		if(strlen($reg)==12)
		{
			$sql="SELECT REGNO FROM `student` WHERE REGNO='$reg'";
			$result=$db->query($sql);
			if($result->num_rows>0)
			{
				echo "<i style='color:red'> Your Register Number Already Registered Please go login...<i>";
				
			}
			else
			{
			echo " <i style='color:green'> Register No Avaliable<i>";
					
			}
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