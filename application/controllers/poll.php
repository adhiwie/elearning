<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poll extends CI_Controller {

	/*
	public function index()
	{
		if($this->session->userdata('username') != ""){
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_main';
			$this->load->view('home',$data);
		} else {
			$data['isi'] = 'admin_login';
			$this->load->view('home',$data);
		}
	}
	*/
	public function index()
	{
		$config['base_url']        = base_url().'admin/metriclists';
		$config['total_rows']      = $this->metric_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<div class="pagination"><ul>';
		$config['full_tag_close']  = '</ul></div>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['cur_tag_open']    = '<li><span class="active"><b>';
		$config['cur_tag_close']   = '</b></span></li>';

		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		

		$this->load->library('table');

		$template = array('table_open' => '<table class="table table-striped">');

		$this->table->set_template($template);

		$process_list  = $this->metric_model->get_proc_list()->result();
		$process_count = $this->metric_model->count_proc();
		$process_left  = array();
		$process_right = array();
		foreach($process_list as $proc){
			array_push($process_left, $proc->proc_name);
			array_push($process_right, $proc->proc_name);
		}
		$limit = 1;
		$counter=1;
		for($i=0;$i<$process_count;$i++){
			for($j=$limit;$j<$process_count;$j++){
				$this->table->add_row($process_left[$i].' vs '.$process_right[$j], $counter++);
			}
			$limit++;
		}
		
		$data['table']      = $this->table->generate();
		
		$data['isi']        = 'admin_index';
		$data['admin_page'] = 'admin_metric';
		$this->load->view('home',$data);
	}
}

/* End of file poll.php */
/* Location: ./application/controllers/poll.php */