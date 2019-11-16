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
?>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Pendapatan
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Deskripsi</center></th>
            <th><center>Jumlah Pendapatan</center></th>
            <th><center>Tanggal</center></th>
            <th><center>Status</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT * FROM pendapatan WHERE kd_pendapatan!='PDP00000' AND kd_pendapatan LIKE '%PDP%' ORDER BY tanggal DESC";
          $res1=mysqli_query($link,$sql1);
          $i=1;
          while($data1=mysqli_fetch_array($res1)){
            $format = date('d F Y', strtotime($data1['tanggal']));
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $data1['keterangan'];?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['jumlahpendapatan']);?></center></td>
            <td><center><?php echo $format;?></center></td>
            <td><center><?php 
              if($data1['tanggaldisetujui']!="0000-00-00 00:00:00"){
                echo "<span class='label label-success'>Disetujui</span>";
              }else{
                echo "<span class='label label-danger'>Belum Disetujui</span>";
              }
            ?></center></td>
            <td><center><?php 
              if($data1['tanggaldisetujui']!="0000-00-00 00:00:00"){
                echo "-";
              }else{
                ?>
                <a href="pkpendapatan.php?&BYEWdwU=<?php echo base64_encode($data1['kd_pendapatan']);?>" onClick="return confirm('Konfirmasi Pendapatan?')"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                <?php
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
sidemin();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>