<?php 
  $site = $this->site_model->listing();
 ?>

<style type="text/css">
  @media screen and (min-width: 400px) {
     .team-set {
         text-align: center;
     }
  }
  @media screen and (min-width: 550px) {
     .team-set {
         text-align: left;
         margin-left: 20px;
     }
  }
</style>

<main id="main">

  <!-- ======= Works Section ======= -->
  <section class="section site-portfolio">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <?php echo $site->team_deskripsi ?>
        </div>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="200">
        <?php 
          if (count($team_inti) > 0) {
          foreach ($team_inti as $team): 
            ?>
            <div class="item col-md-4">
              <div class="row">
                  <div class="col-md-3 text-center">
                      <img width="125" height="125" data-src="<?php echo base_url('assets/img/team/'.$team->foto) ?>" class="rounded-circle">
                  </div>
                  <div class="col-md-7 text-justify">
                      <div class="row team-set">
                          <div class="col-md-12">
                            <h5><?php echo $team->nama ?></h5>  
                          </div>
                          <div class="col-md-12">
                            <h6><span class="text-danger"><?php echo $team->jabatan ?></span>
                            <span>| <b><?php echo $team->keahlian ?></b></span></h6>
                          </div>
                          <div class="col-md-12">
                            <em>TIM <?php echo $team->tahun ?></em>  
                          </div>
                          <div class="col-md-12">
                              <a class="mr-2" href="<?php echo $team->fb ?>" style="font-size: 15px;" target='_blank'><i class="fa fa-facebook"></i></a>
                              <!-- <a class="mr-2" target='_blank' href="<?php 
                                $hp = 0;
                               if(substr(trim($team->wa), 0, 3)=='+62')
                               {
                                $hp = trim($team->wa);
                               }
                               elseif(substr(trim($team->wa), 0, 1)=='0')
                               {
                                $hp = '+62'.substr(trim($team->wa), 1);
                               }
                              echo 'https://wa.me/'.$hp ?>" style="font-size: 15px;"><i class="fa fa-whatsapp"></i></a> -->
                              <a class="mr-2" href="<?php echo $team->ig ?>" target='_blank' style="font-size: 15px;"><i class="fa fa-instagram"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        <?php endforeach; } else{ ?> 
            <div class="container text-center">
              <span>Data team kosong</span>
            </div>
        <?php }?>
      </div>
      <hr>
      <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-12 text-left" data-aos="fade-up" data-aos-delay="100">
          <div id="filters" class="filters">
            <a href="#" data-filter="*" class="active">All</a>
            <?php foreach ($team_jabatan as $i => $jabatan): ?>
              <?php 
              $title = trim(strtolower($jabatan->jabatan));
              $out   = explode(" ",$title);
              $slug  =  implode("-", $out) ?>
              <a href="#" data-filter=".<?php echo $slug; ?>"><?php echo $jabatan->jabatan; ?></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div id="portfolio-grid" class="row" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($team_anggota as $team): ?>
          <?php 
              $title = trim(strtolower($team->jabatan));
              $out   = explode(" ",$title);
              $slug  =  implode("-", $out) ?>
          <div class="item col-md-4">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img width="125" height="125" data-src="<?php echo base_url('assets/img/team/'.$team->foto) ?>" class="rounded-circle">
                </div>
                <div class="col-md-7 text-justify">
                    <div class="row team-set">
                        <div class="col-md-12">
                          <h5><?php echo $team->nama ?></h5>  
                        </div>
                        <div class="col-md-12">
                          <h6><span class="text-danger"><?php echo $team->jabatan ?></span>
                          <span>| <b><?php echo $team->keahlian ?></b></span></h6>
                        </div>
                        <div class="col-md-12">
                          <em>TIM <?php echo $team->tahun ?></em>  
                        </div>
                        <div class="col-md-12">
                          <?php if ($team->fb != '') { ?>
                              <a class="mr-2" href="<?php echo $team->fb ?>" style="font-size: 15px;" target='_blank'><i class="fa fa-facebook"></i></a>
                          <?php }?> 
                            <!-- <a class="mr-2" target='_blank' href="<?php 
                              $hp = 0;
                             if(substr(trim($team->wa), 0, 3)=='+62')
                             {
                              $hp = trim($team->wa);
                             }
                             elseif(substr(trim($team->wa), 0, 1)=='0')
                             {
                              $hp = '+62'.substr(trim($team->wa), 1);
                             }
                            echo 'https://wa.me/'.$hp ?>" style="font-size: 15px;"><i class="fa fa-whatsapp"></i></a> -->
                          <?php if ($team->ig != '') { ?>
                            <a class="mr-2" href="<?php echo $team->ig ?>" target='_blank' style="font-size: 15px;"><i class="fa fa-instagram"></i></a>
                          <?php }?> 
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img");    
  var lazyloadThrottleTimeout;
  
  function lazyload () {
    if(lazyloadThrottleTimeout) {
      clearTimeout(lazyloadThrottleTimeout);
    }    
    
    lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
    }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});
</script>