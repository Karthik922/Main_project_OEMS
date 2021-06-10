<?php
	include "database.php";
	$examID=$_POST['id'];
	//$examID=2;
	
							$s="SELECT * FROM `studentscore` WHERE EX_ID=$examID";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"<tr>
										<td>".$i."</td>
										<td>".$r["REGNO"]."</td>
										<td>";
										$sqll="SELECT NAME FROM `student` WHERE REGNO={$r["REGNO"]}";
												$ress=$db->query($sqll);
												$ro=$ress->fetch_assoc();
											echo $ro['NAME']."</td>";
										
										echo "<td>".$r["SCORE"]."/".$r["TOTAL"]."</td>";
										echo "</tr>";
										
								}
								echo "<tr><td colspan='4'><a href='viewSorePDF.php?exid=$examID'>View PDF</a></td></tr>";	
								
							}
							else
							{
								echo "No Record";
							}
						
						
						
						?>