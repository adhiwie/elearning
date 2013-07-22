<h4>Tambah Metrik</h4>
<?php 
if(validation_errors() != ""){
	echo '<div class="alert alert-error">'.validation_errors().'</div>';
}
if(isset($error)) echo $error;
?>
<form class="form-horizontal" action="<?php echo base_url();?>admin/add_metric_submit" method="post">
	<div class="control-group">
    	<label class="control-label" for="category">Kategori</label>
    	<div class="controls">
      		<select id="category" name="category">
      		</select>
    	</div>
  	</div>
 	<div class="control-group">
    	<label class="control-label" for="process">Proses</label>
    	<div class="controls">
      		<select id="process" name="process">
      		</select>
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="metric">Metrik</label>
    	<div class="controls">
      		<textarea id="metric" name="metric"><?php echo set_value('metric')?></textarea>
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="question">Pertanyaan</label>
    	<div class="controls">
      		<textarea id="question" name="question"><?php echo set_value('question')?></textarea>
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="recommendation">Rekomendasi</label>
    	<div class="controls">
      		<textarea id="recommendation" name="recommendation"><?php echo set_value('recommendation')?></textarea>
    	</div>
  	</div>
  	
  	<div class="control-group">
    	<div class="controls">
      		<button type="submit" class="btn">Submit</button>
    	</div>
 	 </div>
</form>