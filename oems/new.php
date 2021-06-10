<?php
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
			<h3 id="heading"> New User Registration </h3>
			<div id="center">
			<?php
			if(isset($_POST["submit"]))
			{
				$reg=$_POST["reg"];
				if(strlen($reg)==12)
		        {
					
					$email = $_POST["mail"];
                   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   $emailErr = "Invalid email format";
                    }
					else
					{
						$sql="SELECT REGNO FROM `student` WHERE REGNO='$reg'";
			            $result=$db->query($sql);
			            if($result->num_rows>0)
			            {
				        echo "<i style='color:red'> Your Register Number Aleady Registered Please go login...<i>";
				
			            }
						else{
							
							$sqll="INSERT INTO `student` (`ID`, `REGNO`, `NAME`, `DOB`, `EMAIL`, `CLG`, `DEP`) VALUES(NULL,'{$_POST["reg"]}','{$_POST["name"]}','{$_POST["bdate"]}','{$_POST["mail"]}','{$_POST["clg"]}','{$_POST["dep"]}')";
				
							if($db->query($sqll))
							{
							echo "<p class='alert alert-success'>User Registration Success</p>";
							}
							else
							{
							echo "<p class='alert alert-danger'>User Registration Not Success</p>";	
							}
						}
					
			    
					}				
			   }
			   else
			   {
				   echo "<i style='color:red'>Please Enter Register Number which has allow 12 Digit..<i> ";
		
			   }
		}
			?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="frm">
				<label>Register No</label>
				<input type="text" name="reg" id="regno" min="1" max="12" required class="form-control" autocomplete="off">
				<span id="feedback" style="margin:10px;"></span>
				<span id="feed" style="margin:10px;"></span><br>
				
				<label>Name </label>
				<input type="text" name="name" required class="form-control" autocomplete="off">
				
				<label>Birthdate</label>
                 <input type="date" name="bdate" id="" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
			
				<label>Email ID</label>
				<input type="mail" name="mail" id="email" required class="form-control" autocomplete="off">
				<i class="error" id="pass_err" style="color:red"></i>
			    
				<br>
				<label>College Name</label>
				<input type="text" name="clg" required class="form-control" autocomplete="off">
				
			<br><br>
				<select name="dep" required class="form-control">
				<option value="">Select</option>
				<option value="MCA">MCA</option>
				<option value="MECH">MECH</option>
				<option value="CSE">CSE</option>
				<option value="IT">IT</option>
				<option value="BTECH">BTECH</option>
				<option value="EEE">EEE</option>
				<option value="ECE">ECE</option>
				<option value="MTECH">MTECH</option>
				<option value="CIVIL">CIVIL</option>
				
				</select>

				<br><br>
				
				<button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">Register Now</button>
				</form>
			</div>
			
		</div>
		<script src="jquery-3.4.1.min.js"></script>
    <script>
 $(document).ready(function(){
	 
	 $("#email").bind("blur",IsEmail);
	 $("#regno").keyup(function(){
		 $.post("check_user.php",{name:frm.reg.value},function(data){
			 $("#feedback").html(data)
			 return false;
		 });
	 });
	 $("#regno").keypress(function(e){
				$("#log").html("Keycode :"+e.which);
				if(e.which!=8 && (e.which<48 || e.which>57))
				{
					$("#feed").html("<b style='color:red'>Digits Only</b>").show().fadeOut("slow");
					return false;
				}
			});
			
			
 });
  function IsEmail() {
	  //var email=$("#email").val();
 // var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  //if(!regex.test(email)) {
    //$("#pass_err").html("Email is Not Valid");
  //}else{
    //$("#pass_err").html(" ");
	//$("#pass_crr").html("Email is Valid");
  //}
  
  //var hasError = false;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var emailblockReg = /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)([\w-]+\.)+[\w-]{2,4})?$/;
 
    var emailaddressVal = $("#email").val();
    
 
    if(!emailReg.test(emailaddressVal)) {
      $("#pass_err").html("Email is Not Valid");
	  //hasError = true;
    }
	else
	{
	   $("#pass_err").html("Email Is Valid");
	
	}
    		
 
    //if(hasError == true) { return false; }
  
  
}
 
 </script>
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