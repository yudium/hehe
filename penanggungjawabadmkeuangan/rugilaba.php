<?php
session_start();
ob_start();
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
  // $tahun=date('Y');
  $tahun="2017";
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      <?php 
        $sql4="SELECT * FROM pendapatan WHERE kd_pendapatan LIKE '%PLU%' AND tanggal LIKE '%2017%'";
        $res4=mysqli_query($link,$sql4);
        if(mysqli_num_rows($res4)==0){
       ?>
      <!-- <center>Laporan Rugi Laba Dilakukan 31 Desember <?php echo $tahun; ?></center> -->
      <center>CV. PUTRA RASMANA</center>
      <center>LAPORAN RUGI LABA</center>
      <center>PRIODE 31 DESEMBER 2018 <?php //echo $tahun; ?></center><br>
      <center>
        <form class="form-horizontal style-form" role="form" method="post" action="">
        <table border="0">
        <tr>
          <td colspan="6">Pendapatan :</td>
        </tr>
        <tr>
          <td>Pendapatan Usaha :</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php 
            $sql="SELECT SUM(jumlahpendapatan) AS pendapatan FROM pendapatan WHERE tanggal LIKE '%2017%'";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);
            echo "Rp ".number_format($data['pendapatan']);
           ?></td>
        </tr>
        <tr>
          <td>Pendapatan Kotor :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php 
            $sql="SELECT SUM(jumlahpendapatan) AS pendapatan FROM pendapatan WHERE tanggal LIKE '%2017%'";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);
            echo "Rp ".number_format($data['pendapatan']);
           ?></td>
        </tr>
        <tr>
          <td colspan="6">&nbsp</td>
        </tr>
        <tr>
          <td colspan="6">Biaya Beban Perusahaan :</td>
        </tr>
        <?php 
          $sql1="SELECT SUM(kredit) AS jumkred, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%2017%' AND k.kd_jenisanggaran!='RK04' GROUP BY k.kd_jenisanggaran";
          $res1=mysqli_query($link,$sql1);
          while($data1=mysqli_fetch_array($res1)){
            ?>
            <tr>
              <td>&nbsp&nbsp<?php echo $data1['jenisanggaran']." :"; ?></td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td>&nbsp&nbsp&nbsp&nbsp</td>
              <td><?php echo "Rp ".number_format($data1['jumkred']);
               ?></td>
            </tr>
            <?php
          }
          $sql2="SELECT SUM(kredit) AS total FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%2017%' AND k.kd_jenisanggaran!='RK04' GROUP BY SUBSTR(k.kd_jenisanggaran,1,2)";
          $res2=mysqli_query($link,$sql2);
          $data2=mysqli_fetch_array($res2);
            ?>
            <tr>
              <td>TOTAL :</td>
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
          <td>LABA USAHA SEBELUM PAJAK :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data['pendapatan']-$data2['total']);?></td>
        </tr>
        <tr>
          <td colspan="6">&nbsp</td>
        </tr>
        <tr>
          <td>PENDAPATAN DARI LUAR USAHA :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
        </tr>
        <tr>
          <td>&nbsp&nbspPENDAPATAN BUNGA TABUNGAN :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><input type="number" name="penbung" class="form-control" required=""></td>
        </tr>
        <tr>
          <td>&nbsp&nbspPAJAK BUNGA TABUNGAN :</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td>&nbsp&nbsp&nbsp&nbsp</td>
          <td><input type="number" name="pajbung" class="form-control" required=""></td>
        </tr>
      </table>
      <input type='submit' value='Proses' name='submit' class='btn btn-default'>
    </form>
    <?php 
      if (isset($_POST["submit"])){
        $penbung=$_POST['penbung'];
        $pajbung=$_POST['pajbung'];
        $kdpenbung="PLUB".$tahun;
        $kdpajbung="PLUP".$tahun;
        $dt="2017-12-31 08:46:28";
        $sqll="INSERT INTO pendapatan VALUES('$kdpenbung','Pendapatan Bunga Tabungan','$penbung','$dt','usr01','$dt')";
        $ress=mysqli_query($link,$sqll);
        $sqlll="INSERT INTO pendapatan VALUES('$kdpajbung','Pendapatan Bunga Tabungan','$pajbung','$dt','usr01','$dt')";
        $resss=mysqli_query($link,$sqlll);       
        if($ress && $resss){
          echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='rugilaba';</script>";
        }
      }
     ?>
    </center>

    <?php 
      }else{
        ?><center>RUGI LABA TAHUN 2017 TELAH DISIMPAN</center>
        <?php
      }
     ?>
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