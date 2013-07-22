<h3>Kuisioner</h3>
<?php
	if(isset($error)) echo $error;
?>
<form method="post" action="<?php echo base_url();?>user/submit" onsubmit="return confirm('Anda yakin akan mensubmit data?')">
<?php
	echo $table;
?>
<center><input type="submit" value="Submit" class="btn btn-primary btn-large" /></center>
</form>