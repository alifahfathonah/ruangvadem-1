<?php
echo form_open(base_url('admin/project/proses_gambar/'.$project->id_project));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <a href="<?php echo base_url('admin/project/tambah_gambar/'.$project->id_project) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Gambar</a>

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
        <th style="vertical-align: middle;" class="text-center" width="20%">GAMBAR</th>
        <th style="vertical-align: middle;" class="text-center" width="20%">JUDUL</th>
        <th style="vertical-align: middle;" class="text-center" width="10%">URUTAN</th>
        <th style="vertical-align: middle;" class="text-center" width="15%">ACTIONS</th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($gambar as $gambar) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_gambar[]" value="<?php echo $gambar->id_gambar_project ?>">
    </td>
    <td class="text-center">
      <img src="<?php echo base_url('assets/img/project/'.$gambar->gambar) ?>" class="img img-thumbnail img-responsive" width="100">
    </td>
    <td class="text-center"><?php echo $gambar->judul_gambar ?><br>
    <td class="text-center"><?php echo $gambar->urutan ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/project/edit_gambar/'.$gambar->id_gambar_project) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/project/hapus_gambar/'.$gambar->id_gambar_project) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>