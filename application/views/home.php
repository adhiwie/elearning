<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url();?>res/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>res/glyph/css/bootstrap-glyphicons.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>res/css/elearning.css" rel="stylesheet" />
	<title>Aplikasi Penilaian Kualitas E-learning berdasarkan ISO 19796</title>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url();?>">Evalator</a>
        <div class="nav-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if($this->session->userdata('role') != "" AND $this->session->userdata('role') == 0){ ?>
	            <li <?php if ($this->uri->segment(2)=="edit" OR $this->uri->segment(2)=="edit_submit") echo 'class="active"';?>>
					<a href="<?=base_url()?>admin/edit">
					Ubah password
					</a>
				</li>
				<li <?php if ($this->uri->segment(2)=="user" OR $this->uri->segment(2)=="userlists" OR $this->uri->segment(2)=="add_user" OR $this->uri->segment(2)=="add_user_submit") echo 'class="active"';?>>
					<a href="<?=base_url()?>admin/user">
					Manajemen User
					</a>
				</li>
				<li <?php if ($this->uri->segment(2)=="metric" OR $this->uri->segment(2)=="metriclists" OR $this->uri->segment(2)=="add_metric" OR $this->uri->segment(2)=="add_metric_submit") echo 'class="active"';?>>
					<a href="<?=base_url()?>admin/metric">
					Manajemen Metrik
					</a>
				</li>
				<li <?php if ($this->uri->segment(2)=="elearning" OR $this->uri->segment(2)=="elearninglists" OR $this->uri->segment(2)=="add_elearning" OR $this->uri->segment(2)=="add_elearning_submit") echo 'class="active"';?>>
					<a href="<?=base_url()?>admin/elearning">
					Manajemen Elearning
					</a>
				</li>
				<li>
					<a href="<?=base_url()?>user/logout">
					Log out
					</a>
				</li>
			<?php }elseif($this->session->userdata('role') == 2){?>

			<li <?php if ($this->uri->segment(2)=="edit" OR $this->uri->segment(2)=="edit_submit") echo 'class="active"';?>>
				<a href="<?=base_url()?>user/edit">
				<i class="icon-chevron-right"></i>
				Ubah password
				</a>
			</li>

			<li <?php if ($this->uri->segment(2)=="ahp_result") echo 'class="active"';?>>
				<a href="<?=base_url()?>admin/elearning">
				<i class="icon-chevron-right"></i>
				Hasil Penilaian
				</a>
			</li>
			<li>
				<a href="<?=base_url()?>user/logout">
				<i class="icon-chevron-right"></i>
				Log out
				</a>
			</li>
			<?php }elseif($this->session->userdata('role') == 1){?>
			<li>
				<a href="<?=base_url()?>user/logout">
				<i class="icon-chevron-right"></i>
				Log out
				</a>
			</li>
			<?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
      	<?php
			$url = $this->uri->segment(1);
			if($url=='home' || $url==''){
				redirect('user');
			} else {
				$this->load->view($isi);
			}
		?>
      </div>

    </div><!-- /.container -->
	<div class="footer"></div>
	<script src="<?php echo base_url();?>res/bootstrap/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>res/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
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