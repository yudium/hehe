<?php
	session_start();
  ob_start();
  date_default_timezone_set('Asia/Jakarta');
  include("libfunc.php");
  include("../libfunc.php");
  $tanggal=date("Y-m-d H:i:s");
  $link=koneksidb();
  if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
  	$kdpend=base64_decode($_GET['BYEWdwU']);

  	$sql1="SELECT * FROM pendapatan WHERE kd_pendapatan='$kdpend'";
    $res1=mysqli_query($link,$sql1);
    $i=1;
    $data1=mysqli_fetch_array($res1);

  	$sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
    $res=mysqli_query($link,$sql);
    $data=mysqli_fetch_array($res);

    $kode="TD".($data['kode']+1);
    $saldo=$data['saldo']+$data1['jumlahpendapatan'];
    // echo $kode;
    $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$data1[keterangan]','$data1[jumlahpendapatan]','0','$saldo','RK04','$data1[kd_pendapatan]')";
    $ress=mysqli_query($link,$sqll);

		$sqlll="UPDATE pendapatan SET tanggaldisetujui='$tanggal' WHERE kd_pendapatan='$data1[kd_pendapatan]'";
    $resss=mysqli_query($link,$sqlll);
    echo "<script>alert('Pendapatan Berhasil Disetujui');
                  document.location.href='kpendapatan.php';</script>";

  }else{
    header("Location: ../masuk.php");
	}
?>


