<h3>DATA REPORT</h3>
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-download"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">PROJECT</span>
        <span class="info-box-number"><?php echo $this->site_model->project_all(); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-money"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">MERCHANDISE</span>
        <span class="info-box-number"><?php echo $this->site_model->merchant_all(); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-newspaper-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">DOCUMENT</span>
        <span class="info-box-number"><?php echo $this->site_model->document_all(); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">TEAM</span>
        <span class="info-box-number"><?php echo $this->site_model->team_all(); ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
<!-- /.row -->

