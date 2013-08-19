<h4>Tambah E-learning</h4>
<hr>
<?php 
if(validation_errors() != ""){
	echo '<div class="alert alert-danger">'.validation_errors().'</div>';
}
if(isset($error)) echo $error;
?>
<form class="form-horizontal" action="<?php echo base_url();?>admin/add_elearning_submit" method="post">
	<div class="form-group">
    	<label class="col-lg-2 control-label" for="name">Nama E-learning</label>
    	<div class="col-lg-4">
      		<input type="text" class="form-control" id="name" name="name" placeholder="Nama e-learning" value="<?php echo set_value('name')?>">
    	</div>
  	</div>
 	<div class="form-group">
    	<label class="col-lg-2 control-label" for="desc">Deskripsi</label>
    	<div class="col-lg-4">
      		<textarea name="desc" class="form-control" id="desc" placeholder="Deskripsi"><?php echo set_value('desc')?></textarea>
    	</div>
  	</div>
  	
  	<div class="form-group">
      <label class="col-lg-2 control-label" for="desc"></label>
    	<div class="col-lg-4">
      		<input type="submit" value="Submit" class="btn btn-primary" />
    	</div>
 	 </div>
</form>