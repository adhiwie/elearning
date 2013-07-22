<h4>Tambah User</h4>
<?php 
if(validation_errors() != ""){
	echo '<div class="alert alert-error">'.validation_errors().'</div>';
}
if(isset($error)) echo $error;
?>
<form class="form-horizontal" action="<?php echo base_url();?>admin/add_user_submit" method="post">
	<div class="control-group">
    	<label class="control-label" for="username">Username</label>
    	<div class="controls">
      		<input type="text" id="username" name="username" placeholder="Username" value="<?php echo set_value('username');?>">
    	</div>
  	</div>
 	<div class="control-group">
    	<label class="control-label" for="password">Password</label>
    	<div class="controls">
      		<input type="password" id="password" name="password" placeholder="Password" value="<?php echo set_value('password')?>">
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="name">Nama lengkap</label>
    	<div class="controls">
      		<input type="text" id="name" name="name" placeholder="Nama lengkap" value="<?php echo set_value('name')?>">
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="email">Email</label>
    	<div class="controls">
      		<input type="text" id="email" name="email" placeholder="Email" value="<?php echo set_value('email')?>">
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="role">Role</label>
    	<div class="controls">
      		<select id="role" name="role">
      			<option value="0">Administrator</option>
      			<option value="1">User biasa</option>
      		</select>
    	</div>
  	</div>
  	<div class="control-group">
    	<div class="controls">
      		<button type="submit" class="btn">Submit</button>
    	</div>
 	 </div>
</form>