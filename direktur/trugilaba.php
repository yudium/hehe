<?php
  session_start();
  ob_start();
  date_default_timezone_set('Asia/Jakarta');
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
    $thn1=date('Y');
    $min11=date('Y', strtotime('-1 year', strtotime($thn1)));
    $min22=date('Y', strtotime('-2 year', strtotime($thn1)));
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Laporan Data Rugi Laba
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Tahun</center></th>
            <th><center>Total Pendapatan</center></th>
            <th><center>Total Biaya Anggaran </center></th>
            <th><center>Rugi Laba</center></th>
            <th><center>Detail</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT *, SUM(jumlahpendapatan) AS total, SUBSTR(tanggal,1,4) AS tahun FROM pendapatan WHERE kd_pendapatan LIKE '%PDP%' AND kd_pendapatan!='PDP00000' AND SUBSTR(tanggal,1,4)!='$thn1' GROUP BY SUBSTR(tanggal,1,4)";
          $res1=mysqli_query($link,$sql1);
          $thn=date('Y');
          $i=1;
          while($data1=mysqli_fetch_array($res1)){
            $sql7="SELECT SUM(kredit) AS total FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$data1[tahun]%' AND k.kd_jenisanggaran!='RK04' GROUP BY SUBSTR(k.kd_jenisanggaran,1,2)";
            $res7=mysqli_query($link,$sql7);
            $data7=mysqli_fetch_array($res7);

            $sql4="SELECT SUM(kredit) AS pajak, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$data1[tahun]%' AND k.kd_jenisanggaran!='RK13' GROUP BY k.kd_jenisanggaran";
			$res4=mysqli_query($link,$sql4);
			$data4=mysqli_fetch_array($res4);

            $laba=$data1['total']-$data7['total']-$data4['pajak'];
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $data1['tahun'];?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['total']);?></center></td>
            <td><center><?php echo "Rp ".number_format($data7['total']);?></center></td>
            <td><center><?php echo "Rp ".number_format($laba);?></center></td>
            <td><center>
              <a href="laprugilaba?FRjgwrbi=<?php echo base64_encode($data1['tahun']);?>"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
            </center></td>
          </tr>
          <?php
          $i++;
          }
          ?>
        </tbody>
      </table>
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



