
<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><div class="alert alert-success">','</div></div>'); 
?>

<?php echo form_open(base_url('admin/konfigurasi')) ?>
<div class="row">
    <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

    <div class="col-md-12">
       <div class="form-group">
        <label>About</label>
        <textarea name="tentang" rows="15" class="form-control textarea" placeholder="Summary of the company"><?php echo $site->tentang ?></textarea>
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea name="alamat" rows="15" class="form-control textarea" placeholder="Alamat perusahaan/organisasi"><?php echo $site->alamat ?></textarea>
    </div>

    <div class="form-group">
        <label>Header Home</label>
        <textarea name="home_deskripsi" rows="15" class="form-control textarea" placeholder="Deskripsi home"><?php echo $site->home_deskripsi ?></textarea>
    </div>

    <div class="form-group">
        <label>Header Project</label>
        <textarea name="project_deskripsi" rows="15" class="form-control textarea" placeholder="Deskripsi project"><?php echo $site->project_deskripsi ?></textarea>
    </div>

    <div class="form-group">
        <label>Header Document</label>
        <textarea name="document_deskripsi" rows="15" class="form-control textarea" placeholder="Deskripsi document"><?php echo $site->document_deskripsi ?></textarea>
    </div>

    <div class="form-group">
        <label>Header Merchandise</label>
        <textarea name="merchant_deskripsi" rows="15" class="form-control textarea" placeholder="Deskripsi merchant"><?php echo $site->merchant_deskripsi ?></textarea>
    </div>

    <div class="form-group">
        <label>Header Team</label>
        <textarea name="team_deskripsi" rows="15" class="form-control textarea" placeholder="Deskripsi team"><?php echo $site->team_deskripsi ?></textarea>
    </div>

</div>

<div class="col-md-6">

    <h3>Social network</h3><hr>
    
    <div class="form-group">
        <label>Facebook <i class="fa fa-facebook"></i></label>
        <input type="url" name="facebook" placeholder="http://facebook.com/namakamu" value="<?php echo $site->facebook ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Youtube <i class="fa fa-youtube"></i></label>
        <input type="url" name="youtube" placeholder="http://youtube.com/namakamu" value="<?php echo $site->youtube ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Instagram <i class="fa fa-instagram"></i></label>
        <input type="url" name="instagram" placeholder="http://instagram.com/namakamu" value="<?php echo $site->instagram ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site->email ?>" class="form-control" required>
    </div>
    
</div>

<div class="col-md-6">
	<h3>Modul SEO (Search Engine Optimization)</h3><hr>
	<div class="form-group">
        <label>Keywords (Keyword search for Google, Bing, etc)</label>
        <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords"><?php echo $site->keywords ?></textarea>
    </div>
    
    <div class="form-group map">
        <div class="form-group btn-group">
            <input type="submit" name="submit" value="Save Configuration" class="btn btn-success btn-lg">
            <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
        </div>
    </div>
</div>


</div>
</form>

