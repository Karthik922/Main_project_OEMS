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
			<div id="center">
			<label>Select Exam</label>
						<select name="cla" required="" id="exam"  class="form-control">
							<?php
							$sl="SELECT * FROM `exam_tbl`";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value='0'>Select Exam Name</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["EXTITLE"]}'>{$ro["EXTITLE"]}</option>";
								}
								
							}
						?>	
						
					</select>
					</div>
					<br><br>
					<table>
						<tr><th>S.NO</th><th>EXAM NAME</th><th>REG_NO</th><th>FEEDBACK</th><th>QUALITY</th><th>DATE&TIME </th></tr>
			
					</table>
			<table id="state">
						
			</table>
			
			
			
			
			
			
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
			$("#exam").click(function(){
						cid=$(this).val();
						//alert(cid);
						$.post("feedbackView.php",{id:cid},function(data){
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
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>