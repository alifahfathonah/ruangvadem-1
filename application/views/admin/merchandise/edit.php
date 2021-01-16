<?php echo form_open(base_url('admin/merchandise/edit/'.$merchant->id_merchandise),'id="edit"') ?>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="text-danger">Nama Merchandise <span class="text-danger">*</span></label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="nama merchandise" value="<?php echo $merchant->nama_merchandise ?>">
      </div>

      <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" placeholder="harga merchandise" value="<?php echo $merchant->harga_merchandise ?>">
      </div>

      <div class="form-group btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-md"><i class="fa fa-cut"></i> Reset</button>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="15" class="form-control textarea"><?php echo $merchant->deskripsi_merchandise ?></textarea>
      </div>
    </div>
  </div>
      
<?php echo form_close(); ?>
