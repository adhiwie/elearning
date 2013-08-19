<h4>Tambah Metrik</h4>
<hr>
<?php 
if(validation_errors() != ""){
	echo '<div class="alert alert-danger">'.validation_errors().'</div>';
}
if(isset($error)) echo $error;
?>
<form class="form-horizontal" action="<?php echo base_url();?>admin/add_metric_submit" method="post">
	<div class="form-group">
    	<label class="col-lg-2 control-label" for="category">Kategori</label>
    	<div class="col-lg-4">
      		<select id="category" class="form-control" name="category">
      		</select>
    	</div>
  	</div>
 	<div class="form-group">
    	<label class="col-lg-2 control-label" for="process">Proses</label>
    	<div class="col-lg-4">
      		<select id="process" class="form-control" name="process">
      		</select>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label" for="metric">Metrik</label>
    	<div class="col-lg-4">
      		<textarea id="metric" class="form-control" name="metric"><?php echo set_value('metric')?></textarea>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label" for="question">Pertanyaan</label>
    	<div class="col-lg-4">
      		<textarea id="question" class="form-control" name="question"><?php echo set_value('question')?></textarea>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label" for="recommendation">Rekomendasi</label>
    	<div class="col-lg-4">
      		<textarea id="recommendation" class="form-control" name="recommendation"><?php echo set_value('recommendation')?></textarea>
    	</div>
  	</div>
  	
  	<div class="form-group">
      <label class="col-lg-2 control-label" for="recommendation"></label>
    	<div class="col-lg-4">
      		<input type="submit" value="Submit" class="btn btn-primary" />
    	</div>
 	 </div>
</form>