<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/logo.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?> " rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?> " rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?> " rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?> " rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?> " rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?> " rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?> " rel="stylesheet">
  <link href="<?= base_url('assets/table/docs/dist/style.css') ?> " rel="stylesheet">


  <!-- =======================================================
  * Template Name: Sailor - v4.6.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class>
  <?= $this->load->view('_partials/header'); ?>
  <?= $this->load->view('_partials/navbar'); ?>
  <?= $this->load->view('_partials/sidebar'); ?>
  <main id="main" class="main">

    <?= $this->renderSection('content'); ?>

  </main><!-- End #main -->
  <?= $this->load->view('_partials/footer'); ?>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
  <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?> "></script>
  <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?> "></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?> "></script>
  <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?> "></script>
  <script src="<?= base_url('assets/vendor/waypoints/noframework.waypoints.js') ?> "></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js') ?> "></script>

  <!-- CDN -->

  <!-- Custom Code -->
  <script type="module">
    import {
      DataTable
    } from "<?= base_url('assets/table/docs/dist/module.js') ?>"
    const table = new DataTable("table")
  </script>

</body>

</html>