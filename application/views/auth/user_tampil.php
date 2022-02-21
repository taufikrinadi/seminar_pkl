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
          <a href="<?php echo base_url('auth/tambah'); ?>" class="btn btn-primary mt-3 mb-2">
            Tambah Data
          </a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">

          <!-- DataTables -->
          <div class="dataTable-container">
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama User</th>
                  <th>Password</th>
                  <th>E-Mail</th>
                  <th>Telepon</th>
                  <th>Hak Akses</th>
                  <th width="200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $user) : ?>
                  <tr>
                    <td>
                      <?php echo $user->username ?>
                    </td>
                    <td>
                      <?php echo $user->nama_user ?>
                    </td>
                    <td class="hidetext">
                      <?php echo $user->password ?>
                    </td>
                    <td>
                      <?php echo $user->email ?>
                    </td>
                    <td>
                      <?php echo $user->telepon ?>
                    </td>
                    </td>
                    <td>
                      <?php echo $user->hak_akses ?>
                    </td>

                    <td>
                      <div class="icon">
                        <a href="<?php echo base_url('auth/edit/' . $user->id_user) ?>">
                          <button type="button" class="btn btn-outline-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                        </a>

                        <a href="<?php echo base_url('auth/delete/' . $user->id_user) ?>">
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
