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

          <form method="post" action="<?php echo base_url('auth/update') ?>">
            <?php foreach ($result as $user) : ?>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama_user ?>" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username ?>" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $user->email ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $user->telepon ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Hak Akses</label>
                <div class="col-sm-10">
                  <select name="hakses" class="form-control" id="hakses" required>
                    <option value="">Pilih Hak Akses</option>
                    <option value="Admin">Admin</option>
                    <option value="Manajer">Manajer</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select name="status" class="form-control" id="status" required>
                    <option value="">Pilih Status</option>
                    <option value="aktif">aktif</option>
                    <option value="blokir">blokir</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $user->id_user ?>">
              </div>

            <?php endforeach; ?>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('auth/user') ?>" class="btn btn-danger">Cancel </a>
            </div>

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