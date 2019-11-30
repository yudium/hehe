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
  $tahun=base64_decode($_GET['CNgjefbw']);
  $jenisrekap=base64_decode($_GET['bkfwFWv']);

  $sql1="SELECT * FROM jenisanggaran WHERE kd_jenisanggaran='$jenisrekap'";
  $res1=mysqli_query($link,$sql1);
  $data1=mysqli_fetch_array($res1);
  ?>
  <!--inner block start here-->
  <div class="inner-block">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="chit-chat-heading">
          Monitoring <?php echo strtoupper($data1['jenisanggaran'])." TAHUN ".$tahun;?>
        </div>
         <div id="graph9">
              <?php
              $sql2="SELECT *, SUM(kredit) AS kredit FROM kasbesar WHERE tanggal LIKE '%$tahun%' AND kd_jenisanggaran='$jenisrekap' GROUP BY SUBSTR(tanggal,6,2)";
              $res2=mysqli_query($link,$sql2);
              $e=1;
              while($data2=mysqli_fetch_array($res2)){
                $kred[$e]=$data2['kredit'];
                $e++;
              }
              ?>
            <script>
            var day_data = [
              {"elapsed": "Jan", "Kredit": <?php echo $kred[1]; ?>,},
              {"elapsed": "Feb", "Kredit": <?php echo $kred[2]; ?>,},
              {"elapsed": "Mar", "Kredit": <?php echo $kred[3]; ?>,},
              {"elapsed": "Apr", "Kredit": <?php echo $kred[4]; ?>,},
              {"elapsed": "Mei", "Kredit": <?php echo $kred[5]; ?>,},
              {"elapsed": "Jun", "Kredit": <?php echo $kred[6]; ?>,},
              {"elapsed": "Jul", "Kredit": <?php echo $kred[7]; ?>,},
              {"elapsed": "Aug", "Kredit": <?php echo $kred[8]; ?>,},
              {"elapsed": "Sep", "Kredit": <?php echo $kred[9]; ?>,},
              {"elapsed": "Okt", "Kredit": <?php echo $kred[10]; ?>,},
              {"elapsed": "Nov", "Kredit": <?php echo $kred[11]; ?>,},
              {"elapsed": "Des", "Kredit": <?php echo $kred[12]; ?>}
            ];
            Morris.Line({
              element: 'graph9',
              data: day_data,
              xkey: 'elapsed',
              ykeys: ['Kredit'],
              labels: ['Kredit'],
              parseTime: false
            });
            </script>
          </div>  
        <br>
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