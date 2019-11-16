<?php 
  include("libfunc.php");
  $link=koneksidb();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>PT. Halia Teknologi Nusantara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery-2.1.1.min.js"></script> 
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
</head>
<script type="text/javascript">
    function validate(){
      var error="";
      var email = document.getElementById( "email" );
      if( email.value == "" ){
        error = "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Lengkapi Form ! </div>";
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }else{
        return true;
      }
    }
  </script>
<body>  
<div class="login-page">
    <div class="login-main">    
       <div class="login-head">
        <h1>PT. Halia Teknologi Nusantara</h1>
      </div>
      <div class="login-block">
        <form method="post" action="" onsubmit="return validate();">
          <p><center>Masukan Email Yang telah Terdaftar Di Dalam Sistem</center></p>
          <br>
          <input type="email" name="email" class="form-control" placeholder="email" id="email">
          <div class="clearfix"> </div>
          <br>
          <input type="submit" name="submit" value="Kirim">  
          <br>
          <p id="error_para"></p>
        </form>
        <?php 
          if (isset($_POST["submit"])){
            $email=$_POST['email'];
            // echo $email;
            $sql="SELECT * FROM `pengguna` p INNER JOIN pegawai pg ON p.id_pegawai=pg.id_pegawai WHERE email='$email'";
            $res=mysqli_query($link,$sql);
            $ss=mysqli_num_rows($res);
            $data=mysqli_fetch_array($res);
            // echo $ss;
            if($ss!=0){
              $em=$data['email'];
              $nm=$data['nama'];
              $val=rand(263,1092);
              $baru=md5($val);
              $barudb=md5($baru);

              require 'PHPMailer/src/Exception.php';
              require 'PHPMailer/src/PHPMailer.php';
              require 'PHPMailer/src/SMTP.php';
              $mail = new PHPMailer(true);                        // Passing `true` enables exceptions
              try {
                  //Server settings                               // Enable verbose debug output
                  $mail->SMTPDebug = 2;
                  $mail->isSMTP();                                // Set mailer to use SMTP
                  $mail->Host = 'tatadimensi.com;103.7.226.212';           // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                         // Enable SMTP authentication
                  $mail->Username = "info@tatadimensi.com";       //User smtp 
                  $mail->Password = "tatadimensi";                // SMTP password
                  // $mail->SMTPSecure = 'tls';                      // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 587;                              // TCP port to connect to

                  //Recipients
                  $mail->setFrom('info@tatadimensi.com', 'Tata');
                  $mail->addAddress($em, $nm);

                  //Content
                  $mail->isHTML(true);                            // Set email format to HTML
                  $mail->Subject = 'Reset Password';
                  $mail->Body    = "Password Baru <br> Username : $data[username] <br> Password : $baru";
                  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                  $mail->send();

                  $sql1="UPDATE pengguna SET katasandi='$barudb' WHERE email='$email'";
                  $res1=mysqli_query($link,$sql1);

                  echo "<div class='alert alert-success alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Password Baru Telah Dikirim Ke Email Anda</div>
                        <div class='forgot'>
                          <a href='/tata/'>Login</a>
                        </div>
                        <div class='clearfix'> </div>";
              } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }
            }else{
              echo "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Email Tidak Ditemukan</div>";
            }
         
          }
         ?>
         
      </div>
      </div>
</div>
<div class="copyrights">
   <p><a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>  
<script src="js/scripts.js"></script>
<script src="js/bootstrap.js"> </script>
</body>
</html>