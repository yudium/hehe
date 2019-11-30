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
    $thn1=date('Y');
    $min11=date('Y', strtotime('-1 year', strtotime($thn1)));
    $min22=date('Y', strtotime('-2 year', strtotime($thn1)));
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Monitoring Transaksi Tahun 2017
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Bulan</center></th>
            <th><center>Debet</center></th>
            <th><center>Kredit</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT tanggal, kd_jenisanggaran, SUM(debet) AS debet, SUM(kredit) AS kredit FROM `kasbesar` WHERE tanggal LIKE '%2016%' GROUP BY SUBSTR(tanggal,1,7)";
          $res1=mysqli_query($link,$sql1);
          $i=1;
          while($data1=mysqli_fetch_array($res1)){
            $bln=date("F",strtotime($data1['tanggal']));
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $bln;?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['debet']);?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['kredit']);?></center></td>
            <td><center><?php 
              if($data1['kredit']>$data1['debet']){
                echo "<span class='label label-warning'>Audit</span>";
              }else{
                echo "-";
              }
            ?></center></td>
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
    sidemanke();
}else{
    header("Location: ../masuk.php");
}
ob_flush();
?>