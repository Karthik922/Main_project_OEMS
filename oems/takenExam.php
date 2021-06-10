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
			<h3 id="heading">Welcome <?php echo $_SESSION["NAME"];?></h3>
					<div id="boxx">
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					
						<h4 align="">Taken Exams</h4>
						
					
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
						
							</select><br><br>
							
							
							
					
			</form>
			</div><br><br>
			<table border="1px" class="" >
						<tr>
							<th style=" border-bottom: 1px solid #ddd;">S.No</th>
							<th style=" border-bottom: 1px solid #ddd;">Exam Title</th>
							<th style=" border-bottom: 1px solid #ddd;">Action</th>
							
							
						</tr>
					</table>
					<table border="1px" class="" id="viewTable" >

					</table>
			<script src="jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
	
			
		$("#course").change(function(){
						cid=$(this).val();
						//alert(cid);
						$.post("tknexam.php",{id:cid},function(data){
							$("#viewTable").html(data);
						});
				
					});
					
					
				
					
					
					
					
			
			
});
</script>

			
		</div>
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