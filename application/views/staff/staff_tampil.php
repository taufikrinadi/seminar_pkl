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
          <a href="<?php echo base_url('staff/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
            Tambah Data
          </a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">

          <!-- DataTables -->
          <div class="dataTable-container">
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="150">ID staff</th>
                  <th>Nama</th>
                  <th>ID User</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Jabatan</th>
                  <th width="200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $staff) : ?>
                  <tr>
                    <td>
                      <?php echo $staff->id_staff ?>
                    </td>
                    <td>
                      <?php echo $staff->nama_staff ?>
                    </td>
                    <td>
                      <?php echo $staff->nama_user ?>
                    </td>
                    <td>
                      <?php echo $staff->alamat ?>
                    </td>
                    <td>
                      <?php echo $staff->no_hp ?>
                    </td>
                    <td>
                      <?php echo $staff->jabatan ?>
                    </td>
                    <td>
                      <div class="icon">
                        <a href="<?php echo base_url('staff/ubah/' . $staff->id_staff) ?>">
                          <button type="button" class="btn btn-outline-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                        </a>

                        <a href="<?php echo base_url('staff/delete/' . $staff->id_staff) ?>">
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
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>