<h3>Masuk ke Evalator</h3>
<?php
if(isset($error)) echo $error;
echo "<strong><p>Silakan isikan username dan password :</p></strong>";
echo form_open_multipart('user/login');
echo '<div class="login-form">';
echo '<input type="text" class="form-control" name="username" placeholder="username" /><br/>';
echo '<input type="password" class="form-control" name="password" placeholder="password" /><br/>';
echo '<input type="submit" value="Log In" class="btn btn-primary" />';
echo '</div>';
echo form_close();
?>