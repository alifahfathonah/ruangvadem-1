<?php 
  $site = $this->site_model->listing();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RUANG VADEM | <?php echo $title; ?> </title>
  <meta content="ruang vadem" name="description">
  <meta content="<?php echo $site->keywords; ?>" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/'.$site->icon) ?> " rel="shortcut icon">
  <link href="<?php echo base_url('assets/img/'.$site->icon) ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/icofont/icofont.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/line-awesome/css/line-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>" media="all"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/swiper.min.css') ?>" media="all"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/lightcase.css') ?>" media="all"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/rtl.css') ?>" media="all"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>" media="all"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.nstSlider.css') ?>" media="all"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/flexslider.css') ?>" media="all"/>

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/fancybox.min.css') ?>" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<body>

  <?php 
    $site = $this->site_model->listing();
   ?>
  <!-- ======= Navbar ======= -->
  <div class="collapse navbar-collapse custom-navmenu" id="main-navbar">
    <div class="container py-2 py-md-5">
      <div class="row align-items-start">
        <div class="col-md-2">
          <ul class="custom-menu">
            <li class="<?php if ($name == 'room'): ?> active <?php endif ?>"><a href="<?php echo base_url('/') ?>">Ruang Vadem</a></li>
            <li class="<?php if ($name == 'project'): ?> active <?php endif ?>"><a href="<?php echo base_url('project') ?>">Project</a></li>
            <li class="<?php if ($name == 'document'): ?> active <?php endif ?>"><a href="<?php echo base_url('document') ?>">Document</a></li>
            <li class="<?php if ($name == 'merchandise'): ?> active <?php endif ?>"><a href="<?php echo base_url('merchandise') ?>">Merchandise</a></li>
            <li class="<?php if ($name == 'team'): ?> active <?php endif ?>"><a href="<?php echo base_url('team') ?>">Team</a></li>
          </ul>
        </div>
        <div class="col-md-6 d-none d-md-block  mr-auto">
          <div class="tweet d-flex">
            <div>
              "<?php echo $site->tentang; ?>"
            </div>
          </div>
        </div>
        <div class="col-md-4 d-none d-md-block">
          <h3>More Information</h3>
          <p><?php echo $site->alamat; ?> <br> <a href="#"><?php echo $site->email; ?></a></p>
        </div>
      </div>

    </div>
  </div>

  <nav class="navbar navbar-light custom-navbar" style="margin-bottom: -7%">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('/') ?>"><?php echo $title; ?></a>

      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>

    </div>
  </nav>