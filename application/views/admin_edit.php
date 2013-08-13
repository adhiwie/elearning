<?php
echo validation_errors('<div class="alert alert-danger">','</div>');

if(isset($error)) echo $error;
echo "<strong><p>Silakan isi data berikut :</p></strong>";
echo form_open_multipart('admin/edit_submit','class = "form-horizontal"');
?>
<div class="form-group">
	<label for="old_password" class="col-lg-2 control-label">Password lama</label>
	<div class="col-lg-4">
  		<input type="password" class="form-control" placeholder="Password lama" name="old_password" value="<?php echo set_value('old_password');?>" />
	</div>
</div>
<div class="form-group">
	<label for="new_password" class="col-lg-2 control-label">Password baru</label>
	<div class="col-lg-4">
  		<input type="password" class="form-control" placeholder="Password baru" name="new_password" value="<?php echo set_value('new_password');?>" />
	</div>
</div>
<div class="form-group">
	<label for="confirm_new_password" class="col-lg-2 control-label">Konfirmasi password baru</label>
	<div class="col-lg-4">
  		<input type="password" class="form-control" placeholder="Konfirmasi password baru" name="confirm_new_password" value="<?php echo set_value('confirm_new_password');?>" />
	</div>
</div>
<div class="form-group">
	<label for="" class="col-lg-2 control-label"></label>
	<div class="col-lg-4">
  		<input type="submit" value="Submit" class="btn btn-primary" />
  	</div>
</div>
<?php
echo form_close();
?>