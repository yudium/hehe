<?php
  session_start();
  ob_start();
  date_default_timezone_set('Asia/Jakarta');
  include("libfunc.php");
  include("../libfunc.php");
  $link=koneksidb();
  if(($_SESSION['logmanke']==true) && ($_SESSION['usermanke']!="")){
    $usermin=$_SESSION['usermanke'];
    $iduser=$_SESSION['idmanke'];
    $sql3="SELECT * FROM pengguna WHERE id_pengguna='$iduser'";
    $res3=mysqli_query($link,$sql3);
    $data3=mysqli_fetch_array($res3);
    headmanke();
    $thn1=date('Y', strtotime('-1 year'));
    $min11=date('Y', strtotime('-2 year', strtotime($thn1)));
    
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Rencana Anggaran Biaya Perusahaan
    </div>
	<br>
	
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
	
    <form class="form-horizontal style-form" role="form" method="post" action="">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Pos Anggaran</center></th>
            <th><center>Realisasi <?php echo $min11; ?></center></th>
            <th><center>Budget client <?php echo $min11; ?></center></th>
            <th><center>Rencana <?php echo $thn1; ?></center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran!='RK04' and kd_jenisanggaran!='RK13' ORDER BY kd_jenisanggaran";
          $res1=mysqli_query($link,$sql1);
          $thn=date('Y');
          $i=1;
		  $persentase = array(0.70,0.12,0.2,0.3,0.03,0.08,0.04,0.02,0.01,0.2);
          while($data1=mysqli_fetch_array($res1) and $i < count($persentase)){
            $min2=date('Y', strtotime('-2 year', strtotime($thn)));
            $sql4="SELECT *, SUM(kredit) AS krr FROM kasbesar WHERE tanggal LIKE '%$min2%' AND kd_jenisanggaran='$data1[kd_jenisanggaran]' GROUP BY kd_jenisanggaran";
            $res4=mysqli_query($link,$sql4);
            $data4=mysqli_fetch_array($res4);
			
			$posang[$i]=ceil($persentase[$i] * $laba);
			
			//masukan ke dalam array
			$posanggaran[$i]=$posang;
            $kdrekap[$i]=$data1['kd_jenisanggaran'];
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $data1['jenisanggaran'];?></center></td>
            <td><center><?php echo "Rp ".number_format($data4['krr']);?></center></td>
            <td><center><?php echo "Rp 95,000,000.00 ";?></center></td>
            <td><center><?php echo "Rp ".number_format($posang[$i]);?></center></td> 
			
          </tr>
          <?php
          $i++;
          }
		  
		  
          ?>
        </tbody>
      </table>
      <br>
      <?php 
        $sql2="SELECT * FROM anggaranperusahaan WHERE kd_anggaranperusahaan LIKE '%$thn1%'";
        $res2=mysqli_query($link,$sql2);
        $has=mysqli_num_rows($res2);
        if($has==0){
        ?>
          <input type="submit" value="Simpan" name="submit" class="btn btn-default">
        <?php 
        }else{
          echo " "; 
        }
         ?>
    </div>
  </form>
  <?php 
  if (isset($_POST["submit"])){
    $loop=count($posanggaran);
    $tanggall=date("Y-m-d H:i:s");
    $kode="PSA".$thn1;
    $sql5="INSERT INTO anggaranperusahaan VALUES('$kode','$tanggall','$thn','T')";
    $res5=mysqli_query($link,$sql5);
    // echo $kode." ".$tanggall." ".$thn."<br>";
    for($j=1;$j<=$loop;$j++){
      $sql6="INSERT INTO detailanggaran VALUES('$kode','$kdanggaran[$j]','$posanggaran[$j]')";
      $res6=mysqli_query($link,$sql6);
      // echo $kode." ".$kdrekap[$j]." ".$posanggaran[$j]."<br>";
    }
    echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='rbperusahaan';</script>";
  }


   ?>
  </div>
</div>
</div>
</div>
</div>
<?php
    sidemanke();
}else{
    header("Location: ../masuk.php");
}
ob_flush();
?>



