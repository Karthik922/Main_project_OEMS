<?php
session_start();
include "database.php";
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
			<h3 id="heading">Welcome Admin</h3>
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
					
					<br><br>
					</div>
					<table>
						<tr><th>S.NO</th><th>EXAM NAME</th><th>REG_NO</th><th>FEEDBACK</th><th>QUALITY</th><th>DATE&TIME </th></tr>
			
					</table>
			<table id="state">
						
			</table>
			
			
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
			

			
			
			$("#exam").click(function(){
						cid=$(this).val();
						//alert(cid);
						$.post("feedbackView.php",{id:cid},function(data){
							$("#state").html(data);
						});
				
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