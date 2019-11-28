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
  ?>
  <script type="text/javascript">
    function validate(){
      var error="";
      var tahun = document.getElementById( "tahun" );
      if( tahun.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }

      var bulan = document.getElementById( "bulan" );
      if( bulan.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }else{
        return true;
      }
    }
  </script>
  <!--inner block start here-->
  <div class="inner-block">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <form class="form-horizontal style-form" role="form" method="post" action="" onsubmit="return validate();">
          <h5><i class="fa "></i>Tahun</h5>
          <br>
          <select class="form-control" name="tahun" id="tahun">
            <option value="">Pilih</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
          </select>
          <br>
          <h5><i class="fa "></i>Bulan</h5>
          <br>
          <select class="form-control" name="bulan" id="bulan">
            <option value="">Pilih</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">Novemeber</option>
            <option value="12">Desember</option>
          </select>
          <br>
          <input type="submit" value="Proses" name="submit" class="btn btn-default">           
          <br>
        </form>
        <p style="display:none" id="error_para"></p>
        <?php 
          if (isset($_POST["submit"])){
            $tahun=$_POST['tahun'];
            $bulan=$_POST['bulan'];
            $tgl=$tahun."-".$bulan;
            $tglats=date("F Y", strtotime($tgl));
            ?>
            <table class="table table-hover" id="laporangaji">
        <thead>
        <tr>
          <th colspan="6"><center>Laporan Gaji <?php echo $tglats; ?></center></th>
        </tr>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Keterangan</center></th>
            <th><center>Gaji Pokok</center></th>
            <th><center>Potongan</center></th>
            <th><center>Jumlah</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i=1;
          $sql4="SELECT * FROM pegawai p INNER JOIN gaji g " .
				"ON p.id_pegawai=g.id_pegawai INNER JOIN potongan k " .
				"ON p.id_pegawai=k.id_pegawai " .
				"WHERE k.tanggal LIKE '%$tgl%'";
          $res4=mysqli_query($link,$sql4);
          $ss=mysqli_num_rows($res4);
          if($ss > 0){
          while($data4=mysqli_fetch_array($res4)){
            $ket[$i]=$data4['nama'];
            $gaj[$i]=$data4['gaji'];
            $kas[$i]=$data4['jumlahpotongan'];
            $kre[$i]=$data4['gaji']-$data4['jumlahpotongan'];
            $i++;
          }

          $cc=count($ket);
          for($j=1;$j<=$cc;$j++){
          ?>
          <tr>
            <td><center><?php echo $j;?></center></td>
            <td><center><?php echo $ket[$j];?></center></td>
            <td><center><?php echo "Rp ".number_format($gaj[$j]);?></center></td>
            <td><center><?php echo "Rp ".number_format($kas[$j]);?></center></td>
            <td><center><?php echo "Rp ".number_format($kre[$j]);?></center></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <hr>
      <center><a target ="_blank" href ="export.php"> <label><strong>Download&nbsp <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
            <?php
          }else{
            ?>
            <tr>
              <td colspan="6"><center>Tidak Ada Data</center></td>
            </tr>
          </tbody>
          </table>
            <?php
          }
          }
         ?>
        <br>
        </div>
      </div>
    </div>
    <!--inner block end here-->
    <!--copy rights start here-->

    <!--COPY rights end here-->
  </div>
</div>
<?php
sidemanke();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>