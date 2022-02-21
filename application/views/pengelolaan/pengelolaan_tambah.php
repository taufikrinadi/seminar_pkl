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
        <form class="row g-3" action="<?php echo site_url('pengelolaan/tambah_proses'); ?>" method="post">
          <!-- Default box -->

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">ID Pengelolaan</label>
              <div class="col-sm-5">
                <input type="text" id="id_pengelolaan" name="id_pengelolaan" class="form-control" value="<?= $kodeunik; ?>" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-lg-5 control-label">Tanggal Transaksi</label>
              <div class="col-sm-5">
                <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Status</label>
              <div class="col-sm-5">
                <select name="status_pengelolaan" class="form-control" id="status_pengelolaan">
                  <option>Maintenance</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Lokasi</label>
              <div class="col-sm-5">
                <select name="peminjam" class="form-control" id="peminjam">
                  <option>LPSE BJM</option>
                </select>
              </div>
            </div>
          </div>

          <hr>

          <!-- Basic Modal -->
          <button hidden type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Basic Modal
          </button>
          <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Basic Modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table></table>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div><!-- End Basic Modal-->

          <div class="row">
            <div class="col">
              <table id="addAsset" class="table table-borderless">
                <thead>
                  <tr>
                    <td align="center">Nama Asset</td>
                    <td align="center">Jumlah Asset</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><select name="id_asset[]" class="form-control" id="id_asset">
                        <option selected disabled>Pilih Asset</option>
                        <?php
                        foreach ($result_asset_pilihan as $row) {
                          echo '<option value="' . $row['id_asset'] . '">' . $row['nama_asset'] . '</option>';
                        }
                        ?>
                      </select></td>
                    <td><input type="number" id="jumlah_0" class="form-control 0 jumlah" name="jumlah[]" required></td>
                  </tr>
                </tbody>
              </table>
              <a id="tambah" class="btn btn-primary" onclick="tambah();">+</a>
              <a id="kurang" class="btn btn-primary" onclick="kurang();">-</a>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col">
              <div class="col-6">
                <div class="row mb-3">
                  <label class="col-sm-5 col-form-label">Total Barang</label>
                  <div class="col-sm-5">
                    <input type="number" id="total_barang" class="form-control 0 total_barang" name="total_barang" required>
                  </div>
                </div>
              </div>

              <button class="btn btn-primary">Simpan</button>
              <button onclick="goBack()" class="btn btn-danger">Kembali</button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$this->load->view('_partials/footer');
?>

<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>

<script type="text/javascript">
  var i = 0;

  function tambah() {
    i++;

    var id_asset = "<select name='id_asset[]' class='form-control' id='id_asset'><option selected disabled>Pilih Asset</option><?php foreach ($result_asset_pilihan as $row) {
                                                                                                                                  echo "<option value='" . $row['id_asset'] . "'>" . $row['nama_asset'] . '</option>';
                                                                                                                                } ?> </select>";

    var jumlah = "<input id='jumlah_" + i + "' type='number' class='jumlah form-control' name='jumlah[]' required>";

    $("#addAsset tbody").append("<tr class='" + i + "'><td>" + id_asset + "</td><<td>" + jumlah + "</td></tr>")
  };

  function kurang() {
    if (i > 0) {
      $("#addAsset tbody tr").remove("." + i);
      i--;
    } else {
      i = 1;
    }
  };

  function subtotal() {
    console.log('jhjhjbj');
    let total = document.getElementsByClassName('total_barang');
    let subtotal = 0;
    for (let i = 0; i < total.length; i++) {
      subtotal += parseInt(total[i].value);
    }
    document.getElementById('jumlah_' + i).value = subtotal;
  }

  function goBack() {
    // body...
    window.history.back();
  }
</script>