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
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
	
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
			<?php
						if(isset($_GET["mes"]))
						{
							echo"<div style='color:red'>{$_GET["mes"]}</div>";	
						}
					
					?>
				<form class="form-horizontal" action="excelBfunctions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                 
				<h4> Add Part B Questions</h4>
					<label>Select Course</label>
						<select name="cla" required="" id="course"  class="form-control">
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
					<fieldset>
                        <!-- Form Name -->
                        <legend>Form Name</legend>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-12">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-12">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                    </fieldset>
				</div>	
					
					
			</form>
			
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
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>