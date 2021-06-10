<?php

session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
	//echo "KARTHIK";
}
$sqlquery="SELECT * FROM `exam_tbl`  WHERE EX_ID={$_POST['key']}";
$result=$db->query($sqlquery);
$i=0;
$arrvalue = array();
//$arrCount = array();
$selectoption = array();

$rr=$result->fetch_assoc();
$totalQ=$rr["EX_QUESTLIMIT_DISPLAY"];
//echo $totalQ."<br>"; 

if(isset($_POST["submit"]))
{
	
	$key=$_POST['key'];
	for($i=1;$i<=$totalQ;$i++)
	{
		
		$sum=0;
		//$selectoption[$i]=$_POST["op$i"][0];
		if(is_array($_POST["op$i"]))
		{
			$n=count($_POST["op$i"]);
			for($k=0;$k<$n;$k++)
			{
		   
		  
			  $sum=($sum*10)+$_POST["op$i"][$k];
		  
			}
	   //echo $sum."<br>";
	   $selectoption[$i]=$sum;
		  
			
		}
		else
		{
			$selectoption[$i]=$_POST["op$i"];
		}

		}
		print_r($selectoption);
	
	for($i=1;$i<=$totalQ;$i++)
	{
			echo $_SESSION['qid'][$i]."<br>";
	
	}
	
	
	for($j=1;$j<=$totalQ;$j++)
	{
		$Regquery="INSERT INTO `studentactivity`(`ACTID`, `SREG_NO`, `QUESTION_NO`, `SOPTION`, `EX_ID`) VALUES (NULL, '{$_SESSION["REGNO"]}', '{$_SESSION['qid'][$j]}', '{$selectoption[$j]}', '$key')";
	$db->query($Regquery);
	}
	
	header("LOCATION:examSheetPartB.php?&key=".$key);
 	 
	
}

?>