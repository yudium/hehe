<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logmanke']==true) && ($_SESSION['usermanke']!="")){
    $nama=$_POST['nama'];
    $kdjen=$_POST['frUKBfe'];
  	$sql3="UPDATE jenisanggaran SET jenisanggaran='$nama' WHERE kd_jenisanggaran='$kdjen'";
    $res3=mysqli_query($link,$sql3);
    if($res3){
      echo "<script>alert('Data Berhasil Diubah');
                   document.location.href='jenisanggaran';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>