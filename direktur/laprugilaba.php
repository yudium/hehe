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
  ?>
  <?php
  headmin();
  $tahun=base64_decode($_GET['FRjgwrbi']);
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      <!-- <center>Laporan Rugi Laba Dilakukan 31 Desember <?php echo $tahun; ?></center> -->
      <center>
        <table border="0" id="rugilaba">
        <tr>
            <td colspan="6"><center>CV. PUTRA RASMANA</center></td>
        </tr>
        <tr>
            <td colspan="6"><center>LAPORAN RUGI LABA</center></td>
        </tr>
        <tr>
            <td colspan="6"><center>PRIODE 31 DESEMBER <?php echo $tahun; ?></center></td>
        </tr>
        <tr>
          <td colspan="6">&nbsp </td>
        </tr>
        <tr>
          <td colspan="6">Pendapatan</td>
        </tr>
        <tr>
          <td>Pendapatan Usaha :</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php 
            $sql="SELECT SUM(jumlahpendapatan) AS pendapatan FROM pendapatan WHERE tanggal LIKE '%$tahun%' AND kd_pendapatan LIKE '%PDP%'";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);
            echo "Rp ".number_format($data['pendapatan']);
           ?></td>
        </tr>
        <tr>
          <td>LABA KOTOR :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php 
            $sql="SELECT SUM(jumlahpendapatan) AS pendapatan FROM pendapatan WHERE tanggal LIKE '%$tahun%' AND kd_pendapatan LIKE '%PDP%'";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);
            echo "Rp ".number_format($data['pendapatan']);
           ?></td>
        </tr>
        <tr>
          <td colspan="6">&nbsp</td>
        </tr>
        <tr>
          <td colspan="6">Anggaran Biaya Perusahaan </td>
        </tr>
        <?php 
          $sql1="SELECT SUM(kredit) AS jumkred, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran!='RK04' and k.kd_jenisanggaran!='RK13' GROUP BY k.kd_jenisanggaran";
          $res1=mysqli_query($link,$sql1);
          while($data1=mysqli_fetch_array($res1)){
            ?>
            <tr>
              <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $data1['jenisanggaran']." :"; ?></td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo "Rp ".number_format($data1['jumkred']);
               ?></td>
            </tr>
            <?php
          }
          $sql2="SELECT SUM(kredit) AS total FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran!='RK04' GROUP BY SUBSTR(k.kd_jenisanggaran,1,2)";
          $res2=mysqli_query($link,$sql2);
          $data2=mysqli_fetch_array($res2);
            ?>
            <tr>
              <td>TOTAL PENGELUARAN :</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo "Rp ".number_format($data2['total']);?></td>
            </tr>
        <tr>
          <td colspan="6">&nbsp</td>
        </tr>
        <tr>
          <td>LABA USAHA :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data['pendapatan']-$data2['total']);?></td>
        </tr>
        <tr>
          <td colspan="6">&nbsp</td>
        </tr>
        <?php 
          $sql4="SELECT SUM(kredit) AS pajak, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran!='RK13' GROUP BY k.kd_jenisanggaran";
          $res4=mysqli_query($link,$sql4);
          $data4=mysqli_fetch_array($res4);

          $sql44="SELECT * FROM pendapatan WHERE kd_pendapatan LIKE '%PLUP%' AND SUBSTR(tanggal,1,4)='$tahun'";
          $res44=mysqli_query($link,$sql44);
          $data44=mysqli_fetch_array($res44);
         ?>
        <tr>
          <td>LABA USAHA SEBELUM PAJAK :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data['pendapatan']-$data2['total']);?></td>
        </tr>
        <tr>
          <td>PAJAK :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data4['pajak']); ?></td>
        </tr>
        <tr>
          <td>RUGI LABA :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format(($data['pendapatan']-$data2['total'])-($data4['pajak']));?></td>
        </tr>
      </table>
    <hr>
    <a onClick="tableToExcel('rugilaba')"> <label><strong>Download&nbsp <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
    <hr>
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