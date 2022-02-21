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
  <!-- Default box -->
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form method="post" action="<?php echo base_url('staff/ubah_proses') ?>">
            {result}

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">ID Staff</label>
              <div class="col-sm-10">
                <input type="text" name="id_staff" id="id_staff" class="form-control" value="{id_staff}" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_staff" name="nama_staff" placeholder="" value="{nama_staff}">
              </div>
            </div>

            <div class="row mb-3">
              <!-- <?php
                    print_r($result_users_pilihan);
                    ?>  -->
              <label for="id_kategori_asset" class="col-sm-2 col-form-label">ID Users</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_user">
                  <?php
                  foreach ($result_users_pilihan as $row) {
                    echo '<option value="' . $row['id_user'] . '">' . $row['nama_user'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">No Handphone</label>
              <div class="col-sm-10">
                <input type="textarea" class="form-control" id="no_hp" name="no_hp" placeholder="">
              </div>
            </div>

            <div class="row mb-3">
              <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <select name="jabatan" class="form-control" id="jabatan">
                  <option>Pilih Jabatan</option>
                  <option>Admin</option>
                  <option>Kepala Pimpinan</option>

                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('staff') ?>" class="btn btn-danger">Cancel </a>
            </div>
            {/result}
          </form>
        </div>
</section><!-- /.content -->
<?php
// $this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>