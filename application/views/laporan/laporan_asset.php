<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Main content -->
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <form class="row g-3" method="post" action="<?php echo base_url('laporan/proses_asset') ?>">
          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Start Date</label>
              <div class="col-sm-5">
                <input type="date" class="form-control tgl" id="startdate" name="startdate" required>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">End Date</label>
              <div class="col-sm-5">
                <input type="date" class="form-control tgl1" id="enddate" name="enddate" required>
              </div>
            </div>
          </div>

          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>