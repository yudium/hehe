<?php
	session_start();
  ob_start();
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
  	$user=$_POST['dasdajhde'];
    $passs=$_POST['password'];
    if($passs!=""){
    $pass=md5($passs);
    // echo $user." ".$pass; 
  	$sql3="UPDATE pengguna SET password='$pass' WHERE username='$user'";
    $res3=mysqli_query($link,$sql3);
    echo "<script>alert('Data Password Berhasil Direset');
                 document.location.href='pengguna.php';</script>";
    }else{
      echo "<script>alert('Masukan Password Default');
                  document.location.href='pengguna.php';</script>";
    }
  }else{
    header("Location: ../masuk.php");
	}
?>