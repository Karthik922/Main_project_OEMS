<?php
include "database.php";
								//return 1;
							
							//$regno=820318621012;
							//$examID=3;
							//$totqq=10;
							
							$questionArray = array();
							$optionArray = array();
							$quePartBArray = array();
							$optionPartBArray = array();
							
							$correctques = array();
							$correctOpti = array();
							$correcParttques = array();
							$correcParttOpti = array();
							
							
						    $scoreQuery="SELECT * FROM `studentactivity` WHERE SREG_NO=$regno AND EX_ID=$examID ORDER BY QUESTION_NO ASC";
							$res=$db->query($scoreQuery);
							$i=0;
							while($r=$res->fetch_assoc())
								{
									$i++;
									$questionArray[$i]=$r['QUESTION_NO'];
									$optionArray[$i]=$r['SOPTION'];
								}
							$scoreQuery2="SELECT * FROM `studentactivityb` WHERE REGNO=$regno AND EX_ID=$examID ORDER BY QUESTION_NO ASC";
							$res=$db->query($scoreQuery2);
							$s=0;
							while($r=$res->fetch_assoc())
								{
									$s++;
									$quePartBArray[$s]=$r['QUESTION_NO'];
									$optionPartBArray[$s]=$r['SOPTION'];
								}
								//$n=count($questionArray);
								//print_r($questionArray);
							
							$ori_lQuestion_id="SELECT * FROM `partaquestions` WHERE EXTITLE_ID=$examID ";
							$resq=$db->query($ori_lQuestion_id);
							$j=0;
							while($rr=$resq->fetch_assoc())
								{
									$j++;
									$correctques[$j]=$rr['QIDA'];
									$correctOpti[$j]=$rr['CORRECT_ANSWER'];
								}
								
							$partbQues_id="SELECT * FROM `partbquestions` WHERE EXTITLE_ID=$examID";
							$resq=$db->query($partbQues_id);
							$d=0;
							while($rr=$resq->fetch_assoc())
								{
									$d++;
									$correcParttques[$d]=$rr['QIDB'];
									$correcParttOpti[$d]=$rr['CORRECT_ANSWER'];
								}
								
								
								$nc=count($correctques);
								$n = count($questionArray);
								//$tmarka=$n;
								//return $n;
								$partaCount = 0;
								for($k=1;$k<=$nc;$k++)
								{
									for($i=1;$i<=$n;$i++)
									{
									if($questionArray[$i]==$correctques[$k]&&$optionArray[$i]==$correctOpti[$k])
									{
										
									$partaCount = $partaCount + 1;
										
									}
									}
								}
								$nb = count($quePartBArray);
								$ncb= count($correcParttques);
								//$tmarkb=$nb*2;
								$partbcount=0;
								for($k=1;$k<=$ncb;$k++)
								{
									for($i=1;$i<=$nb;$i++)
									{
									if($quePartBArray[$i]==$correcParttques[$k]&&$optionPartBArray[$i]==$correcParttOpti[$k])
									{

									$partbcount= $partbcount+2;
										
									}
									}
								}
								$tmark=($totqq*1)+($totqq*2);
								$totalCount = $partaCount + $partbcount;
								//print_r($questionArray);
								//echo "<br>";
								//print_r($optionArray);
								//echo "<br>";
								//print_r($quePartBArray);
								//echo "<br>";
								//print_r($optionPartBArray);
								//echo "<br>";
								//print_r($correctques);
								//echo "<br>";
								//print_r($correctOpti);
								//echo "<br>";
								//print_r($correcParttques);
								//echo "<br>";
								//print_r($correcParttOpti);
								//echo "<br>";
								//echo $tmark."<br>";
								//echo $totalCount; 
							$scoreQuery="INSERT INTO `studentscore` (`SID`, `REGNO`, `SCORE`,`TOTAL`,`EX_ID`, `LOG`,`TIME`) VALUES (NULL, '$regno', '$totalCount','$tmark','$examID', NOW(),NOW())";
								if($db->query($scoreQuery))
								{
									echo "score added";
								}
								else
								{
									echo "Not added";
								}
						//		return($totalCount);
								
								
							
						
							?>