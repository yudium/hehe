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
                 
                  <div class="glocy-chart">
        <div class="chit-chat-heading">
          Monitoring Trnsaksi Tahun <?php  echo $tahun."<br>";?>
        </div>
				<br>
						<div id="graph9">
							<?php
					          $sql2="SELECT tanggal, kd_jenisanggaran, SUM(debet) AS debet, SUM(kredit) AS kredit FROM `kasbesar` WHERE tanggal LIKE '%$tahun%' GROUP BY SUBSTR(tanggal,1,7)";
					          $res2=mysqli_query($link,$sql2);
					          $e=1;
					          while($data2=mysqli_fetch_array($res2)){
					            $deb[$e]=$data2['debet'];
					            $kred[$e]=$data2['kredit'];
					          	$e++;
					          }
					          ?>
						<script>
						var day_data = [
						  {"elapsed": "Jan", "Debet": <?php echo $deb[1]; ?>, "Kredit": <?php echo $kred[1]; ?>},
						  {"elapsed": "Feb", "Debet": <?php echo $deb[2]; ?>, "Kredit": <?php echo $kred[2]; ?>},
						  {"elapsed": "Mar", "Debet": <?php echo $deb[3]; ?>, "Kredit": <?php echo $kred[3]; ?>},
						  {"elapsed": "Apr", "Debet": <?php echo $deb[4]; ?>, "Kredit": <?php echo $kred[4]; ?>},
						  {"elapsed": "Mei", "Debet": <?php echo $deb[5]; ?>, "Kredit": <?php echo $kred[5]; ?>},
						  {"elapsed": "Jun", "Debet": <?php echo $deb[6]; ?>, "Kredit": <?php echo $kred[6]; ?>},
						  {"elapsed": "Jul", "Debet": <?php echo $deb[7]; ?>, "Kredit": <?php echo $kred[7]; ?>},
						  {"elapsed": "Aug", "Debet": <?php echo $deb[8]; ?>, "Kredit": <?php echo $kred[8]; ?>},
						  {"elapsed": "Sep", "Debet": <?php echo $deb[9]; ?>, "Kredit": <?php echo $kred[9]; ?>},
						  {"elapsed": "Okt", "Debet": <?php echo $deb[10]; ?>, "Kredit": <?php echo $kred[10]; ?>},
						  {"elapsed": "Nov", "Debet": <?php echo $deb[11]; ?>, "Kredit": <?php echo $kred[11]; ?>},
						  {"elapsed": "Des", "Debet": <?php echo $deb[12]; ?>, "Kredit": <?php echo $kred[12]; ?>}
						];
						Morris.Bar({
						  element: 'graph9',
						  data: day_data,
						  xkey: 'elapsed',
						  ykeys: ['Debet','Kredit'],
						  labels: ['Debet','Kredit'],
						  parseTime: false
						});
						</script>
					</div>	
			</div>
			<div class="panel panel-default">
    <div class="chit-chat-heading">
      Monitoring Transaksi Tahun <?php  echo $tahun."<br>";?>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:20px;"><center>No</center></th>
            <th><center>Bulan</center></th>
            <th><center>Pendapatan</center></th>
            <th><center>Pengeluaran</center></th>
            <th><center>Status</center></th>
            <th><center>Tindakan</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql1="SELECT tanggal, kd_jenisanggaran, SUM(debet) AS debet, SUM(kredit) AS kredit FROM `kasbesar` WHERE tanggal LIKE '%$tahun%' GROUP BY SUBSTR(tanggal,1,7)";
          $res1=mysqli_query($link,$sql1);
          $i=1;
          while($data1=mysqli_fetch_array($res1)){
            $bln=date("F",strtotime($data1['tanggal']));
          ?>
          <tr>
            <td><center><?php echo $i;?></center></td>
            <td><center><?php echo $bln;?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['debet']);?></center></td>
            <td><center><?php echo "Rp ".number_format($data1['kredit']);?></center></td>
            <td><center><?php 
              if($data1['kredit']>$data1['debet']){
                echo "<span class='label label-danger'>Tidak Aman</span>";
              }else{
                echo "<span class='label label-warning'>Aman</span>";
              }
            ?></center></td>
			<td><center><?php 
              if($data1['kredit']>$data1['debet']){
                echo "<span class='label label-danger'>Audit</span>";
              }else{
                echo "-";
              }
            ?></center></td>
          </tr>
          <?php
          $i++;
          }
          ?>
        </tbody>
      </table>
    </div>	
	</div>
	
                <div class="clearfix"> </div>
              </div>


            </div>

<!--inner block end here-->
<!--copy rights start here-->
<!--COPY rights end here-->
<br>
            <?php
          }
         ?>
</div>
</div>
</div>
</div>
</div>
<?php
sidemanke();
}else{
  header("Location: ../masuk.php");
}
ob_flush();
?>