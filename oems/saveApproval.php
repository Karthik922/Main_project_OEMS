<?php
	include "database.php";
	if(isset($_POST["id"]))
	{
		$c=0;
		foreach($_POST["id"] as $id)
		{
			//$sq="SELECT * FROM `approval` WHERE=$id";
			//$res=$db->query($sq);
			//if($res->num_rows>0)
			//{
				$sql="INSERT INTO `approval` (`APID`, `SREGNO`, `DEP`, `STATUS`) VALUES (NULL, '$id', '{$_POST["dep"]}', 'Approved')";
			$db->query($sql);
				
			//}
			//else
			//{
				//$c++;
			
			//}
		}
		//header("location:students.php?mes=".$c);
	}
?>