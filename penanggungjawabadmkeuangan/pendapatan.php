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
      var pemasukan = document.getElementById( "pemasukan" );
      if( pemasukan.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan = document.getElementById( "keterangan" );
      if( keterangan.value == "" ){
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
        <div class="chit-chat-heading">
          Pendapatan
        </div>
        <br>
        <form class="form-horizontal style-form" role="form" method="post" action="" onsubmit="return validate();">
          <h5><i class="fa "></i>Jumlah</h5>
          <br>
          <input type="number" name="pemasukan" id="pemasukan" class="form-control">
          <br>
          <h5><i class="fa "></i>Keterangan</h5>
          <br>
          <input type="text" name="keterangan" id="keterangan" class="form-control">
          <br>
          <input type="submit" value="Proses" name="submit" class="btn btn-default">           
          <br>
        </form>
        <p style="display:none" id="error_para"></p>
        <br>
        <br>
        <?php 
          if (isset($_POST["submit"])){
            $pemasukan=$_POST['pemasukan'];
            $keterangan=$_POST['keterangan'];

            $tanggal=date("Y-m-d H:i:s");

            $sql4="SELECT MAX(CONVERT(SUBSTR(kd_pendapatan,4,10), SIGNED)) AS nilai FROM pendapatan";
            $res4=mysqli_query($link,$sql4);
            $data4=mysqli_fetch_array($res4);

            $kd="PDP".($data4['nilai']+1);
            $sql1="INSERT INTO pendapatan VALUES('$kd','$keterangan','$pemasukan','$tanggal','usr01','')";
            $res1=mysqli_query($link,$sql1);
            
            if($res1){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='pendapatan.php';</script>";
            }
          }
        ?>
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