<?php
echo form_open(base_url('admin/merchandise/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <a href="<?php echo base_url('admin/merchandise/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Merchandise</a>

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
        <th style="vertical-align: middle;" class="text-center">NAMA</th>
        <th style="vertical-align: middle;" class="text-center">HARGA</th>
        <th style="vertical-align: middle;" class="text-center">DESKRIPSI</th>
        <th style="vertical-align: middle;" class="text-center">ACTIONS</th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($merchandise as $merchandise) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_merchandise[]" value="<?php echo $merchandise->id_merchandise ?>">
    </td>
    <td class="text-center"><?php echo $merchandise->nama_merchandise ?><br>
    <td class="text-center">Rp. <?php echo $merchandise->harga_merchandise ?>,-<br>
    <td class="text-align"><?php echo $merchandise->deskripsi_merchandise ?><br>
    <td class="text-center">
      <div class="btn-group">
        <a href="<?php echo base_url('merchandise/detail/'.$merchandise->id_merchandise) ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
        <a href="<?php echo base_url('admin/merchandise/gambar/'.$merchandise->id_merchandise) ?>" class="btn btn-primary btn-sm"><i class="fa fa-image"></i></a>
        <a href="<?php echo base_url('admin/merchandise/edit/'.$merchandise->id_merchandise) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/merchandise/delete/'.$merchandise->id_merchandise) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>