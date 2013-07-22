<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function login($username, $password)
	{
		$this->db->where(array('username'=>$username, 'password'=>$password));
		$this->db->from('user');
		return $this->db->count_all_results();
	}
	public function update($data){
		$this->db->where('username',$this->session->userdata('username'));
		$this->db->update('user',$data);
	}
	public function get_detail($username)
	{
		$this->db->where('username',$username);
		$this->db->select('*');
		return $this->db->get('user');
	}
	public function insert_result($data)
	{
		$this->db->insert('result',$data);
	}
	public function set_status($id,$data){
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}
	public function get_result($id){
		$this->db->where('user_id',$id);
		$this->db->select('*');
		return $this->db->get('result');
	}
	public function count_criteria_by_process($proc_id)
	{
		$this->db->where('proc_id',$proc_id);
		$this->db->from('metric');
		return $this->db->count_all_results();		
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */