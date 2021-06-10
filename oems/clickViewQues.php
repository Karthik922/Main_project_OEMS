<?php
	include "database.php";
	
	$qid =$_POST['id'];
	
	$sql="SELECT * FROM `partaquestions` WHERE EXTITLE_ID={$_POST['ie']} AND QIDA=$qid";
	$res=$db->query($sql);
	echo "<script>window.open('examSheet.php?n=4','_self');</script>";

		
?>

