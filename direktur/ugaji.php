<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
  	$gajibaru=$_POST['gajibaru'];
    $idpeg=$_POST['gfIfyneru'];
    if($gajibaru!=""){
      // echo $anggaranbaru." ".$kdrek." ".$kdpos; 
    	$sql3="UPDATE gaji SET gaji='$gajibaru' WHERE id_pegawai='$idpeg'";
      $res3=mysqli_query($link,$sql3);
      if($res3){
        echo "<script>alert('Data Berhasil Diubah');
                     document.location.href='pegawai';</script>";
      }
    }else{
      echo "<script>alert('Masukan Nilai Baru');
                     document.location.href='pegawai';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>