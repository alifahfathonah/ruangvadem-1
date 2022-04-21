<main id="main">

  <section class="section">
    <div class="container">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6" data-aos="fade-up">
          <h2><?php echo $merchant->nama_merchandise; ?></h2>
        </div>
      </div>
    </div>

    <div class="site-section pb-0">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-6" data-aos="fade-up">
            <div id="slider" class="flexslider">
              <ul class="slides">
                <?php foreach ($gambar as $gmb) {?>
                  <li>
                    <img src="<?php echo base_url('assets/img/merchant/'.$gmb->gambar) ?>">
                  </li>
                <?php } ?>
              </ul>
            </div>
            <div id="carousel" class="flexslider">
              <ul class="slides">
                <?php foreach ($gambar as $gmb) {?>
                  <li>
                    <img src="<?php echo base_url('assets/img/merchant/'.$gmb->gambar) ?>">
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-6 ml-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="sticky-content">
              <h3 class="h3"><?php echo $merchant->nama_merchandise ?></h3>
              <p class="mb-4"><span class="text-muted">Description</span></p>

              <div class="mb-5">
                <?php echo $merchant->deskripsi_merchandise ?>
              </div>
              <h4 class="h4 mb-3">Price</h4>
              <ul class="list-unstyled list-line mb-5">
                <li><?php echo 'Rp. '.$merchant->harga_merchandise.',-' ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </main><!-- End #main -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>