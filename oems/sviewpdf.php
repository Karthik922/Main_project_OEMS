<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
}
?>
<html>
<head><title>PDF</title>
</head>
<body bgcolor="#00ffff">
<?php
	ob_start();
	require("fpdf182/fpdf.php");
	include "database.php";
	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage(); 
	$pdf->Image('logo.jpg',0,10,35,35,'JPG'); //location X Y W H JPG
	$pdf->SetFont('Arial','B',18);
	$pdf->SetTextColor(0,0,0);
	$pdf->cell(40,10,'                      A.V.C COLLEGE OF ENGINEERING',0,1,'L');
	$pdf->SetFont('Arial','I',10);
	$pdf->cell(60,10,'                                                       Approved  by AICTE, Affiliated to Anna University',0,1,'L');
	$pdf->cell(70,10,'                                                         Re-Accredited by  NAAC with  B++  Grade',0,1,'L');
	$pdf->cell(80,10,'                                                            An ISO 9001:2015 Certified Institution',0,1,'L');
	$pdf->Image('annalogo.jpg',165,10,35,35,'JPG'); //location X Y W H JPG
	$pdf->SetFont('Arial','B',11);
	$pdf->cell(40,10,'Online Examination Score Report',0,1,'L');
				
									

	$pdf->cell(35,10,'S.NO',1,0,'C');
	$pdf->cell(35,10,'REGISTER NO',1,0,'C');
	$pdf->cell(35,10,'NAME',1,0,'C');
	$pdf->cell(35,10,'EXAM NAME',1,0,'C');
	
	$pdf->cell(35,10,'SCORE',1,1,'C');
	
	$regno=$_SESSION["REGNO"];
	
	$s="SELECT * FROM `studentscore` WHERE REGNO='$regno' AND EX_ID={$_GET['key']}";
	$res=$db->query($s);
	if($res->num_rows>0)
	{
		$i=1;
		while($row=$res->fetch_assoc())
		{

			$pdf->cell(35,6,$i++,1,0);
			$pdf->cell(35,6,$row["REGNO"],1,0);
			$sqll="SELECT NAME FROM `student` WHERE REGNO={$row["REGNO"]}";
			$ress=$db->query($sqll);
			$ro=$ress->fetch_assoc();
			
			$pdf->cell(35,6,$ro["NAME"],1,0);
			$sqll="SELECT EXTITLE FROM `exam_tbl` WHERE EX_ID={$row["EX_ID"]}";
			$ress=$db->query($sqll);
			$r=$ress->fetch_assoc();
			//echo "<td>".$ro["EXTITLE"]."</td>";
			$pdf->cell(35,6,$r["EXTITLE"],1,0);
			
			$date = $row["LOG"];
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
												//echo "<td>".$r["SCORE"]."/".$r["TOTAL"]."</td>";
												$score=$row["SCORE"]."/".$row["TOTAL"];
												$pdf->cell(35,6,$score,1,1);
											}
											else
											{
												$pdf->cell(35,6,'Comming Soon..',1,1);
												//echo "<td><b style='color:red;'>Soon....</b></td>";
											}
										
			
		}
	}
	else
	{
		$pdf->cell(10,6,'No Records Found',1,0,'C');
		
	}
	
	
	
	$pdf->Output();
	ob_end_flush();

?>
</body>
</html>