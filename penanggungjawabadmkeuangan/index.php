<?php
  session_start();
	include("../libfunc.php");
	include("libfunc.php");
	if(($_SESSION['logmanke']==true) && ($_SESSION['usermanke']!="")){
		mainmanke();
  }else{
  	header("Location: ../masuk.php");
  }
?>