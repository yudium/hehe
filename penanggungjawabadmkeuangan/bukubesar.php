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
    <script type="text/javascript">
    function validate(){
      var error="";
      var tahun = document.getElementById( "tahun" );
      if( tahun.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }else{
        return true;
      }
    }
  </script>
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      LAPORAN BUKU BESAR
    </div>
    <form class="form-horizontal style-form" role="form" method="post" action="" onsubmit="return validate();">
          <br>
          Tahun
          <select class="form-control" name="tahun" id="tahun">
            <option value="">Pilih</option>
            <?php 
            $sql2="SELECT * FROM anggaranperusahaan ORDER BY tahun";
            $res2=mysqli_query($link,$sql2);
            while($data2=mysqli_fetch_array($res2)){
              echo "<option value='$data2[tahun]'>$data2[tahun]</option>";
            }
            ?>
          </select>
          <br>Bulan
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
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          <br>Pos Anggaran
          <select class="form-control" name="jenis" id="jenis">
            <option value="">Pilih</option>
            <?php 
            $sql4="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran!='RK04' and kd_jenisanggaran!='RK13'";
            $res4=mysqli_query($link,$sql4);
            while($data4=mysqli_fetch_array($res4)){
              echo "<option value='$data4[kd_jenisanggaran]'>$data4[jenisanggaran]</option>";
            }
            ?>
          </select>
          <br>
          <input type="submit" value="Proses" name="submit" class="btn btn-default">           
          <br>
        </form>
        <p style="display:none" id="error_para"></p>
        <br>
        <br>
        <?php 
          if (isset($_POST["submit"])){
            $tahun=$_POST['tahun'];
            $bulan=$_POST['bulan'];
            $jenis=$_POST['jenis'];
            ?>
    <div class="table-responsive">
      <table class="table table-hover" id="example">
        <thead>
          <tr>
            <th>No</th>
            <th style="width:70px;">Keterangan</th>
            <th>Tanggal</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql="SELECT * FROM kasbesar WHERE tanggal LIKE '%$tahun-$bulan%' AND kd_jenisanggaran='$jenis'";
          $res=mysqli_query($link,$sql);
          $i=1;
          while($data=mysqli_fetch_array($res)){
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo "Rp ".number_format($data['debet']); ?></td>
            <td><?php echo "Rp ".number_format($data['kredit']); ?></td>
            <td><?php echo "Rp ".number_format($data['saldo']); ?></td>
          </tr>
          <?php
          $i++;
          }
          ?>
        </tbody>
      </table>
    </div>
    <?php
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