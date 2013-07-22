<?php
if(isset($error)) echo $error;
echo "<strong><p>Silakan isikan username dan password :</p></strong>";
echo form_open_multipart('user/login');
echo '<input type="text" name="username" placeholder="username" /><br/>';
echo '<input type="password" name="password" placeholder="password" /><br/>';
echo '<input type="submit" value="Log In" class="btn btn-primary" />';
echo form_close();
?>