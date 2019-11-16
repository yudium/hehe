<?php
session_start();
ob_start();
include("libfunc.php");
include("../libfunc.php");
$link=koneksidb();
if(($_SESSION['logmanke']==true) && ($_SESSION['usermanke']!="")){
  $usermanke=$_SESSION['usermanke'];
  $iduser=$_SESSION['idmanke'];
  $sql3="SELECT * FROM pengguna WHERE id_pengguna='$iduser'";
  $res3=mysqli_query($link,$sql3);
  $data3=mysqli_fetch_array($res3);
  headmanke();
  ?>
  <script type="text/javascript">
    function validate(){
      var error="";
      var jenis = document.getElementById( "jenis" );
      if( jenis.value == "" ){
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
          Data Jenis Anggaran
        </div>
        <br>
        <div class="horizontal-tab">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Data Jenis Anggaran</a></li>
            <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Tambah Data Jenis Anggaran</a></li>
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
                          <th><center>Jenis Anggaran</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql1="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran!='RK04' and kd_jenisanggaran!='RK13' ORDER BY kd_jenisanggaran";
                        $res1=mysqli_query($link,$sql1);
                        $i=1;
                        while($data1=mysqli_fetch_array($res1)){
                          ?>
                          <tr>
                            <td><center><?php echo $i;?></center></td>
                            <td><center><?php echo strtoupper($data1['jenisanggaran']);?></center></td>
                            <td><center>
                              <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                              <a href="hjenisanggaran.php?&fdwDWWD=<?php echo base64_encode($data1['kd_jenisanggaran']);?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </center></td>
                          </tr>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModala<?php echo $i;?>" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><center>Ubah Data Jenis Anggaran</center></h4>
                                </div>
                                <form method="post" action="ujenisanggaran.php">
                                  <div class="modal-body">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data1['jenisanggaran']; ?>">
                                    <input type="hidden" value="<?php echo ($data1['kd_jenisanggaran']);?>" name="frUKBfe">
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
                          <label class="col-sm-3 control-label">Nama Jenis Anggaran</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="jenis" type="text" name="jenis">
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
                        $jenis=$_POST['jenis'];
                        $sql2="SELECT MAX(CONVERT(SUBSTR(kd_jenisanggaran,3,3), SIGNED)) AS nilai FROM jenisanggaran";
                        $res2=mysqli_query($link,$sql2);
                        $data2=mysqli_fetch_array($res2);
                        $idd=$data2['nilai']+1;
                        $kd="RK".$idd;

                        $sql4="INSERT INTO jenisanggaran VALUES('$kd','$jenis')";
                        $res4=mysqli_query($link,$sql4);

                        if($res4){
                          echo "<script>alert('Data Berhasil Ditambahkan');
                            document.location.href='jenisanggaran';</script>";
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