<h4>Tambah E-learning</h4>
<?php 
if(validation_errors() != ""){
	echo '<div class="alert alert-error">'.validation_errors().'</div>';
}
if(isset($error)) echo $error;
?>
<form class="form-horizontal" action="<?php echo base_url();?>admin/add_elearning_submit" method="post">
	<div class="control-group">
    	<label class="control-label" for="name">Nama E-learning</label>
    	<div class="controls">
      		<input type="text" id="name" name="name" placeholder="Nama e-learning" value="<?php echo set_value('name')?>">
    	</div>
  	</div>
 	<div class="control-group">
    	<label class="control-label" for="desc">Deskripsi</label>
    	<div class="controls">
      		<textarea name="desc" id="desc" placeholder="Deskripsi"><?php echo set_value('desc')?></textarea>
    	</div>
  	</div>
  	
  	<div class="control-group">
    	<div class="controls">
      		<button type="submit" class="btn">Submit</button>
    	</div>
 	 </div>
</form>