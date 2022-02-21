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

          <form id="password-form" method="post" action="<?php echo site_url('auth/proses_ubahPassword') ?>">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10 has-validation">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                <div class="invalid-feedback">Please enter your username.</div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Masukan Password" required>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
          </form>
        </div>
</section><!-- /.content -->
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>