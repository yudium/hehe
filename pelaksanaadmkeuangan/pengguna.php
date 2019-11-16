<?php
session_start();
ob_start();
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
          Pengguna
        </div>
        <br>
        <div class="horizontal-tab">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Kelola Pengguna</a></li>
            <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Tambah Pengguna</a></li>
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
                          <th><center>Nama</center></th>
                          <th><center>Nama Pengguna</center></th>
                          <th><center>Bagian</center></th>
                          <!-- <th><center>Reset Password</center></th> -->
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql1="SELECT * FROM pengguna pg INNER JOIN pegawai p ON pg.id_pegawai=p.id_pegawai";
                        $res1=mysqli_query($link,$sql1);
                        $i=1;
                        while($data1=mysqli_fetch_array($res1)){
                          ?>
                          <tr>
                            <td><center><?php echo $i;?></center></td>
                            <td><center><?php echo strtoupper($data1['nama']);?></center></td>
                            <td><center><?php echo strtoupper($data1['username']);?></center></td>
                            <td><center><?php echo strtoupper($data1['level']);?></center></td>
                            <!-- <td><center>
                              <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            </center></td> -->
                            <td><center>
                              <a href="hpengguna.php?&KdedYDE=<?php echo base64_encode($data1['id_pengguna']);?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </center></td>
                          </tr>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModala<?php echo $i;?>" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><center>Reset Kata Sandi - <?php echo strtoupper($data1['nama']);?></center></h4>
                                </div>
                                <form method="post" action="respas.php">
                                  <div class="modal-body">
                                    <center> MASUKAN PASSWORD DEFAULT </center>
                                    <br>
                                    <input type="password" name="password" class="form-control" placeholder="Kata Sandi Reset">
                                    <input type="hidden" value="<?php echo ($data1['username']);?>" name="dasdajhde">
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
                          <label class="col-sm-3 control-label">Pegawai</label>
                          <div class="col-sm-6">
                            <select class="form-control m-bot15" name="pegawai" id="pegawai">
                              <option value="">Pilih</option>
                              <?php 
                              $sql2="SELECT * FROM pegawai WHERE id_pegawai!='$data3[id_pegawai]' ORDER BY nama";
                              $res2=mysqli_query($link,$sql2);
                              while($data2=mysqli_fetch_array($res2)){
                                echo "<option value='$data2[id_pegawai]'>$data2[nama]</option>";
                              }

                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Username</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="username" type="text" name="username">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Email</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="email" type="email" name="email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Kata Sandi</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="password" type="Password" name="password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Level Pengguna</label>
                          <div class="col-sm-6">
                            <select class="form-control m-bot15" name="level" id="level">
                              <option value="">Pilih</option>
                              <option value="manager&development">Manager and Development</option>
                              <option value="stafmanager&administrasi">Staf Manager and Administrasi</option>
                            </select>
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
                        $pegawai=$_POST['pegawai'];
                        $username=$_POST['username'];
                        $email=$_POST['email'];
                        $password=md5($_POST['password']);
                        $level=$_POST['level'];
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
sideske();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>