<div class="row">
	<div class="span3 bs-docs-sidebar">
		<ul class="nav nav-list bs-docs-sidenav">
			<li <?php if ($this->uri->segment(2)=="edit" OR $this->uri->segment(2)=="edit_submit") echo 'class="active"';?>>
				<a href="<?=base_url()?>admin/edit">
				<i class="icon-chevron-right"></i>
				Ubah password
				</a>
			</li>
			<li <?php if ($this->uri->segment(2)=="user" OR $this->uri->segment(2)=="userlists" OR $this->uri->segment(2)=="add_user" OR $this->uri->segment(2)=="add_user_submit") echo 'class="active"';?>>
				<a href="<?=base_url()?>admin/user">
				<i class="icon-chevron-right"></i>
				Manajemen User
				</a>
			</li>
			<li <?php if ($this->uri->segment(2)=="metric" OR $this->uri->segment(2)=="metriclists" OR $this->uri->segment(2)=="add_metric" OR $this->uri->segment(2)=="add_metric_submit") echo 'class="active"';?>>
				<a href="<?=base_url()?>admin/metric">
				<i class="icon-chevron-right"></i>
				Manajemen Metrik
				</a>
			</li>
			<li <?php if ($this->uri->segment(2)=="elearning" OR $this->uri->segment(2)=="elearninglists" OR $this->uri->segment(2)=="add_elearning" OR $this->uri->segment(2)=="add_elearning_submit") echo 'class="active"';?>>
				<a href="<?=base_url()?>admin/elearning">
				<i class="icon-chevron-right"></i>
				Manajemen Elearning
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