<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
    $kdpos=$_POST['NSdeBK'];
    echo $kdpos;
  	$sql3="UPDATE anggaranperusahaan SET status='Y' WHERE kd_anggaranperusahaan='$kdpos'";
    $res3=mysqli_query($link,$sql3);
    if($res3){
      echo "<script>alert('Data Anggaran Biaya Telah Diverifikasi');
                   document.location.href='kanggaranbiaya';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>