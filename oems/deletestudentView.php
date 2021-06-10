<?php
	include "database.php";
	$department=$_POST['id'];
	//$examID=2;
	
							$s="SELECT * FROM `approval`  WHERE DEP='$department'";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "<tr>";
									echo "<td>".$i."</td>";
									//$regg=$r["REGNO"];
										echo "<td>".$r["SREGNO"]."</td>";
										echo "<td>".$r["DEP"]."</td>";
										
										echo "<td>".$r["STATUS"]."</td>";
									echo "<td><a href='delApproved.php?id={$r["SREGNO"]}' class='btnr'>Delete</a></td>";
								
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