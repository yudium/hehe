<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
  	$anggaranbaru=$_POST['jumbaru'];
    $kdrek=$_POST['Ddrbfe'];
    $kdpos=$_POST['NSdeBK'];
    if($anggaranbaru!=""){
      // echo $anggaranbaru." ".$kdrek." ".$kdpos; 
    	$sql3="UPDATE detilanggaran SET jumlahanggaranperusahaan='$anggaranbaru' WHERE kd_anggaranperusahaan='$kdpos' AND kd_jenisanggaran='$kdrek'";
      $res3=mysqli_query($link,$sql3);
      if($res3){
        echo "<script>alert('Data Berhasil Diubah');
                     document.location.href='kbebanbiaya';</script>";
      }
    }else{
      echo "<script>alert('Masukan Nilai Baru');
                     document.location.href='kbebanbiaya';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>