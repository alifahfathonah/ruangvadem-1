<?php
echo form_open(base_url('admin/team/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <a href="<?php echo base_url('admin/team/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Team</a>

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
        <th style="vertical-align: middle;" class="text-center" width="20%">FOTO</th>
        <th style="vertical-align: middle;" class="text-center" width="20%">NAMA</th>
        <th style="vertical-align: middle;" class="text-center" width="15%">JABATAN</th>
        <th style="vertical-align: middle;" class="text-center" width="15%">KEAHLIAN</th>
        <th style="vertical-align: middle;" class="text-center" width="30%">DESKRIPSI</th>
        <th style="vertical-align: middle;" class="text-center" width="15%">ACTIONS</th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($team as $team) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_team[]" value="<?php echo $team->id_team ?>">
    </td>
    <td class="text-center">
      <img src="<?php echo base_url('assets/img/team/'.$team->foto) ?>" class="img img-thumbnail img-responsive" width="60">
    </td>
    <td><?php echo $team->nama ?><br>
    <td><?php echo $team->jabatan ?></td>
    <td><?php echo $team->keahlian ?></td>
    <td><?php echo $team->deskripsi ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/team/edit/'.$team->id_team) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/team/delete/'.$team->id_team) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>