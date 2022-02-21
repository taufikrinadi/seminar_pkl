<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <a href="<?php echo base_url('pengelolaan/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
            Tambah Data
          </a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <!-- DataTables -->
          <div class="dataTable-container">
            <table class="table datatable">
              <thead>
                <tr>
                  <th>ID Pengelolaan</th>
                  <th>Tanggal Transaksi</th>
                  <th>Status Kelola</th>
                  <th>Lokasi</th>
                  <th>Staff Penginput</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $pengelolaan) : ?>
                  <tr>
                    <td>
                      <?php echo $pengelolaan->id_pengelolaan ?>
                    </td>
                    <td>
                      <?php echo $pengelolaan->tgl_transaksi ?>
                    </td>
                    <td>
                      <?php echo $pengelolaan->status_pengelolaan ?>
                    </td>
                    <td>
                      <?php echo $pengelolaan->peminjam ?>
                    </td>
                    <td>
                      <?php echo $pengelolaan->nama_user ?>
                    </td>
                    <td>
                      <div>
                        <a href="" onclick="tampil_detail('<?php echo $pengelolaan->id_pengelolaan; ?>')" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-pencil-square">Detail</i></a>
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
    <div class="modal fade" id="basicModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Pengelolaan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <table id="table1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID pengelolaan</th>
                <th>Nama Asset</th>
                <th>Jumlah Asset</th>
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
<!-- /.content -->
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  function tampil_detail(id) {

    $.ajax({
      url: "<?php echo site_url('Pengelolaan/detail_pengelolaan/') ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        var outstr = ''
        $.each(data, function(i, l) {
          outstr = outstr + '<tr>';
          outstr = outstr + '<td>' + l.id_pengelolaan + '</td>';
          outstr = outstr + '<td>' + l.id_asset + '</td>';
          outstr = outstr + '<td>' + l.jumlah_kelola + '</td>';
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
</script>