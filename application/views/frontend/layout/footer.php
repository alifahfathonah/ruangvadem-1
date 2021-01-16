<?php 
  $site = $this->site_model->listing();
 ?>
<!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <p class="mb-1">&copy; Copyright RUANG VADEM. All Rights Reserved</p>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=MyPortfolio
          -->
            Designed by RUANG VADEM
          </div>
        </div>
        <div class="col-sm-6 social text-md-right">
          <a href="<?php echo $site->instagram ?>" target="_blank"><span class="icofont-instagram"></span></a>
          <a href="<?php echo $site->facebook ?>" target="_blank"><span class="icofont-facebook"></span></a>
          <a href="<?php echo $site->youtube ?>" target="_blank"><span class="icofont-youtube"></span></a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
  <!-- <script src="<?php echo base_url('assets/js/swiper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins.isotope.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/isotope.pkgd.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/lightcase.js') ?>"></script> -->
  <script src="<?php echo base_url('assets/js/jquery.nstSlider.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.flexslider.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.fancybox.min.js') ?>"></script>

</body>

</html>