<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != ""){
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_main';
			$this->load->view('home',$data);
		} else {
			$data['isi'] = 'user_login';
			$this->load->view('home',$data);
		}
	}

	public function menu()
	{
		$data['isi'] = 'admin_index';
		$this->load->view('home',$data);
	}

	public function edit()
	{
		$data['isi'] = 'admin_index';
		$data['admin_page'] = 'admin_edit';
		$this->load->view('home',$data);
	}

	public function edit_submit()
	{
		$old_password			= $this->input->post('old_password');
		$new_password			= $this->input->post('new_password');
		$confirm_new_password	= $this->input->post('confirm_new_password');

		$this->form_validation->set_message('required', 'Field <b>%s</b> tidak boleh kosong');
		$this->form_validation->set_rules('old_password', 'Password lama', 'required');
		$this->form_validation->set_rules('new_password', 'Password baru', 'required');
		$this->form_validation->set_rules('confirm_new_password', 'Konfirmasi password baru', 'required');

		if ($this->form_validation->run() == FALSE){
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_edit';
			$this->load->view('home',$data);
		}elseif($new_password != $confirm_new_password){
			$data['error'] = '<div class="alert alert-danger">Password baru tidak cocok</div>';
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_edit';
			$this->load->view('home',$data);
		}else{
			$data = array('password'=>md5($new_password));
			$this->user_model->update($data);
			$data['error']      = '<div class="alert alert-success">Password sukses diganti</div>';
			$data['isi']        = 'admin_index';
			$data['admin_page'] = 'admin_edit';
			$this->load->view('home',$data);
		}
	}

	public function user()
	{
		$config['base_url']        = base_url().'admin/userlists';
		$config['total_rows']      = $this->users_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
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

		$this->table->set_heading(array('data'=>'No','style'=>'width:40px'), array('data'=>'Username','style'=>'width:150px'), array('data'=>'Nama Lengkap','style'=>'width:150px'), array('data'=>'Email','style'=>'width:150px'), array('data'=>'Opsi','style'=>'width:80px'));
		$user_list= $this->users_model->get_user_list(10,0);
		$nomor=1;
		foreach($user_list as $user){
			$this->table->add_row($nomor++,$user->username,$user->name,$user->email,'<a href="'.base_url().'user/detail/'.$user->id.'"><span class="label label-success">detail</span></a> <a href="'.base_url().'user/edit/'.$user->id.'"><span class="label label-warning">edit</span></a> <a href="'.base_url().'user/remove/'.$user->id.'"><span class="label label-danger">hapus</span></a>');
		}

		$data['table'] = $this->table->generate();

		$data['isi'] = 'admin_index';
		$data['admin_page'] = 'admin_user';
		$this->load->view('home',$data);
	}

	public function userlists()
	{
		$config['base_url']        = base_url().'admin/userlists';
		$config['total_rows']      = $this->users_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
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

		$this->table->set_heading(array('data'=>'No','style'=>'width:40px'), array('data'=>'Username','style'=>'width:150px'), array('data'=>'Nama Lengkap','style'=>'width:150px'), array('data'=>'Email','style'=>'width:150px'), array('data'=>'Opsi','style'=>'width:80px'));
		$offset = $this->uri->segment(3);
		if($offset == null) $offset = 0;
		$user_list = $this->user_model->get_user_list(10,$offset);
		$nomor=1;
		foreach($user_list as $user){
			$this->table->add_row($nomor++,$user->username,$user->name,$user->email,'<a href="'.base_url().'user/detail/'.$user->id.'"><span class="label label-success">detail</span></a> <a href="'.base_url().'user/edit/'.$user->id.'"><span class="label label-warning">edit</span></a> <a href="'.base_url().'user/remove/'.$user->id.'"><span class="label label-danger">hapus</span></a>');
		}

		$data['table']      = $this->table->generate();
		$data['isi']        = 'admin_index';
		$data['admin_page'] = 'admin_user';
		$this->load->view('home',$data);
	}

	public function add_user(){
		$data['isi'] = 'admin_index';
		$data['admin_page'] = 'admin_add_user';
		$this->load->view('home',$data);
	}

	public function add_user_submit(){
		$username 	= $this->input->post('username');
		$password 	= md5($this->input->post('password'));
		$name 		= $this->input->post('name');
		$email 		= $this->input->post('email');
		$role 		= $this->input->post('role');

		$this->form_validation->set_message('required', 'Field <b>%s</b> tidak boleh kosong');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('name','Nama lengkap','required');
		$this->form_validation->set_rules('email','Email','required');

		if ($this->form_validation->run() == FALSE){
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_add_user';
			$this->load->view('home',$data);
		}else{
			$data = array(
				'username' =>$username, 
				'password' =>$password, 
				'name'     =>$name, 
				'email'    =>$email,
				'role'     =>$role,
				'status'   =>'0'
			);
			$this->users_model->add_user($data);
			redirect('admin/user');
		}
	}

	public function metric()
	{
		$config['base_url']        = base_url().'admin/metriclists';
		$config['total_rows']      = $this->metric_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
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

		$this->table->set_heading(array('data'=>'Nama Kategori'), array('data'=>'Nama Proses'), array('data'=>'Nama Metrik'), array('data'=>'Pertanyaan'), array('data'=>'Rekomendasi'), array('data'=>'Opsi'));
		$metric_list= $this->metric_model->get_metric_list(10,0);
		$nomor=1;
		foreach($metric_list as $metric){
			$cat = $this->metric_model->get_cat_name($metric->cat_id)->row();
			$proc = $this->metric_model->get_proc_name($metric->proc_id)->row();
			$this->table->add_row($cat->cat_name, $proc->proc_name, $metric->metric, $metric->question, $metric->recommendation,'<a href="'.base_url().'metric/detail/'.$metric->id.'"><span class="label label-success">detail</span></a> <a href="'.base_url().'metric/edit/'.$metric->id.'"><span class="label label-warning">edit</span></a> <a href="'.base_url().'metric/remove/'.$metric->id.'"><span class="label label-danger">hapus</span></a>');
		}

		$data['table'] = $this->table->generate();

		$data['isi'] = 'admin_index';
		$data['admin_page'] = 'admin_metric';
		$this->load->view('home',$data);
	}

	public function metriclists()
	{
		$config['base_url']        = base_url().'admin/metriclists';
		$config['total_rows']      = $this->metric_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
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

		$this->table->set_heading(array('data'=>'Nama Kategori'), array('data'=>'Nama Proses'), array('data'=>'Nama Metrik'), array('data'=>'Pertanyaan'), array('data'=>'Rekomendasi'), array('data'=>'Opsi'));
		$offset = $this->uri->segment(3);
		if($offset == null) $offset = 0;
		$metric_list = $this->metric_model->get_metric_list(10,$offset);
		$nomor=1;
		foreach($metric_list as $metric){
			$cat = $this->metric_model->get_cat_name($metric->cat_id)->row();
			$proc = $this->metric_model->get_proc_name($metric->proc_id)->row();
			$this->table->add_row($cat->cat_name, $proc->proc_name, $metric->metric, $metric->question, $metric->recommendation,'<a href="'.base_url().'metric/detail/'.$metric->id.'"><span class="label label-success">detail</span></a> <a href="'.base_url().'metric/edit/'.$metric->id.'"><span class="label label-warning">edit</span></a> <a href="'.base_url().'metric/remove/'.$metric->id.'"><span class="label label-danger">hapus</span></a>');
		}

		$data['table']      = $this->table->generate();
		$data['isi']        = 'admin_index';
		$data['admin_page'] = 'admin_metric';
		$this->load->view('home',$data);
	}

	public function add_metric(){
		$data['isi'] = 'admin_index';
		$data['admin_page'] = 'admin_add_metric';
		$this->load->view('home',$data);
	}

	public function add_metric_submit(){
		$cat_id 		= $this->input->post('category');
		$proc_id 		= $this->input->post('process');
		$metric 		= $this->input->post('metric');
		$question 		= $this->input->post('question');
		$recommendation = $this->input->post('recommendation');

		$this->form_validation->set_message('required', 'Field <b>%s</b> tidak boleh kosong');
		$this->form_validation->set_rules('metric','metrik','required');
		$this->form_validation->set_rules('question','pertanyaan','required');
		$this->form_validation->set_rules('recommendation','rekomendasi','required');

		if ($this->form_validation->run() == FALSE){
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_add_metric';
			$this->load->view('home',$data);
		}else{
			$data = array(
				'cat_id'         =>$cat_id, 
				'proc_id'        =>$proc_id, 
				'metric'         =>$metric, 
				'question'       =>$question,
				'recommendation' =>$recommendation
			);
			$this->metric_model->add_metric($data);
			redirect('admin/metric');
		}
	}

	public function elearning()
	{
		$config['base_url']        = base_url().'admin/elearninglists';
		$config['total_rows']      = $this->elearning_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
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

		$this->table->set_heading(array('data'=>'No','style'=>'width:50px'), array('data'=>'Nama E-learning','style'=>'width:150px'), array('data'=>'Deskripsi','style'=>'width:350px'), array('data'=>'Opsi','style'=>'min-width:35px'));
		$elearning_list= $this->elearning_model->get_elearning_list(10,0);
		$nomor=1;
		foreach($elearning_list as $elearning){
			$this->table->add_row($nomor++, $elearning->name, $elearning->desc, '<a href="'.base_url().'elearning/detail/'.$elearning->id.'"><span class="label label-success">detail</span></a> <a href="'.base_url().'elearning/edit/'.$elearning->id.'"><span class="label label-warning">edit</span></a> <a href="'.base_url().'elearning/remove/'.$elearning->id.'"><span class="label label-danger">hapus</span></a>');
		}

		$data['table']      = $this->table->generate();
		$data['isi']        = 'admin_index';
		$data['admin_page'] = 'admin_elearning';
		$this->load->view('home',$data);
	}

	public function elearninglists()
	{
		$config['base_url']        = base_url().'admin/elearninglists';
		$config['total_rows']      = $this->elearning_model->get_total_row();
		$config['per_page']        = 10;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
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

		$this->table->set_heading(array('data'=>'No','style'=>'width:50px'), array('data'=>'Nama E-learning','style'=>'width:150px'), array('data'=>'Deskripsi','style'=>'width:150px'), array('data'=>'Opsi','style'=>'min-width:35px'));
		$offset = $this->uri->segment(3);
		if($offset == null) $offset = 0;
		$elearning_list = $this->elearning_model->get_metric_list(10,$offset);
		$nomor=1;
		foreach($elearning_list as $elearning){
			$this->table->add_row($nomor++, $elearning->name, $elearning->desc, '<a href="'.base_url().'elearning/detail/'.$elearning->id.'"><span class="label label-success">detail</span></a> <a href="'.base_url().'elearning/edit/'.$elearning->id.'"><span class="label label-warning">edit</span></a> <a href="'.base_url().'elearning/remove/'.$elearning->id.'"><span class="label label-danger">hapus</span></a>');
		}

		$data['table']      = $this->table->generate();
		$data['isi']        = 'admin_index';
		$data['admin_page'] = 'admin_elearning';
		$this->load->view('home',$data);
	}

	public function add_elearning(){
		$data['isi'] = 'admin_index';
		$data['admin_page'] = 'admin_add_elearning';
		$this->load->view('home',$data);
	}

	public function add_elearning_submit(){
		$name 		= $this->input->post('name');
		$desc 		= $this->input->post('desc');

		$this->form_validation->set_message('required', 'Field <b>%s</b> tidak boleh kosong');
		$this->form_validation->set_rules('name','Nama E-learning','required');
		$this->form_validation->set_rules('desc','Deskripsi','required');
		
		if ($this->form_validation->run() == FALSE){
			$data['isi'] = 'admin_index';
			$data['admin_page'] = 'admin_add_elearning';
			$this->load->view('home',$data);
		}else{
			$data = array(
				'name'=>$name, 
				'desc'=>$desc
			);
			$this->elearning_model->add_elearning($data);
			redirect('admin/elearning');
		}
	}

	public function tes()
	{
		$data['isi']        = 'admin_index';
		$data['admin_page'] = 'tes';
		$this->load->view('home',$data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */