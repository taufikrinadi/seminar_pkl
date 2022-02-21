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
          <a href="<?php echo base_url('pengadaan/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
            Tambah Data
          </a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">

          <!-- DataTables -->
          <div class="dataTable-container">
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="150">ID Pengadaan</th>
                  <th width="150">Tanggal Pengadaan</th>
                  <th width="150">Tanggal Perencanaan</th>
                  <th width="150">Subtotal Perencanaan</th>
                  <th width="150">Subtotal Realisasi</th>
                  <th width="150">Staff Penginput</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $pengadaan) : ?>
                  <tr>
                    <td>
                      <?php echo $pengadaan->id_pengadaan ?>
                    </td>
                    <td>
                      <?php echo $pengadaan->tgl_pengadaan ?>
                    </td>
                    <td>
                      <?php echo $pengadaan->tgl_perencanaan ?>
                    </td>
                    <td>
                      <?php echo $pengadaan->total_harga_diajukan ?>
                    </td>
                    <td>
                      <?php echo $pengadaan->total_harga ?>
                    </td>
                    <td>
                      <?php echo $pengadaan->nama_user ?>
                    </td>

                    <td>
                      <div>
                        <a href="" onclick="tampil_detail('<?php echo $pengadaan->id_pengadaan; ?>')" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-pencil-square">Detail</i></a>
                      </div>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.box-body -->
    <!-- modal dialog-->
    <div class="modal fade" id="basicModal" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Perencanaan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <table id="table1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Pengadaan</th>
                <th>Nama Asset</th>
                <th>Jumlah Diajukan</th>
                <th>Harga Perencanaan</th>
                <th>Harga Pengadaan</th>
                <th>Total Harga Asset</th>
              </tr>
            </thead>
            <tbody id="table-tbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  function tampil_detail(id) {

    $.ajax({
      url: "<?php echo site_url('Pengadaan/detail_pengadaan/') ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var outstr = ''
        $.each(data, function(i, l) {
          outstr = outstr + '<tr>';
          outstr = outstr + '<td>' + l.id_pengadaan + '</td>';
          outstr = outstr + '<td>' + l.nama_asset + '</td>';
          outstr = outstr + '<td>' + l.jumlah + '</td>';
          outstr = outstr + '<td>' + l.harga_pengadaan + '</td>';
          outstr = outstr + '<td>' + l.harga_realisasi + '</td>';
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