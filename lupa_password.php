<?php
//mengambil data pelanggan
$host = "localhost";
$user = "root";
$password = "";
$db = "multi";

//mengisi nama host,username sql, dan password
$koneksi = mysqli_connect($host,$user,$password,$db);
if(mysqli_connect_errno())
{
  echo "Gagal Terhubung".mysqli_connect_error();
}
$query_pelanggan = "SELECT * FROM pelanggan";
$sql_pelanggan = mysqli_query($koneksi,$query_pelanggan);
$query_produk = "SELECT * FROM produk";
$sql_produk = mysqli_query($koneksi,$query_produk);
 ?>
<h1 class="page-header">Tambah Data Penjualan</h1>
<form class="style-form" role="form" id="form_penjualan">
  <input type="hidden" name="id_penjualan" id="id_penjualan" value="">
  <div class="row">
    <!-- panel 1 -->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Tanggal</label>
        <input class="form-control" id="tanggal" type="date" name="tanggal">
      </div>
      <div class="form-group">
          <label>Nama Pelanggan</label>
          <select name="id_pelanggan" class="form-control" id="id_pelanggan">
            <option value="" disabled="disabled" selected="selected">--Pilih Pelanggan--</option>
            <?php while ($data_pelanggan = mysqli_fetch_array($sql_pelanggan)) { ?>
            <option value="<?php echo $data_pelanggan['id_PELANGGAN']; ?>"><?php echo $data_pelanggan['nama_pelanggan']; ?></option>
            <?php } ?>
          </select>
      </div>
    </div>
  </div>

    <div class="col-md-6">
      <!-- form produk -->
      <div class="row">
        <!-- field produk -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Produk</label>
            <select class="form-control" id="nama_produk" name="nama_produk">
                <option value="" disabled="disabled" selected="selected">--Pilih Produk--</option>
                <?php while ($data_produk = mysqli_fetch_array($sql_produk)) { ?>
                    <option value="<?php echo $data_produk['id_produk'] ?>"><?php echo $data_produk['nama_produk'];?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="harga_produk" id="harga_produk" value="">
          </div>
        </div>

        <!-- field jumlah -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Jumlah</label>
            <div class="input-group">
                <input class="form-control" id="jumlah_produk" type="number" name="jumlah_produk">
                <span class="input-group-btn">
                  <button type="button" id="add_list" class="btn btn-round btn-primary" data-original-title="Toggle Navigation">+</button>
                </span>
            </div>
          </div>
        </div>
      </div>
  </div>
      <!-- tabel bahan baku -->
      <div class="row">
        <div class="col-md-12">
          <table id="tabel_detil_penjualan" class="table table-hover">
            <thead>
              <tr>
                  <th>NO</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                  <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

  <div class="row">
    <div class="col-md-12">
      <button type="submit" id="btn_submit_penjualan" value="proses_tambah_penjualan" class="btn btn-default">Proses</button>
    </div>
  </div>
</form>
<script>
var list_item=[];
var index_item=0;
</script>

<script>
$(document).ready(function(){
   $("#add_list").click(function(){
         add_list();
   });

   $("#form_penjualan").submit(function(e){
      e.preventDefault();
      submit();
      return false;
  });

  $("#nama_produk").change(function(){
      if (!this.value=="") {
          $.ajax({
             url: "http://multi-instrumentasi.com/lib/api_produk.php",
             type:"post",
             dataType: "json",
             data: {'action': "getharga","id_produk" : $("#nama_produk").val()},
             success: function(harga_produk){
                console.log(harga_produk);
                $("#harga_produk").val(harga_produk);
             },
             error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown);
             }
          })
      }
      // console.log(this.value);
  });

});

function add_list(){
   var index = index_item++;
   var id_produk = $("#nama_produk").val();
   var nama_produk = $("#nama_produk option:selected").text();
   var jumlah_produk = parseInt($("#jumlah_produk").val());
   var id_penjualan = $("#id_penjualan").val();
   var harga_produk = $("#harga_produk").val();
   var data_item = {
      aksi: "tambah", status: "", index: index_item,
      id_produk: id_produk, nama_produk: nama_produk,
      jumlah: jumlah_produk, harga_produk: harga_produk,
      sub_total: "",id_penjualan: id_penjualan,

   };

//menghitung sub total
var sub_total = parseFloat(harga_produk * jumlah_produk);
data_item.sub_total = sub_total;

   console.log(data_item);

   list_item.push(data_item);
   console.log(list_item);
   $("#tabel_detil_penjualan > tbody:last-child").append(
      "<tr>"+
         "<td></td>"+
         "<td>"+nama_produk+"</td>"+
         "<td>"+harga_produk+"</td>"+
         "<td>"+jumlah_produk+"</td>"+
         "<td>"+sub_total+"</td>"+
         "<td>"+button_aksi(index)+"</td>"+
      "</tr>"

   );
   number_list();
}
//
function getdataform(){
    var data_penjualan = {
        id_penjualan: $("#id_penjualan").val(),
        tanggal: $("#tanggal").val(),
        id_pelanggan: $("#id_pelanggan").val(),
    };
    var data = {
        "action": "tambah_penjualan",
        "data_penjualan": data_penjualan
    };

    return data;
}

//
function submit(){
   var data = getdataform();
   data.detil_penjualan = list_item;
//SAMPAI DISINI
   console.log(data);
   $.ajax({
      url: "http://multi-instrumentasi.com/lib/api_penjualan.php",
      type:"post",
      dataType: "json",
      data: data,
      success: function(hasil){
         console.log(hasil);
         if(hasil){
            document.location="http://multi-instrumentasi.com/pages/pemasaran/index.php?page=pengelolaan_data_penjualan";
         }
         else{
            alert("Error !!");
         }
      },
      error: function (jqXHR, textStatus, errorThrown){
         console.log(jqXHR, textStatus, errorThrown);
      }
   })
}
//
function number_list(){
   $('#tabel_detil_penjualan tbody tr').each(function (index){
      $(this).children("td:eq(0)").html(index+ 1);
   })
};
//
// function field_jumlah(jumlah, index){
//    var field = '<input type="number" min="0" step=0.01 onchange="onchange_qty('+index+', this)" style="width: 5em" class"form-control value="'+jumlah+'">';
//    return field;
// };
//
function button_aksi(index){
   var button = '<button type="button" class="button btn-danger btn-sm" onclick="delList('+index+',this)"><i class="fa fa-trash"></button>';
   return button;
}



</script>
