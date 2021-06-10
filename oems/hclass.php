<?php
	include "database.php";
	session_start();
	$s="delete from coursetable where COURSE_ID={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('ViewCourse.php?mes=Data Deleted..','_self');</script>";


?>