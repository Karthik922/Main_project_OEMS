<?php
	include "database.php";
	$sql="SELECT * FROM `exam_tbl` WHERE COU_ID={$_POST['id']}";
	$res=$db->query($sql);
	//echo "<option value="">select </option>";
	function countRecord($sql,$db)
    {
	$res=$db->query($sql);
	return $res->num_rows;
    }
	$i=0;
		while($r=$res->fetch_assoc())
		{
			$exid=$r['EX_ID'];
			$sql="SELECT * FROM `partaquestions` WHERE EXTITLE_ID=$exid";
			$count=countRecord($sql,$db);
			
			
			$i++;
			echo "<tr><td>{$i}</td>
			<td>{$r['EXTITLE']}&nbsp&nbsp</td>
			<td>{$r['EX_TIME_LIMIT']}</td>
			<td>{$r['EX_QUESTLIMIT_DISPLAY']}</td>
			<td>{$r['EX_DESCRIPTION']}</td>
			<td> {$count}
			       </td>
									
			</tr>";
		}
?>