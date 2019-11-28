<?php
function headcv(){
	$iduser=$_SESSION['idmcv'];
	$link=koneksidb();
	$sql="SELECT * FROM pengguna pg INNER JOIN pegawai p ON pg.id_pegawai=p.id_pegawai WHERE id_pengguna='$iduser'";
	$res=mysqli_query($link,$sql);
	$data=mysqli_fetch_array($res);
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!--js-->
	<script src="../js/jquery-2.1.1.min.js"></script> 
	<!--icons-css-->
	<link href="../css/font-awesome.css" rel="stylesheet"> 
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
	<!--static chart-->
	<script src="../js/Chart.min.js"></script>
	<!--//charts-->
	<!--skycons-icons-->
	<script src="../js/skycons.js"></script>
	<!--//skycons-icons-->
</head>
<body>	
	<div class="page-container">	
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<div class="header-main">
					<div class="header-left">
						<div class="logo-name">
							<a href="index"> 
								<h1>Sistem Informasi Manajemen Keuangan</h1>
									<h1> CV. Putra Rasmana</h1></a>

							</div>

							<div class="clearfix"> </div>
						</div>
						<div class="header-right">
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<!-- <span class="prfil-img"><img src="images/p1.png" alt=""> </span>  -->
												<div class="user-name">
													<p><?php echo $data['nama'];?></p>
													<span><?php echo $data['level'];?></span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="ukatasandi"><i class="fa fa-cog"></i>Ubah Kata Sandi</a> </li>
											<li> <a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
						<div class="clearfix"> </div>	
					</div>
					<!--heder end here-->
					<!-- script-for sticky-nav -->
					<script>
						$(document).ready(function() {
							var navoffeset=$(".header-main").offset().top;
							$(window).scroll(function(){
								var scrollpos=$(window).scrollTop(); 
								if(scrollpos >=navoffeset){
									$(".header-main").addClass("fixed");
								}else{
									$(".header-main").removeClass("fixed");
								}
							});

						});
					</script>
					<!-- /script-for sticky-nav -->
			<?php
		}
		function sidecv(){
			?>
			<div class="sidebar-menu">
				<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				</a> </div>		  
				<div class="menu">
					<ul id="menu" >
						<li id="menu-home" ><a href="index"><span>Home</span></a></li>
						<li><a href="pengguna.php"><span>Pengguna</span></a></li>
						<li><a href="pegawai.php"><span>Pegawai</span></a></li>
						
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--slide bar menu end here-->
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function() {                
				if (toggle)
				{
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({"position":"absolute"});
				}
				else
				{
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({"position":"relative"});
					}, 400);
				}               
				toggle = !toggle;
			});
		</script>
		<!--scrolling js-->
		<!-- <script src="js/jquery.nicescroll.js"></script> -->
		<script src="../js/scripts.js"></script>
		<!--//scrolling js-->
		<script src="../js/bootstrap.js"> </script>
		<!-- mother grid end here-->
	</body>
	</html>                     
			<?php
		}
		function maincv(){
			headcv();
			$link=koneksidb();
	?>
	<!--inner block start here-->
	<div class="inner-block">
		<div class="table-agile-info">
			<div class="panel panel-default">
        <div class="chit-chat-heading">
        Pegawai
        </div>   
        <br>         
        <div class="horizontal-tab">
          <ul class="nav nav-tabs">
        
            
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="width:20px;"><center>No</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Jabatan</center></th>
                          <th><center>Gaji Pokok</center></th>
                       
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql1="SELECT * FROM pegawai p INNER JOIN gaji g ON p.id_pegawai=g.id_pegawai";
                        $res1=mysqli_query($link,$sql1);
                        $i=1;
                        while($data1=mysqli_fetch_array($res1)){
                          ?>
                          <tr>
                            <td><center><?php echo $i;?></center></td>
                            <td><center><?php echo strtoupper($data1['nama']);?></center></td>
                            <td><center><?php echo strtoupper($data1['jabatan']);?></center></td>
                            <td><center>
                              <?php echo "Rp ".strtoupper(number_format($data1['gaji']));?>
                            </center></td>
                            <td><center>
							
                               </center></td>
                          </tr>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModala<?php echo $i;?>" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><center>Ubah Data pegawai - <?php echo strtoupper($data1['nama']);?></center></h4>
                                </div>

                                <form method="post" action="upegawai.php">
                                  <div class="modal-body">
                                    <input type="hidden" name="idpeg" id="idpeg">
                                    <!-- <input class="form-control" name="nama" id="disabledInput" type="text" placeholder="<?php echo strtoupper($data1['username']);?>" disabled> -->
                                    <input type="text" name="namabaru" class="form-control" value="<?php echo ($data1['nama']);?>" name="gfIfyneru">
									<input type="text" name="jabatanbaru" class="form-control" value="<?php echo ($data1['jabatan']);?>" name="gfIfyneru">
									<input type="number" name="gajibaru" class="form-control" value="<?php echo $data1['gaji']; ?>">
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                    <button class="btn btn-theme" type="submit">Simpan</button>
                                  </div>     
                                </form>
                              </div>
                            </div>
                          </div>
                          <?php
                          $i++;
                        }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
							</tbody>
						</table>
					</center>
				</div>
			</div>
		</div>
	</div>
	<!--inner block end here-->
	<!--copy rights start here-->
	<div class="copyrights">
		<p>© Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	</div>	
	<!--COPY rights end here-->
</div>
</div>
<?php
sidecv();
}
?>