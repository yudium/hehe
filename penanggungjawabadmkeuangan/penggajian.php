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
  $tahun=date('Y');
  $bulan=date('F');
  // $mb=15000000;
  ?>
  <script type="text/javascript">
    function validate(){
      var error="";

        <?php
      
      ?>
      
      var potongan = document.getElementById( "potongan" );
      if( potongan.value == "" ){
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
          Penggajian Bulan <?php echo $bulan; ?>
        </div>
        <br>
        <form class="form-horizontal style-form" role="form" method="post" action="" onsubmit="return validate();">
          <label class="col-sm-2 col-sm-2 control-label">Masukan Waktu</label>
				
                  <input class="form-control" id="tanggal1" placeholder="YY/MM/DD" type="text" name="tanggal1" />
                    
		  <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width:20px;"><center>No</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Gaji</center></th>
    
                    <th><center>Potongan Cuti</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql1="SELECT * FROM pegawai p INNER JOIN gaji g ON p.id_pegawai=g.id_pegawai";
                  $res1=mysqli_query($link,$sql1);
                  $i=1;
                  while($data1=mysqli_fetch_array($res1)){
                    //$sql6="SELECT SUM(jumlahtunjangan) AS jumbon FROM tunjangan WHERE id_pegawai='$data1[id_pegawai]' AND tanggal LIKE '%$tahun%'";
                    //$res6=mysqli_query($link,$sql6);
                    //$data6=mysqli_fetch_array($res6);
                    //$sisa1=$data1['gaji']-$data6['jumbon'];
                    ?>
                    <tr>
                      <td><center><?php echo $i;?></center></td>
                      <td><center><?php echo strtoupper($data1['nama']);?></center></td>
                      <td><center><?php echo "Rp ".strtoupper(number_format($data1['gaji']))?></center></td>
                      <td><center><input class="form-control" id="potongan<?php echo $data1['id_pegawai'];?>" type="number" name="potongan<?php echo $data1['id_pegawai'];?>"></center></td>
                    </tr>
                    <?php
                    $idsem[$i]=$data1['id_pegawai'];
                    $i++;
                  }
                  ?>
                </table>
                <hr> 
                <?php 
                  $tglcek=date('Y-m');
                  $sqll4="SELECT * FROM kasbesar WHERE kd_jenisanggaran='RK02' AND tanggal LIKE '%$tglcek%'";
                  $ress4=mysqli_query($link,$sqll4);
                  if(mysqli_num_rows($ress4)==0){
                   echo "<input type='submit' value='Proses' name='submit' class='btn btn-default'>";
                  }else{
                    echo "";
                  }
                 ?>
        </form>
        <p style="display:none" id="error_para"></p>
        <br>
        <br>
        <?php 
          if (isset($_POST["submit"])){
            $sql4="SELECT * FROM pegawai p INNER JOIN gaji g ON p.id_pegawai=g.id_pegawai";
            $res4=mysqli_query($link,$sql4);
            $o=1;
            while($data4=mysqli_fetch_array($res4)){
              if($data4['id_pegawai']=='pp1'){
                $tanggal = $_POST['tanggal'];
                $potonganpp1=$_POST['potonganpp1'];
                $gaji=$data4['gaji']-$potonganpp1;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
				
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);

                //$sqlll="INSERT INTO tunjangan VALUES('$data4[id_pegawai]','$tgl','$tunjanganpp1')";
                //$resss=mysqli_query($link,$sqlll);

                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp1')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
              if($data4['id_pegawai']=='pp2'){
                //$tunjanganpp2=$_POST['tunjanganpp2'];
                $potonganpp2=$_POST['potonganpp2'];
                $gaji=$data4['gaji']-$potonganpp2;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);

                //$sqlll="INSERT INTO tunjangan VALUES('$data4[id_pegawai]','$tgl','$tunjanganpp2')";
                //$resss=mysqli_query($link,$sqlll);

                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp2')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
              if($data4['id_pegawai']=='pp3'){
                
                $potonganpp3=$_POST['potonganpp3'];
                $gaji=$data4['gaji']-$potonganpp3;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);

                

                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp3')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
              if($data4['id_pegawai']=='pp4'){
                
                $potonganpp4=$_POST['potonganpp4'];
                $gaji=$data4['gaji']-$potonganpp4;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);

                

                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp4')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
              if($data4['id_pegawai']=='pp5'){
               
                $potonganpp5=$_POST['potonganpp5'];
                $gaji=$data4['gaji']-$potonganpp5;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);

              
                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp5')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
              if($data4['id_pegawai']=='pp6'){
                
                $potonganpp6=$_POST['potonganpp6'];
                $gaji=$data4['gaji']-$potonganpp6;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal1','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);

                
                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp6')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
              if($data4['id_pegawai']=='pp7'){
                $potonganpp7=$_POST['potonganpp7'];
                $gaji=$data4['gaji']-$potonganpp7;
                $sql7="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
                $res7=mysqli_query($link,$sql7);
                $data7=mysqli_fetch_array($res7);

                $kode="TD".($data7['kode']+1);
                $saldo=$data7['saldo']-$gaji;
                $keterangan1="Gaji ".$data4['nama'];
                $tanggal=date("Y-m-d H:i:s");
                $tgl=date("Y-m-d");

                $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$gaji','$saldo','RK02','PDP00000')";
                $ress=mysqli_query($link,$sqll);


                $sqll1="INSERT INTO potongan VALUES('$data4[id_pegawai]','$tgl','$potonganpp7')";
                $ress1=mysqli_query($link,$sqll1);
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              
                // echo $data4['id_pegawai']." ".$gaji." ".$saldo."<br>";

              }
            }
            echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='penggajian';</script>";
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