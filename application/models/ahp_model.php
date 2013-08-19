<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ahp_model extends CI_Model {
	public function get_ahp()
	{
		$this->db->select('*');
		$query = $this->db->get('ahp_result');
		return $query->result();
	}
	public function get_ahp_by_id($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->select('*');
		return $this->db->get('ahp_result');
	}
	public function count_ahp()
	{
		return $this->db->count_all('ahp_result');
	}
	public function get_aggregated_ahp()
	{
		$this->db->select('*');
		return $this->db->get('ahp_aggregated');
	}
	public function insert_ahp($data){
		$this->db->insert('ahp_result',$data);
	}
	public function insert_aggregated_ahp($data)
	{
		$this->db->insert('ahp_aggregated',$data);
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
	public function empty_aggregated_ahp()
	{
		$this->db->empty_table('ahp_aggregated'); 
	}
	public function get_column_sum($column_id,$user_id)
	{
		$this->db->where(array('column_id' => $column_id, 'user_id' => $user_id));
		$this->db->select('*');
		return $this->db->get('column_sum');
	}
	public function get_random_index($n)
	{
		$this->db->where('n',$n);
		$this->db->select('R');
		return $this->db->get('random_index');
	}
	public function empty_by_user($user_id)
	{
		$this->db->delete('raw_table', array('user_id' => $user_id));
		$this->db->delete('normalized_table', array('user_id' => $user_id));
		$this->db->delete('column_sum', array('user_id' => $user_id));
		$this->db->delete('ahp_result', array('user_id' => $user_id));
	}
}

/* End of file ahp_model.php */
/* Location: ./application/models/ahp_model.php */