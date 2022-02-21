<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <a href="<?php echo base_url('perencanaan/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
            Tambah Data
          </a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">

          <!-- DataTables -->
          <div class="dataTable-container">
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="150">ID Perencanaan</th>
                  <th width="150">Tanggal Pengajuan</th>
                  <th width="150">ID Staff Penginput</th>
                  <th width="150">Tujuan Pengajuan</th>
                  <th width="150">Tanggal Rencana Pengadaan</th>
                  <th width="150">Subtotal Perencanaan</th>
                  <th width="150">Status Data</th>
                  <th width="200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $perencanaan) : ?>
                  <tr>
                    <td>
                      <?php echo $perencanaan->id_perencanaan ?>
                    </td>
                    <td>
                      <?php echo $perencanaan->tgl_transaksi ?>
                    </td>
                    <td>
                      <?php echo $perencanaan->nama_user ?>
                    </td>
                    <td>
                      <?php echo $perencanaan->tujuan ?>
                    </td>
                    <td>
                      <?php echo $perencanaan->tgl_rencana_pengadaan ?>
                    </td>
                    <td>
                      <?php echo $perencanaan->total_perencanaan ?>
                    </td>
                    <td>
                      <?php echo $perencanaan->status_data ?>
                    </td>

                    <td>
                      <div>
                        <a href="" onclick="tampil_detail('<?php echo $perencanaan->id_perencanaan; ?>')" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-pencil-square">Detail</i></a>
                        <?php if ($perencanaan->status_data == 'Menunggu Konfirmasi') : ?>

                          <!-- <a href="<?php echo base_url('perencanaan/pembatalan_perencanaan/' . $perencanaan->id_perencanaan) ?>" onclick="return confirm('Apakah Anda Akan Membatalkan Transaksi Ini ?')" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill">Batal</i></a> -->
                        <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.box-body -->
  <!-- modal dialog-->
  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Perencanaan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table id="table1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Perencanaan</th>
              <th>Nama Asset</th>
              <th>Kategori Asset</th>
              <th>Jenis Asset</th>
              <th>Jumlah Diajukan</th>
              <th>Harga Satuan</th>
              <th>Total Harga Asset Diajukan</th>
            </tr>
          </thead>
          <tbody id="table-tbody">
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- End Basic Modal-->
  </div>
</section>
<!-- /.content -->
<!-- /.content -->
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  function tampil_detail(id) {

    $.ajax({
      url: "<?php echo site_url('Perencanaan/detail_perencanaan/') ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var outstr = ''
        $.each(data, function(i, l) {
          outstr = outstr + '<tr>';
          outstr = outstr + '<td>' + l.id_perencanaan + '</td>';
          outstr = outstr + '<td>' + l.nama_asset + '</td>';
          outstr = outstr + '<td>' + l.nama_kategori + '</td>';
          outstr = outstr + '<td>' + l.nama_jenis + '</td>';
          outstr = outstr + '<td>' + l.jumlah + '</td>';
          outstr = outstr + '<td>' + l.harga + '</td>';
          outstr = outstr + '<td>' + l.total_harga + '</td>';
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