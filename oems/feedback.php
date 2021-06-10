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
		<div id="wrapper">
		<b style="color:red;" align="center">
				<?php
				$exID=$_GET["exid"];
						if(isset($_POST["submit"]))
						{
						
							
							$sq="INSERT INTO `feedback` (`FID`, `EXNAME`, `REG_NO`, `FEEDBACK`, `YOURQUALITY`, `FB_DATE`) VALUES (NULL, '{$_POST["ename"]}', '{$_SESSION["REGNO"]}', '{$_POST["op"]}', '{$_POST["opp"]}', NOW())";
							if($db->query($sq))
							{
								header("location:ulogin.php");
							}
							else
							{
								echo "<div id='error' class='alert alert-danger'>Insert Failed</div>";
							}
						}
					?>
	</b>
					<div id="center">
					
					
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				
			<h3 id="heading">Welcome <?php echo $_SESSION["NAME"];?></h3>
			<label style="color:#2856D7;">Exam Name</label>
			<?php 
			$exID=$_GET["exid"];
	$s="SELECT EXTITLE FROM exam_tbl WHERE EX_ID=$exID";
	$resq=$db->query($s);
	$rqq=$resq->fetch_assoc();
	$exname = $rqq["EXTITLE"];
	
			?>
			<input type="text" name="ename" value="<?php echo $exname;?>" id="ename" class="form-control">
			<label style="color:#2856D7;">Click Your FeedBack</label>
				<br>	<!--<textarea name="feednack" class="form-control" rows="4" placeholder="Type feedback here...." required=""></textarea>-->
					<input type="radio" name="op" required value="Very Good" class="form-check-input"> Very Good <br>
					<input type="radio" name="op" required value="Good" class="form-check-input"> Good <br>
					<input type="radio" name="op" required value="Very Difficult" class="form-check-input"> Very Difficult <br>
					<input type="radio" name="op" required value="Bad" class="form-check-input"> Bad <br>
					<input type="radio" name="op" required value="Missing" class="form-check-input"> Missing <br>
			<label style="color:#2856D7;">Give Your Estimation for the Quality of this Exam</label>		
					<br><b>Overall Score</b>
					<input type="radio" name="opp" required value="Very Good" class="form-check-input"> Very Good <br>
					<input type="radio" name="opp" required value="Good " class="form-check-input"> Good <br>
					<input type="radio" name="opp" required value="Acceptable" class="form-check-input"> Acceptable<br>
					<input type="radio" name="opp" required value="Poor" class="form-check-input"> Poor<br>
					<input type="radio" name="opp" required value="Unacceptable" class="form-check-input"> Unacceptable <br>
		
					<br><br>		
					
					<button type="submit" name="submit" class="btn btn-primary btn-block">Submit </button>
				
			</form>
			</div>
			</div>
			<script src="jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#ad1").fadeOut();
	$("#ad2").fadeOut();
	$("#vq1").fadeOut();
	$("#vq2").fadeOut();
	
	
			$("#mc").click(function(){
				if($("#ad1").is(":visible"))
				{
				$("#ad1").fadeOut(2000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#ad1").fadeIn(2000);
				//$(this).val("Hide Para");
				}
				if($("#ad2").is(":visible"))
				{
				$("#ad2").fadeOut(2000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#ad2").fadeIn(2000);
				//$(this).val("Hide Para");
				}
			});
			
			
			$("#vq").click(function(){
				if($("#vq1").is(":visible"))
				{
				$("#vq1").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#vq1").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#vq2").is(":visible"))
				{
				$("#vq2").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#vq2").fadeIn(1000);
				//$(this).val("Hide Para");
				}
			});
			
			//$( "#ename" ).prop( "disabled", true );
			
			
});
</script>

		<div id="navi">
			<?php 
			include "userSidebar.php";
			?>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>