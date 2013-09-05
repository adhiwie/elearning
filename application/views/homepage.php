<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Penilaian Kualitas E-learning berdasarkan ISO 19796</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>res/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>res/css/homepage.css" rel="stylesheet">
  </head>

  <body>
  	<?php if($this->session->userdata('role') != ""){ redirect('user');}?>
  	<div id="wrap">
	    <div class="container-narrow">
	      <div class="header">
	        <ul class="nav nav-pills pull-right">
            <!--
	          <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
	          <li><a href="#">Tentang</a></li>
	          <li><a href="#">Cara Kerja</a></li>
	          <li><a href="#">Kontak</a></li>
            -->
	        </ul>
	        <h3 class="text-muted">Evalator</h3>
	      </div>

	      <div class="jumbotron">
	        <h1>Selamat datang</h1>
	        <p class="lead">Evalator merupakan sistem penilai kualitas e-learning. Mekanisme penilaian dilakukan berdasarkan ISO 19796 dan menggunakan teknik AHP (Analytical Hierarchy Process) dalam menentukan bobot skor pada tiap kategori.</p>
	        <p><a class="btn btn-large btn-success" href="<?php echo base_url()?>user">Masuk</a></p>
	      </div>
  		</div>
  	</div>
    <div class="footer">
        <p>Evalator &copy; 2013.<br/>Dirancang dan dikembangkan oleh <a href="http://twitter.com/adhiwie">Adhi Wicaksono</a></p>
    </div>

  </body>
</html>
