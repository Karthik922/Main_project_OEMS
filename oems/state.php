<?php
	include "database.php";
	$sql="select * from exam_tbl where COU_ID={$_POST['id']}";
	$res=$db->query($sql);
	//echo "<option value="">select </option>";
		while($row=$res->fetch_assoc())
		{
			echo "<option value='{$row["EX_ID"]}'>{$row["EXTITLE"]}</option>";
		}
?>