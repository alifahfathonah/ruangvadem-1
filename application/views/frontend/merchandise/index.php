<?php 
  $site = $this->site_model->listing();
 ?>

<style type="text/css">
  
  .topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
  }

  .topnav .search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }

  .topnav .search-container button:hover {
    background: #ccc;
  }

  @media screen and (max-width: 600px) {
    .topnav .search-container {
      float: none;
    }
    .topnav a, .topnav input[type=text], .topnav .search-container button {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
    }
    .topnav input[type=text] {
      border: 1px solid #ccc;  
    }
  }
</style>

<main id="main">
  <!-- ======= Works Section ======= -->
  <section class="section site-portfolio">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <?php echo $site->merchant_deskripsi ?>
        </div>
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0 topnav">
          <div class="search-container form-group text-right">
            <form action="<?php echo base_url('merchandise/cari') ?>" method="post">
              <input type="text" placeholder="Search merchant ..." name="keywords"
                <?php 
                if ($_GET != null) {
                  echo "value='".$_GET['keywords']."'";
                }
                 ?>
              >
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        <?php 
        if (count($merchant) > 0) {
          foreach ($merchant as $merchant): ?>
          <div class="item col-sm-4 col-md-4 col-lg-3 mb-3">
            <div class="container border">
              <a href="<?php echo base_url('merchandise/detail/'.$merchant->id_merchandise) ?>" class="row item-wrap fancybox">
                <div class="work-info">
                  <span class="fa fa-shopping-cart"></span>
                </div>
                <img class="img-fluid" src="<?php echo base_url('assets/img/merchant/'.$merchant->gambar) ?>">
              </a>
              <div class="container text-center">
                <h5><?php echo $merchant->nama_merchandise ?></h5>
                <b>Rp. <?php echo $merchant->harga_merchandise ?>,-</b>
                <!-- <del class="text-danger"><small><b><?php echo $merchant->harga_merchandise ?></b></small></del>
                <sup>Rp. 50000,-</sup> -->
              </div>
            </div>
          </div>
        <?php endforeach; } else{ ?> 
            <div class="container text-center">
              <span>Data merchandise kosong</span>
            </div>
        <?php }?>
      </div>
      <div class="text-center">
        <?php if(isset($pagin)) { echo $pagin; }  ?>
      </div>
    </div>
  </section><!-- End  Works Section -->
</main>