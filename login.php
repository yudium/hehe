<?php
    error_reporting(0);
    include("libfunc.php");
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $link=koneksidb();
    $sql="SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        $data=mysqli_fetch_array($res);
        $level=$data['level'];
        session_start();
        if($level=='direktur'){
            $_SESSION['useradm']=$data['username'];
            $_SESSION['idadm']=$data['id_pengguna'];
            $_SESSION['logadm']=true;
            header("Location: direktur/");
        }else if($level=='pelaksanakeuangan'){
            $_SESSION['userske']=$data['username'];
            $_SESSION['idske']=$data['id_pengguna'];
            $_SESSION['logske']=true;
            header("Location: pelaksanaadmkeuangan/");
        }else if($level=="penanggungjawabkeuangan"){
            $_SESSION['usermanke']=$data['username'];
            $_SESSION['idmanke']=$data['id_pengguna'];
            $_SESSION['logmanke']=true;
            header("Location: penanggungjawabadmkeuangan/");
        }else if($level=="admin"){
            $_SESSION['usercv']=$data['username'];
            $_SESSION['idmcv']=$data['id_pengguna'];
            $_SESSION['logcv']=true;
            header("Location: admincv/");
		}
    }else{
        galogin();
    }
?>