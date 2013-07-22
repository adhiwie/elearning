<?php
echo validation_errors('<div class="alert alert-error input-xlarge">','</div>');

if(isset($error)) echo $error;
echo "<strong><p>Silakan isi data berikut :</p></strong>";
echo form_open_multipart('admin/edit_submit');
echo '<input type="password" name="old_password" placeholder="Password lama" value="'.set_value('old_password').'" /><br/>';
echo '<input type="password" name="new_password" placeholder="Password baru" value="'.set_value('new_password').'" /><br/>';
echo '<input type="password" name="confirm_new_password" placeholder="Konfirmasi password baru" value="'.set_value('confirm_new_password').'" /><br/>';
echo '<input type="submit" value="Submit" class="btn btn-primary" />';
echo form_close();
?>