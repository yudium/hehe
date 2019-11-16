<?php
  session_start();
	include("../libfunc.php");
	include("libfunc.php");
	if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
		mainmin();
  }else{
  	header("Location: ../masuk.php");
  }
?>