<?php
include "database.php";
session_start();
if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
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
			<h3 id="heading"> ADD EXAM</h3>
			<div id="center">
			
			<?php
						if(isset($_POST["submit"]))
						{
						
							
							$sq="INSERT INTO `exam_tbl` (`EX_ID`, `COU_ID`, `EXTITLE`, `EX_TIME_LIMIT`, `EX_QUESTLIMIT_DISPLAY`, `EX_DESCRIPTION`, `EX_CREATED`) VALUES (NULL, '{$_POST["cla"]}', '{$_POST["examTitle"]}', '{$_POST["timeLimit"]}', '{$_POST["examQuestDipLimit"]}', '{$_POST["examDesc"]}', NOW())";
							if($db->query($sq))
							{
								echo "<div id='success' class='alert alert-success'>Insert Success</div>";
							}
							else
							{
								echo "<div id='error' class='alert alert-danger'>Insert Failed</div>";
							}
						}
					?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
			
			<label>Select Course</label>
					<select name="cla" required=""  class="form-control">
						<?php
							$sl="select * from coursetable";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Select Course</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["COURSE_ID"]}'>{$ro["COU_NAME"]}</option>";
								}
								
							}
						?>	
						
					</select>
					
					<label>Exam Time Limit</label>
						<select class="form-control" name="timeLimit" required="">
							<option value="0">Select time</option>
							<option value="10">10 Minutes</option> 
							<option value="20">20 Minutes</option> 
							<option value="30">30 Minutes</option> 
							<option value="40">40 Minutes</option> 
							<option value="50">50 Minutes</option> 
							<option value="60">60 Minutes</option>
							<option value="60">70 Minutes</option>
							<option value="60">80 Minutes</option>
							<option value="60">90 Minutes</option>
							<option value="60">100 Minutes</option>
							<option value="60">110 Minutes</option>
							<option value="60">120 Minutes</option>
						</select>
					
					<label>Question Limit to Display</label>
					<input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Input question limit to display">
					
					<label>Exam Title</label>
					<input type="" name="examTitle" class="form-control" placeholder="Input Exam Title" required="">
         
					<label>Exam Description</label>
					<textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
						<br><br>
						
						<button type="submit" class="btn btn-primary btn-block"  name="submit">ADD NOW</button>
				
			</form>
			</div>
			<script src="jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#adv1").fadeOut();
	$("#adv2").fadeOut();
	$("#adv3").fadeOut();
	$("#adv4").fadeOut();
	$("#adv5").fadeOut();
	$("#adv6").fadeOut();
	$("#adv7").fadeOut();
	$("#adv8").fadeOut();
	$("#adv9").fadeOut();
	$("#adv10").fadeOut();
	$("#adv11").fadeOut();
	$("#adv12").fadeOut();
	
			$("#mc").click(function(){
				if($("#adv1").is(":visible"))
				{
				$("#adv1").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv1").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#adv2").is(":visible"))
				{
				$("#adv2").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv2").fadeIn(1000);
				//$(this).val("Hide Para");
				}
			});
			
			$("#me").click(function(){
				if($("#adv3").is(":visible"))
				{
				$("#adv3").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv3").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#adv4").is(":visible"))
				{
				$("#adv4").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv4").fadeIn(1000);
				//$(this).val("Hide Para");
				}
			});
			
			$("#mex").click(function(){
				if($("#adv5").is(":visible"))
				{
				$("#adv5").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv5").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#adv6").is(":visible"))
				{
				$("#adv6").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv6").fadeIn(1000);
				//$(this).val("Hide Para");
				}
			});
			
			
			$("#rank").click(function(){
				if($("#adv7").is(":visible"))
				{
				$("#adv7").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv7").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				
			});
			
			
			$("#rep").click(function(){
				if($("#adv8").is(":visible"))
				{
				$("#adv8").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv8").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				
			});
			
			$("#feed").click(function(){
				if($("#adv9").is(":visible"))
				{
				$("#adv9").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv9").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				
			});
			$("#stu").click(function(){
				if($("#adv10").is(":visible"))
				{
				$("#adv10").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv10").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#adv11").is(":visible"))
				{
				$("#adv11").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv11").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#adv12").is(":visible"))
				{
				$("#adv12").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#adv12").fadeIn(1000);
				//$(this).val("Hide Para");
				}
			});
			

			
});
</script>

</script>

			
		</div>
		<div id="navi">
			<?php 
			include "adminSidebar.php";
			?>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>