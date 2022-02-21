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

          <form class="row g-3" method="post" action="<?php echo base_url('asset/tambah_proses') ?>">

            <div class="col-md-6">
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">ID Asset</label>
                <div class="col-sm-5">
                  <input type="text" name='id_asset' class="form-control" value="<?= $kodeunik; ?>" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">ID Perencanaan Asset</label>
                <div class="col-sm-5">
                  <select class="form-control" name="id_perencanaan" id="id_perencanaan">
                    <option selected disabled>--Pilih Transaksi--</option>
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
                <label class="col-sm-5 col-form-label">Tanggal Input</label>
                <div class="col-sm-5">
                  <input type="date" name="tgl_input" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Status</label>
                <div class="col-sm-5">
                  <select class="form-control" name="status_asset">
                    <option selected disabled>--Pilih Status--</option>
                    <option value="Baru">Baru</option>
                    <option value="Bekas">Bekas</option>
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
                      <td align="center">Jenis Asset</td>
                      <td align="center">Kategori Asset</td>
                      <td align="center">Jumlah</td>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>

            <hr>

            <div>
              <button class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
              <a href="<?php echo base_url('asset'); ?>" class="btn btn-danger">Kembali</a>
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
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>

<script type="text/javascript">
  var i = 0;

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
        var htm = "";

        for (var a = response.result_detail.length - 1; a >= 0; a--) {
          var det = response.result_detail[a];
          //console.log(det['nama_asset']);
          i++;
          var add_asset = "<input type='text' class='form-control' name='nama_asset[]' value='" + det['nama_asset'] + "' required>";
          var jenis_asset = "<select name='id_jenis_asset[]' class='form-control' id='id_jenis_asset'><option selected disabled>--Pilih Jenis--</option><?php foreach ($result_jenis_pilihan as $row) {
                                                                                                                                                          echo "<option value='" . $row['id_jenis_asset'] . "'>" . $row['nama_jenis'] . '</option>';
                                                                                                                                                        } ?> </select>";
          var kategori_asset = "<select name='id_kategori_asset[]' class='form-control' id='id_kategori_asset'><option selected disabled>--Pilih Kategori--</option><?php foreach ($result_kategori_pilihan as $row) {
                                                                                                                                                                      echo "<option value='" . $row['id_kategori_asset'] . "'>" . $row['nama_kategori'] . '</option>';
                                                                                                                                                                    } ?> </select>";
          var jumlah = "<input type='number' class='form-control' name='jumlah[]' value='" + det['jumlah'] + "' required>";

          htm = htm + "<tr class='" + i + "'>" +
            "<td>" + add_asset + "</td>" +
            "<td>" + jenis_asset + "</td>" +
            "<td>" + kategori_asset + "</td>" +
            "<td>" + jumlah + "</td>" +
            "</tr>";
          $("#addAsset tbody").html(htm)


        }
      }
    });
  });
</script>