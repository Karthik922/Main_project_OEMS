<?php
session_start();
include "database.php";
$nn=$_GET['key'];
$_SESSION['passkey']=$nn;

if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
}
$sregno = $_SESSION["REGNO"];
//echo $sregno;
$sqr="SELECT * FROM `studentscore` WHERE EX_ID=$nn AND REGNO=$sregno";
$resqr=$db->query($sqr);
if($resqr->num_rows>0)
{
	//echo '<script> alert("You Already wrote this Exam..."); </script>';
	header("location:uhome.php?mes=You Already wrote this Exam...");
	
}
$approve="SELECT * FROM `approval` WHERE SREGNO=$sregno";
$approvedQuery=$db->query($approve);
if($approvedQuery->num_rows>0==null)
{
	header("location:uhome.php?app=You Not Allow this Exam Please Contact Your Dean Or Faculty");
	
}	
$sqlq="SELECT * FROM `partbquestions` WHERE EXTITLE_ID=$nn";
			if($ress=$db->query($sqlq))
			{
				$rq=$ress->fetch_assoc();
				$quID=$rq['QIDB'];
			}
 if(time()-$_SESSION["login_time_stamp"] >1800)  
    {
        //session_unset();
        //session_destroy();
        header("LOCATION:examSheetPartB.php?n=".$quID."&key=".$nn."&code=1");
 	 	
    }
?>
<?php
			$sqlqq="SELECT * FROM `exam_tbl` WHERE EX_ID={$_GET['key']}";
			$resqq=$db->query($sqlqq);
			
			$rqq=$resqq->fetch_assoc();	
			$limit=$rqq["EX_QUESTLIMIT_DISPLAY"];
				?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam Portal</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
	#subtable
	{
		 margin-left: 400px;
		
	}
	table
	{
		font-family: Arial, Helvetica, sans-serif;
		 font-size: 16px;
		 font-weight: bold;
		 
		 
	}
	#demo
	{
		float:right;
	}
	
	
	</style>
	
	
	</head><!-- fontawesome.com
fontawesome cdn
fontawesome cheat sheet
-->
	<body>
	<form name="frm" method="post" action="process.php">
			<div class="banner">
				<?php include "topNav.php"; ?>
			</div>
			<div id="profile">
			<i style="color:#2e86c1;font-wight:bold;">Register No&nbsp&nbsp:&nbsp&nbsp&nbsp</i><?php 
			$sqll="SELECT REGNO,NAME FROM `student` WHERE ID={$_SESSION['ID']}";
			$ress=$db->query($sqll);
				if($ro=$ress->fetch_assoc())
				{
				echo "<b>".$ro['REGNO']."</b>";
		
				?><br>
			<i style="color:#2e86c1;font-wight:bold;">Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp&nbsp </i><?php echo "<b>".$ro['NAME']."</b>"; } ?>
			<br>
	<i style="color:#2e86c1;font-wight:bold;">Time&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp </i>
			<input type="hidden" id="timevalue" name="time" value="<?php echo $rqq['EX_TIME_LIMIT']; ?>">
	  <p id="demo" style="color:red;"></p>
			</div>
			<div id="container">
            <table border="1">
			<tr><th>Q.NO</th><th>Questions</th></tr>
			
			<?php
			 $num = $_GET['n'];
		
			$sql="SELECT * FROM `partaquestions` WHERE EXTITLE_ID={$_GET['key']} ORDER BY RAND() LIMIT $limit";
			$res=$db->query($sql);

			//$r=$res->fetch_assoc();
			$_SESSION['qid']=array();
			
			$i=0;
			while($r=$res->fetch_assoc())
				{
					$i++;
					$_SESSION['qid'][$i]=$r['QIDA'];
					$type=$r["QTYPE"];
					if($type=='Radio')
					{
				
				echo "<tr><td>".$i."</td>";
				echo "<input type='hidden' id='timevalue' name='time' value='".$r['QIDA']."'>";
				echo "<td>".$r['QUESTIONS']."</td></tr>";
				echo "<tr><td></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<table align='center' id='subtable'><tr><td>
				<input type='radio' name='op".$i."' required value='1' class='form-check-input'>&nbsp&nbsp <strong></td><td>".$r['OP1']."</strong></td></tr>";
				echo "<tr><td><input type='radio' name='op".$i."' required value='2' class='form-check-input'>&nbsp<strong></td><td>".$r['OP2']."</strong></td></tr>";
				echo "<tr><td><input type='radio' name='op".$i."' required value='3' class='form-check-input'>&nbsp<strong></td><td>".$r['OP3']."</strong> </td></tr>";
				echo "<tr><td><input type='radio' name='op".$i."' required value='4' class='form-check-input'>&nbsp<strong></td><td>".$r['OP4']."</strong> </td></tr>";
			   // $op5=$r['OP5'];
				if($r['OP5']!=null){	
				echo "<tr><td><input type='radio' name='op".$i."' required value='5' class='form-check-input'>&nbsp<strong></td><td>".$r['OP5']."</strong> </td></tr>";
				}echo "</table>";
				echo "</td></tr>";
				}
				else
				{
					echo "<tr><td>".$i."</td>";
					echo "<input type='hidden' id='timevalue' name='time' value='".$r['QIDA']."'>";
				    echo "<td>".$r['QUESTIONS']."</td></tr>";
					echo "<tr><td></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<table align='center' id='subtable'><tr><td>
				<input type='checkbox' name='op".$i."[]'  value='1' class='form-check-input'>&nbsp&nbsp <strong></td><td>".$r['OP1']."</strong></td></tr>";
				echo "<tr><td><input type='checkbox' name='op".$i."[]'  value='2' class='form-check-input'>&nbsp<strong></td><td>".$r['OP2']."</strong></td></tr>";
				echo "<tr><td><input type='checkbox' name='op".$i."[]'  value='3' class='form-check-input'>&nbsp<strong></td><td>".$r['OP3']."</strong> </td></tr>";
				echo "<tr><td><input type='checkbox' name='op".$i."[]'  value='4' class='form-check-input'>&nbsp<strong></td><td>".$r['OP4']."</strong> </td></tr>";
			   if($r['OP5']!=null){	
				echo "<tr><td><input type='Checkbox' name='op".$i."[]' value='5' class='form-check-input'>&nbsp<strong></td><td>".$r['OP5']."</strong> </td></tr>";
				}echo "</table>";
				echo "</td></tr>";
				
				
				}
				}
			?>
			</table>
			
			</div>
			
		
			
		<div id="fooder">
		 <input type="hidden" id="code" name="code" value="<?php echo $_GET['code']; ?>">
	    <input type="hidden" id="key" name="key" value="<?php echo $_GET['key']; ?>">
		<input type="hidden" id="num" name="num" value="<?php echo $num ?>">	
	 
	   <input type="reset" id="clearbtn" name="clear" class="button" value="Clear">
	   <button class="button" id="lastbtn" name="submit">Save & Next</button>
		</div>
	</form>
	
	
	<script src="jquery-3.4.1.min.js"></script>
	<script>
	var time = 	document.getElementById("timevalue").value;
	//alert(time);
		var timer2 = (time/2)+":01";
 var interval = setInterval(function() {


  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('#demo').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
  if(minutes<0){
		alert("Time Up on this question");
  alert("Each Question 3mins Only , Please click fast");
  window.open('examSheetPartB.php','_self');
  }
 
}, 1000);
//alert(minutes);

	
	$(document).ready(function(){
		
		$("#ins").click(function(){
				alert("General information:1.The examination will comprise of Objective type Multiple Choice Questions (MCQs) 2.All questions are compulsory and each carries One mark. 3.The total number of questions, duration of examination, willbe different based on thecourse, the detail is available on your screen.4.The Subjects or topics covered in the exam will be as per the Syllabus.5.There will be NO NEGATIVE MARKING for the wrong answers.");
				alert("Information & Instructions:1.The examination does not require using any paper, pen, pencil and calculator.2.Every student will take the examination on a Laptop/Desktop/Smart Phone3.On computer screen every studentwill be given objective type type Multiple Choice Questions (MCQs).4.Each  student  will  get  questions  and  answers  in  different  order  selected  randomly from a fixed Question Databank.5.The  students  just  need  to  click  on  the  Right  Choice  /  Correct  option  from  the multiple choices /options given with each question. For Multiple Choice Questions, each  question  has  four  options,  and  the  candidate  has  to  click  the  appropriate option.");
			});
		$("#feedback").click(function(){
				alert("You Click All Questions after automatically open feedback window, Then Enter Your Feedback");
				});	
	
	var array = []; 
		$('input:checked').each(function(){
			array.push($(this).val());
			});
			
		$("#lastbtn").click(function(){
				
				});	
		
			
	
	});
	</script>
	</body>
</html>