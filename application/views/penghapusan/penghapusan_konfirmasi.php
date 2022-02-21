<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <!-- Default box -->

          {result}

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-lg-5 control-label">ID Penghapusan Asset</label>
              <div class="col-sm-5">
                <input type="text" id="id_penghapusan" name="id_penghapusan" class="form-control" value="{id_penghapusan}" readonly>
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row mb-3">
              <label class="col-sm-5 col-form-label">Jumlah Asset Sekarang</label>
              <div class="col-sm-5">
                <input type="number" name="jumlah_sekarang" id="jumlah_0" class="form-control 0 jumlah" value="{jumlah}" readonly>
              </div>
            </div>
            <form class="row g-3" action="<?php echo site_url('penghapusan/konfirmasi_proses'); ?>" onclick="total_otomatis(0)" method="post">
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Jumlah Asset Setelah</label>
                <div class="col-sm-5">
                  <input type="number" name="total_setelah" id="total_0" class="form-control 0 total_harga" readonly>
                </div>
              </div>
            </form>
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

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" class="form-control" id="nama_asset" name="nama_asset" placeholder="" value="{nama_asset}"></td>
                    <td><input type="text" name="tgl_input" class="form-control" value="{jenis_hapus}" readonly></td>
                    <td><input type="number" id="harga_0" class="form-control 0 harga" name="jumlah" value="{jumlah_hapus}"></td>
                    <td><input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" value="{nilai_asset}"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <hr>
          <div class="row">
            <div class="col">
              <div class="col-6">

                <button class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
                <a href="<?php echo site_url('penghapusan/manajer'); ?>" class="btn btn-danger">Kembali</a>

              </div>
            </div>
          </div>
          {/result}

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
  function total_otomatis(i) {
    // body...
    var jumlah_asset = document.getElementById('jumlah_' + i).value;
    var harga_asset = document.getElementById('harga_' + i).value;
    let total_harga = jumlah_asset - harga_asset;
    document.getElementById('total_' + i).value = total_harga;
    subtotal();
  }
</script>