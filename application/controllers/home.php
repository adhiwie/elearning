<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('homepage');
	}

	public function tes()
	{
		$this->load->view('welcome_screen');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */