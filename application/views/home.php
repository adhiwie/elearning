<!DOCTYPE html>  
<html lang="en">  
<head>
<link href="<?php echo base_url();?>res/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>res/bootstrap/css/bootstrap.responsive.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>res/css/kitagroups.css" rel="stylesheet" />
<title>Aplikasi Penilaian Kualitas E-learning berdasarkan ISO 19796</title>
</head>
<body>
	<!-- <div id="loading-image"></div> -->
	<div class="container">
		<div class="logo">
			<div class="title">
				<a href=""><strong>Aplikasi Penilaian Kualitas E-learning<br>berdasarkan ISO 19796</strong></a>
			</div>
		</div>
		<div class="top-nav">
			<ul>
				<li><a href="<?php echo base_url();?>">Beranda</a></li>
				<li><a href="<?php echo base_url();?>profil">Cara Kerja</a></li>
				<li><a href="<?php echo base_url();?>service">Tentang</a></li>
			</ul>
		</div>
		<div class="bigcontent">
			<div class="content">
				<?php
					$url = $this->uri->segment(1);
					if($url=='home' || $url==''){
						redirect('user');
					} else {
						$this->load->view($isi);
					}
				?>
			</div>
		</div>
	</div>
	<div class="footer"></div>
	<script src="<?php echo base_url();?>res/bootstrap/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>res/bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>res/js/jquery.jCombo.min.js" type="text/javascript"></script>
	<script>
	  $(document).ready(function(){
	    $('#category').jCombo('<?php echo base_url();?>res/js/getCategory.php',{ 
    		initial_text: ''} );
		$('#process').jCombo('<?php echo base_url();?>res/js/getProcess.php?id=', { parent: '#category', initial_text: '' } );
	  });
 	</script>

</body>
</html>