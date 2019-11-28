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
  ?>
  <script type="text/javascript">
    function validate(){
      var error="";
      var name = document.getElementById( "pegawai" );
      if( name.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var username = document.getElementById( "username" );
      if( username.value == ""){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var email = document.getElementById( "email" );
      if( email.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var password = document.getElementById( "password" );
      if( password.value == "")
      {
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var email1 = document.getElementById( "level" );
      if( email1.value == "")
      {
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
          Rencana Anggaran
        </div>
        <br>
        <div class="horizontal-tab">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Anggaran Perusahaan</a></li>
            <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Tambah Rencana Anggaran</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="width:20px;"><center>No</center></th>
                          <th><center>Nama Pos Anggaran</center></th>
                          <th><center>Keterangan</center></th>
                          <th><center>Jumlah</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql1="SELECT * FROM anggaranperusahaan ap INNER JOIN jenisanggaran a ON kd_jenisanggaran=a.kd_jenisanggaran";
                        $res1=mysqli_query($link,$sql1);
                        $i=1;
                        while($data1=mysqli_fetch_array($res1)){
                          ?>
                          <tr>
                            <tr>
                            <td><center><?php echo $i;?></center></td>
                            <td><center><?php echo strtoupper($data1['jenisanggaran']);?></center></td>
                            <td><center><?php ?></center></td>
                            <td><center>
                              <?php echo "Rp ".strtoupper(number_format($data1['jumlahanggaran']));?>
                            </center></td>
                            <td><center>
							
                              <!-- <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs">RESET</button></a> -->
                              <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs tombol-edit" data-idpeg="<?php echo $data1['id_pegawai'];  ?>"><i class="fa fa-pencil"></i></button></a>
							  <a href="hpegawai.php?&SDEdwdw=<?php echo base64_encode($data1['id_pegawai']);?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </center></td>
                          </tr>
                       
                            
                          
                          <?php
                          $i++;
                        }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab2">
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel-body">
                      <form class="form-horizontal bucket-form" method="post" action="" onsubmit="return validate();">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Pos Anggaran</label>
                          <div class="col-sm-6">
                            <select class="form-control m-bot15" name="pegawai" id="pegawai">
                              <option value="">Pilih</option>
                              <?php 
                              $sql2="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran!='$data3[kd_jenisanggaran]' ORDER BY jenisanggaran";
                              $res2=mysqli_query($link,$sql2);
                              while($data2=mysqli_fetch_array($res2)){
                                echo "<option value='$data2[kd_jenisanggaran]'>$data2[jenisanggaran]</option>";
                              }

                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Keterangan</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="username" type="text" name="username">
                          </div>
                        </div>
                        
                        <div class="form-group">
              <label class="col-sm-3  control-label">Jumlah</label>
              <div class="col-sm-6">
                <input class="form-control" id="kredit1" type="number" name="kredit1">
              </div>
            </div>
          </div>
                            
                        <div class="form-group">
                          <label class="col-sm-3 control-label"></label>
                          <div class="col-sm-6">
                            <input type="submit" value="Simpan" name="submit" class="btn btn-default">
                            <input type="reset" class="btn btn-default" value="Reset">
                          </div>
                        </div>
                      </form>

                      <?php
                      if (isset($_POST["submit"])){
                        $jenisanggaran=$_POST['kd_jenisanggaran'];
                        $jumlahanggaran=$_POST['jumlahanggaran'];
                        $sql8="SELECT * FROM pengguna WHERE username='$username'";
                        $res8=mysqli_query($link,$sql8);
                        $rows=mysqli_num_rows($res8);
                        if($rows==0){
                          $sql4="SELECT MAX(CONVERT(SUBSTR(id_pengguna,4,2), SIGNED)) AS nilai FROM pengguna";
                          $res4=mysqli_query($link,$sql4);
                          $data4=mysqli_fetch_array($res4);
                          $idpeng="usr0".($data4['nilai']+1);
                          $sql7="INSERT INTO pengguna VALUES ('$idpeng','$username','$password','$email','$level','$pegawai')";
                          $res7=mysqli_query($link,$sql7);
                          if($res7){
                            echo "<script>alert('Data Berhasil Ditambahkan');
                                document.location.href='pengguna';</script>";
                          }
                        }else if($rows>=1){
                          echo "<script>alert('Username Telah Digunakan');</script>";

                        }
                      }
                      ?>
                      <p style="display:none" id="error_para"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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