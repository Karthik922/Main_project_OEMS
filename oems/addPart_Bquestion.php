<?php
session_start();
include "database.php";

if(!isset($_SESSION["EXMNE_ID"]))
{
	header("location:flogin.php");
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
		
		
				<?php
						if(isset($_POST["submit"]))
						{
						
							
							$sq="INSERT INTO `partbquestions` (`QIDB`, `CU_ID`, `EXTITLE_ID`, `QUESTIONS`, `OP1`, `OP2`, `OP3`, `OP4`, `OP5`, `CORRECT_ANSWER`,`QTYPE`) VALUES (NULL, '{$_POST["cla"]}', '{$_POST["etle"]}', '{$_POST["examDesc"]}', '{$_POST["choice1"]}', '{$_POST["choice2"]}', '{$_POST["choice3"]}', '{$_POST["choice4"]}', '{$_POST["choice5"]}', '{$_POST["correct_choice"]}','{$_POST["radio"]}')";
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
				
				
				
			<h3 id="heading">Welcome <?php echo $_SESSION["EXMNE_FULLNAME"];?></h3>
			<div id="boxx">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<h4> Add Part B Questions</h4>
						<label>Select Course</label>
						<select name="cla" required="" id="course"   class="form-control">
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
					
					<label>Select Exam Title</label>
					<select id="state" required="" name="etle" class="form-control"><label>Select Exam</label>
					<option value="">Select</option>
					</select>
					<label>Enter Question</label>
					<textarea name="examDesc" class="form-control" rows="6" placeholder="Type Question here...." required=""></textarea>
					<label>Question Type</label>
					 <table><tr><td><input type="radio" name="radio" id="radio" value="Radio"> Radio Type</td><td>
					  <input type="radio" name="radio" id="check" value="Checkbox"> CheckBox Type</td></tr></table>
					<br>
					<label>Choice 1:</label>
							<input type="text" name="choice1" class="form-control" required="">
					<label>Choice 2:</label>
							<input type="text" name="choice2" class="form-control" required="">
					<label>Choice 3:</label>
							<input type="text" name="choice3" class="form-control" required="">
					<label>Choice 4:</label>
							<input type="text" name="choice4" class="form-control" required="">
					<label>Choice 5:</label>
							<input type="text" name="choice5" class="form-control" >		
					<label>Correct Option Number</label>
							<input type="number" name="correct_choice" min="0" max="1000" class="form-control">
							<br><br>
							<button type="submit" class="btn btn-primary btn-block" name="submit">ADD NOW</button>
				</form>
			</div>
			<script src="jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#ad1").fadeOut();
	$("#ad2").fadeOut();
	$("#vq1").fadeOut();
	$("#vq2").fadeOut();
	$("#ad3").fadeOut();
	$("#ad4").fadeOut();
	
			$("#mc").click(function(){
				if($("#ad1").is(":visible"))
				{
				$("#ad1").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#ad1").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				if($("#ad2").is(":visible"))
				{
				$("#ad2").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#ad2").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				
				
				if($("#ad3").is(":visible"))
				{
				$("#ad3").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#ad3").fadeIn(1000);
				//$(this).val("Hide Para");
				}
				
				if($("#ad4").is(":visible"))
				{
				$("#ad4").fadeOut(1000);
				//$(this).val("Show Para");
				}
				else
				{
				$("#ad4").fadeIn(1000);
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
			
			$("#course").change(function(){
						cid=$(this).val();
						//alert(cid);
						$.post("state.php",{id:cid},function(data){
							$("#state").html(data);
						});
				
					});
			
			
});
</script>

		</div>
		<div id="navi">
			<?php 
			include "fsidebar.php";
			?>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>