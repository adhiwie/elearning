<h3>Kuisioner</h3>
<hr>
<p><div class="alert alert-info"><h4>Petunjuk :</h4>Mohon untuk menjawab pertanyaan di bawah ini. Silakan pilih <strong>Ya</strong> jika fitur tersebut ada pada elearning dan pilih <strong>Tidak</strong> jika fitur tersebut tidak ada pada elearning.</div><p>
<hr>
<?php
	if(isset($error)) echo $error;
?>
<form method="post" action="<?php echo base_url();?>user/submit" onsubmit="return confirm('Anda yakin akan mensubmit data?')">
<?php
	echo $table;
?>
<hr>
<center><input type="submit" value="Submit" class="btn btn-primary" /></center><br>
</form>