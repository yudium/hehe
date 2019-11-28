<?php
session_start();
ob_start();
include("libfunc.php");
include("../libfunc.php");
$link=koneksidb();
if(($_SESSION['logadm']==true) && ($_SESSION['useradm']!="")){
  $usermin=$_SESSION['useradm'];
  $iduser=$_SESSION['idadm'];
  $sql3="SELECT * FROM pengguna WHERE id_pengguna='$iduser'";
  $res3=mysqli_query($link,$sql3);
  $data3=mysqli_fetch_array($res3);
  headmin();
  $tahun=date('Y');
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Persentase Anggaran Biaya Perusahaan
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
								<th><center>Persentase</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql1="SELECT * FROM anggaranperusahaan p INNER JOIN detailanggaran d ON p.kd_anggaranperusahaan=d.kd_anggaranperusahaan INNER JOIN jenisanggaran j ON d.kd_jenisanggaran=j.kd_jenisanggaran WHERE p.kd_anggaranperusahaan LIKE '%2018%'";
							$res1=mysqli_query($link,$sql1);
							$i=1;
							while($data1=mysqli_fetch_array($res1)){
								$pers=$data1['jumlahanggaranperusahaan']/584305000 * 100;
								$ar[$i]=$data1['jumlahanggaranperusahaan'];
								$ar1[$i]=$pers;
								?>
								<tr>
									<td><center><?php echo $i;?></center></td>
									<td><center><?php echo strtoupper($data1['jenisanggaran']);?></center></td>
									<td><center><?php echo "Rp ".strtoupper(number_format($data1['jumlahanggaranperusahaan']));?></center></td>
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
								<td><center><?php echo round($totalpers,2)." %"; ?></center></td>
							</tr>
							</tbody>
						</table>
					</center>
				</div>
  </div>
</div>
</div>
</div>
</div>
<?php
sidemin();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>