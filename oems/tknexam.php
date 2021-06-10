<?php
	include "database.php";
	$sql="SELECT * FROM `exam_tbl` WHERE COU_ID={$_POST['id']}";
	$res=$db->query($sql);
	//echo "<option value="">select </option>";
	function countRecord($sqlq,$db)
    {
	$res=$db->query($sqlq);
	return $res->num_rows;
    }
	$i=0;
		while($r=$res->fetch_assoc())
		{
			$exid=$r['EX_ID'];
			$sqlq="SELECT * FROM `partaquestions` WHERE EXTITLE_ID=$exid";
			if($ress=$db->query($sqlq))
			{
				$rq=$ress->fetch_assoc();
				$quID=$rq['QIDA'];
			}
			$count=(int)countRecord($sqlq,$db);
			
			
			
			$i++;
			echo "<tr><td>".$i."</td>";
			echo "<td>".$r['EXTITLE']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>";
			echo "<td>";
			if($count>=10)
			{
				$_SESSION['key']=$exid;
				echo "<a href='examSheet.php?n={$quID}&key={$exid}&code=1'><b style='color:green;'>Start</b></a>";
			}
			else
			{
				echo "<b style='color:red;'>Not Uploaded</b>";
			}
			echo "</td></tr>";
		}
?>