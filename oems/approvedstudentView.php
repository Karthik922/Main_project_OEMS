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
									echo "<td>".$i."</td>";
									$regg=$r["REGNO"];
										echo "<td>".$r["REGNO"]."</td>";
										echo "<td>".$r["NAME"]."</td>";
										$ssq="SELECT * FROM `approval` WHERE SREGNO=$regg";
							            $resqq=$db->query($ssq);
										$req=$resqq->fetch_assoc();
										$check=$req["STATUS"];
							             if(isset($check)){
										 echo "<td>".$req["STATUS"]."</td>"; }  
									     else{
										    echo "<td><b style='color:red;'>Not Approved</b></td>";
										 }
									     	 
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