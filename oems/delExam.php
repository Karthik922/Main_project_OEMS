<?php
	include "database.php";
	session_start();
	$s="delete from exam_tbl where EX_ID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('ViewExam.php?mes=Data Deleted..','_self');</script>";


?>