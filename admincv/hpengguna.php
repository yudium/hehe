<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logske']==true) && ($_SESSION['userske']!="")){
  	$idpeng=base64_decode($_GET['KdedYDE']);
  	$sql3="DELETE FROM pengguna WHERE id_pengguna='$idpeng'";
    $res3=mysqli_query($link,$sql3);
    if($res3){
      echo "<script>alert('Data Berhasil Dihapus');
                  document.location.href='pengguna.php';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>