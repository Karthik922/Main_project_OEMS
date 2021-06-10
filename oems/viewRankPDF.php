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
	$exID=$_GET["exid"];
	$s="SELECT EXTITLE FROM exam_tbl WHERE EX_ID=$exID";
	$resq=$db->query($s);
	$rqq=$resq->fetch_assoc();
	$exname = $rqq["EXTITLE"];
	$pdf->cell(40,10,'Exam Name :',0,0,'L');
	$pdf->cell(40,10,$exname,0,1,'L');				
									

	
	$pdf->cell(60,10,'REGISTER NO',1,0,'C');
	$pdf->cell(60,10,'NAME',1,0,'C');
	
	$pdf->cell(60,10,'RANK',1,1,'C');
	
	$sql="SELECT * FROM `studentscore` WHERE EX_ID=$exID ORDER BY SCORE DESC";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$i=1;
		while($row=$res->fetch_assoc())
		{

			
			$pdf->cell(60,6,$row["REGNO"],1,0);
			$sqll="SELECT NAME FROM `student` WHERE REGNO={$row["REGNO"]}";
			$ress=$db->query($sqll);
			$ro=$ress->fetch_assoc();
			
			$pdf->cell(60,6,$ro["NAME"],1,0);
			$pdf->cell(60,6,$i++,1,1);
			
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