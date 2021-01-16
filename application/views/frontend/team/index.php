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
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        <?php 
          if (count($team) > 0) {
          foreach ($team as $team): ?>
          <div class="item col-md-6 text-justify">
            <div class="row mb-5">
                <div class="col-md-4 mr-3 text-center">
                    <img width="180" height="180" src="<?php echo base_url('assets/img/team/'.$team->foto) ?>" class="rounded-circle">
                </div>
                <div class="col-md-6">
                    <div class="row team-set">
                        <div class="col-md-12">
                          <h4><?php echo $team->nama ?></h4>  
                        </div>
                        <div class="col-md-12">
                          <span class="text-danger"><?php echo $team->jabatan ?></span>
                          <span>| <b><?php echo $team->keahlian ?></b></span>
                        </div>
                        <div class="col-md-12">
                          <em><?php echo $team->deskripsi ?></em>  
                        </div>
                        <div class="col-md-12">
                            <a class="mr-2" href="<?php echo $team->fb ?>" style="font-size: 25px;" target='_blank'><i class="fa fa-facebook"></i></a>
                            <a class="mr-2" target='_blank' href="<?php 
                              $hp = 0;
                             if(substr(trim($team->wa), 0, 3)=='+62')
                             {
                              $hp = trim($team->wa);
                             }
                             elseif(substr(trim($team->wa), 0, 1)=='0')
                             {
                              $hp = '+62'.substr(trim($team->wa), 1);
                             }
                            echo 'https://wa.me/'.$hp ?>" style="font-size: 25px;"><i class="fa fa-whatsapp"></i></a>
                            <a class="mr-2" href="<?php echo $team->ig ?>" target='_blank' style="font-size: 25px;"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <?php endforeach;} else{ ?> 
            <div class="container text-center">
              <span>Data team kosong</span>
            </div>
        <?php }?>
      </div>
    </div>
  </section>
</main>