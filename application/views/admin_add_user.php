<h4>Tambah User</h4>
<hr>
<?php 
if(validation_errors() != ""){
	echo '<div class="alert alert-danger">'.validation_errors().'</div>';
}
if(isset($error)) echo $error;
?>
<form class="form-horizontal" action="<?php echo base_url();?>admin/add_user_submit" method="post">
	<div class="form-group">
    	<label class="col-lg-2 control-label" for="username">Username</label>
    	<div class="col-lg-4">
      		<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username');?>">
    	</div>
  	</div>
 	<div class="form-group">
    	<label class="col-lg-2 control-label" for="password">Password</label>
    	<div class="col-lg-4">
      		<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo set_value('password')?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label" for="name">Nama lengkap</label>
    	<div class="col-lg-4">
      		<input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap" value="<?php echo set_value('name')?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label" for="email">Email</label>
    	<div class="col-lg-4">
      		<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email')?>">
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label" for="role">Role</label>
    	<div class="col-lg-4">
      		<select id="role" name="role" class="form-control">
      			<option value="0">Administrator</option>
      			<option value="1">User biasa</option>
      		</select>
    	</div>
  	</div>
  	<div class="form-group">
      <label class="col-lg-2 control-label" for="role"></label>
    	<div class="col-lg-4">
      		<input type="submit" value="Submit" class="btn btn-primary" />
    	</div>
 	 </div>
</form>