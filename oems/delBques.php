<?php
	include "database.php";
	session_start();
	$s="delete from `partbquestions` where QIDB={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('viewPartBque.php?mes=Data Deleted..','_self');</script>";


?>