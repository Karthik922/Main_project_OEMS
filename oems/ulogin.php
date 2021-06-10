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
			<h3 id="heading">Student Login Here.</h3>
			<div id="center">
			<?php
				if(isset($_POST["submit"]))
				{
					$sql="SELECT * FROM student WHERE REGNO='{$_POST["reg"]}' and DOB='{$_POST["bdate"]}'";
						$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$row=$res->fetch_assoc();
						$_SESSION["ID"]=$row["ID"];
						$_SESSION["REGNO"]=$row["REGNO"];
						$_SESSION["NAME"]=$row["NAME"];
						$_SESSION["login_time_stamp"] = time(); 
						header("location:uhome.php");
					}
					else
					{
						echo "<p class='error' style='color:red;'>Invalid User Details</p>";
					}
				}
			?>
				<form action="ulogin.php" method="post" name="frm">
					<label>Register No</label>
					<input type="text" name="reg" id="regno" required class="form-control"autocomplete="off">
				<span id="feedback" style="margin:10px;"></span><br>
					<label>Birthdate</label>
                 <input type="text" name="bdate" id="" class="form-control" placeholder="Eg  YYYY-MM-D" autocomplete="off" required>
			
					<br><br>
					
					<button type="submit" name="submit" class="btn btn-primary btn-block">Login Now</button>
						<br><br><br><br><br><br><br><br><br><br><br><br>
				</form>
			</div>
		</div><script src="jquery-3.4.1.min.js"></script>
    <script>
 $(document).ready(function(){
	 
	
	 $("#regno").keyup(function(){
		 $.post("check_user1.php",{name:frm.reg.value},function(data){
			 $("#feedback").html(data)
		 });
	 });
 });
  
 
 </script>
		<div id="navi">
			<?php 
			include "sideBar.php";
			?>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="footer">
		<p>Copyright &copy; Karthik 2021</p>
		</div>
	</div>
	</body>
</html>