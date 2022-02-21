<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <!-- DataTables -->
          <div class="dataTable-container">
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="100">ID Penghapusan</th>
                  <th width="100">Tanggal Penghapusan</th>
                  <th width="100">User Input</th>
                  <th width="150">Total Harga Asset Dihapus</th>
                  <th width="150">Status Penghapusan Asset</th>
                  <th width="100">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $penghapusan) : ?>
                  <tr>
                    <td>
                      <?php echo $penghapusan->id_penghapusan ?>
                    </td>
                    <td>
                      <?php echo $penghapusan->tgl_hapus ?>
                    </td>
                    <td>
                      <?php echo $penghapusan->nama_user ?>
                    </td>
                    <td>
                      <?php echo $penghapusan->total_nilai_dihapus ?>
                    </td>
                    <td>
                      <?php echo $penghapusan->status_hapus ?>
                    </td>
                    <td>
                      <div class="mb-3">
                        <a href="" onclick="tampil_detail('<?php echo $penghapusan->id_penghapusan; ?>')" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-pencil-square">Detail</i></a>
                      </div>
                      <?php if ($penghapusan->status_hapus == 'Menunggu Konfirmasi') : ?>

                        <div class="mb-3">
                          <a href="<?php echo base_url('penghapusan/penyetujuan_penghapusan/' . $penghapusan->id_penghapusan) ?>" onclick="return confirm('Apakah Anda Ingin Menyetujui Transaksi Ini ?')" class="btn btn-outline-success btn-sm"><i class="bi bi-trash-fill">Setuju</i></a>
                        </div>
                        <div class="mb-3">
                          <a href="<?php echo base_url('penghapusan/pembatalan_penghapusan/' . $penghapusan->id_penghapusan) ?>" onclick="return confirm('Apakah Anda Akan Membatalkan Transaksi Ini ?')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill">Batal</i></a>
                        </div>
                      <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.box-body -->

    <div class="modal fade" id="basicModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Penghapusan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <table id="table1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID penghapusan</th>
                <th>Nama Asset</th>
                <th>Keterangan Dihapus</th>
                <th>Jumlah Asset</th>
                <th>Nilai Satuan</th>

              </tr>
            </thead>
            <tbody id="table-tbody">
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
<!-- /.content -->
<!-- /.content -->
<?php
// $this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  $(function() {
    $('.datatable').DataTable()

  })

  function tampil_detail(id) {

    $.ajax({
      url: "<?php echo site_url('penghapusan/detail_penghapusan/') ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var outstr = ''
        $.each(data, function(i, l) {
          outstr = outstr + '<tr>';
          outstr = outstr + '<td>' + l.id_penghapusan + '</td>';
          outstr = outstr + '<td>' + l.nama_asset + '</td>';
          outstr = outstr + '<td>' + l.jenis_hapus + '</td>';
          outstr = outstr + '<td>' + l.jumlah_hapus + '</td>';
          outstr = outstr + '<td>' + l.total_nilai_asset + '</td>';
          outstr = outstr + '</tr>';
        });
        if (outstr != '') {
          $('#table-tbody').html(outstr);
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });

  }

  function konfirmasi() {
    var tanya = confirm("Apakah Anda Akan Membatalkan Transaksi Ini ?");


    if (tanya === true) {
      var pembatalan = true;
    } else {
      var pembatalan = false;
    }

    document.getElementById("pesan").innerHTML = pesan;
    return pembatalan;
  }
</script>