<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logmanke']==true) && ($_SESSION['usermanke']!="")){
  	$kdjen=base64_decode($_GET['fdwDWWD']);
  	$sql3="DELETE FROM jenisanggaran WHERE kd_jenisanggaran='$kdjen'";
    $res3=mysqli_query($link,$sql3);
    echo "<script>alert('Data Berhasil Dihapus');
            document.location.href='jenisanggaran';</script>";
  }else{
    header("location:..\loginfirst.php");
	}
?>