</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>LPSE Prov.Kalsel <?php echo date('Y-m-d') ?></span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
  </div>
</footer><!-- End Footer -->

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