<?php
  session_start();
	include("../libfunc.php");
	include("libfunc.php");
	if(($_SESSION['logske']==true) && ($_SESSION['userske']!="")){
		mainskeu();
  }else{
  	header("Location: ../masuk.php");
  }
?>