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
        <!-- Main content -->
        <form class="row g-3" action="<?php echo site_url('penghapusan/tambah_proses'); ?>" method="post">

          <!-- Default box -->
          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">ID penghapusan</label>
              <div class="col-sm-5">
                <input type="text" id="id_penghapusan" name="id_penghapusan" class="form-control" value="<?= $kodeunik; ?>" readonly>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Tanggal Penghapusan</label>
              <div class="col-sm-5">
                <input type="date" id="tgl_hapus" name="tgl_hapus" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
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
                    <td width="200" align="center">Nama Asset</td>
                    <td align="center">Keterangan Penghapusan Asset</td>
                    <td align="center">Jumlah Asset Dihapus</td>
                    <td align="center">Nilai Asset Dihapus</td>
                    <td align="center">Total Nilai Asset</td>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><select name="id_asset[]" class="form-control" id="id_asset">
                        <option selected disabled>--Pilih Asset--</option>
                        <?php
                        foreach ($result_asset_pilihan as $row) {
                          echo '<option value="' . $row['id_asset'] . '">' . $row['nama_asset'] . '>' . $row['jumlah'] . '</option>';
                        }
                        ?>
                      </select></td>
                    <td><input type="text" id="jenis_hapus_0" class="form-control 0 jenis_hapus" name="jenis_hapus[]" required></td>
                    <td><input type="number" id="jumlah_0" class="form-control 0 jumlah" name="jumlah[]" required></td>
                    <td><input type="number" id="harga_0" class="form-control 0 harga" name="nilai_asset[]" onchange="total_otomatis(0)" required></td>
                    <td><input type="number" id="total_0" class="form-control 0 total_harga" name="total_nilai_asset[]" required></td>
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
                  <label class="col-sm-5 col-form-label">Total Nilai Asset Dihapus</label>
                  <div class="col-sm-5">
                    <input type="text" id="total_perencanaan" class="form-control 0 total_perencanaan" name="total_nilai_dihapus" required>
                  </div>
                </div>

                <button class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
                <button onclick="goBack()" class="btn btn-danger"><i class="fa fa-plus"></i>Kembali</button>

              </div>
            </div>
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
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>

<script type="text/javascript">
  var i = 0;

  function tambah() {
    i++;

    var id_asset = "<select name='id_asset[]' class='form-control' id='id_asset'><option selected disabled>--Pilih Asset--</option><?php foreach ($result_asset_pilihan as $row) {
                                                                                                                                      echo "<option value='" . $row['id_asset'] . "'>" . $row['nama_asset'] . '</option>';
                                                                                                                                    } ?> </select>";

    var jenis_hapus = "<input id='jenis_hapus_" + i + "' type='text' class='jumlah form-control' name='jenis_hapus[]' required>";

    var jumlah = "<input id='jumlah_" + i + "' type='number' class='jumlah form-control' name='jumlah[]' required>";

    var nilai_asset = "<input id='harga_" + i + "'onchange ='total_otomatis(" + i + ")' type='number' class='harga_asset form-control' name='nilai_asset[]' required>";

    var total_harga = "<input id='total_" + i + "' type='number' class='total_harga form-control' name='total_nilai_asset[]' required>";

    $("#addAsset tbody").append("<tr class='" + i + "'><td>" + id_asset + "</td><td>" + jenis_hapus + "</td><td>" + jumlah + "</td><td>" + nilai_asset + "</td><td>" + total_harga + "</td></tr>")
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
</script>