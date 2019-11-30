<?php
session_start();
ob_start();
 date_default_timezone_set('Asia/Jakarta');
include("libfunc.php");
include("../libfunc.php");
$link=koneksidb();
if(($_SESSION['logske']==true) && ($_SESSION['userske']!="")){
  $usermin=$_SESSION['userske'];
  $iduser=$_SESSION['idske'];
  $sql3="SELECT * FROM pengguna WHERE id_pengguna='$iduser'";
  $res3=mysqli_query($link,$sql3);
  $data3=mysqli_fetch_array($res3);
  headske();
  ?>
  <!-- <script type="text/javascript">
    function validate(){
      var error="";
      var keterangan1 = document.getElementById( "keterangan1" );
      if( keterangan1.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit1 = document.getElementById( "kredit1" );
      if( kredit1.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan2 = document.getElementById( "keterangan2" );
      if( keterangan2.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit2 = document.getElementById( "kredit2" );
      if( kredit2.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan3 = document.getElementById( "keterangan3" );
      if( keterangan3.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit3 = document.getElementById( "kredit3" );
      if( kredit3.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan4 = document.getElementById( "keterangan4" );
      if( keterangan4.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit4 = document.getElementById( "kredit4" );
      if( kredit4.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan5 = document.getElementById( "keterangan5" );
      if( keterangan5.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit5 = document.getElementById( "kredit5" );
      if( kredit5.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan6 = document.getElementById( "keterangan6" );
      if( keterangan6.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit6 = document.getElementById( "kredit6" );
      if( kredit6.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan7 = document.getElementById( "keterangan7" );
      if( keterangan7.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit7 = document.getElementById( "kredit7" );
      if( kredit7.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan8 = document.getElementById( "keterangan8" );
      if( keterangan8.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit8 = document.getElementById( "kredit8" );
      if( kredit8.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan9 = document.getElementById( "keterangan9" );
      if( keterangan9.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit9 = document.getElementById( "kredit9" );
      if( kredit9.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var keterangan10 = document.getElementById( "keterangan10" );
      if( keterangan10value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var kredit10 = document.getElementById( "kredit10" );
      if( kredit10value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }else{
        return true;
      }
    }
  </script> -->
  <!--inner block start here-->
  <div class="inner-block">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="chit-chat-heading">
          Penambahan Transaksi
        </div>   
        <br>
        <br>
        <form class="form-horizontal style-form" role="form" method="post" action="" >
          <h5><i class="fa "></i>Jenis Anggaran</h5>
          <br>
          <select class="form-control" id="metodena" name="metode">
            <option value="">Pilih</option>
            <?php 
            $sql2="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran!='RK02' AND kd_jenisanggaran!='RK04' ORDER BY kd_jenisanggaran";
            $res2=mysqli_query($link,$sql2);
            while($data2=mysqli_fetch_array($res2)){
              echo "<option value='$data2[kd_jenisanggaran]'>$data2[jenisanggaran]</option>";
            }
            ?>
          </select>
          <div id="RK01" style="display:none">
            <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan1" type="text" name="keterangan1">
              </div>
            </div>
			<div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
				 <div class="col-sm-10">
                  <input class="form-control" id="tanggal1" placeholder="YY/MM/DD" type="text" name="tanggal1" />
                    </div>
					</div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit1" type="number" name="kredit1">
              </div>
            </div>
          </div>
          <div id="RK02" style="display:none">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width:20px;"><center>No</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Gaji</center></th>
                    <th><center>Potongan</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql1="SELECT * FROM pegawai p INNER JOIN gaji g ON p.id_pegawai=g.id_pegawai";
                  $res1=mysqli_query($link,$sql1);
                  $i=1;
                  while($data1=mysqli_fetch_array($res1)){
                    ?>
                    <tr>
                      <td><center><?php echo $i;?></center></td>
                      <td><center><?php echo strtoupper($data1['nama']);?></center></td>
                      <td><center><?php echo "Rp ".strtoupper(number_format($data1['gaji']))?></center></td>
                      <td><center><input class="form-control" id="kasbon[]" type="number" name="kasbon[]"></center></td>
                    </tr>
                    <?php
                    $idsem[$i]=$data1['id_pegawai'];
                    $i++;
                  }
                  ?>
                </table>
              </div> 
          </div>
          <div id="RK03" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan2" type="text" name="keterangan2">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit2" type="number" name="kredit2">
              </div>
            </div> 
          </div>
          <div id="RK04" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan3" type="text" name="keterangan3">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit3" type="number" name="kredit3">
              </div>
            </div> 
          </div>
          <div id="RK05" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan4" type="text" name="keterangan4">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit4" type="number" name="kredit4">
              </div>
            </div> 
          </div>
          <div id="RK07" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan5" type="text" name="keterangan5">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit5" type="number" name="kredit5">
              </div>
            </div> 
          </div>
          <div id="RK08" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan6" type="text" name="keterangan6">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit6" type="number" name="kredit6">
              </div>
            </div> 
          </div>
          <div id="RK09" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan7" type="text" name="keterangan7">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit7" type="number" name="kredit7">
              </div>
            </div> 
          </div>
          <div id="RK10" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan8" type="text" name="keterangan8">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit8" type="number" name="kredit8">
              </div>
            </div> 
          </div>
          <div id="RK12" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan9" type="text" name="keterangan9">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit9" type="number" name="kredit9">
              </div>
            </div> 
          </div>
          <div id="RK13" style="display:none">
             <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan10" type="text" name="keterangan10">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit10" type="number" name="kredit10">
              </div>
            </div> 
          </div>
          <div id="RK17" style="display:none">
            <hr>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" id="keterangan10" type="text" name="keterangan11">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                <input class="form-control" id="kredit10" type="number" name="kredit11">
              </div>
            </div> 
          </div>
          <hr> 

          <input type="submit" value="Proses" name="submit" class="btn btn-default">           
          <br>
        </form>
        <?php 
        if (isset($_POST["submit"])){
          $jenis=$_POST['metode'];
          $tanggal1=date("Y-m-d ");
          if($jenis=='RK01'){
            $keterangan1=$_POST['keterangan1'];
			$tanggal1=$_POST ['tanggal1'];
            $kredit1=$_POST['kredit1'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal1','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            // $sqlll="INSERT INTO kaskecil VALUES ('$kode','$tanggal','$kredit1','$saldo')";
            // $resss=mysqli_query($link,$sqlll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
            }
          }else if($jenis=='RK02'){
            $potongan=$_POST['potongan'];
            $bon=count($tunjangan);
            for($j=1;$j<=$bon;$j++){
              if($potongan[$j-1]!=""){
                echo $idsem[$j]."<br>";
                echo $potongan[$j-1]."<br>";
              }
            }
          }else if($jenis=='RK03'){
            $keterangan1=$_POST['keterangan2'];
            $kredit1=$_POST['kredit2'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK04'){
            $keterangan1=$_POST['keterangan3'];
            $kredit1=$_POST['kredit3'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK05'){
            $keterangan1=$_POST['keterangan4'];
            $kredit1=$_POST['kredit4'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK07'){
            $keterangan1=$_POST['keterangan5'];
            $kredit1=$_POST['kredit5'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK08'){
            $keterangan1=$_POST['keterangan6'];
            $kredit1=$_POST['kredit6'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK09'){
            $keterangan1=$_POST['keterangan7'];
            $kredit1=$_POST['kredit7'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK10'){
            $keterangan1=$_POST['keterangan8'];
            $kredit1=$_POST['kredit8'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK12'){
            $keterangan1=$_POST['keterangan9'];
            $kredit1=$_POST['kredit9'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK13'){
            $keterangan1=$_POST['keterangan10'];
            $kredit1=$_POST['kredit10'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }else if($jenis=='RK17'){
            $keterangan1=$_POST['keterangan11'];
            $kredit1=$_POST['kredit11'];
            $sql="SELECT *, CONVERT(SUBSTR(kd_kasbesar,3,9), SIGNED) AS kode FROM kasbesar WHERE tanggal IN (SELECT MAX(tanggal) FROM kasbesar) ORDER BY kd_kasbesar DESC LIMIT 1";
            $res=mysqli_query($link,$sql);
            $data=mysqli_fetch_array($res);

            $kode="TD".($data['kode']+1);
            $saldo=$data['saldo']-$kredit1;

            $sqll="INSERT INTO kasbesar VALUES ('$kode','$tanggal','$keterangan1','0','$kredit1','$saldo','$jenis','PDP00000')";
            $ress=mysqli_query($link,$sqll);

            if($ress){
              echo "<script>alert('Data Berhasil Ditambahkan');
                  document.location.href='kas.php';</script>";
                }
          }
        }
         ?>

        <p style="display:none" id="error_para"></p>
        </div>
      </div>
    </div>
    <!--inner block end here-->
    <!--copy rights start here-->

    <!--COPY rights end here-->
  </div>
</div>
<script>
    $('#metodena').on('change', function() {
      $("#RK01,#RK02,#RK03,#RK04,#RK05,#RK07,#RK08,#RK09,#RK10,#RK12,#RK13,#RK17").hide()
      if ( this.value == 'RK01')
      $("#RK01").show();
      else if ( this.value == 'RK02')
      $("#RK02").show();
      else if ( this.value == 'RK03')
      $("#RK03").show();
      else if ( this.value == 'RK04')
      $("#RK04").show();
      else if ( this.value == 'RK05')
      $("#RK05").show();
      else if ( this.value == 'RK07')
      $("#RK07").show();
      else if ( this.value == 'RK08')
      $("#RK08").show();
      else if ( this.value == 'RK09')
      $("#RK09").show();
      else if ( this.value == 'RK10')
      $("#RK10").show();
      else if ( this.value == 'RK12')
      $("#RK12").show();
      else if ( this.value == 'RK13')
      $("#RK13").show();
      else if ( this.value == 'RK17')
      $("#RK17").show();
      else 
      $("#RK01,#RK02,#RK03,#RK04,#RK05,#RK07,#RK08,#RK09,#RK10,#RK12,#RK13,#RK17").hidden();
      }).trigger("change");
    </script>
<?php
sideske();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>