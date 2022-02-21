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
        <form class="row g-3" action="<?php echo site_url('pengadaan/tambah_proses'); ?>" method="post">
          <!-- Default box -->

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">ID Pengadaan</label>
              <div class="col-sm-5">
                <input type="text" id="id_pengadaan" name="id_pengadaan" class="form-control" value="<?= $kodeunik; ?>" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <!-- <?php
                    print_r($result_perencanaan_pilihan);
                    ?>  -->
              <label class="col-lg-5 control-label">ID Perencanaan Asset</label>
              <div class="col-sm-5">
                <select class="form-control" name="id_perencanaan" id="id_perencanaan">
                  <option disabled selected>--Pilih Transaksi--</option>
                  <?php
                  foreach ($result_perencanaan_pilihan as $row) {
                    echo '<option value="' . $row['id_perencanaan'] . '">' . $row['id_perencanaan'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-lg-5 control-label">Tanggal Perencanaan</label>
              <div class="col-sm-5">
                <input type="date" id="tgl_perencanaan" name="tgl_perencanaan" class="form-control" value="">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-lg-5 control-label">Tanggal Pengadaan</label>
              <div class="col-lg-5">
                <input type="date" id="tgl_pengadaan" name="tgl_pengadaan" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
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
                    <td align="center">Jumlah Asset Diajukan</td>
                    <td align="center">Harga Asset Rencana</td>
                    <td align="center">Harga Asset Realisasi</td>
                    <td align="center">Total Harga Asset</td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          <hr>
          <div class="col-md-4">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label"></label>
              <input type="text" class="form-control" hidden>
            </div>
          </div>

          <div class="col-md-3">
            <div class="row mb-3">
              <label class="col-sm-8 col-form-label">Total Harga Awal</label>
              <input type="text" id="total_harga_diajukan" class="form-control 0 total_pengadaan" name="total_harga_diajukan" required>
            </div>
          </div>

          <div class="col-md-1">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label"></label>
              <input type="text" class="form-control" hidden>
            </div>
          </div>

          <div class="col-md-3">
            <div class="row mb-3">
              <label class="col-sm-9 col-form-label">Total Harga Realisasi</label>
              <input type="text" id="total_pengadaan" class="form-control 0 total_pengadaan" name="total_pengadaan" required>
            </div>
          </div>
          <div>
            <button class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
            <button onclick="goBack()" class="btn btn-danger"><i class="fa fa-plus"></i>Kembali</button>
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

  function total_otomatis(i) {
    // body...
    var jumlah_asset = document.getElementById('jumlah_' + i).value;
    var harga_asset = document.getElementById('harga_realisasi' + i).value;
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
    document.getElementById('total_pengadaan').value = subtotal;
  }

  function goBack() {
    // body...
    window.history.back();
  }

  //Ajax Combobox
  $("#id_perencanaan").on("change", function() {

    var id_perencanaan = $(this).val();

    $.ajax({
      url: "<?php echo base_url('Pengadaan/isi_otomatis') ?>/" + id_perencanaan,
      method: "GET",
      cache: false,
      dataType: "json",
      data: {
        id: id_perencanaan
      },
      cache: false,
      success: function(response) {
        //console.log(response);
        //console.log(response.result[0]['tgl_transaksi']);
        var tgl_perencanaan = response.result[0]['tgl_transaksi'];
        var total_perencanaan = response.result[0]['total_perencanaan'];
        var htm = "";

        document.getElementById('tgl_perencanaan').value = tgl_perencanaan;
        document.getElementById('total_harga_diajukan').value = total_perencanaan;

        for (var a = response.result_detail.length - 1; a >= 0; a--) {
          var det = response.result_detail[a];
          //console.log(det['nama_asset']);
          i++;
          var add_asset = "<input type='text' class='form-control' name='nama_asset[]' value='" + det['nama_asset'] + "' required>";
          var jumlah = "<input id='jumlah_" + i + "' type='number' class='jumlah form-control' name='jumlah[]' value='" + det['jumlah'] + "' required>";
          var harga_pengadaan = "<input id='harga_" + i + "'onchange = 'total_otomatis(" + i + ")' type='number' class='harga_asset form-control' name='harga_pengadaan[]' value='" + det['harga'] + "' required>";
          var harga_realisasi = "<input id='harga_realisasi" + i + "'onchange = 'total_otomatis(" + i + ")' type='number' class='harga_asset form-control' name='harga_realisasi[]' required>";
          var total_harga = "<input id='total_" + i + "' type='number' class='total_harga form-control' name='total_harga[]' value='0' required>";
          htm = htm + "<tr class='" + i + "'>" +
            "<td>" + add_asset + "</td>" +
            "<td>" + jumlah + "</td>" +
            "<td>" + harga_pengadaan + "</td>" +
            "<td>" + harga_realisasi + "</td>" +
            "<td>" + total_harga + "</td>" +
            "</tr>";
          $("#addAsset tbody").html(htm)


        }
      }
    });
  });
</script>