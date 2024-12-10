<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border color-header">
                <h3 class="box-title"><i class="fa fa-th"></i> Data Pembelian Barang</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('pembelian'); ?>">
                    <span class="fa fa-refresh"></span> Refresh</a>
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('pembelian/tambah'); ?>">
                    <span class="fa fa-plus"></span> Pembelian Baru </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table condensed" id="mydata">
                            <thead>
                                <tr>
                                    <th style='width:10px;text-align: center;'>#</th>
                                    <th>Data Pembelian</th>
                                    <th>Nama Supplier</th>
                                    <th style='width:80px;text-align: center;'>Status</th>
                                    <th style='width:90px;text-align: right;'>#Total</th>
                                    <th style='width:80px;text-align: right;'>Pajak</th>
                                    <th style='width:80px;text-align: right;'>Potongan</th>
                                    <th style='width:80px;text-align: right;'>Biaya</th>
                                    <th style='width:80px;text-align: right;'>#GrandTotal</th>
                                    <th style='width:60px;text-align: center;'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
  function format_date(date) {
    if (!(date instanceof Date)) {
      date = new Date(date); // Convert to Date object if it's a string or timestamp
    }

    if (isNaN(date.getTime())) {
      return ""; // Return an empty string if the date is invalid
    }

    var options = {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
      timeZone: 'Asia/Jakarta' // Set the timezone to 'Asia/Jakarta' for Jakarta timezone
    };

    return date.toLocaleDateString('en-US', options);
  }

        tampil_data();
        function tampil_data(){
            $.ajax({
                url: '<?php echo base_url(); ?>pembelian/tampilkanData',
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    var i;
                    var no = 0;
                    var html = "";
                    for(i=0;i < response.length ; i++){
                        no++;
                        let stts_beli='';
                        if (response[i].stts_bayar!='0'){
                            stts_beli = '<span class="label label-success">Tunai</span>'
                        }else{
                            //Jika Status Transaksi Kredit
                            //Periksa apakah sudah jatuh tempo?
var tgl = new Date();

var dateNow = new Date();
var dateJT = new Date(response[i].tgl_jt);
if (dateNow >= dateJT) {
  stts_beli = '<span class="label label-danger">Kredit</span><br><i style="color: #00a65a !important" class="fa fa-calendar"></i> ' + format_date(dateJT);
} else {
  stts_beli = '<span class="label label-warning">Kredit</span><br><i style="color: #00a65a !important" class="fa fa-calendar"></i> ' + format_date(dateJT);
}
                        }
                        html = html + '<tr>'
                        + '<td >' + no  + '</td>'
                        + '<td><b>' + response[i].no_faktur +
                          '</b><br><i style="color: #00a65a !important" class="fa fa-calendar" ></i> '+
                          format_date(response[i].tgl_faktur) + '</td>'
                        + '<td><b>' + response[i].nama_supp + ' .' + response[i].jenis+
                          '</b><br>No Bukti :' + response[i].no_bukti+ '</td>'
                        + '<td>' + stts_beli + '</td>'
                        + '<td style="text-align: right;font-weight: bold;">' + Intl.NumberFormat('id-ID').format(response[i].total_beli) + '</td>'
                        + '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].ppn) + '</td>'
                        + '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].potongan) + '</td>'
                        + '<td style="text-align: right;">' + Intl.NumberFormat('id-ID').format(response[i].biaya_lain) + '</td>'
                        + '<td style="text-align: right;font-weight: bold;">' + Intl.NumberFormat('id-ID').format(response[i].total_bersih) + '</td>'
                        + '<td><center>' + '<span><button data-id="'+response[i].no_faktur+
                          '" class="btn btn-success btn-xs btn_edit" title="Print faktur Pembelian"><i class="fa fa-print"></i></button><button style="margin-left: 5px;" data-id="'+response[i].no_faktur+
                          '" class="btn btn-danger btn-xs btn_hapus" title="Hapus Faktur Pembelian"><i class="fa fa-trash"></i></button></span>' + '</td>'
                        + '</tr>';
                    }
                    $("#tbl_data").html(html);
                    $('#mydata').DataTable();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }

        $("#tbl_data").on('click', '.btn_hapus', function (e) {
  e.preventDefault();
  var no_faktur = $(this).attr('data-id');
  Swal.fire({
    title: 'Hapus Data Pembelian Barang?',
    text: 'Anda Yakin menghapus Data Pembelian ini?',
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
          dataType: "json",
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
      $('#mydata').dataTable({ "bDestroy": true }).fnDestroy();
      tampil_data();
      Swal.fire({
        icon: 'success',
        title: 'Data Telah Berhasil di Hapus',
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
});

    });
</script>