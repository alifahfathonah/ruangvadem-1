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

$(document).ready(function () {
  var data = '<?php echo $document->tipe ?>';
  if(data == 'video'){
    $('#video').show();
    $('#foto').hide();
    $('#preview_image').hide();
  }else{
    $('#video').hide();
    $('#foto').show();
    $('#preview_image').show();
  }
});

function reset_klik() {
  $("#imagePreview").css("background-image", "");
}

function pilih_tipe(data) {
  if(data == 'video'){
    $('#video').show();
    $('#foto').hide();
    $('#preview_image').hide();
  }else{
    $('#video').hide();
    $('#foto').show();
    $('#preview_image').show();
  }
}
</script>

<?php 
$last_num = $this->document_model->get_last_num();
echo form_open_multipart(base_url('admin/document/edit/'.$document->id_document),'id="tambah"') ?>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-error">
        <label>Urutan (nomor urutan terakhir <?php echo $last_num->urutan; ?>)</label>
        <input type="number" name="urutan" id="urutan" class="form-control" placeholder="Urutan" value="<?php echo $document->urutan ?>">
      </div>

      <div class="form-group">
        <label>Tipe Document</label>
        <select class="form-control" name="tipe" onchange="pilih_tipe(this.value)">
          <option value="foto" <?php if ($document->tipe == 'foto'): ?>
            selected
          <?php endif ?>>Foto</option>
          <option value="video" <?php if ($document->tipe == 'video'): ?>
            selected
          <?php endif ?>>Video</option>
          <option value="slider" <?php if ($document->tipe == 'slider'): ?>
            selected
          <?php endif ?>>Slider</option>
        </select>
      </div>

        <div id="video" class="form-group">
          <label>ID Youtube <small>(https://www.youtube.com/watch?v=<b class="text-danger">453GT1VlTms</b>)</small></label>
          <input type="text" name="video" class="form-control" placeholder="ex. 453GT1VlTms" value="<?php if($document->tipe == 'video') echo $document->gambar ?>">
        </div>

      <div id="foto" class="form-group">
        <label>Upload Gambar</label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
            </div>
        </div>
      </div>

      <div class="form-group btn-group">
        <button type="submit" name="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan Data</button>
        <button type="reset" name="reset" class="btn btn-info btn-md" onclick="reset_klik()"><i class="fa fa-cut"></i> Reset</button>
      </div>
    </div>
    <div class="col-md-3">
      <label>Current Image</label><br>
      <?php if ($document->tipe =='foto' || $document->tipe =='slider'): ?>
        <img src="<?php echo base_url('assets/img/document/'.$document->gambar) ?>" style="max-width:200px; height:auto;">
      <?php else: ?>
        <img src="<?php echo 'http://img.youtube.com/vi/'.$document->gambar.'/hqdefault.jpg' ?>" style="max-width:200px; height:auto;">
      <?php endif ?>
    </div>
    <div id="preview_image" class="col-md-3">
      <label>Image Preview</label><br>
      <div id="imagePreview"></div>
    </div>
  </div>
      
<?php echo form_close(); ?>
