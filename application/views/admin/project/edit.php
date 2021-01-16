<?php 
$last_num = $this->project_model->get_last_num();
echo form_open_multipart(base_url('admin/project/edit/'.$project->id_project),'id="tambah"') ?>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label class="text-danger">Judul Project <span class="text-danger">*</span></label>
        <input type="text" name="judul" id="judul" class="form-control" placeholder="judul project" value="<?php echo $project->judul_project ?>">
      </div>

      <div class="form-group has-error">
        <label class="text-danger">Tahun <span class="text-danger">*</span></label>
        <input type="number" name="tahun" id="tahun" class="form-control" placeholder="tahun project" value="<?php echo $project->tahun ?>">
      </div>

      <div class="form-group has-error">
        <label>Status Project</label>
        <select class="form-control" name="status">
          <option value="Publish" <?php if ($project->status_project == 'Publish'): ?> selected="" <?php endif ?>>Publish</option>
          <option value="Draft" <?php if ($project->status_project == 'Draft'): ?> selected="" <?php endif ?>>Draft</option>
        </select>
      </div>

      <div class="form-group has-error">
        <label>Urutan (nomor urutan terakhir <?php echo $last_num->urutan; ?>)</label>
        <input type="number" name="urutan" id="urutan" class="form-control" placeholder="Urutan" value="<?php echo $project->urutan ?>">
      </div>

      <br>
      <div class="form-group btn-group">
        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info"><i class="fa fa-cut"></i> Reset</button>
      </div>

      <!-- <div class="form-group">
        <label>Upload Gambar</label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
            </div>
        </div>
      </div> -->
    </div>

    <div class="col-md-6">

      <div class="form-group">
        <label>Deskripsi Project</label>
        <textarea id="isi" name="deskripsi" class="form-control"><?php echo $project->deskripsi_project ?></textarea>
      </div>
    </div>
  </div>
      
<?php echo form_close(); ?>

