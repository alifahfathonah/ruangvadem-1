<?php 
  $site = $this->site_model->listing();
 ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url('assets/img/'.$site->icon) ?>"
           alt="RUANG VADEM"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ruang Vadem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/img/team/placeholder.png') ?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?> (Admin)
          </a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- DASHBOARD -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link <?php if ($name == 'dashboard' ) {
               echo "active";
            } ?>">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <!-- PROJECT -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($name == 'project' || $name == 'project_tambah') {
               echo "active";
            } ?>">
              <i class="nav-icon fa fa-download"></i>
              <p>PROJECT <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/project') ?>" class="nav-link <?php if ($name == 'project' ) {
               echo "active";
            } ?>"><i class="fa fa-table nav-icon"></i><p>Data Project</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/project/tambah') ?>" class="nav-link <?php if ($name == 'project_tambah' ) {
               echo "active";
            } ?>"><i class="fa fa-plus nav-icon"></i><p>Tambah Project</p></a>
              </li>
            </ul>
          </li>

          <!-- DOCUMENT -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($name == 'document' || $name == 'document_tambah') {
               echo "active";
            } ?>">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>DOCUMENT <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/document') ?>" class="nav-link <?php if ($name == 'document' ) {
               echo "active";
            } ?>"><i class="fa fa-table nav-icon"></i><p>Data Document</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/document/tambah') ?>" class="nav-link <?php if ($name == 'document_tambah' ) {
               echo "active";
            } ?>"><i class="fa fa-plus nav-icon"></i><p>Tambah Document</p></a>
              </li>
            </ul>
          </li>

          <!-- MERCHANDISE -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($name == 'merchandise' || $name == 'merchandise_tambah') {
               echo "active";
            } ?>">
              <i class="nav-icon fa fa-money"></i>
              <p>MERCHANDISE <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/merchandise') ?>" class="nav-link <?php if ($name == 'merchandise' ) {
               echo "active";
            } ?>"><i class="fa fa-table nav-icon"></i><p>Data Merchandise</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/merchandise/tambah') ?>" class="nav-link <?php if ($name == 'merchandise_tambah' ) {
               echo "active";
            } ?>"><i class="fa fa-plus nav-icon"></i><p>Tambah Merchandise</p></a>
              </li>
            </ul>
          </li>

          <!-- TEAM -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($name == 'team' || $name == 'team_tambah' ) {
               echo "active";
            } ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>TEAM <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url('admin/team') ?>" class="nav-link <?php if ($name == 'team' ) {
               echo "active";
            } ?>"><i class="fa fa-table nav-icon"></i><p>Data Team</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/team/tambah') ?>" class="nav-link <?php if ($name == 'team_tambah' ) {
               echo "active";
            } ?>"><i class="fa fa-plus nav-icon"></i><p>Tambah Team</p></a>
              </li>
            </ul>
          </li> 

          <!-- KONFIGURASI MENU -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if ($name == 'konfigurasi_umum' || $name == 'konfigurasi_email' || $name == 'konfigurasi_logo' || $name == 'konfigurasi_icon' ) {
               echo "active";
            } ?>">
              <i class="nav-icon fa fa-wrench"></i>
              <p>KONFIGURASI <i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link <?php if ($name == 'konfigurasi_umum' ) {
               echo "active";
            } ?>"><i class="fa fa-wrench nav-icon"></i><p>Konfigurasi Umum</p></a>
              </li>
              <li class="nav-item"><a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link <?php if ($name == 'konfigurasi_icon' ) {
               echo "active";
            } ?>"><i class="fa fa-home nav-icon"></i><p>Ganti Icon</p></a>
              </li>
            </ul>
          </li>
          <!-- Logout -->
          <li class="nav-item">
            <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li> -->
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'.$this->uri->segment(2)) ?>"><?php echo ucfirst(str_replace('_',' ',$this->uri->segment(2))) ?></a></li>
              <li class="breadcrumb-item active"><?php echo character_limiter($title,10) ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">