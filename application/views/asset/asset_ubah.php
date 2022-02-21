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
    <div class="col">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <!-- Default box -->
          <form method="post" action="<?php echo base_url('asset/ubah_proses') ?>">
            {result}

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">ID Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_asset" name="id_asset" placeholder="" value="{id_asset}" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama Asset</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_asset" name="nama_asset" placeholder="" value="{nama_asset}">
              </div>
            </div>

            <div class="row mb-3">
              <!-- <?php
                    print_r($result_kategori_pilihan);
                    ?>  -->
              <label for="id_kategori_asset" class="col-sm-2 col-form-label">ID Jenis Asset</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_jenis_asset">
                  <?php
                  foreach ($result_jenis_pilihan as $row) {
                    echo '<option value="' . $row['id_jenis_asset'] . '">' . $row['nama_jenis'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <!-- <?php
                    print_r($result_kategori_pilihan);
                    ?>  -->
              <label for="id_kategori_asset" class="col-sm-2 col-form-label">ID Kategori Asset</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_kategori_asset">
                  <?php
                  foreach ($result_kategori_pilihan as $row) {
                    echo '<option value="' . $row['id_kategori_asset'] . '">' . $row['nama_kategori'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Tanggal Input</label>
              <div class="col-sm-10">
                <input type="date" name="tgl_input" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="" value="{jumlah}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select name="status" class="form-control" id="status">
                  <option>Pilih Status</option>
                  <option>Baru</option>
                  <option>Bekas</option>

                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('asset') ?>" class="btn btn-danger">Cancel </a>
            </div>
            {/result}
          </form>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>