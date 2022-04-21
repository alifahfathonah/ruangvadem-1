<style>
#imagePreview {
    width: 200px;
    height: 200px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#gambar").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});

function reset_klik() {
  $("#imagePreview").css("background-image", "");
}
</script>

<div class="container text-right">
  <a href="<?php echo base_url('admin/merchandise/gambar/'.$id_merchandise) ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<hr>

<?php 
$last_num = $this->merchant_model->get_last_num_image($id_merchandise);
if ($last_num == null) {
  $last_num = 0;
}else{
  $last_num = $last_num->urutan;
}
echo form_open_multipart(base_url('admin/merchandise/tambah_gambar/'.$id_merchandise),'id="tambah"') ?>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label>Urutan (nomor urutan terakhir <?php echo $last_num; ?>)</label>
        <input type="number" name="urutan" id="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>">
      </div>

      <div class="form-group">
        <label class="text-danger">Upload Gambar <span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
            </div>
        </div>
      </div>

      <br>
      <div class="form-group btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-md" onclick="reset_klik();"><i class="fa fa-cut"></i> Reset</button>
      </div>
    </div>

    <div class="col-md-3">
      <label>Image Preview</label>
      <div id="imagePreview"></div>
    </div>
  </div>
      
<?php echo form_close(); ?>

