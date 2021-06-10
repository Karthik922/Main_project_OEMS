<?php
	include "database.php";
	session_start();
	$s="delete from `approval` where SREGNO={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('deleteApprovedStu.php?mes=Data Deleted..','_self');</script>";


?>