<?php 
  $site = $this->site_model->listing();
 ?>

<main id="main">

  <!-- ======= Works Section ======= -->
  <section class="section site-portfolio">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <?php echo $site->document_deskripsi ?>
        </div>
      </div>
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        <?php 
        if (count($document) > 0) {
        foreach ($document as $document): ?>
          <div class="item col-sm-4 col-md-3 col-lg-3 mb-3">
            <?php if ($document->tipe == 'video'): ?>
              <a href="<?php echo 'https://www.youtube.com/watch?v='.$document->gambar ?>" class="item-wrap fancybox" data-fancybox="gallery">
                <div class="work-info">
                  <span class="fa fa-search"></span>
                </div>
                <img src="<?php echo 'http://img.youtube.com/vi/'.$document->gambar.'/hqdefault.jpg' ?>" class="img-fluid" alt="Video">
              </a>
            <?php else: ?>
              <a href="<?php echo base_url('assets/img/document/'.$document->gambar) ?>" class="item-wrap fancybox" data-fancybox="gallery">
                <div class="work-info">
                  <span class="fa fa-search"></span>
                </div>
                <img src="<?php echo base_url('assets/img/document/'.$document->gambar) ?>" class="img-fluid" alt="Image">
              </a>
            <?php endif ?>
          </div>
        <?php endforeach;} else{ ?> 
            <div class="container text-center">
              <span>Data document kosong</span>
            </div>
        <?php }?>
      </div>
    </div>
  </section><!-- End  Works Section -->
</main>