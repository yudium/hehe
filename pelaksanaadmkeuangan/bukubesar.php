<head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="path-to/bootstrap.min.css">
<!-- Bootstrap DataTables CSS -->
<link rel="stylesheet" type="text/css" href="path-to/dataTables.bootstrap.css">
<!-- Jquery -->
<script type="text/javascript" language="javascript" src="path-to/jquery-1.10.2.min.js"></script>
<!-- Jquery DataTables -->
<script type="text/javascript" language="javascript" src="path-to/jquery.dataTables.min.js"></script>
<!-- Bootstrap Javascript -->
<script type="text/javascript" language="javascript" src="path-to/dataTables.bootstrap.js"></script>
</head>
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
    $thn1=date('Y');
    $min11=date('Y', strtotime('-1 year', strtotime($thn1)));
    $min22=date('Y', strtotime('-2 year', strtotime($thn1)));
?>
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
    <!--inner block start here-->
    <div class="inner-block">
      <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="chit-chat-heading">
      Cashflow
    </div>
    <div class="table-responsive">
      <table class="table table-hover" id="example">
        <thead>
          <tr>
            <th>No</th>
            <th style="width:70px;">Deskripsi</th>
            <th>Tanggal</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql="SELECT * FROM kasbesar";
          $res=mysqli_query($link,$sql);
          $i=1;
          while($data=mysqli_fetch_array($res)){
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo "Rp ".number_format($data['debet']); ?></td>
            <td><?php echo "Rp ".number_format($data['kredit']); ?></td>
            <td><?php echo "Rp ".number_format($data['saldo']); ?></td>
          </tr>
          <?php
          $i++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php
    sideske();
}else{
    header("Location: ../masuk.php");
}
ob_flush();
?>