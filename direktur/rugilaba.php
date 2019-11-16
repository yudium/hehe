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
    <div class="chit-chat-heading">
      <center>Laporan Rugi Laba Dilakukan 31 Desember <?php echo $tahun; ?></center>
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