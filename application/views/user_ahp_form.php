<h3>Kuisioner</h3>
<?php
	if(isset($error)) echo $error;
?>
<form method="post" action="<?php echo base_url();?>user/ahp_submit" onsubmit="return confirm('Anda yakin akan mensubmit data?')">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nama Proses A</th>
			<th class="table-ahp"></th>
			<th>Nama Proses B</th>
			<th>Bobot</th>
		</tr>
	</thead>
	<tbody>
<?php
	$k=1;
	for($i=0;$i<13;$i++){
		for($j=$k;$j<13;$j++){
			echo '<tr>';
			echo '<td>'.$proc_array[$i].'</td>';
			echo '<td>vs</td>';
			echo '<td>'.$proc_array[$j].'</td>';
			echo '<td><select class="bobot" name="bobot_'.$i.'_'.$j.'">
						<option value=9>9</option>
						<option value=8>8</option>
						<option value=7>7</option>
						<option value=6>6</option>
						<option value=5>5</option>
						<option value=4>4</option>
						<option value=3>3</option>
						<option value=2>2</option>
						<option value=1>1</option>
						<option value=0.500>1/2</option>
						<option value=0.333>1/3</option>
						<option value=0.250>1/4</option>
						<option value=0.200>1/5</option>
						<option value=0.167>1/6</option>
						<option value=0.143>1/7</option>
						<option value=0.125>1/8</option>
						<option value=0.111>1/9</option>
					  </select>
			</td>';
		}
		$k++;
	}
?>
	</tbody>
</table>
<center><input type="submit" value="Submit" class="btn btn-primary btn-large" /></center>
</form>