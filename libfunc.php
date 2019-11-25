<?php
  function koneksidb(){
  $host = "localhost";
  $database = "cv";
  $user = "root";
  $password = "";
  $link=mysqli_connect($host,$user,$password);
  mysqli_select_db($link,$database);
  if(!$link)
    echo "Error : ".mysqli_error($link);
  return $link;
}
function login(){
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CV. Putra Rasmana</title>
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
      var username = document.getElementById( "username" );
      if( username.value == "" ){
        error = "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Error ! Change few things. </div>";
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var password = document.getElementById( "password" );
      if( password.value == ""){
        error = "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Username atau Password Salah </div>";
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
        <h1>CV. Putra Rasmana</h1>
      </div>
      <div class="login-block">
        <form method="post" action="login" onsubmit="return validate();">
          <input type="text" name="username" placeholder="Username" required="" autofocus="" id="username">
          <input type="password" name="password" class="lock" placeholder="Password" id="password">
          <div class="forgot">
            <a href="lupapassword">Lupa Password?</a>
          </div>
          <div class="clearfix"> </div>
          <br>
          <input type="submit" name="Sign In" value="Login">  
          <br>
          <p id="error_para"></p>
        </form>
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
<?php
}
function galogin(){
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CV. Putra Rasmana</title>
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
      var username = document.getElementById( "username" );
      if( username.value == "" ){
        error = "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Error ! Change few things. </div>";
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
        <h1>CV. Putra Rasmana</h1>
      </div>
      <div class="login-block">
        <form method="post" action="login.php" onsubmit="return validate();">
          <input type="text" name="username" placeholder="Username" required="" autofocus="" id="username">
          <input type="password" name="password" class="lock" placeholder="Password" id="password">
          <div class="forgot-top-grids"></a>
            <div class="clearfix"> </div>
          </div>
          <input type="submit" name="Sign In" value="Login">  
          <br>
          <p id="error_para"></p>
          <div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'> × </button>Username atau Password Salah </div>
        </form>
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
<?php
}
function masuk(){
?>

<?php
}
?>