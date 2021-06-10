<!DOCTYPE html>
<html>
	<head>
	<title>SKK Creation</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<style>
.box > div{
	position:absolute;
}
h1{
	text-align:center;
}
</style>
	</head>
	<body>
	<h1></h1>
	<div id="container">
		<div id="header">
		<h1>Online Examination Management System</h1>
		</div>
		<div id="wrapper">
					
					
					
				
					<script src="jquery-3.4.1.min.js"></script>
<script>
	$(".box div:gt(0)").hide();
	setInterval(function(){
		$('.box div:first-child')
		.fadeOut()
		.next()
		.fadeIn()
		.end()
		.appendTo('.box');
	},2000);
</script>

			
		</div>
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