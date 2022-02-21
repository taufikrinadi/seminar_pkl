<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form method="post" action="<?php echo base_url('jenis/tambah_proses') ?>">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">ID Jenis Asset</label>
              <div class="col-sm-10">
                <input type="text" name='id_jenis_asset' class="form-control" value="<?= $kodeunik; ?>" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama Jenis</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="">
              </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('jenis') ?>" class="btn btn-danger">Cancel </a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
<?php
// $this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>