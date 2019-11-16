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
    $tanggal=base64_decode($_GET['FRjgwrbi']);
    $tgl=date("Y-m", strtotime($tanggal));
    $tglats=date("F Y", strtotime($tanggal));
    headmanke();
    $thn1=date('Y');
    $min11=date('Y', strtotime('-1 year', strtotime($thn1)));
    $min22=date('Y', strtotime('-2 year', strtotime($thn1)));
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Laporan Gaji <?php echo $tglats; ?>
    </div>
    <form class="form-horizontal style-form" role="form" method="post" action="">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Keterangan</center></th>
            <th><center>Jumlah</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT * FROM kasbesar WHERE kd_jenisanggaran='RK02' AND tanggal LIKE '%2018-01%'";
          $res1=mysqli_query($link,$sql1);
          $thn=date('Y');
          $i=1;
          while($data1=mysqli_fetch_array($res1)){
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $data1['keterangan'];?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['kredit']);?></center></td>
          </tr>
          <?php
          $i++;
          }
          ?>
        </tbody>
      </table>
      <br>
    </div>
  </form>
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



