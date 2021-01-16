<main id="main">

  <section class="section">
    <div class="container">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6" data-aos="fade-up">
          <h2><?php echo $project->judul_project; ?></h2>
        </div>
      </div>
    </div>

    <div class="site-section pb-0">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-6" data-aos="fade-up">
            <div class="carousel slide" id="main-carousel" data-ride="carousel">
              <ol class="carousel-indicators">
              <?php 
                for ($i=0; $i < $jumlah ; $i++) { 
                  if($i == 0){
                    echo '<li data-target="#main-carousel" data-slide-to="0" class="active"></li>';
                  }
                  else{
                    echo '<li data-target="#main-carousel" data-slide-to="'.$i.'"></li>';
                  }
                }
               ?>
             </ol>

              <div class="carousel-inner">
                <?php 
                $i = 0;
                foreach ($gambar as $gambar): ?>
                  <div class="carousel-item <?php if ($i==0): ?> active <?php endif ?>">
                    <img class="d-block img-fluid" src="<?php echo base_url('assets/img/project/'.$gambar->gambar) ?>" alt="" class="img-fluid" width="100%">
                    <div class="carousel-caption d-none d-md-block">
                      <h3 style="color: black"><?php echo $gambar->judul_gambar; ?></h3>
                    </div>
                  </div>
                  <?php $i++ ?>    
                <?php endforeach ?>
              </div><!-- /.carousel-inner -->

              <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only" aria-hidden="true">Prev</span>
              </a>
              <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only" aria-hidden="true">Next</span>
              </a>
            </div><!-- /.carousel -->
          </div>
          <div class="col-md-6 ml-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="sticky-content">
              <h3 class="h3"><?php echo $project->judul_project ?></h3>
              <p class="mb-4"><span class="text-muted">Description</span></p>

              <div class="mb-5">
                <p><?php echo $project->deskripsi_project ?></p>

              </div>

              <h4 class="h4 mb-3">Project Year</h4>
              <ul class="list-unstyled list-line mb-5">
                <li><?php echo $project->tahun ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </main><!-- End #main -->