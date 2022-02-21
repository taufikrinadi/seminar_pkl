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
        <form class="row g-3" action="<?php echo site_url('perencanaan/tambah_proses'); ?>" method="post">
          <!-- Default box -->
          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">ID Perencanaan</label>
              <div class="col-sm-5">
                <input type="text" id="id_perencanaan" name="id_perencanaan" class="form-control" value="<?= $kodeunik; ?>" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-lg-5 control-label">Tanggal Pengajuan</label>
              <div class="col-sm-5">
                <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Tujuan Pengajuan</label>
              <div class="col-sm-5">
                <input type="text" id="tujuan" name="tujuan" class="form-control" value="">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Tanggal Rencana Pengadaan</label>
              <div class="col-lg-5">
                <input type="date" id="tgl_rencana_pengadaan" name="tgl_rencana_pengadaan" class="form-control datepicker" value="">
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
                    <td align="center">Kategori Asset</td>
                    <td align="center">Jenis Asset</td>
                    <td align="center">Jumlah Asset Diajukan</td>
                    <td align="center">Harga Asset</td>
                    <td align="center">Total Harga Asset</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" class="form-control 0" name="nama_asset[]" required></td>
                    <td><select name="id_kategori_asset[]" class="form-control" id="id_kategori_asset">
                        <option>Pilih Kategori</option>
                        <?php
                        foreach ($result_kategori_pilihan as $row) {
                          echo '<option value="' . $row['id_kategori_asset'] . '">' . $row['nama_kategori'] . '</option>';
                        }
                        ?>
                      </select></td>
                    <td><select name="id_jenis_asset[]" class="form-control" id="id_jenis_asset">
                        <option>Pilih Jenis</option>
                        <?php
                        foreach ($result_jenis_pilihan as $row) {
                          echo '<option value="' . $row['id_jenis_asset'] . '">' . $row['nama_jenis'] . '</option>';
                        }
                        ?>
                      </select></td>
                    <td><input type="number" id="jumlah_0" class="form-control 0 jumlah" name="jumlah[]" required></td>
                    <td><input type="number" id="harga_0" class="form-control 0 harga" name="harga[]" onchange="total_otomatis(0)" required></td>
                    <td><input type="number" id="total_0" class="form-control 0 total_harga" name="total_harga[]" required></td>
                  </tr>
                </tbody>
              </table>
              <!-- <a id="tambah" class="btn btn-primary" onclick="tambah();">+</a>
              <a id="kurang" class="btn btn-primary" onclick="kurang();">-</a> -->
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col">
              <div class="col-6">
                <div class="row mb-3">
                  <label class="col-sm-5 col-form-label">Total Harga Perencanaan</label>
                  <div class="col-sm-5">
                    <input type="text" id="total_perencanaan" class="form-control 0 total_perencanaan" name="total_perencanaan" required>
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
    var add_asset = "<input type='text' class='form-control' name='nama_asset[]' required>";
    var kategori_asset = "<select name='id_kategori_asset[]' class='form-control' id='id_kategori_asset'><option>Pilih Kategori</option><?php foreach ($result_kategori_pilihan as $row) {
                                                                                                                                          echo "<option value='" . $row['id_kategori_asset'] . "'>" . $row['nama_kategori'] . '</option>';
                                                                                                                                        } ?> </select>";
    var jenis_asset = "<select name='id_jenis_asset[]' class='form-control' id='id_jenis_asset'><option>Pilih Jenis</option><?php foreach ($result_jenis_pilihan as $row) {
                                                                                                                              echo "<option value='" . $row['id_jenis_asset'] . "'>" . $row['nama_jenis'] . '</option>';
                                                                                                                            } ?> </select>";
    var jumlah = "<input id='jumlah_" + i + "' type='number' class='jumlah form-control' name='jumlah[]' required>";

    var harga = "<input id='harga_" + i + "'onchange = 'total_otomatis(" + i + ")' type='number' class='harga_asset form-control' name='harga[]' required>";

    var total_harga = "<input id='total_" + i + "' type='number' class='total_harga form-control' name='total_harga[]' required>";

    $("#addAsset tbody").append("<tr class='" + i + "'><td>" + add_asset + "</td><td>" + kategori_asset + "</td><td>" + jenis_asset + "</td><td>" + jumlah + "</td><td>" + harga + "</td><td>" + total_harga + "</td></tr>")
  };

  function kurang() {
    if (i > 0) {
      $("#addAsset tbody tr").remove("." + i);
      i--;
    } else {
      i = 1;
    }
  };

  function total_otomatis(i) {
    // body...
    var jumlah_asset = document.getElementById('jumlah_' + i).value;
    var harga_asset = document.getElementById('harga_' + i).value;
    let total_harga = jumlah_asset * harga_asset;
    document.getElementById('total_' + i).value = total_harga;
    subtotal();
  }

  function subtotal() {
    let total = document.getElementsByClassName('total_harga');
    let subtotal = 0;
    for (let i = 0; i < total.length; i++) {
      subtotal += parseInt(total[i].value);
    }
    document.getElementById('total_perencanaan').value = subtotal;
  }

  function goBack() {
    // body...
    window.history.back();
  }
  $(function() {
    $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
  });
</script>