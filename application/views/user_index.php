<div class="row">
	<div class="span3 bs-docs-sidebar">
		<ul class="nav nav-list bs-docs-sidenav">
			<li <?php if ($this->uri->segment(2)=="edit" OR $this->uri->segment(2)=="edit_submit") echo 'class="active"';?>>
				<a href="<?=base_url()?>user/edit">
				<i class="icon-chevron-right"></i>
				Ubah password
				</a>
			</li>

			<li <?php if ($this->uri->segment(2)=="result") echo 'class="active"';?>>
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
		</ul>
	</div>
	<div class="span9">
		<?php
			$this->load->view($admin_page);
		?>
	</div>
</div>