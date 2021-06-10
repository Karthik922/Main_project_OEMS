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
			<h3 id="heading"> ADD EXAMINEE</h3>
			<div id="center">
			
			<?php
						if(isset($_POST["submit"]))
						{
						
							
							$sq="INSERT INTO `examinee_tbl` (`EXMNE_ID`, `EXMNE_FULLNAME`, `EXMNE_COURSE`, `EXMNE_GENDER`, `EXMNE_BIRTHDATE`, `EXMNE_YEAR_LEVEL`, `EXMNE_EMAIL`, `EXMNE_PASSWORD`, `EXMNE_STATUS`) VALUES (NULL, '{$_POST["fullname"]}', '{$_POST["cla"]}', '{$_POST["gender"]}', '{$_POST["bdate"]}', '{$_POST["year_level"]}', '{$_POST["email"]}', '{$_POST["password"]}', 'Active')";
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
			<label>Full Name</label>
            <input type="text" name="fullname" id="" class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
			<label>Birthdate</label>
            <input type="date" name="bdate" id="" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
			<label>Gender</label>
            <select class="form-control" name="gender" id="">
              <option value="0">Select gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
			
			<label>Select Course</label>
					<select name="cla" required class="form-control">
						<?php
							$sl="select * from coursetable";
							$r=$db->query($sl);
							if($r->num_rows>0)
							{
								echo 	"<option value=''>Select Course</option>";
								while($ro=$r->fetch_assoc())
								{
									echo "<option value='{$ro["COU_NAME"]}'>{$ro["COU_NAME"]}</option>";
								}
								
							}
						?>	
						
					</select>
					<label>Year Level</label>
            <select class="form-control" name="year_level" id="">
              <option value="0">Select year level</option>
              <option value="1st Year"> 1st Year</option>
              <option value="2nd Year">2nd Year</option>
              <option value="3rd Year">3rd Year</option>
              <option value="4th Year">4th Year</option>
            </select>
					<label>Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Input Email" autocomplete="off" required="">
			<label>Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Input Password" autocomplete="off" required="">
          
					<br><br>
					
						
						<button type="submit" class="btn btn-primary btn-block" name="submit">ADD NOW</button>
				
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
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>