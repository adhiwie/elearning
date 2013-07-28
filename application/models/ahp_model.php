<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ahp_model extends CI_Model {
	public function get_ahp($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->select('*');
		return $this->db->get('ahp_result');
	}
	public function insert_ahp($data){
		$this->db->insert('ahp_result',$data);
	}
	public function insert_raw_table($data)
	{
		$this->db->insert('raw_table',$data);
	}
	public function insert_normalized_table($data)
	{
		$this->db->insert('normalized_table',$data);
	}
	public function insert_column_sum($data)
	{
		$this->db->insert('column_sum',$data);
	}
	public function get_raw_data($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->select('*');
		return $this->db->get('raw_table');
	}
	public function get_normalized_data($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->select('*');
		return $this->db->get('normalized_table');
	}
}

/* End of file ahp_model.php */
/* Location: ./application/models/ahp_model.php */