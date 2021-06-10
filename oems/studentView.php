<?php
	include "database.php";
	$department=$_POST['id'];
	//$examID=2;
	
							$s="SELECT * FROM `student`  WHERE DEP='$department'";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "<tr>";
									//echo "<td>".$i."</td>";
									echo "<td><input type='checkbox' id='reg'  name='id[]' value='{$r["REGNO"]}'></td><td>".$r["REGNO"]."</td>";
										
										echo "<td>".$r["NAME"]."</td>";
										//echo "<td>".$r["DOB"]."</td>";
										//echo "<td>".$r["EMAIL"]."</td>";
										//echo "<td>".$r["CLG"]."</td>";
									//	echo "<td>".$r["DEP"]."</td>";
										echo "</tr>";
										
								}
								
							}
							else
							{
								echo "No Record";
							}
						
						
						
						?>