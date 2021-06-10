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
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?></b>
					
					<?php
			if(isset($_POST["submit"]))
			{
				$sql="SELECT * FROM `examinee_tbl` WHERE EXMNE_PASSWORD='{$_POST["opass"]}' and EXMNE_ID='{$_SESSION["EXMNE_ID"]}'";
				$res=$db->query($sql);
				if($res->num_rows>0)
				{
					$s="update `examinee_tbl` set EXMNE_PASSWORD='{$_POST["npass"]}' where EXMNE_ID='{$_SESSION["EXMNE_ID"]}'";
					$db->query($s);
					echo "<div id='success' class='alert alert-success'>Password Changed</div>"; 
					
				}
				else
				{
					
					echo "<div id='error' class='alert alert-danger'>Invalid Password</div>";
							
				}
			}
			?>
			<h3 id="heading">Welcome <?php echo $_SESSION["NAME"];?></h3>
			<div id="center">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<label>Old Password</label>
				<input type="password" name="opass" required class="form-control">
				<br>
				<label>New Password</label>
				<input type="password" name="npass" required class="form-control">
				<br><br>
				<button type="submit" name="submit" class="btn btn-primary btn-block">Update Password</button>
				</form>
			</div>
			
			
			
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