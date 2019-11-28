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
		<div class="chit-chat-heading">
		Laporan Jurnal Umum
		</div>
        <form class="form-horizontal style-form" role="form" method="post" action="" onsubmit="return validate();">
		<br>
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
			<div class="table-agile-info">
			<div class="panel panel-default">
			<div class="chit-chat-heading">
        <center>
        <table border="0" id="rugilaba">
        <tr>
            <td colspan="5"><center>CV. PUTRA RASMANA</center></td>
        </tr>
        <tr>
            <td colspan="5"><center>LAPORAN Jurnal Umum</center></td>
        </tr>
        <tr>
            <td colspan="5"><center>PRIODE 31 DESEMBER <?php echo $tahun; ?></center></td>
        </tr>
		<tr>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
        </tr>
        <tr>
          <td>Nama Akun </td>
		  <td>&nbsp&nbsp</td>
          <td>Debet </td>
		  <td>&nbsp&nbsp</td>
          <td>Kredit </td>
        </tr>
		<tr>
		  <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
          <td>&nbsp&nbsp</td>
		</tr>
		<?php 
          $sql1="SELECT SUM(kredit) AS gaji, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK02' GROUP BY k.kd_jenisanggaran";
          $res1=mysqli_query($link,$sql1);
          $data1=mysqli_fetch_array($res1);
		  
		  $sql2="SELECT SUM(kredit) AS project, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK01' GROUP BY k.kd_jenisanggaran";
          $res2=mysqli_query($link,$sql2);
          $data2=mysqli_fetch_array($res2);
		  
		  $sql3="SELECT SUM(kredit) AS industri, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK03' GROUP BY k.kd_jenisanggaran";
          $res3=mysqli_query($link,$sql3);
          $data3=mysqli_fetch_array($res3);
		  
		  $sql4="SELECT SUM(kredit) AS training, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK05' GROUP BY k.kd_jenisanggaran";
          $res4=mysqli_query($link,$sql4);
          $data4=mysqli_fetch_array($res4);
		  
		  $sql5="SELECT SUM(kredit) AS transport, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK07' GROUP BY k.kd_jenisanggaran";
          $res5=mysqli_query($link,$sql5);
          $data5=mysqli_fetch_array($res5);
		  
		  $sql6="SELECT SUM(kredit) AS office, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK08' GROUP BY k.kd_jenisanggaran";
          $res6=mysqli_query($link,$sql6);
          $data6=mysqli_fetch_array($res6);
		  
		  $sql7="SELECT SUM(kredit) AS equipment, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK09' GROUP BY k.kd_jenisanggaran";
          $res7=mysqli_query($link,$sql7);
          $data7=mysqli_fetch_array($res7);
		  
		  $sql8="SELECT SUM(kredit) AS utility, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK10' GROUP BY k.kd_jenisanggaran";
          $res8=mysqli_query($link,$sql8);
          $data8=mysqli_fetch_array($res8);
		  
		  $sql9="SELECT SUM(kredit) AS conversi, jenisanggaran FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran='RK12' GROUP BY k.kd_jenisanggaran";
          $res9=mysqli_query($link,$sql9);
          $data9=mysqli_fetch_array($res9);
		  
		  $sql10="SELECT SUM(kredit) AS total FROM kasbesar k INNER JOIN jenisanggaran j ON k.kd_jenisanggaran=j.kd_jenisanggaran WHERE tanggal LIKE '%$tahun%' AND k.kd_jenisanggaran!='RK04' GROUP BY SUBSTR(k.kd_jenisanggaran,1,2)";
          $res10=mysqli_query($link,$sql10);
          $data10=mysqli_fetch_array($res10);
         ?>
		 <tr>
          <td>Beban Pelatihan</td>
		  <td>&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data2['project']); ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Budget Client + Kas</td>
		  <td>&nbsp&nbsp</td>
		  <td>&nbsp&nbsp</td>
          <td></td>
          <td><?php echo "Rp ".number_format($data2['project']); ?></td>
        </tr>
        <tr>
          <td>Beban Penggajian</td>
		  <td>&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data1['gaji']); ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Budget Client + Kas</td>
		  <td>&nbsp&nbsp</td>
		  <td>&nbsp&nbsp</td>
          <td></td>
          <td><?php echo "Rp ".number_format($data1['gaji']); ?></td>
        </tr>
		
		<tr>
          <td>Beban Perusahaan</td>
		  <td>&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data3['industri']); ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Budget Client + Kas</td>
		  <td>&nbsp&nbsp</td>
		  <td>&nbsp&nbsp</td>
          <td></td>
          <td><?php echo "Rp ".number_format($data3['industri']); ?></td>
        </tr>
		<tr>
          <td>Beban Lainnya</td>
		  <td>&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data4['training']); ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Budget Client + Kas</td>
		  <td>&nbsp&nbsp</td>
		  <td>&nbsp&nbsp</td>
          <td></td>
          <td><?php echo "Rp ".number_format($data4['training']); ?></td>
        </tr>
		
		</tr>
		<tr>
          <td align="center">Jumlah</td>
		  <td>&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data10['total']);?></td>
		  <td>&nbsp&nbsp</td>
          <td><?php echo "Rp ".number_format($data10['total']);?></td>
        </tr>
      </table>
    <hr>
    <a onClick="tableToExcel('rugilaba')"> <label><strong>Download&nbsp<i class="fa fa-cloud-download" aria-hidden="true"></i></a>
    <hr>
    </center>
		</div>
                </div>
                <div class="clearfix"> </div>
              </div>
              <br>
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