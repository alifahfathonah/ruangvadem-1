<?php
echo form_open(base_url('admin/project/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <a href="<?php echo base_url('admin/project/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Project</a>

    <button class="btn btn-primary" type="submit" name="publish" onClick="check();" >
      <i class="fa fa-check"></i> PUBLISH
    </button>
    <button class="btn btn-warning" type="submit" name="draft" onClick="check();" >
      <i class="fa fa-times"></i> DRAFT
    </button>
    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button>
  </div>
</p>
<div class="table-responsive mailbox-messages">
<table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
    <tr>
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
            </div>
        </th>
        <th style="vertical-align: middle;" class="text-center">JUDUL</th>
        <th style="vertical-align: middle;" class="text-center">DESKRIPSI</th>
        <th style="vertical-align: middle;" class="text-center">TAHUN</th>
        <th style="vertical-align: middle;" class="text-center">STATUS</th>
        <th style="vertical-align: middle;" class="text-center">URUTAN</th>
        <th style="vertical-align: middle;" class="text-center">ACTIONS</th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($project as $project) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_project[]" value="<?php echo $project->id_project ?>">
    </td>
    <td class="text-center"><?php echo $project->judul_project ?><br>
    <td><?php echo $project->deskripsi_project ?><br>
    <td class="text-center"><?php echo $project->tahun ?><br>
    <td class="text-center"><?php echo $project->status_project ?><br>
    <td class="text-center"><?php echo $project->urutan ?><br>
    <td class="text-center">
      <div class="btn-group">
        <a href="<?php echo base_url('project/detail/'.$project->id_project) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
        <a href="<?php echo base_url('admin/project/gambar/'.$project->id_project) ?>" class="btn btn-primary btn-sm"><i class="fa fa-image"></i></a>
        <a href="<?php echo base_url('admin/project/edit/'.$project->id_project) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/project/delete/'.$project->id_project) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>