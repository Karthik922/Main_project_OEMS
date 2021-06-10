<?php
	include "database.php";
	$sql="SELECT * FROM `partaquestions` WHERE CU_ID={$_POST['id']} AND EXTITLE_ID={$_POST['ie']} ORDER BY `partaquestions`.`QIDA` DESC ";
	$res=$db->query($sql);
	//echo "<option value="">select </option>";
	$i=0;
		while($r=$res->fetch_assoc())
		{
			$i++;
			echo "<tr><td>{$i}&nbsp&nbsp&nbsp&nbsp</td><td style='width:70px;'>{$r['QUESTIONS']}&nbsp&nbsp</td>
			<td>{$r['OP1']}</td>
			<td>{$r['OP2']}</td>
			<td>{$r['OP3']}</td>
			<td>{$r['OP4']}</td>
			<td>{$r['OP5']}</td>
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{$r['CORRECT_ANSWER']}</td>
			<td><a href='delExamque.php?id={$r["QIDA"]}' class='btnr'>Delete</a></td>
									
			</tr>";
		}
?>