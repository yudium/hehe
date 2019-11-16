<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logske']==true) && ($_SESSION['userske']!="")){
  	$idpeg=base64_decode($_GET['SDEdwdw']);
    //echo $idpeg;
  	$sql3="DELETE FROM gaji WHERE id_pegawai='$idpeg'";
    $res3=mysqli_query($link,$sql3);
    if($res3){
      echo "<script>alert('Data Berhasil Dihapus');
                  document.location.href='pegawai.php';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>