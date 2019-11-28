<?php
  session_start();
  include("libfunc.php"); 
  error_reporting(E_ALL ^ (E_WARNING | E_NOTICE));  
  if(($_SESSION['logadm']==true) && ($_SESSION['idadm']!="")){
    header("Location: direktur/");
  }else if(($_SESSION['logske']==true) && ($_SESSION['idske']!="")){
    header("Location: penanggungjawabadmkeuangan/");
  }else if(($_SESSION['logmanke']==true) && ($_SESSION['idmanke']!="")){
    header("Location: pelaksanaadmkeuangan/");
  }else if(($_SESSION['logcv']==true) && ($_SESSION['idscv']!="")){
    header("Location: admincv/");
  }else{
    login();
  }
?>