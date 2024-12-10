<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header with-border color-header">
        <h3 class="box-title"><i class="fa fa-th"></i> Data Kategori Barang</h3>
        <div class="box-tools pull-right">
          <a class="btn btn-default btn-sm" href="<?php echo base_url('Kategori'); ?>">
          <span class="fa fa-refresh"></span> Refresh</a>
          <button type="button" class="btn btn-sm btn-success btnTambah" id="btnTambah"> 
          <span class="fa fa-plus"></span> Tambah</button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-condensed" id="mydata">
              <thead>
                <tr>
                  <th style='width:30px;text-align: center;'>#No</th>
                  <th>Kategori Barang</th>
                  <th style='width:120px;text-align: center;'>Action</th>
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

<!-- Modal Kategori -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="formModalTitle">Tambah Kategori Barang</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="form_add">
          <input type="hidden" id="id_kategori" name="id_kategori">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" id="btnSimpan" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Add Kategori -->

<!-- Menampilkan Data dengan Datatables -->
<script type="text/javascript">
  $(document).ready(function() {
    var bEdit = false;
    tampil_data();

    // Menampilkan Data di Tabel
    function tampil_data() {
      $.ajax({
        url: '<?php echo base_url(); ?>Kategori/tampilkanData',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          var html = "";
          for (var i = 0; i < response.length; i++) {
            var no = i + 1;
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td>' + response[i].nama_kategori + '</td>' +
              '<td><center>' +
              '<span><button edit-id="' + response[i].id_kategori + '" class="btn btn-success btn-xs btn_edit"><i class="fa fa-edit"></i> Edit</button><button style="margin-left: 5px;" data-id="' + response[i].id_kategori + '" class="btn btn-danger btn-xs btn_hapus"><i class="fa fa-trash"></i> Hapus</button></span>' +
              '</td>' +
              '</tr>';
          }
          $("#tbl_data").html(html);
          $("#mydata").DataTable();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
        }
      });
    }

    // Memanggil Modal Kategori
    $(document).on("click", "#btnTambah", function(e) {
      e.preventDefault();
      bEdit = false;
      $('#form_add')[0].reset();
      $('.form-group').removeClass('has-error');
      $('.help-block').empty();
      $('#formModal').modal('show');
      $('.modal-title').text('Tambah Kategori Barang');
    });

    // Edit Kategori
    $(document).on("click", ".btn_edit", function() {
      var id_kategori = $(this).attr("edit-id");
      bEdit = true;
      $.ajax({
        url: '<?php echo base_url(); ?>Kategori/tampilkanDataByID',
        type: 'POST',
        data: {
          id_kategori: id_kategori
        },
        dataType: 'json',
        success: function(response) {
          $('#form_add')[0].reset();
          $('.form-group').removeClass('has-error');
          $('.help-block').empty();
          $('.modal-title').text('Edit Kategori Barang');
          $('input[name="nama_kategori"]').val(response.nama_kategori);
          $('input[name="id_kategori"]').val(response.id_kategori);
          $('#formModal').modal('show');
        }
      });
    });

    // Kirim Data Proses Save/Update ke Controller
    $(document).on("click", "#btnSimpan", function(e) {
      e.preventDefault();
      var $this = $(this);
      var id_kategori = $('#id_kategori').val();
      var nama_kategori = $("#nama_kategori").val();
      var sURL = bEdit ? '<?php echo base_url(); ?>kategori/perbaruiData' : '<?php echo base_url(); ?>kategori/tambahData';

      $.ajax({
        url: sURL,
        type: "post",
        dataType: "json",
        data: {
          id_kategori: id_kategori,
          nama_kategori: nama_kategori
        },
        beforeSend: function() {
          $this.button('loading');
        },
        complete: function() {
          $this.button('reset');
        },
        success: function(data) {
          if (data.response == "success") {
            $("#form_add")[0].reset();
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();
            $('#formModal').modal('hide');
            Swal.fire({
              text: 'Data berhasil disimpan',
              icon: 'success',
              title: 'Saving Success',
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              $('#mydata').DataTable().destroy();
              tampil_data();
            });
          } else {
            Swal.fire('Error!', 'Ops! <br>' + data.message, 'error');
          }
        }
      });
    });

    // Hapus Data
    $(document).on('click', '.btn_hapus', function(e) {
      e.preventDefault();
      var id_kategori = $(this).attr('data-id');
      Swal.fire({
        title: 'Hapus Data?',
        text: 'Anda yakin menghapus Data Kategori ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya',
        showLoaderOnConfirm: true,
        preConfirm: () => {
          return new Promise(function(resolve, reject) {
            $.ajax({
                url: '<?php echo base_url(); ?>kategori/hapusData',
                type: 'POST',
                dataType: "json",
                data: {
                  id_kategori: id_kategori
                }
              })
              .done(function(data) {
                resolve(data);
              })
              .fail(function() {
                reject();
              });
          });
        },
        allowOutsideClick: () => !swal.isLoading()
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Data berhasil dihapus!',
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            $('#mydata').DataTable().destroy();
            tampil_data();
          });
        }
      });
    });
  });
  </script>
