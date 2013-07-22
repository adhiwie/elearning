<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$data['users_list'] = $this->users_model->get_users_list(2,0);
		$data['isi']        = 'users';
		$this->load->view('home',$data);
	}

	public function lists()
	{
		$offset = $this->uri->segment(3);
		if($offset == null) $offset = 0;
		$data['users_list'] = $this->users_model->get_users_list(2,$offset);
		$data['isi'] = 'users';
		$this->load->view('home',$data);
	}

	public function detail($users_id)
	{
		$users                 = $this->users_model->get_by_id($users_id)->row();
		$data['users_title']   = $users->users_title;
		$data['users_date']    = $users->users_date;
		$data['users_thumb']   = $users->users_thumb;
		$data['users_content'] = $users->users_content;
		$data['isi']           = 'users_detail';
		$this->load->view('home',$data);
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */