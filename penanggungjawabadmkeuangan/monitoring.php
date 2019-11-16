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
      var tahun = document.getElementById( "tahun" );
      if( tahun.value == "" ){
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
        <form class="form-horizontal style-form" role="form" method="post" action="" onsubmit="return validate();">
          <h5><i class="fa "></i>Tahun</h5>
          <br>
          <select class="form-control" name="tahun" id="tahun">
            <option value="">Pilih</option>
            <?php 
            $sql2="SELECT * FROM anggaranperusahaan ORDER BY tahun";
            $res2=mysqli_query($link,$sql2);
            while($data2=mysqli_fetch_array($res2)){
              echo "<option value='$data2[tahun]'>$data2[tahun]</option>";
            }
            ?>
          </select>
          <br>
          <input type="submit" value="Proses" name="submit" class="btn btn-default">           
          <br>
        </form>
        <p style="display:none" id="error_para"></p>
        <br>
        <br>
        <?php 
          if (isset($_POST["submit"])){
            $tahun=$_POST['tahun'];
            ?>
            <br>
            <div class="main-page-charts">
              <div class="main-page-chart-layer1">
                <div class="col-md-6 chart-layer1-left"> 
                  <div class="glocy-chart">
                    <div class="chit-chat-heading">
                      Grafik Pos Anggaran dengan Realisasinya Pada Tahun <?php  echo $tahun."<br>";?>
                    </div>
                    <br>
                    <div class="span-2c">
                      <canvas id="bar" height="600" width="800" style="width: 800px; height: 600px;"></canvas>
                      <script>
                        var barChartData = {
                          
                          labels : ["Project Expenditure","Salary Staff","Industrial Supply ","Training Expenditure","Transport and Marketing","Office and Equipment","Equipment Expenditure","Utility and Maintenance","Conversion etc"],
                          // <?php
                          //   $sql5="SELECT * FROM jenisrekap ORDER BY kd_jenisrekap";
                          //   $res5=mysqli_query($link,$sql5);
                          //   while($data5=mysqli_fetch_array($res5)){
                          //     echo $data5['jenisrekap'].",";
                          //   }
                          // ?>
                          
                          datasets : [
                          {
                            fillColor : "#FC8213",
                            data : [
                            <?php
                            $sql1="SELECT * FROM anggaranperusahaan WHERE tahun='$tahun'";
                            $res1=mysqli_query($link,$sql1);
                            $data1=mysqli_fetch_array($res1);
                            $sql4="SELECT * FROM detailanggaran WHERE kd_anggaranperusahaan='$data1[kd_anggaranperusahaan]' ORDER BY kd_jenisanggaran";
                            $res4=mysqli_query($link,$sql4);
                            $i=1;
                            while($data4=mysqli_fetch_array($res4)){
                              echo $data4['jumlahanggaranperusahaan'].",";
                              $pos[$i]=$data4['jumlahanggaranperusahaan'];
                              $i++;
                            }
                            // 65,59,90,81,56,55,45,90,81,56,55,45,
                            ?>
                            ]
                          },
                          {
                            fillColor : "#337AB7",
                            data : [
                            <?php
                            $sql6="SELECT *, SUM(kredit) AS kreditt FROM `kasbesar` WHERE tanggal LIKE '%$tahun%' AND kd_jenisanggaran!='RK04' GROUP BY kd_jenisanggaran ORDER BY kd_jenisanggaran";
                            $res6=mysqli_query($link,$sql6);
                            $j=1;
                            while($data6=mysqli_fetch_array($res6)){
                              echo $data6['kreditt'].",";
                              $kre[$j]=$data6['kreditt'];
                              $j++;
                            }
                            // 65,59,90,81,56,55,45,90,81,56,55,45,
                            ?>
                            ]
                          }
                          ]

                        };
                        new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

                      </script>
                      <br>
                      <br>
                      <span class="label label-danger">&nbsp</span> Pos Anggaran<br>
                      <span class="label label-info">&nbsp</span> Realisasi
                    </div>                    
                  </div>
                </div>
                
                <div class="clearfix"> </div>
              </div>

              <br>
              <div class="main-page-chart-layer1">
                <div class="col-md-12 chart-layer1-left"> 
                  <div class="work-progres">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th rowspan="2"><center>No</center></th>
                        <th rowspan="2"><center>Pos Anggaran</center></th>
                        <th rowspan="2"><center>Realisasi</center></th>
                        <th rowspan="2"><center>Anggaran</center></th>
                        <th rowspan="2"><center>Persentase</center></th>
                        <th rowspan="2"><center>Status</center></th>
                        <th rowspan="2"><center>Tindakan</center></th>
                        <th colspan="3"><center>Selisih</center></th>
                      </tr>
                      <tr>
                        <th><center>Rupiah</center></th>
                        <th><center>%</center></th>
             
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql6="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran!='RK04' and kd_jenisanggaran!='RK13' ORDER BY kd_jenisanggaran";
                        $res6=mysqli_query($link,$sql6);
                        $k=1;
                        while($data6=mysqli_fetch_array($res6)){
                          $persen=round(($kre[$k]/$pos[$k]*100),2);
                          ?>
                        <tr>
                          <td><?php echo $k; ?></td>
                          <td><?php echo $data6['jenisanggaran']; ?></td>
                          <td><?php echo "Rp ".number_format($kre[$k]); ?></td>
                          <td><?php echo "Rp ".number_format($pos[$k]); ?></td>
                          <td><center><?php echo $persen." %"; ?></center></td>
                          <td><center><?php 
                            /*$min=ceil($pos[$k]*0.8);
                            if($kre[$k]>=$min && $kre[$k]<$pos[$k]){
                              echo "<span class='label label-warning'>Mendekati</span>";
                            }else*/ if($kre[$k]>=$pos[$k]){
                              echo "<span class='label label-danger'>Tidak Tercukupi</span>";
                            }else{
                              echo "<span class='label label-info'>Anggaran Tercukupi</span>";
                            }
                           ?></center></td>
                           <td><center><?php 
                            $min=ceil($pos[$k]*0.8);
                            if($kre[$k]>=$pos[$k])
                              echo "<span class='label label-danger'>Audit</span>";
                            else
                              echo "-";
                           ?></center></td>
                          <td><center><?php 
                            $has=$pos[$k]-$kre[$k];
                            if($has>0 || $has<0)
                              echo "Rp ".number_format($has);
                            else
                              echo "-";
                          ?></center></td>
                          <td><center><?php 
                            $perc=($has/$pos[$k])*100;
                            echo round($perc,2)." %";
                          ?></center></td>
                          
                        </tr>
                          <?php
                          $k++;
                          $has=0;
                          $perc=0;
                        }

                         ?>
                    </tbody>
                  </table>
                </div>
              </div>
                </div>
                <div class="clearfix"> </div>
              </div>


            </div>
            <br>
            <?php
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