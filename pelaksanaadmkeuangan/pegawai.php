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
/*   <script type="text/javascript">
    function validate(){
      var error="";
      var name = document.getElementById( "nama" );
      if( name.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var gaji = document.getElementById( "gaji" );
      if( gaji.value == "" ){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }
      var jabatan = document.getElementById( "jabatan" );
      if( jabatan.value == ""){
        error = alert('Lengkapi Form !');
        document.getElementById( "error_para" ).innerHTML = error;
        return false;
      }else{
        return true;
      }
    }
  </script> */
  <!--inner block start here-->
  <div class="inner-block">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="chit-chat-heading">
          Pegawai
        </div>   
        <br>         
        <div class="horizontal-tab">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Kelola Pegawai</a></li>
            <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Tambah Pegawai</a></li>
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
                          <th><center>Jabatan</center></th>
                          <th><center>Gaji Pokok</center></th>
                          <th><center>Aksi</center></th>
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
                            <td><center><?php echo strtoupper($data1['jabatan']);?></center></td>
                            <td><center>
                              <?php echo "Rp ".strtoupper(number_format($data1['gaji']));?>
                            </center></td>
                            <td><center>
							
                              <!-- <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs">RESET</button></a> -->
                              <a class="logout" data-toggle="modal" href="#myModala<?php echo $i;?>"><button class="btn btn-primary btn-xs tombol-edit" data-idpeg="<?php echo $data1['id_pegawai'];  ?>"><i class="fa fa-pencil"></i></button></a>
							  <a href="hpegawai.php?&SDEdwdw=<?php echo base64_encode($data1['id_pegawai']);?>" onClick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </center></td>
                          </tr>
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModala<?php echo $i;?>" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><center>Ubah Data pegawai - <?php echo strtoupper($data1['nama']);?></center></h4>
                                </div>

                                <form method="post" action="upegawai.php">
                                  <div class="modal-body">
                                    <input type="hidden" name="idpeg" id="idpeg">
                                    <!-- <input class="form-control" name="nama" id="disabledInput" type="text" placeholder="<?php echo strtoupper($data1['username']);?>" disabled> -->
                                    <input type="text" name="namabaru" class="form-control" value="<?php echo ($data1['nama']);?>" name="gfIfyneru">
									<input type="text" name="jabatanbaru" class="form-control" value="<?php echo ($data1['jabatan']);?>" name="gfIfyneru">
									<input type="number" name="gajibaru" class="form-control" value="<?php echo $data1['gaji']; ?>">
                                    
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
                          <label class="col-sm-3 control-label">Nama</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="nama" type="text" name="nama">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Jabatan</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="jabatan" type="text" name="jabatan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Gaji</label>
                          <div class="col-sm-6">
                            <input class="form-control" id="gaji" type="number" name="gaji">
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
                        $nama=$_POST['nama'];
                        $jabatan=$_POST['jabatan'];
                        $gaji=$_POST['gaji'];
                        $sql4="SELECT MAX(CONVERT(SUBSTR(id_pegawai,3,2), SIGNED)) AS nilai FROM pegawai";
                        $res4=mysqli_query($link,$sql4);
                        $data4=mysqli_fetch_array($res4);

                        $idpeg="pp".($data4['nilai']+1);
                        $sql7="INSERT INTO pegawai VALUES ('$idpeg','$nama','$jabatan')";
                        $res7=mysqli_query($link,$sql7);
						
						$sql2="INSERT INTO gaji VALUES ('$idpeg','$gaji')";
                        $res2=mysqli_query($link,$sql2);
                        if($res7 && $res2){
                          echo "<script>alert('Data Berhasil Ditambahkan');
                          document.location.href='pegawai.php';</script>";
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

    <script>
    $(document).ready(function(){
        // kita kirim id pegawai ke <form> milik popup edit
        $(".tombol-edit").click(function(){
            let idpeg = $(this).data('idpeg');
            $("input#idpeg").val(idpeg);
        });
    });
    </script>
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
