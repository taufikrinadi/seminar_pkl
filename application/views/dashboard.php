<?php
$this->load->view('_partials/head');
$this->load->view('_partials/header');
$this->load->view('_partials/navbar');
$this->load->view('_partials/sidebar');
?>

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Total Perencanaan</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <a href="<?php echo ('perencanaan') ?>">
                    <h6>More info</h6>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Total Asset</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <a href="<?php echo ('asset') ?>">
                    <h6>More Info</h6>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-md-4">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Total Asset Dihapus</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <a href="<?php echo ('penghapusan') ?>">
                    <h6>More Info</h6>
                  </a>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->
      </div>
    </div>
  </div>
</section>

<?php
$this->load->view('_partials/footer');
?>