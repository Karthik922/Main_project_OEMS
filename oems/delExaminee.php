<?php
	include "database.php";
	session_start();
	$s="delete from examinee_tbl where EXMNE_ID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('ViewExaminee.php?mes=Data Deleted..','_self');</script>";


?>