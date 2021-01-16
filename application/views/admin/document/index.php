<?php
echo form_open(base_url('admin/document/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <a href="<?php echo base_url('admin/document/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Document</a>

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
        <th style="vertical-align: middle;" class="text-center">GAMBAR</th>
        <th style="vertical-align: middle;" class="text-center">TIPE</th>
        <th style="vertical-align: middle;" class="text-center">URUTAN</th>
        <th style="vertical-align: middle;" class="text-center">ACTIONS</th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($document as $document) {
  ?>

  <tr>
    <td class="text-center">
      <input type="checkbox" name="id_document[]" value="<?php echo $document->id_document ?>">
    </td>
    <td class="text-center">
      <?php if ($document->tipe == 'video'): ?>
        <img src="<?php echo 'http://img.youtube.com/vi/'.$document->gambar.'/hqdefault.jpg' ?>" class="img img-thumbnail img-responsive" width="80">
      <?php else: ?>
        <img src="<?php echo base_url('assets/img/document/'.$document->gambar) ?>" class="img img-thumbnail img-responsive" width="80">
      <?php endif ?>
    </td>
    <td class="text-center"><?php echo $document->tipe ?><br>
    <td class="text-center"><?php echo $document->urutan ?><br>
    <td class="text-center">
      <div class="btn-group">
        <a href="<?php echo base_url('admin/document/edit/'.$document->id_document) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?php echo base_url('admin/document/delete/'.$document->id_document) ?>" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash-o"></i> Hapus</a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>