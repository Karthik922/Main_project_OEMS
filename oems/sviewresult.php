<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>SKK Creation</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
	<h1></h1>
	<div id="container">
		<div id="header">
		<h1>Online Examination Management System</h1>
		</div>
		<div id="navi">
			<?php 
			include "userSidebar.php";
			?>
		</div>
		<div id="wrapper">
		<b style="color:red;" align="center">
		</b>
			<h3 id="heading" >Welcome <?php echo $_SESSION["NAME"];?></h3>
			<table><tr><th>S.NO</th><th>REGISTER NO</th><th>NAME</th><th>EXAM NAME</th><th>SCORE</th><th>PDF</th></tr>
			<?php
	//include "database.php";
	//$examID=$_POST['id'];
	//$examID=2;
	$regno=$_SESSION["REGNO"];
	
							$s="SELECT * FROM `studentscore` WHERE REGNO='$regno'";
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
										$exids=$r["EX_ID"];
										$sqll="SELECT EXTITLE FROM `exam_tbl` WHERE EX_ID={$r["EX_ID"]}";
												$ress=$db->query($sqll);
												$ro=$ress->fetch_assoc();
										
										
										echo "<td>".$ro["EXTITLE"]."</td>";
										//echo "<td>".getdate($r["LOG"])."</td>";
										$date = $r["LOG"];
										$date = explode('-', $date);
										$year = $date[0];
										$month = $date[1];
										$date  = $date[2];
										$day=0;
										if(($date==31&&$month==1)||($date==31&&$month==3)||($date==31&&$month==5)||($date==31&&$month==7)&&($date==31&&$month==8)||($date==31&&$month==10)||($date==31&&$month==12))
										{
											$day=2;
										}
										else if($date==28&&$month==2)
										{
											$day=1;
										}
										else if(($date==30&&$month==4)||($date==30&&$month==6)||($date==30&&$month==9)||($date==30&&$month==11))
										{
											$day=2;
										}
										else
										{
											$day=$date+2;
										}
										$mydate=getdate(date("U"));
										//echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
											if($day<=$mydate['mday'])
											{
												//echo $day;
												echo "<td>".$r["SCORE"]."/".$r["TOTAL"]."</td>";
										
											}
											else
											{
												echo "<td><b style='color:red;'>Soon....</b></td>";
											}
										//echo "<td>".$day."</td>";
										echo "<td><a href='sviewpdf.php?key=".$exids."'>View PDF</a></td></tr>";
										
								}
								echo "<tr></tr>";	
								
							}
							else
							{
								echo "No Record";
							}
						
						
						
						?></table>
			
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>