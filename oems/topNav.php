<nav>
<?php
//session_start();
include "database.php";
$key=$_SESSION['passkey'];
$sqlq="SELECT * FROM `partbquestions` WHERE EXTITLE_ID=$key";
			if($ress=$db->query($sqlq))
			{
				$rq=$ress->fetch_assoc();
				$quID=$rq['QIDB'];
			}
			
?>

	
		
	<div id="navbar">
		<ul><li id="ins"><a href="#"><i class="glyphicon glyphicon-book" id=""></i>&nbsp Exam Portal</a>
	</li>
			<li><a href="examSheet.php"><i  class="glyphicon glyphicon-list-alt"></i>Part A</a></li>
			<li><a href="examSheetPartB.php?n=<?php echo $quID;?>&key=<?php echo $_SESSION['key']?>&code=1"><i  class="glyphicon glyphicon-list-alt"></i>Part B </a></li>
			<li id="feedback"><a href="#"><i class="fa fa-address-card"></i>Feed Back</a></li>
		
		</ul> 
	</div>
	</nav>