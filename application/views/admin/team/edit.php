<?php echo form_open_multipart(base_url('admin/team/edit/'.$team->id_team),'id="tambah"') ?>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="text-danger">Nama <span class="text-danger">*</span></label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $team->nama ?>">
      </div>

      <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $team->jabatan ?>">
      </div>

      <div class="form-group">
        <label>Upload Foto</label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
            </div>
        </div>
      </div>

      <div class="form-group">
        <label>Facebook</label>
        <input type="text" name="facebook" class="form-control" placeholder="http://facebook.com/namakamu" value="<?php echo $team->fb ?>">
      </div>

      <div class="form-group">
        <label>Nomor Whatsapp</label>
        <input type="text" name="whatsapp" class="form-control" placeholder="Nomor Whatsapp" value="<?php echo $team->wa ?>">
      </div>
    </div>

    <div class="col-md-6">

      <div class="form-group">
        <label>Keahlian</label>
        <input type="text" name="keahlian" class="form-control" placeholder="Keahlian" value="<?php echo $team->keahlian ?>">
      </div>

      <div class="form-group">
        <label>DESKRIPSI SINGKAT</label>
        <textarea rows="5" name="deskripsi" class="form-control"><?php echo $team->deskripsi ?></textarea>
      </div>

      <div class="form-group">
        <label>Instagram</label>
        <input type="text" name="instagram" class="form-control" placeholder="http://instagram.com/namakamu" value="<?php echo $team->ig ?>">
      </div>

      <div class="form-group btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-lg"><i class="fa fa-cut"></i> Reset</button>
      </div>

    </div>
  
<?php echo form_close(); ?>