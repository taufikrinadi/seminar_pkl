<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<!-- Main content -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="<?php echo base_url('kategori/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
          Tambah Data
        </a>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive">

        <!-- DataTables -->
        <div class="dataTable-container">
          <table class="table datatable">
            <thead>
              <tr>
                <th width="150">ID kategori</th>
                <th>Nama Kategori</th>
                <th width="200px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $kategori) : ?>
                <tr>
                  <td>
                    <?php echo $kategori->id_kategori_asset ?>
                  </td>
                  <td>
                    <?php echo $kategori->nama_kategori ?>
                  </td>
                  <td>
                    <div class="icon">
                      <a href="<?php echo base_url('kategori/ubah/' . $kategori->id_kategori_asset) ?>">
                        <button type="button" class="btn btn-outline-warning btn-sm">
                          <i class="bi bi-pencil-square"></i>
                        </button>
                      </a>

                      <a href="<?php echo base_url('kategori/delete/' . $kategori->id_kategori_asset) ?>">
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda Yakin ?')">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </a>
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