<?php
function headmanke(){
	$iduser=$_SESSION['idmanke'];
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

		<!-- bootstrap-css -->
		<link rel="stylesheet" href="../csss/bootstrap.min.css" >
		<!-- //bootstrap-css -->
		<!-- Custom CSS -->
		<!-- <link href="../csss/style.css" rel='stylesheet' type='text/css' /> -->
		<!-- <link href="../csss/style-responsive.css" rel="stylesheet"/> -->
		<!-- font CSS -->
		<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
		<!-- font-awesome icons -->
		<link rel="stylesheet" href="../csss/font.css" type="text/css"/>
		<link href="../csss/font-awesome.css" rel="stylesheet"> 
		<link rel="stylesheet" href="../csss/morris.css" type="text/css"/>
		<!-- calendar -->
		<link rel="stylesheet" href="../csss/monthly.css">
		<!-- //calendar -->
		<!-- //font-awesome icons -->
		<script src="../jss/jquery2.0.3.min.js"></script>
		<script src="../jss/raphael-min.js"></script>
		<script src="../jss/morris.js"></script>


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
									<h1><marquee> CV. Putra Rasmana</marquee></h1>
									</a>

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
												<li> <a href="ukatasandi"><i class="fa fa-cog"></i> Ubah Kata Sandi</a> </li>
												<li> <a href="../logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
					function sidemanke(){
						?>
						<div class="sidebar-menu">
							<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
								<!--<img id="logo" src="" alt="Logo"/>--> 
							</a> </div>		  
							<div class="menu">
								<ul id="menu" >
									<li id="menu-home"><a href="index"><i class="fa fa-home"></i><span>Home</span></a></li>
									<li><a href="monitoringtransaksi"><i class="fa fa-usd"></i><span>Monitoring Transaksi</span></a></li>
									<li><a href="pendapatan"><i class="fa fa-usd"></i><span>Pendapatan</span></a></li>
									<li><a href="#"><i class="fa fa-database"></i><span>Data Gaji</span><span class="fa fa-angle-right" style="float: right"></span></a>
										<ul>
											<li><a href="penggajian">Kelola Data Gaji</a></li>
											<li><a href="lapgaji">Laporan Data Gaji</a></li>		            
										</ul>
									</li>
									<li><a href="#"><i class="fa fa-file"></i><span>Anggaran Biaya Perusahaan</span><span class="fa fa-angle-right" style="float: right"></span></a>
										<ul>
											<li><a href="monitoring">Monitoring</a></li>
											<li><a href="rbperusahaan">Rencana Anggaran Biaya Perusahaan</a></li>		            
										</ul>
									</li>
									<li><a href="jenisanggaran"><i class="fa fa-database"></i><span>Kelola Anggaran</span></a></li>
									<li><a href="jurnalumum"><i class="fa fa-file-text"></i><span>Laporan Jurnal Umum</span></a></li>
									<li><a href="bukubesar"><i class="fa fa-book"></i><span>Laporan Buku Besar</span></a></li>
									<li><a href="trugilaba"><i class="fa fa-file-text"></i><span>Laporan Rugi Laba</span></a></li>
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
function mainmanke(){
	headmanke();
	$link=koneksidb();
	?>
	<!--inner block start here-->
	<div class="inner-block">
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="chit-chat-heading">
				Anggaran Biaya Tahun 2018
        </div>
        <br>
			<div class="">
				<?php
					$sql1="SELECT *, SUM(jumlahpendapatan) AS total, SUBSTR(tanggal,1,4) AS tahun FROM pendapatan WHERE kd_pendapatan LIKE '%PDP%' AND kd_pendapatan!='PDP00000' AND SUBSTR(tanggal,1,4)!='2018' GROUP BY SUBSTR(tanggal,1,4)";
					$res1=mysqli_query($link,$sql1);
					$data1=mysqli_fetch_array($res1);  
		  
					$sql7="SELECT SUM(kredit) AS total FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$data1[tahun]%' AND k.kd_jenisanggaran!='RK04' GROUP BY SUBSTR(k.kd_jenisanggaran,1,2)";
					$res7=mysqli_query($link,$sql7);
					$data7=mysqli_fetch_array($res7);

					$sql4="SELECT SUM(kredit) AS pajak, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$data1[tahun]%' AND k.kd_jenisanggaran!='RK13' GROUP BY k.kd_jenisanggaran";
					$res4=mysqli_query($link,$sql4);
					$data4=mysqli_fetch_array($res4);

					$laba=$data1['total']-$data7['total']-$data4['pajak'];
				?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="width:20px;"><center>No</center></th>
								<th><center>Pos Anggaran</center></th>
								<th><center>Rencana Pos Anggaran</center></th>
								<th><center>Omset 2017</center></th>
								<th><center>Persentase</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql1="SELECT * FROM anggaranperusahaan p INNER JOIN detailanggaran d ON p.kd_anggaranperusahaan=d.kd_anggaranperusahaan INNER JOIN jenisanggaran j ON d.kd_jenisanggaran=j.kd_jenisanggaran WHERE p.kd_anggaranperusahaan LIKE '%2018%'";
							$res1=mysqli_query($link,$sql1);
							$i=1;
							while($data1=mysqli_fetch_array($res1)){
								$pers=$data1['jumlahanggaranperusahaan']/$laba*100;
								$ar[$i]=$data1['jumlahanggaranperusahaan'];
								$ar1[$i]=$pers;
								?>
								<tr>
									<td><center><?php echo $i;?></center></td>
									<td><center><?php echo strtoupper($data1['jenisanggaran']);?></center></td>
									<td><center><?php echo "Rp ".strtoupper(number_format($data1['jumlahanggaranperusahaan']));?></center></td>
									<td><center><?php echo "Rp ".strtoupper(number_format($laba));?></center></td>
									<td><center><?php echo round($pers,2)." %"; ?></center></td>
								</tr>
									<?php
									$i++;
								}
								$totalbeban=array_sum($ar);
								$totalpers=array_sum($ar1);
								$pkas=100-$totalpers;
							$kas=($pkas/100)*$totalbeban;
							?>
							<tr>
								<td colspan="2"><center>TOTAL</center></td>
								<td><center><?php echo "Rp ".strtoupper(number_format($totalbeban));?></center></td>
								<td><center><?php echo "Rp ".strtoupper(number_format($laba));?></center></td>
								<td><center><?php echo round($totalpers,2)." %"; ?></center></td>
							</tr>
							<tr>
								<td colspan="2"><center></center></td>
								<td><center><?php /*echo "Rp ".strtoupper(number_format($kas));?></center></td>
								<td><center><?php echo "Rp ".strtoupper(number_format($laba));?></center></td>
								<td><center><?php echo round($pkas,2)." %";  */?></center></td>
							</tr>
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
sidemanke();
}
?>