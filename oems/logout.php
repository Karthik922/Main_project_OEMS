<?php 
session_start();
unset($_SESSION["AID"]);
unset($_SESSION["ID"]);

unset($_SESSION["EXMNE_ID"]);
unset($_SESSION["EXMNE_FULLNAME"]);
session_destroy();
header("location:index.php");
?>