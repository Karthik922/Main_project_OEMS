<?php
session_start();
include "database.php";

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
			<h3 id="heading">Faculty Login Here.</h3>
			<div id="center">
			<?php
				if(isset($_POST["submit"]))
				{
					$sql="SELECT * FROM examinee_tbl WHERE EXMNE_EMAIL='{$_POST["email"]}' and EXMNE_PASSWORD='{$_POST["fpass"]}'";
						$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$row=$res->fetch_assoc();
						$_SESSION["EXMNE_ID"]=$row["EXMNE_ID"];
						$_SESSION["EXMNE_FULLNAME"]=$row["EXMNE_FULLNAME"];
						header("location:fhome.php");
					}
					else
					{
						echo "<p class='error'>Invalid User Details</p>";
					}
				}
			?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<label>Email</label>
					<input type="email" name="email" class="form-control" required>
					<label>Password</label>
					<input type="password" name="fpass" class="form-control" required><br><br>
					<button type="submit" name="submit" class="btn btn-primary btn-block">Login Now</button>
				</form>
			</div>
		</div>
		<div id="navi">
			<?php 
			include "sideBar.php";
			?>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>