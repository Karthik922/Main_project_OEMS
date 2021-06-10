<?php
	include "database.php";
	$examName=$_POST['id'];
	//$examID=2;
	
							$s="SELECT * FROM `feedback` WHERE EXNAME='$examName'";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "<tr>";
									echo "<td>".$i."</td>";
									echo "<td>".$r["EXNAME"]."</td>";
										echo "<td>".$r["REG_NO"]."</td>";
										echo "<td>".$r["FEEDBACK"]."</td>";
										echo "<td>".$r["YOURQUALITY"]."</td>";
										echo "<td>".$r["FB_DATE"]."</td>";
										echo "</tr>";
										
								}
								
							}
							else
							{
								echo "No Record";
							}
						
						
						
						?>