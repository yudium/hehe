<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logske']==true) && ($_SESSION['userske']!="")){
	$idpeg=$_POST['idpeg'];

    $nama=$_POST['namabaru'];
	$sql4="UPDATE pegawai SET nama='$nama' WHERE id_pegawai='$idpeg'";
    $res4=mysqli_query($link,$sql4);
    $jabatan=$_POST['jabatanbaru'];
	$sql5="UPDATE pegawai SET jabatan='$jabatan' WHERE id_pegawai='$idpeg'";
    $res5=mysqli_query($link,$sql5);
    $gaji=$_POST['gajibaru'];
	$sql="UPDATE gaji SET gaji='$gaji' WHERE id_pegawai='$idpeg'";
    $res1=mysqli_query($link,$sql);
    echo mysqli_error($link);

                        //$sql7="INSERT INTO pegawai VALUES ('$idpeg','$nama','$jabatan')";
                        //$res7=mysqli_query($link,$sql7);
						
		//$sql2="INSERT INTO gaji VALUES ('$idpeg','$gaji')";
                        //$res2=mysqli_query($link,$sql2);
                        if($res4 && $res5 && $res1)			
						
						
	
    {
      echo "<script>alert('Data Berhasil Diubah');
                   document.location.href='pegawai.php';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>

