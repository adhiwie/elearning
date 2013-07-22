<div class="alert alert-success">Penilaian berhasil!</div>
<div class="total-value-container">
	Nilai
	<br><br><br>
	<?php
		$nilai_total = 0;
		for($i=0;$i<13;$i++){
			$nilai_total += $nilai_proses[$i];
		}
		$nilai_total = $nilai_total*100;
		if($nilai_total>100) $nilai_total=100;
	?>
	<div class="total-value"><?php echo round($nilai_total,2);?></div>
</div>
<p><strong>Detail nilai per kategori :</strong></p>

<div class="accordion" id="accordion2">
  <?php
  	$cat_list = $this->metric_model->get_cat_list();
  	$i=0;
  	foreach($cat_list->result() as $cat){
	  	echo '<div class="accordion-group">';
	    echo '<div class="accordion-heading">';
	    echo '  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#'.substr($cat->cat_name,0,3).'">';
	    echo '    '.$cat->cat_name.'';
	    echo '  </a>';
	    echo '	  <div style="float:right; margin-top:-28px; margin-right:15px; font-weight:bold;">'.round($nilai_kategori[$i]*100,2).'</div>';
	    echo '</div>';
	    echo '<div id="'.substr($cat->cat_name,0,3).'" class="accordion-body collapse">';
	    echo '  <div class="accordion-inner">';
	    echo '		<ul>';
	    $process_list = $this->metric_model->get_proc_by_cat($cat->id);
	    foreach($process_list->result() as $proc){
	    	$j=($proc->id)-1;
	    	echo '<li>'.$proc->proc_name.'<div style="float:right; font-weight:bold;">'.round($nilai_proses[$j]*100,2).'</div></li>';
	    }
	    echo '		</ul>';
	    echo '  </div>';
	    echo '</div>';
	  	echo '</div>';
	  	$i++;
	}
  ?>
</div>
<p><strong>Rekomendasi :</strong></p>
<ul>
<?php
	foreach ($recommendation as $rec) {
		echo '<li>'.$rec.'</li>';
	}
?>
</ul>