<?php
	include "database.php";
	session_start();
	$s="delete from `partaquestions` where QIDA={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('viewPartAque.php?mes=Data Deleted..','_self');</script>";


?>