<?php
  session_start();
	include("../libfunc.php");
	include("libfunc.php");
	if(($_SESSION['logcv']==true) && ($_SESSION['usercv']!="")){
		maincv();
  }else{
  	header("Location: ../masuk.php");
  }
?>