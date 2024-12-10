
<div class="page-wrapper">
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-th"></i> Transaksi Baru</h3>
			<a class='btn_tutup pull-right btn btn-primary btn-sm 'id='btn_tutup'>Tutup Transaksi</a>
		</div>
		<br>

<div class="container-fluid">
	<form action="" method="post" id="form_beli">
		<div class="row">
			<div class="col-md-6">
				<label for="">Data Customer</label>
				<div class="input-group">
					<span class="input-group-addon">
						<span class="fa fa-user "></span>
					</span>
					<select class="itemSupp form-control" id="itemSupp" name="itemSupp"></select>
					<input readonly type="hidden" id="id_supp" name="id_supp" class="form-control input-sm" >
					<div class="input-group-addon">
						<a class="tambah_supplier" href="#"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group">
					<label for="">#No Invoice</label>
					<input readonly type="text" id="no_faktur" name="no_faktur" value="<?php echo $nofaktur; ?>"
					class="form-control input-sm" >
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group">
					<label for="">#No Bukti</label>
					<input type="text" id="no_bukti" name="no_bukti" class="form-control input-sm" >
				</div>
			</div>
			<div class="col-md-1">
				<div class="form-group">
					<label for="">Tanggal</label>
					<div class="input-group date">
						<input lass="form-control" id="tgl_beli" name="tgl_beli" type="date" value="<?php echo date('Y-m-d'); ?>">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<label for="">Cari Nama Barang</label>
				<div class="input-group">
				<span class="input-group-addon">
					<span class="fa fa-list-alt"></span>
				</span>
				<input readonly type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang.."
				class="form-control cari_barang" >
				<input readonly type="hidden" id="id_produk" name="id_produk" class="form-control input-sm" >
				<div class="input-group-addon">
					<a class="cari_barang" href="#"><i class="fa fa-search"></i></a>
				</div>
			</div>
		</div>
		
		<div class="col-md-2">
			<div class="form-group">
				<label for="">Satuan</label>
				<input readonly type="text"  id="satuan" name="satuan" class="form-control input-sm" >
			</div>
		</div>

		<div class="col-md-1">
			<div class="form-group">
				<label for="">Stok</label>
				<input readonly type="text"  id="stok" name="stok" class="form-control input-sm" >
			</div>
		</div>
	
		<div class="col-xs-2">
			<div class="form-group">
				<label for="">Harga Beli</label>
				<input id="harga_beli" name="harga_beli" style="text-align:right;color:blue;font-weight: bold;"
				type="text" class="form-control input-sm" >
			</div>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-xs-1">
			<div class="form-group">
				<label for="">Margin <span class="text-danger">*</span></label>
				<input type="text" name="margin" id="margin" autocomplete="off" onkeypress="return isNumber(this, event);"
				style='text-align: right' class="form-control input-sm" maxlength="2" onkeyup="hitung_hpp()" required>
			</div>
		</div>

		<div class="col-xs-2">
			<div class="form-group">
				<label for="">Harga Pokok <span class="text-danger">*</span></label>
				<input type="text" autocomplete="off" onkeypress="return isNumber(this, event);" style='text-align: right'
				name="harga_pokok" id="harga_pokok" class="form-control input-sm" required>
			</div>
		</div>

		<div class="col-xs-2">
			<div class="form-group">
				<label for="">Harga Jual <span class="text-danger">*</span></label>
				<input type="text" autocomplete="off" onkeypress="return isNumber(this, event);" style='text-align: right'
				name="harga_jual" id="harga_jual" class="form-control input-sm" required>
			</div>
		</div>

		<div class="col-xs-1">
			<div class="form-group">
				<label for="">Jumlah <span class="text-danger">*</span></label>
				<input autocomplete="off" name="qty" id="qty" onkeypress="return isNumber(this, event);"
				style='text-align: right' type="text" onkeyup="hitung_subtotal()" class="form-control input-sm" />
			</div>
		</div>

		<div class="col-xs-1">
			<div class="form-group">
				<label >Diskon</label>
				<input id="diskon" name="diskon" onkeypress="return isNumber(this, event);" type="text" autocomplete="off"
				style="text-align:right;" class="form-control input-sm" maxlength="2" onkeyup="hitung_subtotal()" required>
			</div>
		</div>

		<div class="col-xs-2">
			<div class="form-group">
				<label >Nilai Diskon</label>
				<input id="nilai_diskon" style="text-align:right;color:red;font-weight: bold;"
				name="nilai_diskon" class="form-control input-sm" readonly>
			</div>
		</div>
		
		<div class="col-xs-2">
			<div class="form-group">
				<label for="">Sub Total</label>
				<input id="sub_total" size="16" style="text-align:right;color:blue;font-weight: bold;"
					name="sub_total" class="form-control input-sm" readonly>
			</div>
			</div>
			<input id="total" size="16" style="text-align:right;color:blue;font-weight: bold;"
				name="total" class="form-control input-sm" type="hidden" readonly>
			</div>

			<div class="box-footer with-border color-footer">
				<div class="box-tools pull-right">
					<button type="button" disabled="disabled" class="btn btn-sm btn-success" id="btn_tambah"
					data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing ">
						<span class="fa fa-floopy-o"></span> Tambah </button>
					<button type="button" disabled="disabled" id="btn_clear" class="btn btn-sm btn-warning btn_clear">
						<span class="fa fa-times"></span> Batal </button>
				</div>
			</div>
	</form>

	<h4 class="item-title text-bold"><span class="text-danger">List </span>Barang di Beli</h4>
	<table class="table table-bordered table-condensed">
	<thead>
	<tr>
	<th style='width: 30px; text-align: center;'>#No</th>
	<th>Nama Barang</th>
	<th style='width: 80px; text-align: right;'>Harga Beli</th>
	<th style='width: 30px; text-align: right;'>Margin</th>
	<th style='width:100px; text-align: right;'>Harga Pokok</th>
	<th style='width: 80px; text-align: right;'>Harga Jual</th>
	<th style='width:40px; text-align: right;'>Qty</th>
	<th>Satuan </th>
	<th style='width: 80px; text-align: right;'>Nilai Disc</th>
	<th style='width: 80px; text-align: right;'>Sub Total</th>
	<th style='width:40px; text-align: center;'>Action</th>
	</tr>
	</thead>
	<tbody id="tbl_produk">
	</tbody>
	</table>

	<div class="col-sm-6">
<div class="row">
<div class="form-group row">
<div class="col-xs-6">
<div class="form-group">
<label for="">Cara Bayar</label>
<select class="form-control" id="is_bayar" name="is_bayar">
<option value="1">Tunai</option>
<option value="0">Kredit</option>
</select>
</div>
</div>

<div class="col-xs-2">
<div class="form-group">
<label >Term</label>
<input disabled="disabled" onkeypress="return isNumber(this, event);" name="term" id="term"
type="text" autocomplete="off" class="form-control input-sm" onkeyup="insertJatuhTempo()">
</div>
</div>

<div class="col-xs-3">
<div class="form-group">
<label>J. Tempo</label>
<input readonly name="dt_tempo" id="dt_tempo" type="text" class="form-control input-sm" required>
</div>
</div>

<div class="col-xs-11">
<div class="form-group">
<label for="">Catatan</label>
<textarea class="required form-control" name="keterangan" rows="3" required></textarea>
</div>
</div>

<div class="col-xs-11 ">
<div class="box-tools pull-right">
<button type="button" disabled="disabled" class="btn btn-sm btn-primary" id="btn_simpan"
data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing ">
<span class="fa fa-floppy-o"></span> Simpan Transaksi </button>

<button type="button" disabled="disabled" id="btn_batal" class="btn btn-sm_btn-danger btn_batal">
	<span class="fa fa-times"></span> Batal Transaksi</button>
</div>
</div>
</div>
</div>
</div>
<form action="" method="POST" id="form_bayar">
<div class="d-md-flex flex-md-wrap">
<div class="pt-2 mb-3 wmin-md-400 ml-auto">
<div class="table-responsive">
<table class="table">
<tbody>
<tr class="success" style="background-color: #f9f9f9 !important; font-weight: bold; font-size: 16px;">
<td colspan="1">#TOTAL PEMBELIAN</td>
<td style="text-align: right !important;">
<input id="total_beli" name="total_beli" type="text" readonly
style="width:120px; text-align: right;font-weight: bold; font-size: 16px; color:red" />
</td>
</tr>

<tr class="active" style="background-color: #f9f9f9 !important; font-size: 14px;">
<td colspan="1">JUMLAH DISKON</td>
<td style="text-align: right !important;">
<input id="nilai_potongan" name="nilai_potongan" readonly
style="width:120px;text-align: right;" type="text" autocomplete="off"/>
</td>
</tr>

<tr class="info" style="background-color: #f9f9f9 !important; font-size: 14px;">
<td colspan="1">PPN (11%)</td>
<td style="text-align: right !important;">
<input id="ppn" name="ppn" readonly
style="width:120px; text-align: right;" type="text" autocomplete="off"/>
</td>
</tr>

<tr class="active" style="background-color: #f9f9f9 !important; font-size: 14px;">
<td colspan="1">BIAYA LAIN</td>
<td style="text-align: right !important;">
<input id="biaya" name="biaya" onkeypress="return isNumber(this, event);"
style="width:120px;text-align: right;" type="text" onkeyup="hitungan_total()" autocomplete="off"/>
</td>
</tr>

<tr class="danger" style="background-color: #f9f9f9 !important;font-weight: bold; font-size: 16px;">
<td colspan="1">#GRAND_TOTAL</td>
<td style="text-align: right !important;">
<input id="grandtotal" name="grandtotal" type="text" readonly
style="width:120px; text-align: right; font-weight: bold; font-size: 16px; color:red" />
</td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- Modal Barang -->
<div class="modal fade" id="modal_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="item-title text-bold"><span class="text-danger">List</span> Barang</h4>
</div>
<div class="modal-body">
<table class="table table-bordered table-condensed" id="tblBarang">
<thead>
<tr>
<th style='width: 200px;'>Nama Barang</th>
<th style='width:10px; text-align: right;'>Harga Beli</th>
<th style='width:10px; text-align: right;'>Harga Jual</th>
<th style='width:10px;'>Satuan </th>
<th style='width:5;text-align: right;'>Stok </th>
<th style='width:10px;text-align: center;'>Action</th>
</tr>
</thead>
<tbody id="dataBarang">
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Data Supplier Barang</h4>
          </div>

          <form action="" method="post" id="form_add">
            <div class="modal-body">
              <input type="hidden" id="id_supp" name="id_supp">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                  <label for="">Jenis</label>
                    <select class="form-control" id="jenis" name="jenis">
                      <option value="PT">PT</option>
                      <option value="CV">CV</option>
                      <option value="UD">UD</option>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="">Nama Supplier</label>
                    <input type="text" id="nama_supp" name="nama_supp" autocomplete="off" class="form-control input-sm" 
                      placeholder="Nama Supplier">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Kontak Person</label>
                     <input type="text" id="kontak_person" name="kontak_person" autocomplete="off" class="form-control input-sm" 
                      placeholder="Kontrak Person">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Nomor Kontak</label>
                    <input type="text" id="no_kontak" name="no_kontak" autocomplete="off" class="form-control input-sm" 
                      placeholder="Nomor Kontak">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Kota</label>
                     <input type="text" id="kota" name="kota" autocomplete="off" class="form-control input-sm" 
                      placeholder="Kota">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" autocomplete="off" class="form-control input-sm" 
                      placeholder="alamat email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">No Telp/HP</label>
                     <input type="text" id="no_telp" name="no_telp" autocomplete="off" class="form-control input-sm" 
                      placeholder="No Telp">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">No Fax</label>
                    <input type="text" id="no_fax" name="no_fax" autocomplete="off" class="form-control input-sm" 
                      placeholder="Nomor Fax">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Alamat</label>
                     <textarea class="required form-control" name="alamat" rows="2" placeholder="Alamat Lengkap" required></textarea>
                  </div>
                </div>
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary " id="btnSave_Supplier"
              data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing ">Simpan Data</button>
          </div>
        </div>
      </div>
</div>

<script src="<?php echo base_url().'assets/js/validate.js'?>"></script>
<script src="<?php echo base_url().'assets/js/beli.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var bTransaksi=false;
		tampil_listbarang();
		//Pencarian Nama Supplier
		$("#itemSupp").select2({
			ajax: {
				url: '<?php echo base_url(); ?>pembelian/findSupplier',
				type: "POST",
				dataType: 'json',
				delay: 350,
				data: function (params) {
					return {
						searchTerm: params.term // search term
					};
				},
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});

		//Reset Form
		function resetForm() {
			$("#id_produk").val('');
			$("#nama_barang").val('');
			$("#satuan").val('');
			$("#stok").val('');
			$("#qty").val('');
			$("#margin").val('');
			$("#harga_beli").val('');
			$("#nilai_margin").val('');
			$("#nilai_diskon").val('');
			$("#harga_jual").val('');
			$("#harga_pokok").val('');
			$('#sub_total').val('');
			$('#btn_tambah').attr('disabled', 'true');
			$('#btn_clear').attr('disabled', 'true');
		}

		//Reset Batal
		function resetTransaksi(){
			resetForm();
			$('#grandtotal').val('0');
			$('#btn_simpan').attr('disabled', 'true');
			$('#btn_batal').attr('disabled', 'true');
			$('#itemSupp').val('null').trigger('change');
			$('#term').val('');
			$('#dt_tempo').val('');
			$('#is_bayar').val('');
			bTransaksi=false;
		}

		//Tampilkan Modal List Barang
		$(document).on("click", ".cari_barang", function(e){
			var id_supp	= $("#id_supp").val();
			if(id_supp==''){
				Swal.fire({
					icon: 'error',
					title: 'Oops...<br> Data Supplier Belum di Pilih',
					footer: 'Transaksi Pembelian Barang'
				});
			}else{
				showBarang();
				$("#modal_barang").modal('show');
			}

		});

     // Batalkan List Barang
$(document).on("click", "#btn_clear", function (e) {
  e.preventDefault();
  resetForm();
});

// Tampilkan Pencarian Barang
function showBarang() {
  $.ajax({
    url: '<?php echo base_url(); ?>pembelian/tampilkanListBarang',
    type: 'POST',
    dataType: 'json',
    delay: 800,
    success: function (response) {
      var i;
      var no = 0;
      var html = "";
      for (i = 0; i < response.length; i++) {
        no++;
        html =html + '<tr>' +
          '<td>' + response[i].nama_produk + '</td>' +
          '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].harga_beli) + '</td>' +
          '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].harga_pokok) + '</td>' +
          '<td>' + response[i].nama_satuan + '</td>' +
          '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].stok) + '</td>' +
          '<td><center><span><button class="btn btn-success btn-xs btn_pilih" data-id="' + response[i].id_produk +
          '" data-nama="' + response[i].nama_produk + '">Pilih Data</button></span></center></td>' +
          '</tr>';
      }
      $("#dataBarang").html(html);
      $('#tblBarang').DataTable();
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
    }
  });
}

// Pilih Data Barang
$("#dataBarang").on('click', '.btn_pilih', function (e) {
  e.preventDefault();
  var id_produk = $(this).data('id');
  var nama_produk = $(this).data('nama');
  if (id_produk == "") {
    Swal.fire('Data Produk tidak ditemukan!', 'Item Barang belum ada yang di pilih.', 'error');
  } else {
    $.ajax({
      url: '<?php echo base_url(); ?>pembelian/findBarang',
      type: "post",
      dataType: "json",
      delay: 250,
      data: { id_produk: id_produk },
      success: function (data) {
        console.log(data);
        if (data.responce == "success") {
          $("#modal_barang").modal('hide');
          $('#id_produk').val(data.post.id_produk);
          let harga_beli = data.post.harga_beli ? parseFloat(data.post.harga_beli).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") : "";
          let harga_pokok = data.post.harga_pokok ? parseFloat(data.post.harga_pokok).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") : "";
          let harga_jual = data.post.harga_jual ? parseFloat(data.post.harga_jual).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") : "";
          let stok = parseInt(data.post.stok);
          if (isNaN(stok)) stok = 0;
          $('#nama_barang').val(nama_produk); // Mengisi nilai otomatis ke input nama_barang
          $('#satuan').val(data.post.nama_satuan);
          $('#stok').val(parseInt(stok));
          $('#harga_beli').val(harga_beli);
          $('#harga_jual').val(harga_jual);
          $('#harga_pokok').val(harga_pokok);
          $('#harga_beli').focus();
        } else {
          Swal.fire('Gagal!', 'Item Barang tidak ditemukan.', 'error');
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
    });
  }
});


 // Batalkan List Barang
 $(document).on("click", "#btn_clear", function (e) {
  e.preventDefault();
  resetForm();
});

// Simpan List barang
$(document).on("click", "#btn_tambah", function (e) {
  e.preventDefault();
  var $this = $(this);
  var nama_barang = $('#nama_barang').val(); // Ambil nilai Nama Barang
  if (!nama_barang) { // Periksa apakah Nama Barang sudah dipilih
    Swal.fire('Error!', 'Ops! <br> Nama Barang belum dipilih', 'error');
    return;
  }
  var formData = new FormData($('#form_beli')[0]);
  $.ajax({
    url: '<?php echo base_url(); ?>pembelian/simpanProduk',
    type: "post",
    dataType: "json",
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      $this.button('loading');
    },
    complete: function () {
      $this.button('reset');
    },
    success: function (data) {
      if (data.responce == "success") {
        bTransaksi = true;
        Swal.fire({
          text: 'Data berhasil di Simpan',
          icon: 'success',
          title: 'Saving Success',
          showConfirmButton: false,
          timer: 1500
        });
        $('#btn_simpan').removeAttr('disabled', 'false');
        $('#btn_batal').removeAttr('disabled', 'false');
        $('#itemSupp').attr('disabled', 'true');
        tampil_listbarang();
        resetForm();
      } else {
        Swal.fire('Error!', 'Ops! <br>' + data.message, 'error');
      }
    }
  });
});

 //Tampilkan Data Barang pada Modal
 function tampil_listbarang() {
    var no_faktur = $("#no_faktur").val();
    $.ajax({
        url: 'http://localhost/ci_fullstack/pembelian/getListBarang',
        type: 'POST',
        dataType: 'json',
        delay: 800,
        data: { no_faktur: no_faktur },
        success: function(response) {
            console.log(response);
            var i;
            var no = 0;
            var html = "";
            var total = 0;
            var jumlah = 0;
            var diskon = 0;
            var nilai_diskon = 0;
            for (i = 0; i < response.length; i++) {
                no++;
                jumlah = parseInt(response[i].sub_total, 10);
                total += jumlah;
                diskon = parseInt(response[i].nilai_diskon, 10);
                nilai_diskon += diskon;
                html += '<tr>' +
                    '<td>' + no + '</td>' +
                    '<td>' + response[i].nama_produk + '</td>' +
                    '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].harga_beli) + '</td>' +
                    '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].margin) + '</td>' +
                    '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].harga_pokok) + '</td>' +
                    '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].harga_jual) + '</td>' +
                    '<td style="text-align: right;">' + response[i].qty + '</td>' +
                    '<td>' + response[i].nama_satuan + '</td>' +
                    '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].nilai_diskon) + '</td>' +
                    '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].sub_total) + '</td>' +
                    '<td><center>' + '<span><button data-id="' + response[i].id_beli + '" class="btn btn-danger btn-xs btn_del">Hapus</button></span>' +
                    '</td>' + '</tr>';
            }
            $("#tbl_produk").html(html);
            var total_beli = total.toLocaleString('id-ID');
            var potongan = nilai_diskon.toLocaleString('id-ID');
            $("#total_beli").val(total_beli);
            $("#nilai_potongan").val(potongan);
            $("#grandtotal").val(total_beli);
            hitung_total();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    });
}



// Hapus Data list Barang
$("#tbl_produk").on('click', '.btn_del', function (e) {
  e.preventDefault();
  var id_beli = $(this).attr('data-id');
  Swal.fire({
    title: 'Hapus List Item Barang?',
    text: 'Anda yakin menghapus data Barang ini?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    cancelButtonText: 'Tidak',
    confirmButtonText: 'Ya',
    showLoaderOnConfirm: true,
    preConfirm: () => {
      return new Promise(function (resolve, reject) {
        $.ajax({
          url: '<?php echo base_url(); ?>pembelian/hapusItemBarang',
          type: 'POST',
          dataType: 'json',
          data: { id_beli: id_beli },
          success: function (data) {
            resolve(data);
          },
          error: function () {
            reject();
          }
        });
      });
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.value) {
      tampil_listbarang();
      Swal.fire({
        icon: 'success',
        title: 'Data Item Barang Berhasil di Hapus',
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
});

// Batalkan Transaksi Pembelian
$(document).on('click', '#btn_batal', function (e) {
  e.preventDefault();
  var no_faktur = $('#no_faktur').val();
  Swal.fire({
    title: 'Batalkan Transaksi Pembelian Barang?',
    text: 'Data Transaksi Penjualan akan di hapus!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    cancelButtonText: 'Tidak',
    confirmButtonText: 'Ya',
    showLoaderOnConfirm: true,
    preConfirm: () => {
      return new Promise(function (resolve, reject) {
        $.ajax({
          url: '<?php echo base_url(); ?>pembelian/hapusTransaksi',
          type: 'POST',
          dataType: 'json',
          data: { no_faktur: no_faktur },
          success: function (data) {
            resolve(data);
          },
          error: function () {
            reject();
          }
        });
      });
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.value) {
      tampil_listbarang();
      resetTransaksi();
      Swal.fire({
        icon: 'success',
        title: 'Data Transaksi Pembelian Berhasil di Hapus',
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
});

$(document).on("click", "#btn_simpan", function(e) {
  e.preventDefault();
  var $this = $(this);
  var no_faktur = $("#no_faktur").val();
  var id_supp = $("#id_supp").val();
  var tgl_beli = $("#tgl_beli").val();
  var total_beli = $("#total_beli").val().replace(/[,.]/g, '');
  var is_bayar = $("#is_bayar").val();
  var potongan = $("#nilai_potongan").val().replace(/[,.]/g, '');
  var ppn = $("#ppn").val().replace(/[,.]/g, '');
  var biaya = $("#biaya").val().replace(/[,.]/g, '');
  var total_bersih = $("#grandtotal").val().replace(/[,.]/g, '');
  var term = $("#term").val();
  var tgl_tempo = $("#dt_tempo").val();

  if (is_bayar == 0 && term == "") {
    Swal.fire({
      icon: 'error',
      title: 'Terjadi Kesalahan!',
      text: 'Jangka Waktu Pembayaran wajib diisi'
    });
  } else {
    $.ajax({
      url: '<?php echo base_url(); ?>pembelian/saveTransaksi',
      type: "post",
      dataType: "json",
      data: {
        no_faktur: no_faktur,
        id_supp: id_supp,
        tgl_beli: tgl_beli,
        total_beli: total_beli,
        is_bayar: is_bayar,
        potongan: potongan,
        ppn: ppn,
        biaya: biaya,
        total_bersih: total_bersih,
        term: term,
        tgl_tempo: tgl_tempo
      },
      beforeSend: function() {
        $this.button('loading');
      },
      complete: function() {
        $this.button('reset');
      },
      success: function(data) {
        if (data.responce == "success") {
          resetTransaksi();

          // Mengirim tanggal ke beli.js
          sendDataToBeliJs(tgl_beli);

          Swal.fire({
            title: 'Masih Menambah Data Transaksi Pembelian Baru?',
            text: 'Proses' + (data.message),
            footer: 'Transaksi Pembelian Barang',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
          }).then((result) => {
            if (result.value) {
              window.location.assign("<?php echo base_url()?>pembelian/tambah");
            } else {
              window.location.assign("<?php echo base_url()?>pembelian");
            }
          });
        } else {
          Swal.fire('Error!', 'Ops! <br>' + data.message, 'error');
        }
      }
    });
  }
});

function sendDataToBeliJs(tgl) {
  $.ajax({
    url: 'beli.js',
    type: 'post',
    data: { tgl_beli: tgl },
    success: function(response) {
      console.log('Data tanggal dikirim ke beli.js');
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
}


// Tutup Transaksi (Pembatalan)
$(document).on("click", "#btn_tutup", function(e) {
  e.preventDefault();
  var no_faktur = $("#no_faktur").val();
  if (typeof bTransaksi !== "undefined" && bTransaksi !== false) {
    Swal.fire({
      title: 'Tutup Transaksi Pembelian ini?',
      text: 'Semua Data Transaksi Akan terhapus!!!',
      icon: 'warning',
      footer: 'Proses ini akan menghapus data List Barang !!',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url("pembelian/hapusTransaksi"); ?>',
          type: 'POST',
          data: { no_faktur: no_faktur },
          dataType: 'json',
          success: function(response) {
            Swal.fire({
              title: 'Tutup Transaksi',
              text: 'Transaksi Pembelian Berhasil di Batalkan',
              icon: 'success',
              showConfirmButton: true
            }).then(() => {
              window.location.assign("<?= base_url('pembelian'); ?>");
            });
          }
        });
      }
    });
  } else {
    window.location.assign("<?= base_url('pembelian'); ?>");
  }
});
});


</script>
