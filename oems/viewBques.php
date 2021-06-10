<?php
	include "database.php";
	$sql="SELECT * FROM `partbquestions` WHERE CU_ID={$_POST['id']} AND EXTITLE_ID={$_POST['ie']} ORDER BY `partbquestions`.`QIDB` DESC ";
	$res=$db->query($sql);
	//echo "<option value="">select </option>";
	$i=0;
		while($r=$res->fetch_assoc())
		{
			$i++;
			echo "<tr><td>{$i}</td><td>{$r['QUESTIONS']}</td>
			<td>{$r['OP1']}</td>
			<td>{$r['OP2']}</td>
			<td>{$r['OP3']}</td>
			<td>{$r['OP4']}</td>
			<td>{$r['OP5']}</td>
			<td>{$r['CORRECT_ANSWER']}</td>
			<td><a href='delBques.php?id={$r["QIDB"]}' class='btnr'>Delete</a></td>
									
			</tr>";
		}
?>