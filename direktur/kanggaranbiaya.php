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
  <?php 
    // $kdddd="PSA".$thn;
    $sql4="SELECT * FROM anggaranperusahaan WHERE kd_anggaranperusahaan LIKE '%2018%'";
    $res4=mysqli_query($link,$sql4);
    $hass=mysqli_num_rows($res4);
    if($hass>0){
   ?>
    <div class="chit-chat-heading">
      Konfirmasi Anggaran Perusahaan
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Pos Anggaran</center></th>
            <th><center>Jumlah Anggaran</center></th>
            <th><center>Ubah</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT *, dp.kd_anggaranperusahaan AS kd_anggaranperusahaan FROM detailanggaran dp INNER JOIN jenisanggaran jr ON dp.kd_jenisanggaran=jr.kd_jenisanggaran INNER JOIN anggaranperusahaan pa ON dp.kd_anggaranperusahaan=pa.kd_anggaranperusahaan WHERE dp.kd_anggaranperusahaan LIKE '%2018%'";
          $res1=mysqli_query($link,$sql1);
          $i=1;
          while($data1=mysqli_fetch_array($res1)){
            // $format = date('d F Y', strtotime($data1['tanggal']));
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $data1['jenisanggaran'];?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['jumlahanggaranperusahaan']);?></center></td>
            <td><center>
              <?php 
                if($data1['status']=='Y'){
                  echo "Data Telah Disimpan";
                }else{
               ?>
              <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
              <?php } ?>
            </center></td>
          </tr>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModala<?php echo $i;?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title"><center>Ubah Jumlah Anggaran - <?php echo strtoupper($data1['jenisanggaran']);?></center></h4>
                </div>
                <form method="post" action="uanggaran.php">
                  <div class="modal-body">
                    <br>
                    <input type="number" name="jumbaru" class="form-control">
                    <input type="hidden" value="<?php echo ($data1['kd_jenisanggaran']);?>" name="Ddrbfe">
                    <input type="hidden" value="<?php echo ($data1['kd_anggaranperusahaan']);?>" name="NSdeBK">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button class="btn btn-theme" type="submit">Simpan</button>
                  </div>     
                </form>
              </div>
            </div>
          </div>
          <?php
          $i++;
          }
          ?>
        </tbody>
      </table>
      <br>
      <?php 
        $sql2="SELECT *, dp.kd_anggaranperusahaan AS kd_anggaranperusahaan FROM detailanggaran dp INNER JOIN jenisanggaran jr ON dp.kd_jenisanggaran=jr.kd_jenisanggaran INNER JOIN anggaranperusahaan pa ON dp.kd_anggaranperusahaan=pa.kd_anggaranperusahaan WHERE dp.kd_anggaranperusahaan LIKE '%2018%'";
        $res2=mysqli_query($link,$sql2);
        $data2=mysqli_fetch_array($res2);
        if($data2['status']=='T'){
          ?>
          <form method="post" action="pkanggaran.php">
            <input type="hidden" value="<?php echo ($data2['kd_anggaranperusahaan']);?>" name="NSdeBK">
            <input type="submit" value="Simpan" name="submit" class="btn btn-default">
          </form>
          <?php
        }else{
          echo " ";
        }
       ?>
    </div>
    <?php 
      }else{
        ?>
            <div class="chit-chat-heading">
              <center>Data Anggaran Belum Disimpan
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
sidemin();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>