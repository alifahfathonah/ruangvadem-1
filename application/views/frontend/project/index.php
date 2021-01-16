<?php 
  $site = $this->site_model->listing();
 ?>

<main id="main">

  <!-- ======= Works Section ======= -->
  <section class="section site-portfolio">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <?php echo $site->project_deskripsi ?>
        </div>
        <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
          <div id="filters" class="filters">
            <a href="#" data-filter="*" class="active">All</a>
            <?php foreach ($tahun as $tahun): ?>
              <a href="#" data-filter=".<?php echo $tahun->tahun; ?>"><?php echo $tahun->tahun; ?></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        <?php 
          if (count($project) > 0) {
          foreach ($project as $project): ?>
          <div class="item col-sm-6 col-md-4 col-lg-4 mb-4 <?php echo $project->tahun ?>">
            <a href="<?php echo base_url('project/detail/'.$project->id_project) ?>" class="item-wrap fancybox">
              <div class="work-info">
                <h3><?php echo $project->judul_project; ?></h3>
                <span><?php echo $project->tahun; ?></span>
              </div>
              <?php $img = $this->project_model->get_image_first($project->id_project); ?>
              <img class="img-fluid" src="<?php echo base_url('assets/img/project/'.$img->gambar) ?>">
            </a>
          </div>
        <?php endforeach;} else{ ?> 
            <div class="container text-center">
              <span>Data project kosong</span>
            </div>
        <?php }?>
      </div>
    </div>
  </section><!-- End  Works Section -->
</main>