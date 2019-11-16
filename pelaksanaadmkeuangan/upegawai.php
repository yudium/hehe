<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logske']==true) && ($_SESSION['userske']!="")){
    $nama=$_POST['nama'];
	$sql4="UPDATE nama SET nama='$nama' WHERE nama='$nama'";
    $jabatan=$_POST['jabatan'];
    $gaji=$_POST['gaji'];
	$sql="UPDATE gaji SET gaji='$gaji' WHERE gaji='$gaji'";
    $res1=mysqli_query($link,$sql4);
	
	
	$idpeg="pp".($data4['nilai']+1);
                        $sql7="INSERT INTO pegawai VALUES ('$idpeg','$nama','$jabatan')";
                        $res7=mysqli_query($link,$sql7);
						
		$sql2="INSERT INTO gaji VALUES ('$idpeg','$gaji')";
                        $res2=mysqli_query($link,$sql2);
                        if($res7 && $res2)			
						
						
	
    {
      echo "<script>alert('Data Berhasil Diubah');
                   document.location.href='pegawai';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>

