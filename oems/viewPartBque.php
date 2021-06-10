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
		
		
			<h3 id="heading">Welcome <?php echo $_SESSION["EXMNE_FULLNAME"];?></h3>
			<div id="boxx">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<br>
					<h4 align="center"> View Part B Questions</h4>
					<h3> </h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div id='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<label>Select Course</label>
						<select name="cla" id="course" required=""  class="form-control">
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
					
					<label></label>
					<select id="state" required=""  class="form-control"><label>Select Exam</label>
					<option value="">Select</option>
					</select>
					<br><br>
					
				
				
				
				
			
					
					
					
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
					
					
				$("#state").click(function(){
						cuid=$("#course").val();
						eid=$(this).val();
						
						//alert(cuid);
						//alert(eid);
						$.post("viewBques.php",{id:cuid,ie:eid},function(data){
							$("#viewTable").html(data);
						});
				
					});
					
					
					
					
			
			
});
</script>

		</div>
		
		<div id="navi">
			<?php 
			include "fsidebar.php";
			?>
		</div>
		<div id="tblbox">
			<table border="1px" class="">
						<tr>
							<th>S.No</th>
							<th>Questions</th>
							<th>Option1</th>
							<th>Option2</th>
							<th>Option3</th>
							<th>Option4</th>
							<th>Option5</th>
							<th>Correct Answer</th>
							<th>Action</th>
						</tr>
					</table>
					<table border="1px" class="" id="viewTable">

					</table>
					
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>